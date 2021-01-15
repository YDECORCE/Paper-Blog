<?php
require_once plugin_dir_path(__DIR__) . 'Model/functioncovid.php';
require_once plugin_dir_path(__DIR__) . 'Controler/covidControler.php';
// ajout du CSS spécifique au plugin

function addcssfile() {
    wp_enqueue_style( 'covid.css', plugin_dir_path(__DIR__) . 'includes/covid.css' );
}
add_action( 'wp_enqueue_scripts', 'addcssfile',);

//A l'installation du plugin on va faire en sorte qu'une table soit créé dans notre base de données si elle n'existe pas
dbtable_covid_create();
// A l'installation du plugin, chargement des données de l'API
// adddatatotable();



//Ajout de lien de notre plugin dans le menu latéral
add_action( 'admin_menu', 'pluginLink' );

function pluginLink()
{
add_menu_page(
'Covid Tracker - Admin', //Titre de la page
'Covid Tracker', //Lien devant être affiché dans la barre latérale
'manage_options', //Obligatoire pour que ca fonctionne
'covid_tracker_admin', //Le Slug
'covid_tracker_admin_page'//Le callBack
);
}
//Maintenant génération de l'intérieur de la page admin quand le slug est appelé
function covid_tracker_admin_page(){
    include_once plugin_dir_path(__DIR__) . 'Vue/templateadmin.php';
    include_once plugin_dir_path(__DIR__) . 'includes/scriptbackend.php';
    
}