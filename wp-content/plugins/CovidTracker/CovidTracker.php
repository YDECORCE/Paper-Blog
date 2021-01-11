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

