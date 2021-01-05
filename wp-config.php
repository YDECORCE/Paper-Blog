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
define( 'DB_NAME', 'paper_blog' );

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
define( 'AUTH_KEY',         'zFm[Cm*;7]Yqo9 H#u?6#Sm/(-:^xi?8)=a$rebKX[(Q5)mrk55|4N[6]/1xeXJ@' );
define( 'SECURE_AUTH_KEY',  'J|`;|e+F93VY;RwC`cDeC%<r;CLh}2E=R9I/vY{ZehJOh60-`iIsi1A;]4Ew7X.P' );
define( 'LOGGED_IN_KEY',    '3rK4_da[iNBs=zo=3y@K.ag-+aBUE|Z}ALENjgHU!r_4:H;1izCb`kNdQ#d<[6Q-' );
define( 'NONCE_KEY',        'MUK.xkfI;Fu79MbN<^`8J9H3~mNQ1~E.H>e#5x(L&ikPNkU+XSt/9^t=[FpGOZ0$' );
define( 'AUTH_SALT',        'C>Re[$Kw/Zb5hT&7n.OTa:pB`q8xm2dk%8jFhuZ?mFNx/EFo1>pxuZYkc!R?(RKp' );
define( 'SECURE_AUTH_SALT', 'J7hV:2<)Sw!T1]^]lCGPdZ*Z=o+r|aR>p)TG&P;366@t}SEkvE<5EPm+AhO#xR`e' );
define( 'LOGGED_IN_SALT',   ',=~^Q1zLUFv7Uc=EB/@1}A*!T#j1:?=:#Ny^:)q&xIWd&}^*J]&Q.MV6yPdwZ`[f' );
define( 'NONCE_SALT',       '-o[tYRlux{Q>P7JwE20atXM0zy#>PS=*8 %GGFB!p{&iOGGmgS~LmgY+vMq@}LE7' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'pbwp_';

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
