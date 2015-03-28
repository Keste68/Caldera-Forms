<div class="caldera-forms-main-headercaldera">
		<h2>
		<span id="caldera_forms-name-title">{{name}}</span> <span class="caldera-forms-subline">{{slug}}</span>
		<span class="add-new-h2 wp-baldrick" data-action="cf_save_config" data-load-element="#caldera-forms-save-indicator" data-before="cf_get_config_object" ><?php _e('Save Changes', 'caldera-forms') ; ?></span>
		<span style="position: absolute; margin-left: -18px;" id="caldera-forms-save-indicator"><span style="float: none; margin: 16px 0px -5px 10px;" class="spinner"></span></span>
	</h2>
		<ul class="caldera-forms-header-tabs caldera-forms-nav-tabs">
				
				<li class="{{#is _current_tab value="#caldera-forms-panel-general"}}active {{/is}}caldera-forms-nav-tab"><a href="#caldera-forms-panel-general"><?php _e('General Settings', 'caldera-forms') ; ?></a></li>

				
	</ul>
	<span class="wp-baldrick" id="caldera-forms-field-sync" data-event="refresh" data-target="#caldera-forms-main-canvas" data-callback="cf_canvas_init" data-type="json" data-request="#caldera-forms-live-config" data-template="#main-ui-template"></span>
</div>
<div class="caldera-forms-sub-headercaldera">
	<ul class="caldera-forms-sub-tabs caldera-forms-nav-tabs">
				<li class="{{#is _current_tab value="#caldera-forms-panel-layout"}}active {{/is}}caldera-forms-nav-tab"><a href="#caldera-forms-panel-layout"><?php _e('Layout', 'caldera-forms') ; ?></a></li>
		<li class="{{#is _current_tab value="#caldera-forms-panel-pages"}}active {{/is}}caldera-forms-nav-tab"><a href="#caldera-forms-panel-pages"><?php _e('Pages', 'caldera-forms') ; ?></a></li>
		<li class="{{#is _current_tab value="#caldera-forms-panel-processors"}}active {{/is}}caldera-forms-nav-tab"><a href="#caldera-forms-panel-processors"><?php _e('Processors', 'caldera-forms') ; ?></a></li>
		<li class="{{#is _current_tab value="#caldera-forms-panel-variables"}}active {{/is}}caldera-forms-nav-tab"><a href="#caldera-forms-panel-variables"><?php _e('Variables', 'caldera-forms') ; ?></a></li>
		<li class="{{#is _current_tab value="#caldera-forms-panel-resposive"}}active {{/is}}caldera-forms-nav-tab"><a href="#caldera-forms-panel-resposive"><?php _e('Resposive', 'caldera-forms') ; ?></a></li>
		<li class="{{#is _current_tab value="#caldera-forms-panel-mailer"}}active {{/is}}caldera-forms-nav-tab"><a href="#caldera-forms-panel-mailer"><?php _e('Notifications', 'caldera-forms') ; ?></a></li>

	</ul>
</div>

<form class="caldera-main-form has-sub-nav" id="caldera-forms-main-form" action="?page=caldera_forms" method="POST">
	<?php wp_nonce_field( 'caldera-forms', 'caldera-forms-setup' ); ?>
	<input type="hidden" value="{{id}}" name="id" id="caldera_forms-id">
	<input type="hidden" value="{{_current_tab}}" name="_current_tab" id="caldera-forms-active-tab">

		<div id="caldera-forms-panel-general" class="caldera-forms-editor-panel" {{#if _current_tab}}{{#is _current_tab value="#caldera-forms-panel-general"}}{{else}} style="display:none;" {{/is}}{{/if}}>
		<h4><?php _e( 'Form Configuration', 'caldera-forms' ); ?> <small class="description"><?php _e( 'General Settings', 'caldera-forms' ); ?></small></h4>
		<?php
		// pull in the general settings template
		include CF_PATH . 'includes/templates/general-settings.php';
		?>
	</div>	<div id="caldera-forms-panel-layout" class="caldera-forms-editor-panel" {{#is _current_tab value="#caldera-forms-panel-layout"}}{{else}} style="display:none;" {{/is}}>		
		<h4><?php _e('Form Builder', 'caldera-forms') ; ?> <small class="description"><?php _e('Layout', 'caldera-forms') ; ?></small></h4>
		<?php
		// pull in the general settings template
		include CF_PATH . 'includes/templates/layout-panel.php';
		?>
	</div>	<div id="caldera-forms-panel-pages" class="caldera-forms-editor-panel" {{#is _current_tab value="#caldera-forms-panel-pages"}}{{else}} style="display:none;" {{/is}}>		
		<h4><?php _e('Multi-Page Form Setup', 'caldera-forms') ; ?> <small class="description"><?php _e('Pages', 'caldera-forms') ; ?></small></h4>
		<?php
		// pull in the general settings template
		include CF_PATH . 'includes/templates/pages-panel.php';
		?>
	</div>	<div id="caldera-forms-panel-processors" class="caldera-forms-editor-panel" {{#is _current_tab value="#caldera-forms-panel-processors"}}{{else}} style="display:none;" {{/is}}>		
		<h4><?php _e('Form Processors and Submission Handling', 'caldera-forms') ; ?> <small class="description"><?php _e('Processors', 'caldera-forms') ; ?></small></h4>
		<?php
		// pull in the general settings template
		include CF_PATH . 'includes/templates/processors-panel.php';
		?>
	</div>	<div id="caldera-forms-panel-variables" class="caldera-forms-editor-panel" {{#is _current_tab value="#caldera-forms-panel-variables"}}{{else}} style="display:none;" {{/is}}>		
		<h4><?php _e('Preset Values and Variables', 'caldera-forms') ; ?> <small class="description"><?php _e('Variables', 'caldera-forms') ; ?></small></h4>
		<?php
		// pull in the general settings template
		include CF_PATH . 'includes/templates/variables-panel.php';
		?>
	</div>	<div id="caldera-forms-panel-resposive" class="caldera-forms-editor-panel" {{#is _current_tab value="#caldera-forms-panel-resposive"}}{{else}} style="display:none;" {{/is}}>		
		<h4><?php _e('Resposive Settings', 'caldera-forms') ; ?> <small class="description"><?php _e('Resposive', 'caldera-forms') ; ?></small></h4>
		<?php
		// pull in the general settings template
		include CF_PATH . 'includes/templates/resposive-panel.php';
		?>
	</div>	<div id="caldera-forms-panel-mailer" class="caldera-forms-editor-panel" {{#is _current_tab value="#caldera-forms-panel-mailer"}}{{else}} style="display:none;" {{/is}}>		
		<h4><?php _e('Email Notification Settings', 'caldera-forms') ; ?> <small class="description"><?php _e('Notifications', 'caldera-forms') ; ?></small></h4>
		<?php
		// pull in the general settings template
		include CF_PATH . 'includes/templates/mailer-panel.php';
		?>
	</div>

		

</form>

{{#unless _current_tab}}
	{{#script}}
		jQuery(function($){
			$('.caldera-forms-nav-tab').first().trigger('click').find('a').trigger('click');
		});
	{{/script}}
{{/unless}}