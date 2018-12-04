<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hoiku');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'pNNZRHn}FCVZ7q $?Wl9|M:&-UFt `Vm?K W:M:_2|>o(pH7.=?:SI)F|Li9ELu{');
define('SECURE_AUTH_KEY',  ']I?>~l)t(cQH4IYRSDy5EZ<P0]<lufI8OIn+-zK9l #5$>``!]BFGpHlaUD1_RP#');
define('LOGGED_IN_KEY',    '4CO/h?.3>U!)B*vjwQtj8?l KO!3G^~+CI;j,E.G?r;r?:?~EFDX,F;gG)!}Cx#A');
define('NONCE_KEY',        '^&6oiah .jwmjYGN+B5)?_ud(Yi>}$V>mOP$ rIYDP1ALaTdoR?0F^Wqj>x+tJ]G');
define('AUTH_SALT',        '[Fia7RG@A7{Cbm_E89:BP9cV(YH10AuyQNC`;e,awjH{jWiLNIQm>C|nqV;2 ny1');
define('SECURE_AUTH_SALT', 'LYhuI&W+3rA;ZT43eHNQ}a%~Xo:)x_PI|5AUEn=MZBK/(C/%lUizBzp]h#qCr7Xv');
define('LOGGED_IN_SALT',   'nv`o|Y#W4IYdwl>HI6fL7g/SOSP% Pn.swOrDYBjl7URdGijfV?02F/6=s>o+J{C');
define('NONCE_SALT',       '$vtevGOJO{h_4?X+RqJr0,S2Mg_0qGw77=.|$Z6JM#Rg;8>z^J8diAbu;+t~=KiX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
