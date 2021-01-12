<?php
/* Creating database Table for plugin */
function connect(){
global $wpdb;
$servername = $wpdb->dbhost;
$username = $wpdb->dbuser;
$password = $wpdb->dbpassword;
$dbname = $wpdb->dbname;
$dbtable_covid=$wpdb->prefix."table_covid";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
return $conn;
}


function dbtable_covid_create(){
global $wpdb;
$conn = connect();
$dbtable_covid=$wpdb->prefix."table_covid";
$sh = $conn->prepare( "DESCRIBE $dbtable_covid ");
if ( !$sh->execute() ) {
$sql = "CREATE TABLE $dbtable_covid (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
code VARCHAR(30) NOT NULL,
nom VARCHAR(30) NOT NULL,
date VARCHAR(50),
hospitalises int(30),
reanimation int(30),
nouvellesHospitalisations int(30),
nouvellesReanimations int(30),
deces int(30),
gueris int(30)
)";
$conn->exec($sql);
$conn = null;
}
}

function adddatatotable(){
    $url = "https://coronavirusapi-france.now.sh/AllLiveData";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $data=curl_exec($ch);
    curl_close($ch);
    $reponse=json_decode($data,true);
    // var_dump($reponse);
    $conn = connect();    
    for($i=0;$i<count($reponse['allLiveFranceData']);$i++){
            $ajouter=$conn->prepare("INSERT INTO `bpwp_table_covid`(`id`, `code`, `nom`, `date`, `hospitalises`, `reanimation`, `nouvellesHospitalisations`, `nouvellesReanimations`, `deces`, `gueris`) 
            VALUES (NULL,:code,:nom,:jour,:hospitalises,:reanimation,:newhos, :newrea,:deces,:gueris)");
            $ajouter->bindParam(':code', $reponse['allLiveFranceData'][$i]['code'],PDO::PARAM_STR);
            $ajouter->bindParam(':nom', $reponse['allLiveFranceData'][$i]['nom'],PDO::PARAM_STR);
            $ajouter->bindParam(':jour', $reponse['allLiveFranceData'][$i]['date'],PDO::PARAM_STR);
            $ajouter->bindParam(':hospitalises', $reponse['allLiveFranceData'][$i]['hospitalises'],PDO::PARAM_STR);
            $ajouter->bindParam(':reanimation', $reponse['allLiveFranceData'][$i]['reanimation'],PDO::PARAM_STR);
            $ajouter->bindParam(':newhos', $reponse['allLiveFranceData'][$i]['nouvellesHospitalisations'],PDO::PARAM_STR);
            $ajouter->bindParam(':newrea', $reponse['allLiveFranceData'][$i]['nouvellesReanimations'],PDO::PARAM_STR);
            $ajouter->bindParam(':deces', $reponse['allLiveFranceData'][$i]['deces'],PDO::PARAM_STR);
            $ajouter->bindParam(':gueris', $reponse['allLiveFranceData'][$i]['gueris'],PDO::PARAM_STR);
            $estceok=$ajouter->execute();
            if($estceok){
                    echo 'Votre enregistrement a été ajouté avec succès <br>';} 
                else {
                    echo 'Veuillez recommencer svp, une erreur est survenue <br>';}
                    }
}