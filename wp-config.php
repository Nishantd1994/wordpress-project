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
define( 'DB_NAME', 'db_furniture' );

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
define( 'AUTH_KEY',         'LxSeFpdK>;km(& /zOm?l@jqGz_eB#PZ)=ks?2vCB&]&]_v}1>.#-<!AmHz HUb*' );
define( 'SECURE_AUTH_KEY',  ')J){(DpvU;/F,-YvAM]W1vqR+tZ^V,V{dKL?#Eane<M8hq{XL?LXXH@_<&QB<<=M' );
define( 'LOGGED_IN_KEY',    's7mQ2C,#Z61Y7M!=@a0*:<t<F_MG}~k[T0CT#@N&P43xVXslg=|!B8E7IH 1]zgr' );
define( 'NONCE_KEY',        'dr@G=GC+/`k{HiOai|1F6w<Y98mj,7liTYO-V_e:M]t[xdnFM/VD,J3lcFX<h$u&' );
define( 'AUTH_SALT',        'kr1dRqV z_&=;-aqf,zwTE^Pw`qWV03<Z^xO.Jh>`<7@<2e@]_iBQPR=FM-JX9nn' );
define( 'SECURE_AUTH_SALT', '(t`b#8s%vc0|KBL3Anj1;4=(SH>dh# Q{5p*.WT=ps~I&~EDJc~o$*o`Y4l`MX^h' );
define( 'LOGGED_IN_SALT',   'S)WQwe,7u?,7F<iB#GNz=l!&<vk+*:|!:QW3!ay!!(s0:(8ia3`>#lZ4KRMbx#I6' );
define( 'NONCE_SALT',       ':liKG;_ -fzNHAk`-K?{=?GQ(L[_}/OmdZL729k<F:8l$orr><W*&r={s?0cU>R@' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
