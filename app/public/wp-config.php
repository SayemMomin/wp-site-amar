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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G2yNV4HPx3MMDvEhT1Tc6MGrDY77G1rPdWjmxlOAWQs7ycnuLqlqzzFBbiUgisoOHylHlrjjeHXU0rjkx3D+Kg==');
define('SECURE_AUTH_KEY',  'VqGY3uJ3IHdiPgJ73xRZDBuH4gHU14LjC0rzVnL/1xAk+ueC6Q/CAKeWRCTw1dZvAHlHQeqZltIaa0YJekVG2w==');
define('LOGGED_IN_KEY',    'WUqzRd9xR2IgPlguOTtFzW15bhl2RZXHQk/+hHfvISrC8ZkGSogzEieuhZ8er7Lr7Hx+WFuHbPIe+WcPZ3l/rA==');
define('NONCE_KEY',        'lwAf0GqTn4pReZ2mYf6v6Xj3n+vaVkbfnNsci8J7lAB00Bt1cDmZza8sZGMQTH6J3tJS3BN0lFpqUIdygFDIjQ==');
define('AUTH_SALT',        'U8GVbKcRxQW+nPOCGCrVKJpOczRsY34dfKCLzEx9utcrBUTGzk8G/4ssmEuNFidT7Z2zkUkD5tvS7x+AHLZxJg==');
define('SECURE_AUTH_SALT', 'CNm1jdXk7zlFUccF+1DjUIQZcLSspnlG3e6gosTIl4pGxiSgFnefkG5u4YJT1ra7Izm6Bu+XXDEMjgQQpk31ng==');
define('LOGGED_IN_SALT',   'ic5l58F6L9990cKr9nO3LSZEWAuisyTFJTvMof4G4IozCikM7RuvtJ58rKqnnJRSjICCRJ3re5mmwd74wPCq2w==');
define('NONCE_SALT',       'CI6EFJtiWtJR4InBg3NOK6d52Avf12/lX99mhBAqVg8v6GqUCcgWfK/0VhK2VKm6drddOt8kwrzkAUVRx1j/qQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
