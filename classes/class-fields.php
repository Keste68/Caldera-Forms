<?php
/**
 * Caldera Forms Fields.
 *
 * @package   Caldera_Forms
 * @author    David <david@digilab.co.za>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 David <david@digilab.co.za>
 */

/**
 * Caldera_Forms_Fields class.
 *
 * @package Caldera_Forms
 * @author  David <david@digilab.co.za>
 */
class Caldera_Forms_Fields {

	/**
	 * Get core form fields
	 *
	 * @since 2.0.0
	 *
	 *
	 * @return array|void array of registered fields
	 */
	public static function get_fields( ) {

		$internal_fields = array(
			'calculation' => array(
				"field"		=>	__("Calculation", "caldera-forms"),
				"file"		=>	CF_PATH . "includes/fields/calculation/field.php",
				"handler"	=>	array( 'Caldera_Forms_Fields', "run_calculation"),
				"category"	=>	__("Special", "caldera-forms").', '.__("Math", "caldera-forms"),
				"description" => __('Calculate values', "caldera-forms"),				
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/calculation/config.php",
					"preview"	=>	CF_PATH . "includes/fields/calculation/preview.php",
					"default"	=> array(
						'element'	=>	'h3',
						'classes'	=> 	'total-line',
						'before'	=>	__('Total', 'caldera-forms').':',
						'after'		=> ''
					),
					"styles" => array(
						CF_URL . "includes/fields/calculation/style.css",
					)
				),
				"scripts" => array(
					//'jquery'
				)
			),
			'range_slider' 	=> array(
				"field"		=>	__("Range Slider", 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/range_slider/field.php",
				"category"	=>	__("Special", "caldera-forms"),
				"description" => __('Range Slider input field','caldera-forms'),
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/range_slider/config.php",
					"preview"	=>	CF_PATH . "includes/fields/range_slider/preview.php",
					"default"	=> array(
						'default'	=>	1,
						'step'		=>	1,
						'min'		=>	0,
						'max'		=> 100,
						'showval'	=> 1,
						'suffix'	=> '',
						'prefix'	=> '',
						'color'		=> '#00ff00',
						'handle'	=> '#ffffff',
						'handleborder'	=> '#cccccc',
						'trackcolor' => '#e6e6e6'
					),
					"scripts" => array(
						//'jquery',
						CF_URL . "includes/fields/range_slider/rangeslider.js",
					),
					"styles" => array(
						CF_URL . "includes/fields/range_slider/rangeslider.css",
					)
				),
				"scripts" => array(
					//'jquery',
					CF_URL . "includes/fields/range_slider/rangeslider.js",
				),
				"styles" => array(
					CF_URL . "includes/fields/range_slider/rangeslider.css",
				)
			),
			'star_rating' 	=> array(
				"field"		=>	__("Star Rating", 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/star-rate/field.php",
				"category"	=>	__("Feedback", "caldera-forms").', '.__("Special", "caldera-forms"),
				"description" => __('Star rating input for feedback','caldera-forms'),
				"viewer"	=>	array( 'Caldera_Forms_Fields', 'star_rating_viewer'),
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/star-rate/config.php",
					"preview"	=>	CF_PATH . "includes/fields/star-rate/preview.php",
					"default"	=> array(
						'number'	=>	5,
						'space'		=>	3,
						'size'		=>	13,
						'color'		=> '#FFAA00',
						'track_color'=> '#AFAFAF',
						'type'=> 'star',
					),
					"scripts" => array(
						//'jquery',
						CF_URL . "includes/fields/star-rate/jquery.raty.js",
					),
					"styles" => array(
						CF_URL . "includes/fields/star-rate/jquery.raty.css",
						CF_URL . "includes/fields/star-rate/cf-raty.css",
					)
				),
				"scripts" => array(
					'jquery',
					CF_URL . "includes/fields/star-rate/jquery.raty.js",
				),
				"styles" => array(
					CF_URL . "includes/fields/star-rate/jquery.raty.css",
					CF_URL . "includes/fields/star-rate/cf-raty.css",
				)
			),
			'phone' => array(
				"field"		=>	__('Phone Number', 'caldera-forms'),
				"description" => __('Phone number with masking', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/phone/field.php",
				"category"	=>	__("Text Fields", "caldera-forms").', '.__("Basic", "caldera-forms").', '.__("User", "caldera-forms"),
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/phone/config.php",
					"preview"	=>	CF_PATH . "includes/fields/phone/preview.php",
					"default"	=>	array(
						'default'	=> '',
						'type'	=>	'local',
						'custom'=> '(999)999-9999'
					),
					"scripts"	=> array(
						CF_URL . "includes/fields/phone/masked-input.js"
					)
				),
				"scripts"	=> array(
					//"jquery",
					CF_URL . "includes/fields/phone/masked-input.js"
				)
			),
			'text' => array(
				"field"		=>	__("Single Line Text", "caldera-forms"),
				"description" => __('Single Line Text', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/text/field.php",
				"category"	=>	__("Text Fields", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/text/config.php",
					"preview"	=>	CF_PATH . "includes/fields/text/preview.php"
				),
				"scripts"	=> array(
					//"jquery",
					CF_URL . "includes/fields/phone/masked-input.js"
				)
			),
			'file' => array(
				"field"		=>	__("File", "caldera-forms"),
				"description" => __('File Uploader', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/file/field.php",
				"viewer"	=>	array( 'Caldera_Forms_Fields', 'handle_file_view'),
				"category"	=>	__("Basic", "caldera-forms").', '.__("File", "caldera-forms"),
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/file/preview.php",
					"template"	=>	CF_PATH . "includes/fields/file/config_template.php"
				)
			),
			'recaptcha' => array(
				"field"		=>	__("reCAPTCHA", "caldera-forms"),
				"description" => __('reCAPTCHA anti-spam field', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/recaptcha/field.php",
				"category"	=>	__("Special", "caldera-forms"),
				"handler"	=>	array( 'Caldera_Forms_Fields', 'captcha_check'),
				"capture"	=>	false,
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/recaptcha/config.php",
					"preview"	=>	CF_PATH . "includes/fields/recaptcha/preview.php",
					"not_supported"	=>	array(
						'hide_label',
						'caption',
						'required'
					),
					"scripts"	=> array(
						"https://www.google.com/recaptcha/api.js"
					)
				),
				"scripts"	=> array(
					"https://www.google.com/recaptcha/api.js"
				),
				"styles"	=> array(
					CF_URL . "includes/fields/recaptcha/style.css"
				),
			),
			'html' => array(
				"field"		=>	__("HTML", "caldera-forms"),
				"description" => __('Add text/html content', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/html/field.php",
				"category"	=>	__("Content", "caldera-forms"),
				"icon"		=>	CF_URL . "fields/html/icon.png",
				"capture"	=>	false,
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/html/preview.php",
					"template"	=>	CF_PATH . "includes/fields/html/config_template.php",
					"not_supported"	=>	array(
						'hide_label',
						'caption',
						'required',
						'entry_list'
					)
				)
			),
			'hidden' => array(
				"field"		=>	__("Hidden", "caldera-forms"),
				"description" => __('Hidden', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/hidden/field.php",
				"category"	=>	__("Text Fields", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"static"	=> true,
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/hidden/preview.php",
					"template"	=>	CF_PATH . "includes/fields/hidden/setup.php",
					"not_supported"	=>	array(
						'hide_label',
						'caption',
						'required',
					)
				)
			),
			'button' => array(
				"field"		=>	__("Button", "caldera-forms"),
				"description" => __('Button, Submit and Reset types', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/button/field.php",
				"category"	=>	__("Buttons", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"capture"	=>	false,
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/button/config_template.php",
					"preview"	=>	CF_PATH . "includes/fields/button/preview.php",
					"default"	=> array(
						'class'	=>	'btn btn-default',
						'type'	=>	'submit'
					),
					"not_supported"	=>	array(
						'hide_label',
						'caption',
						'required',
						'entry_list'
					)
				)
			),
			'email' => array(
				"field"		=>	__("Email Address", "caldera-forms"),
				"description" => __('Email Address', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/email/field.php",
				"category"	=>	__("Text Fields", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/email/preview.php",
					"template"	=>	CF_PATH . "includes/fields/email/config.php"
				)
			),
			'paragraph' => array(
				"field"		=>	__("Paragraph Textarea", "caldera-forms"),
				"description" => __('Paragraph Textarea', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/paragraph/field.php",
				"category"	=>	__("Text Fields", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/paragraph/config_template.php",
					"preview"	=>	CF_PATH . "includes/fields/paragraph/preview.php",
					"default"	=> array(
						'rows'	=>	'4'
					),
				)
			),
			'toggle_switch' => array(
				"field"		=>	__("Toggle Switch", "caldera-forms"),
				"description" => __('Toggle Switch', 'caldera-forms'),
				"category"	=>	__("Select Options", "caldera-forms").', '.__("Special", "caldera-forms"),
				"file"		=>	CF_PATH . "includes/fields/toggle_switch/field.php",
				"viewer"	=>	array( 'Caldera_Forms_Fields', 'filter_options_calculator'),
				"options"	=>	"single",
				"static"	=> true,
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/toggle_switch/config_template.php",
					"preview"	=>	CF_PATH . "includes/fields/toggle_switch/preview.php",
					"default"	=> array(
					),
					"scripts"	=>	array(
						CF_URL . "includes/fields/toggle_switch/js/setup.js"
					),
					"styles"	=>	array(
						CF_URL . "includes/fields/toggle_switch/css/setup.css"
					),
				),
				"scripts"	=>	array(
					"jquery",
					CF_URL . "includes/fields/toggle_switch/js/toggle.js"
				),
				"styles"	=>	array(
					CF_URL . "includes/fields/toggle_switch/css/toggle.css"
				)
			),
			'dropdown' => array(
				"field"		=>	__("Dropdown Select", "caldera-forms"),
				"description" => __('Dropdown Select', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/dropdown/field.php",
				"category"	=>	__("Select Options", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"options"	=>	"single",
				"static"	=> true,
				"viewer"	=>	array( 'Caldera_Forms_Fields', 'filter_options_calculator'),
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/dropdown/config_template.php",
					"preview"	=>	CF_PATH . "includes/fields/dropdown/preview.php",
					"default"	=> array(

					),
					"scripts"	=>	array(
						CF_URL . "includes/fields/dropdown/js/setup.js"
					)
				)
			),
			'checkbox' => array(
				"field"		=>	__("Checkbox", "caldera-forms"),
				"description" => __('Checkbox', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/checkbox/field.php",
				"category"	=>	__("Select Options", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"options"	=>	"multiple",
				"static"	=> true,
				"viewer"	=>	array( 'Caldera_Forms_Fields', 'filter_options_calculator'),
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/checkbox/preview.php",
					"template"	=>	CF_PATH . "includes/fields/checkbox/config_template.php",
					"default"	=> array(

					),
					"scripts"	=>	array(
						CF_URL . "includes/fields/checkbox/js/setup.js"
					)
				),
			),
			'radio' => array(
				"field"		=>	__("Radio", "caldera-forms"),
				"description" => __('Radio', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/radio/field.php",
				"category"	=>	__("Select Options", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"options"	=>	true,
				"static"	=> true,
				"viewer"	=>	array( 'Caldera_Forms_Fields', 'filter_options_calculator'),
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/radio/preview.php",
					"template"	=>	CF_PATH . "includes/fields/radio/config_template.php",
					"default"	=> array(
					),
					"scripts"	=>	array(
						CF_URL . "includes/fields/radio/js/setup.js"
					)
				)
			),
			'date_picker' => array(
				"field"		=>	__("Date Picker", "caldera-forms"),
				"description" => __('Date Picker', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/date_picker/datepicker.php",
				"category"	=>	__("Text Fields", "caldera-forms").', '.__("Pickers", "caldera-forms"),
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/date_picker/preview.php",
					"template"	=>	CF_PATH . "includes/fields/date_picker/setup.php",
					"default"	=> array(
						'format'	=>	'yyyy-mm-dd'
					),
					"scripts"	=>	array(
						CF_URL . "includes/fields/date_picker/js/bootstrap-datepicker.js",
						CF_URL . "includes/fields/date_picker/js/setup.js"
					),
					"styles"	=>	array(
						CF_URL . "includes/fields/date_picker/css/datepicker.css"
					),
				),
				"scripts"	=>	array(
					//"jquery",
					CF_URL . "includes/fields/date_picker/js/bootstrap-datepicker.js"
				),
				"styles"	=>	array(
					CF_URL . "includes/fields/date_picker/css/datepicker.css"
				)
			),
			'color_picker' => array(
				"field"		=>	__("Color Picker", "caldera-forms"),
				"description" => __('Color Picker', 'caldera-forms'),
				"category"	=>	__("Text Fields", "caldera-forms").', '.__("Pickers", "caldera-forms"),
				"file"		=>	CF_PATH . "includes/fields/color_picker/field.php",
				"setup"		=>	array(
					"preview"	=>	CF_PATH . "includes/fields/color_picker/preview.php",
					"template"	=>	CF_PATH . "includes/fields/color_picker/setup.php",
					"default"	=> array(
						'default'	=>	'#FFFFFF'
					),
					"scripts"	=>	array(
						CF_URL . "includes/fields/color_picker/minicolors.js",
						CF_URL . "includes/fields/color_picker/setup.js"
					),
					"styles"	=>	array(
						CF_URL . "includes/fields/color_picker/minicolors.css"
					),
				),
				"scripts"	=>	array(
					//"jquery",
					CF_URL . "includes/fields/color_picker/minicolors.js",
					CF_URL . "includes/fields/color_picker/setup.js"
				),
				"styles"	=>	array(
					CF_URL . "includes/fields/color_picker/minicolors.css"
				)
			),
			'states' => array(
				"field"		=>	__("State/ Province Select", "caldera-forms"),
				"description" => __('Dropdown select for US states and Canadian provinces.', 'caldera-forms'),
				"file"		=>	CF_PATH . "includes/fields/states/field.php",
				"category"	=>	__("Select Options", "caldera-forms").', '.__("Basic", "caldera-forms"),
				"placeholder" => false,
				//"viewer"	=>	array( 'Caldera_Forms_Fields', 'filter_options_calculator'),
				"setup"		=>	array(
					"template"	=>	CF_PATH . "includes/fields/states/config_template.php",
					"preview"	=>	CF_PATH . "includes/fields/states/preview.php",
					"default"	=> array(

					),
				)
			),
		);
		
		/**
		 * Filter the list before returning
		 *
		 * @since 2.0.0
		 */
		return apply_filters( 'caldera_forms_get_field_types', $internal_fields );

	}

}
