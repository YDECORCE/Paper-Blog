<?php
/*
Plugin Name: Covid Tracker for Wordpress
Plugin URI: https://yannd.promo-44.codeur.online/
Description: Extension qui génère un widget d'information sur la pandémie de Covid19 dans votre département.
Author: ACS Lons le Saunier - Yann DECORCE - 2021
Version: 1.0
Author URI: https://yannd.promo-44.codeur.online/
*/
require_once plugin_dir_path(__FILE__) . 'includes/config.php';


if(!defined('ABSPATH')){
    define('ABSPATH', dirname(__FILE__).'/');
}

/* shortcode qui affiche les données de tous les départements
 * Possède un attribut "s" qui recherche l'existance
 * d'une chaine dans le nom du departement
 *
 * [departements]
 */
function covid_departments_shortcode() {
         
    //Récupère le tableau des clients
    $departements = getdatas("'DEP%'");
 
    //Si pas de clients on retourne un message d'info
    if(empty($departements)){
       return "<p>pas de données à afficher!</p>";
    }
 
    //Retourne le code HTML du shortcode
    $html=showresultswithoutsearch($departements);
    return $html;
}
/* shortcode qui affiche les données de tous les départements
 * Possède un attribut "s" qui recherche l'existance
 * d'une chaine dans le nom du departement
 *
 * [regions]
 */
function covid_regions_shortcode() {
    
    $regions = getdatas("'REG%'");
 
    //Si pas de clients on retourne un message d'info
    if(empty($regions)){
       return "<p>pas de données à afficher!</p>";
    }
    //Retourne le code HTML du shortcode
    $html=showresultswithoutsearch($regions);
    return $html;
} 


/* shortcode qui affiche les données de tous les départements
 * Possède un attribut "s" qui recherche l'existance
 * d'une chaine dans le nom du departement
 *
 * [zone s='ain']
 */
function covid_onezone_shortcode($atts) {
    //Récupéation de l'attribut "search
    //Recherche dans nom
    $s = isset($atts['s']) ? $atts['s'] : '';
    //Récupère le tableau des clients
    $zone = getdata($s);
 
    //Si pas de clients on retourne un message d'info
    if(empty($zone)){
       return "<p>pas de données à afficher!</p>";
    } 
    //Retourne le code HTML du shortcode
    $html=showresultswithoutsearch($zone);
    return $html;
}
function displayWidthSearchBar_shortcode() {
    //Récupéation de l'attribut "search
    //Recherche dans nom
    //Récupère le resultat de la recherche
    $html = displayWidthSearchBar_controler();
 
    //Si pas de clients on retourne un message d'info
    // if(empty($zone)){
    //    return "<p>pas de données à afficher!</p>";
    // } 
    //Retourne le code HTML du shortcode
    // $html=showresultswithoutsearch($zone);
    return $html;
}

//Enregistre les shortcodes du plugin
function covid_departments_register_shortcode() {
    add_shortcode( 'departements', 'covid_departments_shortcode' );
}
function covid_regions_register_shortcode() {
    add_shortcode( 'regions', 'covid_regions_shortcode' );
}
function covid_zone_register_shortcode() {
    add_shortcode( 'zone', 'covid_onezone_shortcode' );
}
function displayWidthSearchBar_register_shortcode() {
    add_shortcode( 'covidsearch', 'displayWidthSearchBar_shortcode' );
}

add_action( 'init', 'covid_departments_register_shortcode' );
add_action( 'init', 'covid_regions_register_shortcode' );
add_action( 'init', 'covid_zone_register_shortcode' );
add_action( 'init', 'displayWidthSearchBar_register_shortcode' );