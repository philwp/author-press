<?php
/**
 * Plugin Name: Author Press
 * Description: An a11y first plugin for listing books
 * Version:     1.0.0
 * Author:      Phil Webster 
 * Author URI:  https://github.com/philwp
 *
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin directory
define( 'AUTHOR_PRESS_DIR' , plugin_dir_path( __FILE__ ) );
define( 'AUTHOR_PRESS_URL' , plugin_dir_url(__FILE__ ) );

/**
 * Hooks to setup plugin
 */
add_action( 'plugins_loaded', 'author_press_bootstrap', 25 );
/**
 * Load plugin or throw notice
 *
 * @uses plugins_loaded
 */
function author_press_bootstrap(){
	$php_check = version_compare( PHP_VERSION, '5.6.0', '>=' );
	$acf_check = class_exists('ACF');
	if ( ! $php_check ) {
		function author_press_php_notice() {
			global $pagenow;
			if( 'plugins.php' !== $pagenow ) {
				return;
			}
			?>
			<div class="notice notice-error">
				<p><?php _e( 'Author Press requires PHP 5.6 or later. Please update your PHP.', 'author-press' ); ?></p>
			</div>
			<?php
		}
		add_action( 'admin_notices', 'author_press_php_notice' );
	}elseif( !$acf_check){
		function author_press_acf_notice() {
			global $pagenow;
			if( 'plugins.php' !== $pagenow ) {
				return;
			}
			?>
			<div class="notice notice-error">
				<p><?php _e( 'Author Press requires Advanced Custom Fields PRO. Please activate the plugin.', 'author-press' ); ?></p>
			</div>
			<?php
		}
		add_action( 'admin_notices', 'author_press_acf_notice' );
	}else{
		//bootstrap plugin
		require_once( dirname( __FILE__ ) . '/bootstrap.php' );
	}

}

register_activation_hook( __FILE__, 'author_press_plugin_activation' );

function author_press_plugin_activation() {
    update_option('author_press_permalinks_flushed', 0);
}
