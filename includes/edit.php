<?php
$caldera_forms = Caldera_Forms_Options::get_single( strip_tags( $_GET['edit'] ) );

?>
<div class="wrap" id="caldera-forms-main-canvas">
	<span class="wp-baldrick spinner" style="float: none; display: block;" data-target="#caldera-forms-main-canvas" data-callback="cf_canvas_init" data-type="json" data-request="#caldera-forms-live-config" data-event="click" data-template="#main-ui-template" data-autoload="true"></span>
</div>

<div class="clear"></div>

<input type="hidden" class="clear" autocomplete="off" id="caldera-forms-live-config" style="width:100%;" value="<?php echo esc_attr( json_encode($caldera_forms) ); ?>">

<script type="text/html" id="main-ui-template">
	<?php
	// pull in the join table card template
	include CF_PATH . 'includes/templates/main-ui.php';
	?>	
</script>





