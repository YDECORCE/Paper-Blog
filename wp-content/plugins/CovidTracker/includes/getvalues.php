<?php
// require_once '../Model/functioncovid.php';

// global $wpdb;
// var_dump($wpdb);

if(isset($_GET['search'])){
     $filter="'".$_GET['search']."%'";
    //  echo $filter;
//     $bdd=connect();
//     $reponse = $bdd->prepare("SELECT `nom` FROM `bpwp_table_covid` WHERE (bpwp_table_covid.code like $filter)");
//     $reponse->execute();
//     $values = $reponse ->fetchAll();
//     var_dump($values);
//     echo json_encode($values);
 }
echo json_encode(["titi", "toto", "tata", "fifi"]);

?>