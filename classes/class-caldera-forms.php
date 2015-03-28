<?php
/**
 * Caldera Forms.
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
class Caldera_Forms {

	/**
	 * The slug for this plugin
	 *
	 * @since 2.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'caldera-forms';

	/**
	 * Holds class isntance
	 *
	 * @since 2.0.0
	 *
	 * @var      object|Caldera_Forms
	 */
	protected static $instance = null;

	/**
	 * Holds the option screen prefix
	 *
	 * @since 2.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since 2.0.0
	 *
	 * @access private
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_stylescripts' ) );
		
		// queue up the shortcode inserter
		add_action( 'media_buttons', array($this, 'shortcode_insert_button' ), 11 );

		// shortcode insterter js
		add_action( 'admin_footer', array( $this, 'add_shortcode_inserter'));

		//shortcode
		add_shortcode( 'caldera_forms', array( $this, 'render_caldera_forms') );
	}


	/**
	 * Return an instance of this class.
	 *
	 * @since 2.0.0
	 *
	 * @return    object|Caldera_Forms    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since 2.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain( $this->plugin_slug, FALSE, basename( CF_PATH ) . '/languages');

	}
	
	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since 2.0.0
	 *
	 * @return    null
	 */
	public function enqueue_admin_stylescripts() {

		$screen = get_current_screen();

		if( !is_object( $screen ) ){
			return;
		}

		if( $screen->base == 'post' ){
			wp_enqueue_style( 'caldera-forms-baldrick-modals', CF_URL . '/assets/css/modals.css' );
			wp_enqueue_script( 'caldera-forms-shortcode-insert', CF_URL . '/assets/js/shortcode-insert.js', array( 'jquery' ) , false, true );
		}
		
		if( false !== strpos( $screen->base, 'caldera_forms' ) ){

			wp_enqueue_style( 'caldera_forms-core-style', CF_URL . '/assets/css/styles.css' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'caldera_forms-baldrick-modals', CF_URL . '/assets/css/modals.css' );
			wp_enqueue_script( 'caldera_forms-wp-baldrick', CF_URL . '/assets/js/wp-baldrick-full.js', array( 'jquery' ) , false, true );
			wp_enqueue_script( 'jquery-ui-autocomplete' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-ui-droppable' );
			wp_enqueue_script( 'wp-color-picker' );

						
			if( !empty( $_GET['edit'] ) ){
				wp_enqueue_style( 'caldera_forms-codemirror-style', CF_URL . '/assets/css/codemirror.css' );
				wp_enqueue_script( 'caldera_forms-codemirror-script', CF_URL . '/assets/js/codemirror.js', array( 'jquery' ) , false );
			}

			wp_enqueue_script( 'caldera_forms-core-script', CF_URL . '/assets/js/scripts.js', array( 'caldera_forms-wp-baldrick' ) , false );

			wp_enqueue_style( 'caldera-forms-core-grid', CF_URL . '/assets/css/grid.css' );
			wp_enqueue_script( 'caldera_forms-core-grid-script', CF_URL . '/assets/js/grid.js', array( 'jquery' ) , false );

		
		}


	}



	/**
	 * Insert shortcode media button
	 *
	 * @since 2.0.0
	 *
	 * @uses 'media_buttons' action
	 */
	public function shortcode_insert_button(){
		global $post;
		if(!empty($post)){
			echo "<a id=\"caldera_forms-insert\" title=\"".__('Caldera Forms','caldera-forms')."\" class=\"button caldera_forms-insert-button\" href=\"#inst\" style=\"padding-left: 10px; box-shadow: 4px 0px 0px #a3be5f inset;\">\n";
			echo __('Caldera Forms', 'caldera-forms')."\n";
			echo "</a>\n";
		}

	}

	/**
	 * Insert shortcode modal template to post editor.
	 *
	 * @since 2.0.0
	 *
	 * @uses 'admin_footer' action
	 */
	public static function add_shortcode_inserter(){
		
		$screen = get_current_screen();

		if( $screen->base === 'post'){
			include CF_PATH . 'includes/insert-shortcode.php';
		}

	}

	/**
	 * Render Shortcode
	 *
	 * @since 0.0.1
	 */
	public function render_caldera_forms( $atts ){
		
		$_caldera_forms = Caldera_Forms_Options::get_registry();
		if( empty( $_caldera_forms ) ){
			$_caldera_forms = array();
		}

		if( empty( $atts['id'] ) && !empty( $atts['slug'] ) ){
			foreach( $_caldera_forms as $caldera_forms_id => $caldera_forms ){

				if( $caldera_forms['slug'] === $atts['slug'] ){
					$caldera_forms = Caldera_Forms_Options::get_single( $caldera_forms['id'] );
					break;
				}

			}
		}elseif( !empty( $atts['id'] ) ){
			$caldera_forms = Caldera_Forms_Options::get_single( $atts['id'] );
		}else{
			return;
		}

		if( empty( $caldera_forms ) ){
			return;
		}

		$output = null;

		// do stuf and output

		return $output;

	}

}















