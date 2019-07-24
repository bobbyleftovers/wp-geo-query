<?php
namespace GeoQuery;

use GeoQuery\Classes\Geo_Query;

/*
 *
 * @since             0.1.0
 * @package           GeoQuery
 *
 * @wordpress-plugin
 * Plugin Name: WP Geo Query
 * Plugin URI: 
 * Description: A plugin that adds query vars for location and radius and allows location and radius-based search results
 * Version: 0.1
 * Author: BarrelNY
 * Author URI: https://ienjoybobby.com
 * Text Domain: 
 * Domain Path: 
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('OUR_NAMESPACE', 'GeoQuery'); // for the autoloader

// Include the autoloader so we can dynamically include classes.
require_once( 'autoload.php' );

// Prefix the callback with the namespace or it won't be found
add_action( 'plugins_loaded', 'GeoQuery\barrel_directory_init' );

// Starts the plugin by initializing classes, setting up hooks and more
function geo_query_init() {
  
  // add geo query vars/sql
  Geo_Query::get_instance();
}
