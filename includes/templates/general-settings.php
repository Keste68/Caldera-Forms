		<div class="caldera-forms-config-group">
			<label for="caldera_forms-name"><?php _e( 'Form Name', 'caldera-forms' ); ?></label>
			<input type="text" name="name" value="{{name}}" data-sync="#caldera_forms-name-title" id="caldera_forms-name" required>
		</div>
		<div class="caldera-forms-config-group">
			<label for="caldera_forms-slug"><?php _e( 'Form Slug', 'caldera-forms' ); ?></label>
			<input type="text" name="slug" value="{{slug}}" data-format="slug" data-sync=".caldera-forms-subline" data-master="#caldera_forms-name" id="caldera_forms-slug" required>
		</div>