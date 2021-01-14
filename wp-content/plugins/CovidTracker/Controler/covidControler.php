<?php
require_once plugin_dir_path(__DIR__) . 'Model/functioncovid.php';


if (isset($_POST['action'])&&($_POST['action']=='maj')){
    updatecovid();
}

if (isset($_GET['action'])&&($_GET['action']=='show')){
    $filter=$_GET['search'];
    if ($filter=='all'){
        echo "on va voir";}
    else {
    $datas=getdata($filter);
    require(plugin_dir_path(__DIR__) .'Vue/table.php');  
    return $html;
    
    }
}

function showresultswithoutsearch($datas){
require(plugin_dir_path(__DIR__) .'Vue/tablewithoutsearch.php');
return $html;
}

function displayWidthSearchBar_controler($s){
    if($s=='departement'){$filter="'DEP%'";}elseif($s=='region'){$filter="'REG%'";}else{echo"une erreur s'est produite";$filter="'%'";}
    if (isset($_POST['action'])&&($_POST['action']=='showone')){
        $search=$_POST['search'];
        if ($search=='all'){
            $datas=getdatas($filter);}
        else {
        $datas=getdata($search);
        }}
        elseif(isset($_POST['action'])&&($_POST['action']=='filter')){
            $champ=$_POST['column'];
            $operator=$_POST['operator'];
            $value=$_POST['value'];
            $requete=$champ.$operator.$value." AND code LIKE ".$filter;
            // echo $requete;
            // die;
            $datas=filterdatas($requete);
        }
        else{
        $datas=getdatas($filter);}

    require(plugin_dir_path(__DIR__) .'Vue/table.php');    
    return $html;
}

?>