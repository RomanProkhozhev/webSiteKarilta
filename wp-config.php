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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'websitekarilta' );

/** MySQL database username */
define( 'DB_USER', 'roman' );

/** MySQL database password */
define( 'DB_PASSWORD', 'roman' );

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
define( 'AUTH_KEY',         'lM(ds+|b,+-)0mXZwIm8IuI9vM(<<xGLjj/AMM.@-F}g|>x05UPF`8Zu/<$KN]y3' );
define( 'SECURE_AUTH_KEY',  '7tvW.I<=3xN-xWFpCY`cPn,MF*Hn}[FK?QRi@V_L`>|x{ZXv-_ucMB@_fq]Z:~5X' );
define( 'LOGGED_IN_KEY',    'XKocvBaOJu[OrDZ%[9*!iEac)l[kR4yBdajx5);a8LtV),r4Iphfs?c[PB]aI5[x' );
define( 'NONCE_KEY',        'S$sCp.]39}d7||k!RM=bF(t!o6?$o*Ujvr.am!4?a8$Fawa<DO8uF+fqkj${ds/d' );
define( 'AUTH_SALT',        '_8h/pCSu<C-SeY>nS @m.]NMmVn:d J*hW]]{]tO`.9*.9=X>2gXE?K5y918.~zv' );
define( 'SECURE_AUTH_SALT', '/[;B8}g&_]vjvwr&%4uLSk5akKpZ>H85{[?.$$q<@&?>:iW=-b7}OZks1EM%7syh' );
define( 'LOGGED_IN_SALT',   'C?zy7_*n?D9T:R[MXK[$G=W*x0,O/W(3WF!M2[X[))$M|hJe-u5#u;5I@*W`U>>,' );
define( 'NONCE_SALT',       'EsZOq1az/Jh~&[iYVLK9SS]A($O)* `)mJvJtv8QCE@q 8j22eKkVI5-245$}${Y' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
