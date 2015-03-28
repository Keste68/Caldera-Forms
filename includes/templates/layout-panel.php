<button class="button add-grid-row" data-panel="layout" type="button"><?php _e( 'Add Row', 'caldera-forms' ); ?></button>
<div class="caldera-grid layout-grid" data-panel="layout" data-confirm="<?php echo esc_attr( __( 'This will remove all the fields in this row. Are you sure?', 'caldera-forms' ) ); ?>">

<?php
// Element trigger for Button
$fields = new \calderawp\input\fields();
// setup all categories list
$all_categories = array();

foreach( $fields->fields as $field_slug=>$field ){
	// enqueue scripts
	if( !empty( $field['setup']['scripts'] ) ){
		foreach( $field['setup']['scripts'] as $script ){
			wp_enqueue_script( $field_slug . '-script-' . basename( $script ) , $script, array('jquery'), CF_VER, true );
		}
	}
	// setup categories
	$categories = array( 'Other' );	
	if( !empty( $field['category'] ) ){
		$categories = array_map('trim', explode( ',', $field['category'] ) );
	}
	$all_categories = array_merge( $all_categories, $categories );

	// modal size
	$modal_width 	= 575;
	$modal_height 	= 420;
	if( !empty( $field['setup']['modal_width'] ) ){
		$modal_width = floatval($field['setup']['modal_width']);
	}
	if( !empty( $field['setup']['modal_height'] ) ){
		$modal_height = floatval($field['setup']['modal_height']);
	}
?>
	<span class="insert-item wp-modals" 

		data-element-type="<?php echo esc_attr( $field['field'] ); ?>" 
		data-element-slug="<?php echo esc_attr( $field_slug ); ?>"
		data-categories="<?php echo esc_attr( implode( ';', $categories ) ); ?>"
		data-save-text="<?php echo esc_attr( __( 'Save Changes', 'caldera-forms' ) ); ?>" 
		data-insert-text="<?php echo esc_attr( __( 'Insert', 'caldera-forms' ) . ' ' . esc_attr( $field['field'] ) ); ?>" 
		data-modal-width="<?php echo $modal_width; ?>"
		data-modal-height="<?php echo $modal_height; ?>"
		data-request="grid_get_item_data"
		data-template="#field-config-template-<?php echo esc_attr( $field_slug ); ?>" 
		data-modal="layout" 
		data-modal-title="<?php echo esc_attr( $field['field'] ); ?>" 
		data-panel="layout"

	></span>

<?php

}

?>


	{{#each layout_json}}
	<div class="row outer-row layout-grid-row">
		{{#each this}}	
		<div class="col-xs-{{size}}">
			<div class="column-resize-handle layout-resize">
				<span class="dashicons dashicons-minus layout-minus"></span>			
			</div>
			<div class="row-toolbar">
				<span class="dashicons dashicons-plus layout-plus"></span>
				<span class="dashicons dashicons-no layout-no" data-confirm="<?php echo esc_attr( __( 'This will remove all the fields in this row. Are you sure?', 'caldera-forms' ) ); ?>"></span>
			</div>
			<div class="lower-body column-body" id="{{id}}">
				<div class="lower-body-rows">
					{{#each row}}
					<div class="row inner-row layout-grid-row">
						{{#each this}}	
						<div class="col-xs-{{size}}">
							<div class="column-resize-handle layout-resize">
								<span class="dashicons dashicons-minus layout-minus"></span>			
							</div>
							<div class="row-toolbar">
								<span class="dashicons dashicons-plus layout-plus"></span>
								<span class="dashicons dashicons-no layout-no" data-confirm="<?php echo esc_attr( __( 'This will remove all the fields in this row. Are you sure?', 'caldera-forms' ) ); ?>"></span>
							</div>
							<div class="upper-body column-body" id="{{id}}">
								{{#each item}}

								
							<?php
						// Element template for Button
					?>
					{{#if _button}}

						<div class="node-wrapper caldera-forms-card-item" style="min-height: 52px; display: block; width: 100%; padding-left: 20px; box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.04), 20px 0px 0px rgb(248, 248, 248) inset;" id="element_{{@key}}">
							<span style="color:#a1a1a1;" class="dashicons caldera-forms-card-icon"></span>
							<div class="caldera-forms-card-content" style="min-height: 52px;">
								<input id="{{@key}}" type="hidden" value="{{json this}}">
								<h4>{{name}}</h4>



							</div>
							<span data-data="{{@key}}" data-fragment="{{../../id}}" data-module="button" class="element-item-edit" style="padding: 0px; margin: 3px 0px; position: absolute; left: 1px; top: -2px;"><span class="dashicons dashicons-admin-generic" style="padding: 0px; margin: 0px; line-height: 23px; font-size:13px;"></span></span>

							<span style="padding: 0px; margin: 3px 0px; position: absolute; left: 0px; bottom: -2px;" data-confirm="Are you sure you want to remove this field?. 'Cancel' to stop. 'OK' to delete" data-remove-parent=".node-wrapper"><span class="dashicons dashicons-no-alt" style="padding: 0px; margin: 0px; line-height: 23px; font-size:13px;"></span></span>
						</div>

					{{/if}}

					<?php
						// Element template for Single line text
					?>
					{{#if _text}}

						<div class="node-wrapper caldera-forms-card-item" style="min-height: 52px; display: block; width: 100%; padding-left: 20px; box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.04), 20px 0px 0px rgb(248, 248, 248) inset;" id="element_{{@key}}">
							<span style="color:#a1a1a1;" class="dashicons caldera-forms-card-icon"></span>
							<div class="caldera-forms-card-content" style="min-height: 52px;">
								<input id="{{@key}}" type="hidden" value="{{json this}}">
								<h4>{{name}}</h4>



							</div>
							<span data-data="{{@key}}" data-fragment="{{../../id}}" data-module="text" class="element-item-edit" style="padding: 0px; margin: 3px 0px; position: absolute; left: 1px; top: -2px;"><span class="dashicons dashicons-admin-generic" style="padding: 0px; margin: 0px; line-height: 23px; font-size:13px;"></span></span>

							<span style="padding: 0px; margin: 3px 0px; position: absolute; left: 0px; bottom: -2px;" data-confirm="Are you sure you want to remove this field?. 'Cancel' to stop. 'OK' to delete" data-remove-parent=".node-wrapper"><span class="dashicons dashicons-no-alt" style="padding: 0px; margin: 0px; line-height: 23px; font-size:13px;"></span></span>
						</div>

					{{/if}}




								{{/each}}
							</div>
							<div class="row-toolbar row-column-action"><span class="dashicons element-item-insert dashicons-plus-alt" data-fragment="{{id}}"></span></div>
						</div>		
						{{/each}}
					</div>	
					{{/each}}
				</div>
				{{#each item}}

				
					<?php
						// Element template for Fields
						foreach( $fields->fields as $field_slug=>$field ){
					?>
					{{#if _<?php echo $field_slug; ?>}}

						<div class="node-wrapper caldera-forms-card-item" style="min-height: 52px; display: block; width: 100%; padding-left: 20px; box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.04), 20px 0px 0px rgb(248, 248, 248) inset;" id="element_{{@key}}">
							<span style="color:#a1a1a1;" class="dashicons caldera-forms-card-icon"></span>
							<div class="caldera-forms-card-content" style="min-height: 52px;">
								<input id="{{@key}}" type="hidden" value="{{json this}}">
								<h4>{{name}}</h4>
								<?php include $field['setup']['preview']; ?>


							</div>
							<span data-data="{{@key}}" data-fragment="{{../../id}}" data-module="<?php echo esc_attr( $field_slug ); ?>" class="element-item-edit" style="padding: 0px; margin: 3px 0px; position: absolute; left: 1px; top: -2px;"><span class="dashicons dashicons-admin-generic" style="padding: 0px; margin: 0px; line-height: 23px; font-size:13px;"></span></span>

							<span style="padding: 0px; margin: 3px 0px; position: absolute; left: 0px; bottom: -2px;" data-confirm="Are you sure you want to remove this field?. 'Cancel' to stop. 'OK' to delete" data-remove-parent=".node-wrapper"><span class="dashicons dashicons-no-alt" style="padding: 0px; margin: 0px; line-height: 23px; font-size:13px;"></span></span>
						</div>

					{{/if}}

					<?php
						}
					?>

				{{/each}}
			</div>
			<div class="row-toolbar row-column-action"><span class="dashicons element-item-insert dashicons-plus-alt" data-fragment="{{id}}"></span></div>
			<span class="side-split dashicons dashicons-plus" data-column="{{id}}" data-panel="layout"></span>
		</div>		
		{{/each}}
	</div>	
	{{/each}}

</div>
<input type="hidden" id="layout-input" name="layout" value="{{json layout}}">
<input type="hidden" id="layout-input-json" name="layout_json" value="{{json layout_json}}">

<?php
	// Element modal template for Fields
	foreach( $fields->fields as $field_slug=>$field ){
?>
{{#script type="text/html" id="field-config-template-<?php echo $field_slug; ?>"}}
	
	<input type="hidden" name="_<?php echo esc_attr( $field_slug ); ?>" value="1">
	<?php if( $field_slug != 'html' ){ ?>
		<div class="caldera-forms-config-group">
			<label for="modal_name"><?php _e( 'Name', 'caldera-forms' ); ?></label>
			<input id="modal_name" type="text" class="regular-text" name="name" value="\{{name}}" required>
		</div>
		<?php 
	}
	// pull in template
	ob_start();
	include $field['setup']['template'];
	$template = ob_get_clean();
	
	// clean out legacy tags
	$template = str_replace( '{{_name}}', 'config', $template );
	$template = str_replace( '{{_id}}', 'current_field_edit', $template );
	$template = str_replace( 'class="caldera-config-group"', 'class="caldera-forms-config-group"', $template );	

	// add names and id
	$template = str_replace( '{{', '\{{', $template );

	//echo out template
	echo $template;
	?>
	<!-- Custom fields and stuff here -->

{{/script}}
<?php } ?>



<?php
	// Element template for Fields
	foreach( $fields->fields as $field_slug=>$field ){
?>
{{#script type="text/html" id="layout_<?php echo $field_slug;?>_item"}}

	<div class="node-wrapper caldera-forms-card-item" style="min-height: 52px;display: block; width: 100%; padding-left: 20px; box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.04), 20px 0px 0px rgb(248, 248, 248) inset;" id="element_\{{id}}">
		<span style="color:#a1a1a1;" class="dashicons caldera-forms-card-icon"></span>
		<div class="caldera-forms-card-content" style="min-height: 52px;">
			<input id="\{{id}}" type="hidden" value="\{{json data}}">
			\{{#script}}
			cf_record_change();
			\{{/script}}
		</div>
		<span data-data="\{{id}}" data-fragment="\{{fragment}}" class="element-item-edit" data-module="<?php echo esc_attr( $field_slug );?>" style="padding: 0px; margin: 3px 0px; position: absolute; left: 1px; top: -2px;"><span class="dashicons dashicons-admin-generic" style="padding: 0px; margin: 0px; line-height: 23px; font-size:13px;"></span></span>
	</div>

{{/script}}
<?php } ?>





<!-- element types selector modal -->
{{#script type="text/html" id="element_selector_modal_form"}}

	\{{#each category}}
		<div data-tab="\{{@key}}">
			\{{#each element}}
			<div class="caldera-forms-card-item" style="width: 100%; height: 32px; min-height: 32px; padding-left: 32px; margin:6px 0; display:block;">
				<span class="dashicons dashicons-plus-alt caldera-forms-card-icon" style="width: 32px; margin-left: -34px; line-height: 32px; text-indent: 3px; font-size: 22px; background:#efefef;"></span>
				<div class="caldera-forms-card-content" style="min-height: 30px;">
					<button type="button" class="button element-item-insert button-small" data-module="\{{@key}}" data-fragment="\{{@root/fragment}}" style="float: right; margin: -3px -7px 0px 0px;"><?php _e('Use Element', 'caldera-forms'); ?></button>
					<h4>\{{this}}</h4>
				</div>
			</div>		
			\{{/each}}
		</div>
	\{{/each}}

{{/script}}



<?php
// Helpers for titles & extras
sort( $all_categories );
?>
<span id="modal_element_selector" data-categories="<?php echo esc_attr( implode( ';', $all_categories ) ); ?>" data-modal-height="500" data-modal-width="580" data-modal-title="<?php echo esc_attr( __('Select Element', 'caldera-forms') ); ?>" class="wp-modals" data-request="grid_modal_get_elements" data-modal="layout" data-event="activate" data-template="#element_selector_modal_form"></span>
