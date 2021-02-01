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
define('DB_NAME', 'webmobi5_saileelaorg');

/** MySQL database username */
define('DB_USER', 'webmobi5_saiorg');


/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', 'a349389a8a21274c4f21ce8dc8af8913452489657ee4f00bcbed5f24c634f1a6');
define('SECURE_AUTH_KEY', '7847d3fc565d2c906bb65e700c3a7887b08901ad610d5dcdada81c9fde3abad7');
define('LOGGED_IN_KEY', '3a5864b6c5f0a900993fb5fd30adeab18e25d88175f8471ad44f1c6fc4573be3');
define('NONCE_KEY', '3c10207ab5a2df7c852ce0102353f68795222f66023f4bf0221c2489a8711d79');
define('AUTH_SALT', '55d6535f523f6c7f794f8be68f3a39910200c8e15b3ded2ccdcb8dcc7973c223');
define('SECURE_AUTH_SALT', '2f0750c2ad7d36019c4e2a88f64f98cac4a0a15537622b1abdf437bc746b27c0');
define('LOGGED_IN_SALT', '096e35d7f7598af778648a370c85f4becec3a292eb21b37ebd2c96ce17b73fc3');
define('NONCE_SALT', '1d0ae4a6e55a051eb6f36c929732e63034a812c0d81bb78af2eb345ea4e6efed');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sl_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);
define('DISALLOW_FILE_EDIT', true);
define('FORCE_SSL_LOGIN', true);
define('FORCE_SSL_ADMIN', true);
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
