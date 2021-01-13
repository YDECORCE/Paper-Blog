<?php
require_once plugin_dir_path(__DIR__) . 'Model/functioncovid.php';


if (isset($_POST['action'])&&($_POST['action']=='maj')){
    updatecovid();
}

function showresultswithoutsearch($datas){
require(plugin_dir_path(__DIR__) .'Vue/tablewithoutsearch.php');
return $html;
}

function displayWidthSearchBar_controler(){
    $datas=getdatas("'DEP%'");
    require(plugin_dir_path(__DIR__) .'Vue/searchpage.php');    
    
    return $html;
}

?>