<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'asca' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Gb1/tICuqw_k%_FP>Fow}DU?i<b&a9ZsJp`~U^CQgy#:|~+3,Nx]|*]xTLUNI`[1' );
define( 'SECURE_AUTH_KEY',  '1lMTWV...%5C0pzM[B:XXEvr]{=xT)sqwbsZI:q{+0&_vb7`:GM(A^Y];He.y6KM' );
define( 'LOGGED_IN_KEY',    'l{h@3wtl68%4G(Q)i9XUku?P*,:8$7oyg5q(,9;}64s*(|XVXo41>{4(f8o.G#tt' );
define( 'NONCE_KEY',        'C)P~kh(s2S7K`okB#>B@gte?ogYxkP,Y$>StHl{DIBO>5k?`ViWS,GSRzR]:VHx}' );
define( 'AUTH_SALT',        'Pg#LQ+gP yuroNe1_IAocDz^P[jjo]MBs.[~*0U*y61>o[]}qY,mRg%3/~}!_cd=' );
define( 'SECURE_AUTH_SALT', 'H<V87rdQK#[8w}C+YyQSJPOs_.f-2SIua?k<xy 3{#2=R3zTuNS03lCAai?_-=h-' );
define( 'LOGGED_IN_SALT',   '18|3Zf4?wqmE$Z)A|KWUcJ@Y0IN@ iERBU+zQtQ)deL{S^k *}n+IYn^PjAhngeT' );
define( 'NONCE_SALT',       '$^Fr?ldqb=KF<fk{I6wU/[n/P3=RJhC`Vp+UL)lh?lW[V]Dh7KE(-kP5Ioa7B~Oy' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
