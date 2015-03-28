<div class="wrap">
	<div class="caldera-forms-main-headercaldera">
		<h2>
			<?php _e( 'Caldera Forms', 'caldera-forms' ); ?> <span class="caldera-forms-version"><?php echo CF_VER; ?></span>
			<span class="add-new-h2 wp-baldrick" data-modal="new-caldera_forms" data-modal-height="192" data-modal-width="402" data-modal-buttons='<?php _e( 'Create Form', 'caldera-forms' ); ?>|{"data-action":"cf_create_caldera_forms","data-before":"cf_create_new_caldera_forms", "data-callback": "bds_redirect_to_caldera_forms"}' data-modal-title="<?php _e('New Form', 'caldera-forms') ; ?>" data-request="#new-caldera_forms-form"><?php _e('Add New', 'caldera-forms') ; ?></span>
		</h2>
	</div>

<?php

	$caldera_forms = Caldera_Forms_Options::get_registry();

	if( empty( $caldera_forms ) ){
		$caldera_forms = array();
	}
	global $wpdb;
	
	foreach( $caldera_forms as $caldera_form_id => $caldera_form ){

?>

	<div class="caldera-forms-card-item" id="caldera_forms-<?php echo $caldera_form['id']; ?>">
		<span class="dashicons dashicons-admin-generic caldera-forms-card-icon"></span>
		<div class="caldera-forms-card-content">
			<h4><?php echo $caldera_form['name']; ?></h4>
			<div class="description"><?php echo $caldera_form['slug']; ?></div>
			<div class="description">&nbsp;</div>
			<div class="caldera-forms-card-actions">
				<div class="row-actions">
					<span class="edit"><a href="?page=caldera_forms&amp;edit=<?php echo $caldera_form['id']; ?>">Edit</a> | </span>
					<span class="trash confirm"><a href="?page=caldera_forms&amp;delete=<?php echo $caldera_form['id']; ?>" data-block="<?php echo $caldera_form['id']; ?>" class="submitdelete">Delete</a></span>
				</div>
				<div class="row-actions" style="display:none;">
					<span class="trash"><a class="wp-baldrick" style="cursor:pointer;" data-action="cf_delete_caldera_forms" data-callback="cf_remove_deleted" data-block="<?php echo $caldera_form['id']; ?>" class="submitdelete">Confirm Delete</a> | </span>
					<span class="edit confirm"><a href="?page=caldera_forms&amp;edit=<?php echo $caldera_form['id']; ?>">Cancel</a></span>
				</div>
			</div>
		</div>
	</div>

	<?php } ?>

</div>
<div class="clear"></div>
<script type="text/javascript">
	
	function cf_create_new_caldera_forms(el){
		var caldera_forms 	= jQuery(el),
			name 	= jQuery("#new-caldera_forms-name"),
			slug 	= jQuery('#new-caldera_forms-slug');

		if( slug.val().length === 0 ){
			name.focus();
			return false;
		}
		if( slug.val().length === 0 ){
			slug.focus();
			return false;
		}

		caldera_forms.data('name', name.val() ).data('slug', slug.val() ); 

	}

	function bds_redirect_to_caldera_forms(obj){
		
		if( obj.data.success ){

			obj.params.trigger.prop('disabled', true).html('<?php _e('Loading Form', 'caldera-forms'); ?>');
			window.location = '?page=caldera_forms&edit=' + obj.data.data.id;

		}else{

			jQuery('#new-block-slug').focus().select();
			
		}
	}
	function cf_remove_deleted(obj){

		if( obj.data.success ){
			jQuery( '#caldera_forms-' + obj.data.data.block ).fadeOut(function(){
				jQuery(this).remove();
			});
		}else{
			alert('<?php echo __('Sorry, something went wrong. Try again.', 'caldera-forms'); ?>');
		}


	}
</script>
<script type="text/html" id="new-caldera_forms-form">
	<div class="caldera-forms-config-group">
		<label><?php _e('Form Name', 'caldera-forms'); ?></label>
		<input type="text" name="name" id="new-caldera_forms-name" data-sync="#new-caldera_forms-slug" autocomplete="off">
	</div>
	<div class="caldera-forms-config-group">
		<label><?php _e('Form Slug', 'caldera-forms'); ?></label>
		<input type="text" name="slug" id="new-caldera_forms-slug" data-format="slug" autocomplete="off">
	</div>

</script>
