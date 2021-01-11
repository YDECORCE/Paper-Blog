<?php
/* Creating database Table for plugin */

function DBP_covid_create(){

global  $wpdb;
$DBP_covid=$wpdb->prefix."dbp_covid";
$DBP_query="CREATE TABLE $DBP_covid(
    id INT(6) AUTO_INCREMENT NOT NULL, 
    code VARCHAR(30), 
    nom VARCHAR(30), 
    hospitalises INT(30), 
    reanimation INT(30), 
    nouvellesHospitalisations INT(30), 
    nouvellesReanimations INT(30), 
    deces INT(30), 
    gueris INT(30),
    PRIMARY KEY (id)) ENGINE=InnoDB;";

require_once(ABSPATH ."wp-admin/includes/upgrade.php");
dbDelta($DBP_query);

}
