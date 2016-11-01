<?php
/*
Plugin Name: Orbis Lists
Plugin URI: https://www.pronamic.eu/plugins/orbis-lists/
Description: The Orbis Lists plugin extends your Orbis environment with the option to create lists for contacts.

Version: 1.0.0
Requires at least: 3.5

Author: Pronamic
Author URI: https://www.pronamic.eu/

Text Domain: orbis_lists
Domain Path: /languages/

License: Copyright (c) Pronamic

GitHub URI: https://github.com/wp-orbis/wp-orbis-lists
*/

function orbis_lists_bootstrap() {
	// Classes
	require_once 'classes/orbis-lists-plugin.php';

	// Initialize
	global $orbis_lists_plugin;

	$orbis_lists_plugin = new Orbis_Lists_Plugin( __FILE__ );
}

add_action( 'orbis_bootstrap', 'orbis_lists_bootstrap' );
