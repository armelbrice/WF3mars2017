<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}}p+_wSX8o:ga/.Uf?4/|:J~-a@o_]ZoC7*fc`05H,5LtK@HH@Cv|!<<R_bBsaBi');
define('SECURE_AUTH_KEY',  'z77JX~!)Wiox}U;F?FoGS@;K*=bf.m>9O/tg0gQohvx?.``d+x^p6 c$M=0Ks<a(');
define('LOGGED_IN_KEY',    '@sa4[v3E^Y-ngW?))R8J)}]He4Uo50gSWvoLU.p4Z6)9]  )&]$[</+Yo9&r,NO5');
define('NONCE_KEY',        '<zO+rRvfq<q]8ED):f34,p%_hwuE9%IB;7OM`qBUtsB-.b^PfT(?Cfw/OXeW[2!v');
define('AUTH_SALT',        'XUy:)S}$u9zBNLiQT[(4qTAm7=kpK&j-eQ1!gEi.os>@f-F(*f&S.SZL!K#^|$Mp');
define('SECURE_AUTH_SALT', 'XX$yro|71+y5Q|h7Eb>v]r06kl-[:;}e>$ct{1ug>F2-S~]]s2B!bX*_:?RExXTz');
define('LOGGED_IN_SALT',   '0Fw$0-Pq_YOc|P=+_QR[@|r`,8S=BT6I+U!G,~4wNcNHYk3K5!vcs#FkS_03GLq?');
define('NONCE_SALT',       'q}lh0!V=9(=e0KKLFg%%.10$*uo`ZH@PH4z{jwMM@kACvWz(qV=uZW`rV,lY-q;J');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');