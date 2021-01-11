<?php
/*
Plugin Name: Covid Tracker for Wordpress
Plugin URI: https://yannd.promo-44.codeur.online/
Description: Extension qui génère un widget d'information sur la pandémie de Covid19 dans votre département.
Author: ACS Lons le Saunier - Yann DECORCE - 2021
Version: 1.0
Author URI: https://yannd.promo-44.codeur.online/
*/
if(!defined('ABSPATH')){
    define('ABSPATH', dirname(__FILE__).'/');
}

// ajout de la nouvelle table
include_once("Model/functioncovid.php");

register_activation_hook(__FILE__,"DBP_covid_create()");