<?php
/* Creating database Table for plugin */

function dbtable_covid_create(){
    global $wpdb;
$servername = $wpdb->dbhost;
$username = $wpdb->dbuser;
$password = $wpdb->dbpassword;
$dbname = $wpdb->dbname;
$dbtable_covid=$wpdb->prefix."table_covid";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
