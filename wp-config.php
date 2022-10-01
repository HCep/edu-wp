<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gighyhnzac_edu' );

/** Database username */
define( 'DB_USER', 'gighyhnzac_edu' );

/** Database password */
define( 'DB_PASSWORD', '5zdGsF^5oqsT--J-' );

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
define( 'AUTH_KEY',         'lI>ZTtn?QPTg.,f6uOz~D+;V%y&z:Sa5y6/G!2!7Dx4~7CRZ^}/jPMHWJ`f]>|be' );
define( 'SECURE_AUTH_KEY',  '_FpiR};]~~q6[-85=3dx1E^hA0glj+7~E3GSGi6mtY^W|8%a^d&=$X^7 w[P:0<5' );
define( 'LOGGED_IN_KEY',    'mF._2s?(LpgiWzx`#Jr:X`]%DWQ`/3#L*On opi3%4Y;Fak<a)^Fr7{bCx!<&H*o' );
define( 'NONCE_KEY',        '1PbV |<}#iy]Ny+,4kB*08`ON-L+I.zmH/(0)a-SXgWbrWXl]yHFw,aQ$,bb2wOI' );
define( 'AUTH_SALT',        '|=seG&!r 8vE,Bsa$%VEn$Gc0_4cQqUhbdgWTOBRXsx^#!GZulQ%jQ%lHOV#by6B' );
define( 'SECURE_AUTH_SALT', '#-Em).A/U[ |%1-.RM~wq>-$z~dHI8A;J1?:Am/~0=2oAmEKV^MT_I/]TxJ_8fz/' );
define( 'LOGGED_IN_SALT',   'yo0y?v+LN.Z@}r?6.oW57unzU!z#a^{m~U8GdTn@3b`~?eZk>_ 1Q+,:)EpCAZ[C' );
define( 'NONCE_SALT',       'e2D7L]P:q?gWjxhX4okEY;8r|^XOa1LWeool`N[^q t>:Y g5^OOm?lJN{#v8!(K' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'edu_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
define('WP_MEMORY_LIMIT', '628M');
define( 'WP_MAX_MEMORY_LIMIT', '628M' );

@ini_set( 'upload_max_filesize' , '628M' );
@ini_set( 'post_max_size', '628M');
@ini_set( 'memory_limit', '656M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
