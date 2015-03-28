<?php

	// Panel template for My Tasks

?>

<input id="active_edit_variables" data-live-sync="true" type="hidden" value="{{active_edit_variables}}" name="active_edit_variables">

<div class="caldera-forms-module-side">

	
	<ul class="caldera-forms-module-tabs caldera-forms-group-wrapper" style="box-shadow: 0px 1px 0px rgb(207, 207, 207) inset;">
	{{#each variables}}
		<li class="{{_id}} caldera-forms-module-tab {{#is ../active_edit_variables value=_id}}active{{/is}}">
			{{:node_point}}
			{{#unless config/variables_name}}
				<a><input class="autofocus-input" data-format="key" style="width: 100%; padding: 3px 6px; margin: -3px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 0px none; border-radius: 2px;" type="text" data-id="{{_id}}" name="{{:name}}[config][variables_name]" data-live-sync="true" data-sync=".variables_title_{{_id}}" value="{{config/variables_name}}" id="caldera_todo-variables_name-{{_id}}"></a>
			{{else}}
				<a href="#" class="sortable-item caldera-forms-edit-variables" data-id="{{_id}}"> <span class="variables_title_{{_id}}">{{config/variables_name}}</span></a>
			{{/unless}}

			{{#is ../active_edit_variables not=_id}}<input type="hidden" name="{{:name}}[config]" value="{{json config}}">{{/is}}
			{{#if new}}<input class="wp-baldrick" data-request="cf_record_change" data-autoload="true" data-live-sync="true" type="hidden" value="{{_id}}" name="active_edit_variables">{{/if}}

		</li>
	{{/each}}
	{{#unless variables}}
		<li class="caldera-forms-module-tab"><p class="description" style="margin: 0px; padding: 9px 22px;"><?php _e( 'No Variables', 'caldera-forms' ); ?></p></li>
	{{/unless}}
		<li class="caldera-forms-module-tab" style="text-align: center; padding: 12px 22px; background-color: rgb(225, 225, 225); box-shadow: -1px 0 0 #cfcfcf inset, 0 1px 0 #cfcfcf inset, 0 -1px 0 #cfcfcf inset;">
			<button style="width: 100%;" class="wp-baldrick button" data-node-default='{ "new" : "true" }' data-add-node="variables" type="button"><?php _e( 'Add Variable', 'caldera-forms' ); ?></button>
		</li>	 
	</ul>

</div>

{{#find variables active_edit_variables}}

	{{#if config/variables_name}}
	
	<div class="caldera-forms-field-config-wrapper {{_id}}" style="width:580px;">

		<button style="float:right" type="button" class="button" data-confirm="<?php echo esc_attr( __( 'Are you sure you want to remove this variable?', 'caldera-forms' ) ); ?>" data-remove-element=".{{_id}}" style="float: right; padding: 3px 6px;"><?php _e( 'Delete Variable', 'caldera-forms' ); ?></button>

		<div style="border-bottom: 1px solid rgb(209, 209, 209); margin: 0px 0px 12px; padding: 5px 0px 12px;">
			<input style="border: 0px none; background: none repeat scroll 0% 0% transparent; box-shadow: none; font-weight: bold; padding: 0px; margin: 0px; width: 450px;" type="text" name="{{:name}}[config][variables_name]" data-live-sync="true" data-sync=".variables_title_{{_id}}" data-format="key" value="{{config/variables_name}}" id="caldera_todo-variables_name-{{_id}}">
		</div>

		<!-- Add custom code here fields names are {{:name}}[config][field_name] -->

	</div>

	{{/if}}

{{/find}}



{{#script}}
jQuery('.caldera-forms-edit-variables').on('click', function(){
	var clicked = jQuery(this),
		active = jQuery('#active_edit_variables');

		if( active.val() == clicked.data('id') ){
			active.val('').trigger('change');
		}else{
			active.val( clicked.data('id') ).trigger( 'change' );
		}
});
jQuery('.autofocus-input').focus().on('blur', function(){ 
	console.log(jQuery(this).val());
	if( jQuery(this).val() == '' ){
		jQuery( '.' + jQuery(this).data('id') ).remove();
		cf_record_change();
	}
});
{{/script}}