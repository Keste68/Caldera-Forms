<?php
/**
 * @package   Caldera_Forms
 * @author    David <david@digilab.co.za>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 David <david@digilab.co.za>
 *
 * @wordpress-plugin
 * Plugin Name: Caldera Forms
 * Plugin URI:  http://CalderaWP.com
 * Description: Simple to use Form Builder for WordPress
 * Version:     2.0.0
 * Author:      David <david@digilab.co.za>
 * Author URI:  http://digilab.co.za/
 * Text Domain: caldera-forms
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('CF_PATH',  plugin_dir_path( __FILE__ ) );
define('CF_URL',  plugin_dir_url( __FILE__ ) );
define('CF_VER',  '2.0.0' );

//autoload dependencies
if ( file_exists( CF_PATH . 'vendor/autoload.php' ) )
require_once( CF_PATH . 'vendor/autoload.php' );

// load internals
require_once( CF_PATH . 'classes/class-caldera-forms.php' );
require_once( CF_PATH . 'classes/class-options.php' );
require_once( CF_PATH . 'classes/class-settings.php' );

// Load instance
add_action( 'plugins_loaded', array( 'Caldera_Forms', 'get_instance' ) );
