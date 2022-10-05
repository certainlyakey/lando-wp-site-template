<?php
// phpcs:ignoreFile
if ( $lando_json = $_ENV['LANDO_INFO'] ) {
    // If installed on local
    $lando_info = json_decode( $lando_json );
    $lando_url = 'http://' . $_ENV['LANDO_APP_NAME'] . '.' . $_ENV['LANDO_DOMAIN'];
    define( 'DB_NAME', $lando_info->database->creds->database );
    define( 'DB_USER', $lando_info->database->creds->user );
    define( 'DB_PASSWORD', $lando_info->database->creds->password );
    define( 'DB_HOST', $lando_info->database->hostnames[0] );
    define( 'WP_HOME', $lando_url );
    define( 'WP_SITEURL', $lando_url . '/wp' );
    define( 'SAVEQUERIES', true );
    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true );
    define( 'SCRIPT_DEBUG', true );
    define( 'COOKIEPATH', '/' );

    // Define the moved wp-content folder
    define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
    define( 'WP_CONTENT_URL', $lando_url . '/wp-content' );

    // Autoload composer dependencies
    require_once( __DIR__ . '/wp-content/vendor/autoload.php' );

    // Load environment variables from .env file
    ( Dotenv\Dotenv::createImmutable( __DIR__ ) )->load();

    $table_prefix = 'wp_';

    if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
    }

    require_once ABSPATH . 'wp-settings.php';

} else {
    // If installed on server
    require_once( ( $_ENV['WPCONFIG_PATH'] ? $_ENV['WPCONFIG_PATH'] : dirname( __FILE__ ) ) . '/../wp-config.php' );
    // Note that "Happy publishing!" part has to be in this wp-config.php, not the required one, to avoid problems with WP CLI not working

    /* That's all, stop editing! Happy publishing. */

    /** Absolute path to the WordPress directory. */
    if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
    }

    /** Sets up WordPress vars and included files. */
    require_once ABSPATH . 'wp-settings.php';
}
