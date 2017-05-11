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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'e=qiwz(0hEgz;+@aTa4rW>M9}P7sf>Soi Y Cz$;+C(%/>/sx!+`1ct%HWp.~^F/');
define('SECURE_AUTH_KEY',  ';0s7^*txERSG7akI%LB>FIa5>8s,*  6}w`lDSg+*c5kg<NW*R9-Ngo}9qBrBk#o');
define('LOGGED_IN_KEY',    '%W1nvy(X>BUX:!PI&DH(a^o.}m>r),,E]HtfHEo10iiMCm||rTG*./S74{8s?qFu');
define('NONCE_KEY',        '|p~OyYn(>Q)FW4iztV[n5T1j 7To5m.HBm~{O[?g+=Z*TiJoBK_pfT6at^A$+G{V');
define('AUTH_SALT',        ';Hbm`jl%LyVmZ8tG)g{7aPy$o{k|@aKbXz^dV|35((Z3k;e}e#?(xL0mbu2i<%}{');
define('SECURE_AUTH_SALT', 'g?}7+p BJ4s%NlC12I|Wy{$LyEN%CZU7C_u91n_l-fN~}_M<64rDk0#2_a.{P~i;');
define('LOGGED_IN_SALT',   '*t@12tywZ6B-YJWeXQq@o#NiWWzk_,y~rw(Uj*9Pt`-^kaZmb)SV:|%;W35+^f@j');
define('NONCE_SALT',       'PpS<&eqGkZ+}8t=KNYpg]L|g712:s,au1@Ax?y%`^Aq(%]eC8dK`k$!-VCu9Uj-u');
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