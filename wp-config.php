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
define( 'DB_NAME', 'cms' );

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
define( 'AUTH_KEY',         '$L:=jB@Ot./+el0!>7]0WAkrh+_K1$G(@s)sJF86X!Fgzh5ij@aD):hp#RVtJC p' );
define( 'SECURE_AUTH_KEY',  'Qf^ExPN#o!aM4*1k)Wk0@H{7=1k<W5px`dmf#Ua4iilS)81e=(HyBh<jMiSrBN_N' );
define( 'LOGGED_IN_KEY',    'Ak`>L_%)AwJ-IA#&;[e9x6OP{9HZEz16lPQ#98wFKV_+6Wg6Ul+YUIaHAHx}WS_*' );
define( 'NONCE_KEY',        'YGG*{[.x:%U=x?]#wS]-Xj`PTVWXeL=i5v8X?W%I{PSS]r!h>JpaoC5^UlbZ13 r' );
define( 'AUTH_SALT',        '4C,ZQcj_`nD,q;C+N%h9H*$~e#zf~7M6Q4VMqLn^(FI=@/_U6dO;@%T?o]m-6ti=' );
define( 'SECURE_AUTH_SALT', ']A!^Fd*:26^2@2mZ,z#n-6J=NMAv>SC;~A(GiLX]~k IWj?KuZO| |nRNB|3U;x&' );
define( 'LOGGED_IN_SALT',   'U;:#V`FsPwPbo*_i-x38Hsr*:H2M:ZMyZ6sOul1 >?!y18zb(D;m_2aB.N<%rl.G' );
define( 'NONCE_SALT',       'k6O?3*E{BqN4`KaRpAnxm,#|2PF4rFZCQ6KB_ogeJ{Ti(E=Nwsv?1N,eX(oL3fko' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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
