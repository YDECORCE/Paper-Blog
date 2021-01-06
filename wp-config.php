<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'paperblog' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'vJ(`|.U[YR]q}#7IyN+BXy*/ZEl_[m)}|!kAGXzVl6Zi@W!?`/#<qjdkQKVZX*v0' );
define( 'SECURE_AUTH_KEY',  '<`K@P1tfC[ly3]T(#F^k{NzIwr{X^}gV1Eik]ctK8j2YB=xu(zp,OcE}cLzxtf~w' );
define( 'LOGGED_IN_KEY',    'Q~@wXQ! = %+I]4qZ=Hnnn8KJ@sJzns,c*6q[A_xsF]/sWzxz|O<J$(bk]yM,J.P' );
define( 'NONCE_KEY',        'GgC!X=I3rM,& >[+mSxVW<>MLb,JBOd->2rPf`uW>phsBy2T^~s{*tj; sz:q8PQ' );
define( 'AUTH_SALT',        'M89:.B(A7)5<qx}_HKS^2.=C]Z;82?AP7dz&Dt+1>AIkWE6qfsPRqRA9xc3bn9Fz' );
define( 'SECURE_AUTH_SALT', '6VEZ>wfU`$i&FRPt8C>NVvW`HvQg^.<[a#]4Z-Dz_jB}{U>8703uI$^`&FV}4>;9' );
define( 'LOGGED_IN_SALT',   'yIGi$aQZ~`n:14Wvi~pj{p#8V?)*NeyzIq4gyeGMpgq)sJSw`@C:RuPMrU)X/6&e' );
define( 'NONCE_SALT',       'M`L.)uO|cS<3i*4:de@2kAR;hL+V-ZaJz`5ksL`[?V6D>$$FQW& 0Q2pDlZ}2E!,' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'bpwp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
