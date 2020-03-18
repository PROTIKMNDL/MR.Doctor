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
define( 'DB_NAME', 'mr.doctor_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'PROTIKmondal1' );

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
define( 'AUTH_KEY',         '399HcxLEvo$]nHZ=4#n)VlT9W2|%bPjH(J>llg&0f{5Y@or<_&XlOInG>!!$^}j(' );
define( 'SECURE_AUTH_KEY',  'swAt}0/iyT:N}qd?>Y``CQY,qqLQK+KHct.g%REb]k=xaE _UQ]d#rCw%-(P/Q:}' );
define( 'LOGGED_IN_KEY',    'BuF!&V1)+q-_q5NI_lJVBj3sMJ!_y3*N)ID `0(,l2HsfJR<]rPgF!c%<{&9RlG#' );
define( 'NONCE_KEY',        'E4 w-.a(u!gq*0:4G2^q1j~iD(MK(~*YbnA/qEmcX3H.&(hSYm]c<^$w!T-iz|QG' );
define( 'AUTH_SALT',        'Q0y4eTDgFiyIlH,xP|(d0a&yok<Nq4(J,//@ZAY{@@z3M&{/:8R}1@I6ZLLaB1vU' );
define( 'SECURE_AUTH_SALT', ',}[Iv*fy~D9S&9#QE[`{/0.b/>{NHH~L~mxW<8|jB#+cb$]#}fXe9fz(da6cY!oQ' );
define( 'LOGGED_IN_SALT',   '.cWD(iR6`7qXTw:f{[p:6cB$:ZF3WdY>Vi^ncq6A&>b7j2xGhyWgep*]6?Y:8I!Y' );
define( 'NONCE_SALT',       'lFf;N]5.WLB3dj#oSrt0W(TVCJDTe7c&%al>r}v#KCyt$#_9Ge(Jr*](zpjACm(-' );

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
