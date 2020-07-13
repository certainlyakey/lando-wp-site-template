<?php
/**
 * When locally with lando
 */
if ( $lando_json = getenv( 'LANDO_INFO' ) ) {
	$lando_info = json_decode( $lando_json );
	$lando_url = 'http://' . getenv('LANDO_APP_NAME') . '.' . getenv('LANDO_DOMAIN');
	define( 'DB_NAME', $lando_info->database->creds->database );
	define( 'DB_USER', $lando_info->database->creds->user );
	define( 'DB_PASSWORD', $lando_info->database->creds->password );
	define( 'DB_HOST', $lando_info->database->hostnames[0] );
	define( 'WP_HOME', $lando_url );
	define( 'WP_SITEURL', $lando_url . '/wp' );
	define( 'SAVEQUERIES', true );
	define( 'WP_DEBUG', true );
	define( 'SCRIPT_DEBUG', true );
} else {
	define( 'DB_NAME', 'database_name' );
	define( 'DB_USER', 'database_username' );
	define( 'DB_PASSWORD', 'database_password' );
	define( 'DB_HOST', 'database_host' );
	define( 'DB_CHARSET', 'utf8' );
	define( 'DB_COLLATE', '' );
	define( 'AUTH_KEY', 'put your unique phrase here' );
	define( 'SECURE_AUTH_KEY', 'put your unique phrase here' );
	define( 'LOGGED_IN_KEY', 'put your unique phrase here' );
	define( 'NONCE_KEY', 'put your unique phrase here' );
	define( 'AUTH_SALT', 'put your unique phrase here' );
	define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
	define( 'LOGGED_IN_SALT', 'put your unique phrase here' );
	define( 'NONCE_SALT', 'put your unique phrase here' );
	ini_set( 'display_errors', 0 );
	define( 'WP_DEBUG_DISPLAY', false );
	define( 'SCRIPT_DEBUG', false );
}

// Define the moved wp-content folder
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content' );
define( 'WP_CONTENT_URL', '/wp-content' );

// Autoload composer dependencies
// Timber must still be autoloaded in a theme itself
require_once(__DIR__ . '/wp-content/vendor/autoload.php');

/** Standard wp-config.php stuff from here on down. */

$table_prefix = 'wp_';

define( 'WPLANG', '' );
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy Pressing. */

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}
require_once ABSPATH . 'wp-settings.php';
