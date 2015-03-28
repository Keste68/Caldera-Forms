<?php

	// Panel template for My Tasks

?>

<input id="active_edit_mailer" data-live-sync="true" type="hidden" value="{{active_edit_mailer}}" name="active_edit_mailer">

<div class="caldera-forms-module-side">

	
	<ul class="caldera-forms-module-tabs caldera-forms-group-wrapper" style="box-shadow: 0px 1px 0px rgb(207, 207, 207) inset;">
	{{#each mailer}}
		<li class="{{_id}} caldera-forms-module-tab {{#is ../active_edit_mailer value=_id}}active{{/is}}">
			{{:node_point}}
			{{#unless config/mailer_name}}
				<a><input class="autofocus-input" data-format="key" style="width: 100%; padding: 3px 6px; margin: -3px; background: none repeat scroll 0% 0% rgb(255, 255, 255); border: 0px none; border-radius: 2px;" type="text" data-id="{{_id}}" name="{{:name}}[config][mailer_name]" data-live-sync="true" data-sync=".mailer_title_{{_id}}" value="{{config/mailer_name}}" id="caldera_todo-mailer_name-{{_id}}"></a>
			{{else}}
				<a href="#" class="sortable-item caldera-forms-edit-mailer" data-id="{{_id}}"> <span class="mailer_title_{{_id}}">{{config/mailer_name}}</span></a>
			{{/unless}}

			{{#is ../active_edit_mailer not=_id}}<input type="hidden" name="{{:name}}[config]" value="{{json config}}">{{/is}}
			{{#if new}}<input class="wp-baldrick" data-request="cf_record_change" data-autoload="true" data-live-sync="true" type="hidden" value="{{_id}}" name="active_edit_mailer">{{/if}}

		</li>
	{{/each}}
	{{#unless mailer}}
		<li class="caldera-forms-module-tab"><p class="description" style="margin: 0px; padding: 9px 22px;"><?php _e( 'No Groups', 'caldera-forms' ); ?></p></li>
	{{/unless}}
		<li class="caldera-forms-module-tab" style="text-align: center; padding: 12px 22px; background-color: rgb(225, 225, 225); box-shadow: -1px 0 0 #cfcfcf inset, 0 1px 0 #cfcfcf inset, 0 -1px 0 #cfcfcf inset;">
			<button style="width: 100%;" class="wp-baldrick button" data-node-default='{ "new" : "true" }' data-add-node="mailer" type="button"><?php _e( 'Add Group', 'caldera-forms' ); ?></button>
		</li>	 
	</ul>

</div>

{{#find mailer active_edit_mailer}}

	{{#if config/mailer_name}}
	
	<div class="caldera-forms-field-config-wrapper {{_id}}" style="width:580px;">

		<button style="float:right" type="button" class="button" data-confirm="<?php echo esc_attr( __( '', 'caldera-forms' ) ); ?>" data-remove-element=".{{_id}}" style="float: right; padding: 3px 6px;"><?php _e( 'Delete Group', 'caldera-forms' ); ?></button>

		<div style="border-bottom: 1px solid rgb(209, 209, 209); margin: 0px 0px 12px; padding: 5px 0px 12px;">
			<input style="border: 0px none; background: none repeat scroll 0% 0% transparent; box-shadow: none; font-weight: bold; padding: 0px; margin: 0px; width: 450px;" type="text" name="{{:name}}[config][mailer_name]" data-live-sync="true" data-sync=".mailer_title_{{_id}}" data-format="key" value="{{config/mailer_name}}" id="caldera_todo-mailer_name-{{_id}}">
		</div>

		<!-- Add custom code here fields names are {{:name}}[config][field_name] -->

	</div>

	{{/if}}

{{/find}}



{{#script}}
jQuery('.caldera-forms-edit-mailer').on('click', function(){
	var clicked = jQuery(this),
		active = jQuery('#active_edit_mailer');

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