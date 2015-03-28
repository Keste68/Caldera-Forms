<?php
/**
 *The shortcode insert modal.
 *
 * @package   Caldera_Forms
 * @author    David <david@digilab.co.za>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 David <david@digilab.co.za>
 */
?>

<div class="caldera-forms-backdrop caldera-forms-insert-modal" style="display: none;"></div>
<div id="caldera_forms_shortcode_modal" class="caldera-forms-modal-wrap caldera-forms-insert-modal" style="display: none; width: 600px; max-height: 500px; margin-left: -300px;">
	<div class="caldera-forms-modal-title" id="caldera_forms_shortcode_modalTitle" style="display: block;">
		<a href="#close" class="caldera-forms-modal-closer" data-dismiss="modal" aria-hidden="true" id="caldera_forms_shortcode_modalCloser">×</a>
		<h3 class="modal-label" id="caldera_forms_shortcode_modalLable"><?php echo __('Insert Form', 'caldera-forms'); ?></h3>
	</div>
	<div class="caldera-forms-modal-body none" id="caldera_forms_shortcode_modalBody">
		<div class="modal-body">
		<?php

			$_caldera_forms = Caldera_Forms_Options::get_registry();
			

			if(!empty($_caldera_forms)){
				foreach( $_caldera_forms as $caldera_forms_id => $caldera_forms ){

					echo '<div class="modal-list-item-cf"><label><input name="insert_caldera_forms_id" autocomplete="off" class="selected-caldera_forms-shortcode" value="' . $caldera_forms['slug'] . '" type="radio">' . $caldera_forms['name'];
					echo ' </label></div>';

				}
			}else{
				echo '<p>' . __('You don\'t have any  Caldera Forms to insert.', 'caldera-forms') .'</p>';
			}

		?>
		</div>
	</div>
	<div class="caldera-forms-modal-footer" id="caldera_forms_shortcode_modalFooter" style="display: block;">
	<?php if(!empty($_caldera_forms)){ ?>
		<p class="modal-label-subtitle" style="text-align: right;"><button class="button caldera-forms-shortcode-insert" style="margin:5px 25px 0 15px;"><?php echo __('Insert Selected', 'caldera-forms'); ?></button>	
	<?php }else{ ?>
		<button class="button caldera-forms-modal-closer"><?php echo __('Close', 'caldera-forms'); ?></button>
	<?php } ?>
	</div>
</div>
