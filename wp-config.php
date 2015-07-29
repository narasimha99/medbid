<?php
 if (!session_id()) { session_start(); } 
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

 


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'networklocum');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '9848917043');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '+^BLldb;VbGiqWz5D-(F4|03C-|&wf|Bk<w:-kJ :m`jURZe7hj;0E&|0wf;aXi/');
define('SECURE_AUTH_KEY',  '+!R[75VULn_eX`Ca@ZQ232%i;v/~zz0fkWaji<VI++yy+w.8AmxGR+=es&~7c{de');
define('LOGGED_IN_KEY',    'PQYw{?`8P[-ATpm4%1X_tU};>Fhc(taBF=lWKDvo&j]7]@|f|JzBN|B#Bj_?VDgL');
define('NONCE_KEY',        '^@pGm8/nLjzx!&/<pTilOiMDBGj/,-JEoV5dX,=O!${-nY<]x|d6{1+iN^!TXfKY');
define('AUTH_SALT',        'Yl}^k[IuzA/uto:e8~4C_xZYwRUt0!r1=El:8wHw@;A=Fgky?:OKYq}7$4,Lz2pM');
define('SECURE_AUTH_SALT', ' t0UlRd)S$Zbq,D]<t#`V5(cL%E.@5#KaKsJ!={rE{>=4ycwpMA=16 /c7CV]<@w');
define('LOGGED_IN_SALT',   'p#:vX._q|#3o4UvI|coyxT:){9OZKds|A/bAA-6<h|v;RPlY78U#%;MF`A){D^JW');
define('NONCE_SALT',       '-!sg02Ph{ n~;cjxT-R.YnfIZRLR+sgLMH1I>54AZ@IZ<C*k[u%i$F`#+xRaJ(s8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('GoogleApikey', false);
