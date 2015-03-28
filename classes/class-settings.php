<?php
/**
 * Caldera Forms Setting.
 *
 * @package   Caldera_Forms
 * @author    David <david@digilab.co.za>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 David <david@digilab.co.za>
 */

/**
 * Plugin class.
 * @package Caldera_Forms
 * @author  David <david@digilab.co.za>
 */
class Caldera_Forms_Settings extends Caldera_Forms{


	/**
	 * Constructor for class
	 *
	 * @since 2.0.0
	 */
	public function __construct(){

		// add admin page
		add_action( 'admin_menu', array( $this, 'add_settings_pages' ), 25 );
		// save config
		add_action( 'wp_ajax_cf_save_config', array( $this, 'save_config') );
		// creat new
		add_action( 'wp_ajax_cf_create_caldera_forms', array( $this, 'create_new_caldera_forms') );
		// delete
		add_action( 'wp_ajax_cf_delete_caldera_forms', array( $this, 'delete_caldera_forms') );


	}

	/**
	 * Saves a config
	 *
	 * @uses "wp_ajax_cf_save_config" hook
	 *
	 * @since 0.0.1
	 */
	public function save_config(){

		if( empty( $_POST[ 'caldera-forms-setup' ] ) || ! wp_verify_nonce( $_POST[ 'caldera-forms-setup' ], 'caldera-forms' ) ){
			if( empty( $_POST['config'] ) ){
				return;
			}
		}

		if( !empty( $_POST[ 'caldera-forms-setup' ] ) && empty( $_POST[ 'config' ] ) ){
			$config = stripslashes_deep( $_POST['config'] );

			Caldera_Forms_Options::update( $config );


			wp_redirect( '?page=caldera_forms&updated=true' );
			exit;
		}

		if( !empty( $_POST['config'] ) ){

			$config = json_decode( stripslashes_deep( $_POST['config'] ), true );

			if(	wp_verify_nonce( $config['caldera-forms-setup'], 'caldera-forms' ) ){
				Caldera_Forms_Options::update( $config );
				wp_send_json_success( $config );
			}

		}

		// nope
		wp_send_json_error( $config );

	}

	/**
	 * Array of "internal" fields not to mess with
	 *
	 * @since 0.0.1
	 *
	 * @return array
	 */
	public function internal_config_fields() {
		return array( '_wp_http_referer', 'id', '_current_tab' );
	}


	/**
	 * Deletes an item
	 *
	 *
	 * @uses 'wp_ajax_cf_create_caldera_forms' action
	 *
	 * @since 0.0.1
	 */
	public function delete_caldera_forms(){

		$deleted = Caldera_Forms_Options::delete( strip_tags( $_POST['block'] ) );

		if ( $deleted ) {
			wp_send_json_success( $_POST );
		}else{
			wp_send_json_error( $_POST );
		}



	}

	/**
	 * Create a new item
	 *
	 * @uses "wp_ajax_cf_create_caldera_forms"  action
	 *
	 * @since 0.0.1
	 */
	public function create_new_caldera_forms(){
		$new = Caldera_Forms_Options::create( $_POST[ 'name' ], $_POST[ 'slug' ] );

		if ( is_array( $new ) ) {
			wp_send_json_success( $new );
		}else {
			wp_send_json_error( $_POST );
		}

	}


	/**
	 * Add options page
	 *
	 * @since 2.0.0
	 *
	 * @uses "admin_menu" hook
	 */
	public function add_settings_pages(){
		// This page will be under "Settings"
		
	
			$this->plugin_screen_hook_suffix['caldera_forms'] =  add_menu_page( __( 'Caldera Forms', $this->plugin_slug ), __( 'Caldera Forms', $this->plugin_slug ), 'manage_options', 'caldera_forms', array( $this, 'create_admin_page' ), 'dashicons-admin-generic' );
			add_action( 'admin_print_styles-' . $this->plugin_screen_hook_suffix['caldera_forms'], array( $this, 'enqueue_admin_stylescripts' ) );

	}

	/**
	 * Options page callback
	 *
	 * @since 2.0.0
	 */
	public function create_admin_page(){
		// Set class property        
		$screen = get_current_screen();
		$base = array_search($screen->id, $this->plugin_screen_hook_suffix);
			
		// include main template
		if( empty( $_GET['edit'] ) ){
			include CF_PATH .'includes/admin.php';
		}else{
			include CF_PATH .'includes/edit.php';
		}


		// php based script include
		if( file_exists( CF_PATH .'assets/js/inline-scripts.php' ) ){
			echo "<script type=\"text/javascript\">\r\n";
				include CF_PATH .'assets/js/inline-scripts.php';
			echo "</script>\r\n";
		}

	}


}

if( is_admin() ) {
	global $settings__caldera_forms;
	$settings__caldera_forms = new Caldera_Forms_Settings();
}
