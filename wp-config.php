<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_quickinfo');

/** MySQL database username */
define('DB_USER', 'qrdb_usr');

/** MySQL database password */
define('DB_PASSWORD', 'P0rk_in_th3_b^rr3l');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        'U|k2P`/NW:[<Ig|%F;a3OO+xO$z|HoFD(|d2X5GUSB6Sp$qxJ(cLmrhq+=N-swPd');
define('SECURE_AUTH_KEY', 'y+Vn@F-||v-l4|_^X)?NVU4u}GN/xgb#=@h*wHyuev&zAFZeUG.;-Y,R,X)x<E{D');
define('LOGGED_IN_KEY',   'Qv=/^>{m~8B@%^CiS[>mV%[^!|>d4UVc|JHMku,hQ8wA1(#a|[#6~.Db QH_wc^-');
define('NONCE_KEY',       ')V~`jpK#=,R&ZtTf/Hw6ZhN<@vBV EQO_|v[l`^[`2+4b`18Yr?/o3D.1E{hkaW^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
