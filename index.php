<?php
/*
Plugin Name: Custom Paste Patterns
Description: Custom Paste Patterns for tinymce
Author: Ionuț Staicu
Version: 1.0.0
Author URI: http://ionutstaicu.com
*/

if ( !defined( 'ABSPATH' ) ) exit;

define( 'CUSTOM_PASTE_VERSION', '1.0.0' );

define( 'CUSTOM_PASTE_BASEFILE', __FILE__ );
define( 'CUSTOM_PASTE_URL', plugin_dir_url( __FILE__ ) );
define( 'CUSTOM_PASTE_PATH', plugin_dir_path( __FILE__ ) );

function ntz_mce_custom_paste()
{
	wp_localize_script('editor', 'ntz_mce_custom_paste', [
		'custom_patterns' => apply_filters( 'ntz/tinymce/custom_paste_patterns', ['^(\/\?go=\d)'] )
	]);
}

add_action('admin_enqueue_scripts', 'ntz_mce_custom_paste');

add_filter('mce_external_plugins', function ($plugins) {
	$plugins['custom_paste_event'] = plugins_url( 'custom-paste-patterns.js', CUSTOM_PASTE_BASEFILE );
	return $plugins;
});