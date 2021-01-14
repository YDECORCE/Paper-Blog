<?php
/* Create a connexion to database*/
function connect(){
global $wpdb;
$servername = $wpdb->dbhost;
$username = $wpdb->dbuser;
$password = $wpdb->dbpassword;
$dbname = $wpdb->dbname;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
return $conn;
}

/* Creating database Table for plugin */
function dbtable_covid_create(){
global $wpdb;
$conn = connect();
$charset_collate = $wpdb->get_charset_collate();
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
) $charset_collate;";
$conn->exec($sql);
$conn = null;
}
}
/* Download API datas in a specific DB Table*/
function adddatatotable(){
    $url = "https://coronavirusapi-france.now.sh/AllLiveData";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
    $data=curl_exec($ch);
    curl_close($ch);
    $reponse=json_decode($data,true);
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
            }
}
/* function for changing datas in DB table */
function updatecovid(){
    $conn = connect();
    $delete=$conn->prepare("DELETE FROM `bpwp_table_covid`");
    $estceok=$delete->execute();
    if($estceok){
                echo 'effacement OK</br>';} 
            else {
                echo 'WTF</br>';}
    adddatatotable();
    echo "la table a été mise à jour";
}

/* select all datas from filter (DEP or REG) in DB table */
function getdatas($filter){
    $conn = connect();
    $datas=$conn->prepare("SELECT * FROM `bpwp_table_covid` WHERE (bpwp_table_covid.code LIKE $filter)");
    $datas->execute();
    return $datas->fetchAll();
}

function getdata($s){
    // echo $s;
    $search="'".$s."'";
    // echo $search;
    $conn = connect();
    $datas=$conn->prepare("SELECT * FROM `bpwp_table_covid` WHERE bpwp_table_covid.nom LIKE $search");
    $datas->execute();
    // var_dump($datas);
    // $datas->debugDumpParams();
    $datas=$datas->fetchAll();
    // var_dump($datas);
    return $datas;
}

function liste_déroulante($filter)
    {
    if ($filter=="'DEP%'"){
        $label='tous les départements';
        $name='departement';
        }
        else{
            $label='toutes les régions';
            $name='region';
        }
    $bdd=connect();
    $reponse = $bdd->query("SELECT `code`, `nom` FROM `bpwp_table_covid` WHERE (bpwp_table_covid.code like $filter)");
    echo'<select class="custom-select my-2 mx-5" name="search">';
    echo'<option value="all">'.$label.'</option>';
    while ($donnees = $reponse->fetch()) {
        echo'<option value='.$donnees['nom'].'>'.$donnees['nom'].' </option>';
    }
    echo'</select>';
    }

function filterdatas($requete){
    $conn=connect();
    $datas=$conn->prepare("SELECT * FROM `bpwp_table_covid` WHERE $requete");
    $datas->bindParam(':search', $search,PDO::PARAM_STR);
    $datas->execute();
    $datas=$datas->fetchAll();
    return $datas;

}