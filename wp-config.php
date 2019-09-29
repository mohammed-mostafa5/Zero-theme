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
define( 'DB_NAME', 'zero' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '__yDzN[`q,y/w)8QNU8C(E{e<T!$v5Qi EE|#UgY&b?l?1-0_n:=k.KPFZ+C933a' );
define( 'SECURE_AUTH_KEY',  '?=:?u9y[Yx2EtrL}aZn){4_UnU*!&dG3qVLaf`W`ZSW!S^S}hq3iAX}NLUmkN_n2' );
define( 'LOGGED_IN_KEY',    'i)z?<u`RX/,L|i<zAqC^1XlO 1/|?4fB8[{9m12_kZNhB]|shsE1D}5QAG}.9X~%' );
define( 'NONCE_KEY',        '(r*:ij^UR3E%eygJR06l8]S-h$?QuN7KsS3&Uf9lN+<Q-|!ruv36|^R;+,AaU4Oc' );
define( 'AUTH_SALT',        'QydOI8O1IR%fAMJ +tp+jf/k`E<UYZYjra?]sz=Or6w-2]Ye?v^+.p r.N8+7<cT' );
define( 'SECURE_AUTH_SALT', 't;Tj&+&UfRE?dJVrd|}B3$OrKDwB>f,>O1y2;DH5i:D-P+:6=.J%PF.s!3bGarzR' );
define( 'LOGGED_IN_SALT',   '%Ug-7zBYjb6Vmg=9gz:0(CewLu<Jx(>#QZHkAkP(-^`vE%>ERicPoWC!U_!Oz?7`' );
define( 'NONCE_SALT',       '*U;LEM{aX=eM&:Ah!l/di #yMw:>/${GKO< %]?(jRV!}P+q(d0p7 c&5p`?46`S' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

define('FS_METHOD', 'direct');
