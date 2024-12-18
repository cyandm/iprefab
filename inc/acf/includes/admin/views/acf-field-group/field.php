<?php
//phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- included template file.

// Define input name prefix using unique identifier.
$input_prefix = 'acf_fields[' . $input['ID'] . ']';
$input_id = acf_idify( $input_prefix );

// Update field props.
$input['prefix'] = $input_prefix;

// Elements.
$div_attrs = array(
	'class' => 'acf-field-object acf-field-object-' . acf_slugify( $input['type'] ),
	'data-id' => $input['ID'],
	'data-key' => $input['key'],
	'data-type' => $input['type'],
);

// Add additional class if the field is an endpoint.
if ( isset( $input['endpoint'] ) && $input['endpoint'] ) {
	$div_attrs['class'] .= ' acf-field-is-endpoint';
}

// Misc template vars.
$field_label = acf_get_field_label( $input, 'admin' );
$field_type_label = acf_get_field_type_label( $input['type'] );

if ( ! isset( $num_field_groups ) ) {
	$num_field_groups = 0;
}

$conditional_logic_class = $conditional_logic_text = '';
if ( isset( $input['conditional_logic'] ) && is_array( $input['conditional_logic'] ) && count( $input['conditional_logic'] ) > 0 ) {
	$conditional_logic_class = ' is-enabled';
	$conditional_logic_text = __( 'Active', 'acf' );
}

?>
<div <?php echo acf_esc_attrs( $div_attrs ); ?>>

	<div class="meta">
		<?php
		$meta_inputs = array(
			'ID' => $input['ID'],
			'key' => $input['key'],
			'parent' => $input['parent'],
			'menu_order' => $i,
			'save' => '',
		);
		foreach ( $meta_inputs as $k => $v ) :
			acf_hidden_input(
				array(
					'name' => $input_prefix . '[' . $k . ']',
					'value' => $v,
					'id' => $input_id . '-' . $k,
				)
			);
		endforeach;
		?>
	</div>

	<div class="handle">
		<ul class="acf-hl acf-tbody">
			<li class="li-field-order">
				<span class="acf-icon acf-sortable-handle"
					  title="<?php _e( 'Drag to reorder', 'acf' ); ?>"><?php echo ( $i + 1 ); ?></span>
			</li>
			<li class="li-field-label">
				<strong>
					<a class="edit-field"
					   title="<?php _e( 'Edit field', 'acf' ); ?>"
					   href="#"><?php echo acf_esc_html( $field_label ); ?></a>
				</strong>
				<div class="row-options">
					<a class="edit-field"
					   title="<?php _e( 'Edit field', 'acf' ); ?>"
					   href="#"><?php _e( 'Edit', 'acf' ); ?></a>
					<a class="duplicate-field"
					   title="<?php _e( 'Duplicate field', 'acf' ); ?>"
					   href="#"><?php _e( 'Duplicate', 'acf' ); ?></a>
					<?php if ( $num_field_groups > 1 ) : ?>
						<a class="move-field"
						   title="<?php _e( 'Move field to another group', 'acf' ); ?>"
						   href="#"><?php _e( 'Move', 'acf' ); ?></a>
					<?php endif; ?>
					<a class="delete-field"
					   title="<?php _e( 'Delete field', 'acf' ); ?>"
					   href="#"><?php _e( 'Delete', 'acf' ); ?></a>
				</div>
			</li>
			<li class="li-field-name"><span class="copyable"><?php echo esc_html( $input['name'] ); ?></span></li>
			<li class="li-field-key"><span class="copyable"><?php echo esc_html( $input['key'] ); ?></span></li>
			<li class="li-field-type">
				<i class="field-type-icon field-type-icon-<?php echo acf_slugify( $input['type'] ); ?>"></i>
				<span class="field-type-label">
					<?php echo acf_esc_html( $field_type_label ); ?>
				</span>
			</li>
		</ul>
	</div>

	<div class="settings">
		<div class="acf-field-editor">
			<div class="acf-field-settings acf-fields">

				<?php
				foreach ( acf_get_combined_field_type_settings_tabs() as $tab_key => $tab_label ) {
					$field_to_render = array(
						'type' => 'tab',
						'label' => $tab_label,
						'key' => 'acf_field_settings_tabs',
						'settings-type' => $tab_key,
					);

					if ( $tab_key === 'conditional_logic' ) {
						$field_to_render['label'] = __( 'Conditional Logic', 'acf' ) . '<i class="conditional-logic-badge' . $conditional_logic_class . '">' . $conditional_logic_text . '</i>';
					}

					acf_render_field_wrap( $field_to_render );
					?>
					<?php
					$wrapper_class = str_replace( '_', '-', $tab_key );
					?>
					<div class="acf-field-settings-main acf-field-settings-main-<?php echo esc_attr( $wrapper_class ); ?>">
						<?php
						switch ( $tab_key ) {
							case 'general':
								$field_type_select_class = 'field-type';
								if ( ! apply_filters( 'acf/field_group/enable_field_type_select2', true ) ) {
									$field_type_select_class .= ' disable-select2';
								}
								// type
								acf_render_field_setting(
									$input,
									array(
										'label' => __( 'Field Type', 'acf' ),
										'instructions' => '',
										'type' => 'select',
										'name' => 'type',
										'choices' => acf_get_grouped_field_types(),
										'class' => $field_type_select_class,
									),
									true
								);

								if ( apply_filters( 'acf/field_group/enable_field_browser', true ) ) {
									?>
									<div class="acf-field acf-field-setting-browse-fields"
										 data-append="type">
										<div class="acf-input">
											<button class="acf-btn browse-fields">
												<i class="acf-icon acf-icon-dots-grid"></i>
												<?php _e( 'Browse Fields', 'acf' ); ?>
											</button>
										</div>
									</div>
									<?php
								}

								// label
								acf_render_field_setting(
									$input,
									array(
										'label' => __( 'Field Label', 'acf' ),
										'instructions' => __( 'This is the name which will appear on the EDIT page', 'acf' ),
										'name' => 'label',
										'type' => 'text',
										'class' => 'field-label',
									),
									true
								);

								// name
								acf_render_field_setting(
									$input,
									array(
										'label' => __( 'Field Name', 'acf' ),
										'instructions' => __( 'Single word, no spaces. Underscores and dashes allowed', 'acf' ),
										'name' => 'name',
										'type' => 'text',
										'class' => 'field-name',
									),
									true
								);

								// 3rd party settings
								do_action( 'acf/render_field_settings', $input );
								do_action( "acf/field_group/render_field_settings_tab/{$tab_key}", $input );
								?>
								<div class="acf-field-type-settings"
									 data-parent-tab="<?php echo esc_attr( $tab_key ); ?>">
									<?php
									do_action( "acf/render_field_settings/type={$input['type']}", $input );
									do_action( "acf/field_group/render_field_settings_tab/{$tab_key}/type={$input['type']}", $input );
									do_action( "acf/render_field_{$tab_key}_settings/type={$input['type']}", $input );
									?>
								</div>
								<?php
								break;
							case 'validation':
								// required
								acf_render_field_setting(
									$input,
									array(
										'label' => __( 'Required', 'acf' ),
										'instructions' => '',
										'type' => 'true_false',
										'name' => 'required',
										'ui' => 1,
										'class' => 'field-required',
									),
									true
								);

								do_action( "acf/field_group/render_field_settings_tab/{$tab_key}", $input );
								?>
								<div class="acf-field-type-settings"
									 data-parent-tab="<?php echo esc_attr( $tab_key ); ?>">
									<?php
									do_action( "acf/field_group/render_field_settings_tab/{$tab_key}/type={$input['type']}", $input );
									do_action( "acf/render_field_{$tab_key}_settings/type={$input['type']}", $input );
									?>
								</div>
								<?php
								break;
							case 'presentation':
								acf_render_field_setting(
									$input,
									array(
										'label' => __( 'Instructions', 'acf' ),
										'instructions' => __( 'Instructions for authors. Shown when submitting data', 'acf' ),
										'type' => 'textarea',
										'name' => 'instructions',
										'rows' => 5,
									),
									true
								);

								acf_render_field_wrap(
									array(
										'label' => '',
										'instructions' => '',
										'type' => 'text',
										'name' => 'class',
										'prefix' => $input['prefix'] . '[wrapper]',
										'value' => $input['wrapper']['class'],
										'prepend' => __( 'class', 'acf' ),
										'wrapper' => array(
											'data-append' => 'wrapper',
										),
									),
									'div'
								);

								acf_render_field_wrap(
									array(
										'label' => '',
										'instructions' => '',
										'type' => 'text',
										'name' => 'id',
										'prefix' => $input['prefix'] . '[wrapper]',
										'value' => $input['wrapper']['id'],
										'prepend' => __( 'id', 'acf' ),
										'wrapper' => array(
											'data-append' => 'wrapper',
										),
									),
									'div'
								);

								do_action( "acf/field_group/render_field_settings_tab/{$tab_key}", $input );
								?>
								<div class="acf-field-type-settings"
									 data-parent-tab="<?php echo esc_attr( $tab_key ); ?>">
									<?php
									do_action( "acf/field_group/render_field_settings_tab/{$tab_key}/type={$input['type']}", $input );
									do_action( "acf/render_field_{$tab_key}_settings/type={$input['type']}", $input );
									?>
								</div>
								<?php

								acf_render_field_wrap(
									array(
										'label' => __( 'Wrapper Attributes', 'acf' ),
										'instructions' => '',
										'type' => 'number',
										'name' => 'width',
										'prefix' => $input['prefix'] . '[wrapper]',
										'value' => $input['wrapper']['width'],
										'prepend' => __( 'width', 'acf' ),
										'append' => '%',
										'wrapper' => array(
											'data-name' => 'wrapper',
											'class' => 'acf-field-setting-wrapper',
										),
									),
									'div'
								);
								break;
							case 'conditional_logic':
								acf_get_view( 'acf-field-group/conditional-logic', array( 'field' => $input ) );

								do_action( "acf/field_group/render_field_settings_tab/{$tab_key}", $input );
								?>
								<div class="acf-field-type-settings"
									 data-parent-tab="<?php echo esc_attr( $tab_key ); ?>">
									<?php
									do_action( "acf/field_group/render_field_settings_tab/{$tab_key}/type={$input['type']}", $input );
									do_action( "acf/render_field_{$tab_key}_settings/type={$input['type']}", $input );
									?>
								</div>
								<?php
								break;
							default:
								// Global action hook for custom tabs.
								do_action( "acf/field_group/render_field_settings_tab/{$tab_key}", $input );
								?>
								<div class="acf-field-type-settings"
									 data-parent-tab="<?php echo esc_attr( $tab_key ); ?>">
									<?php
									// Type-specific action hook for custom tabs.
									do_action( "acf/field_group/render_field_settings_tab/{$tab_key}/type={$input['type']}", $input );
									do_action( "acf/render_field_{$tab_key}_settings/type={$input['type']}", $input );
									?>
								</div>
							<?php
						}
						?>
					</div>
					<?php
				}

				?>
				<div class="acf-field-settings-footer">
					<a class="button close-field edit-field"
					   title="<?php _e( 'Close Field', 'acf' ); ?>"
					   href="#"><?php _e( 'Close Field', 'acf' ); ?></a>
				</div>
			</div>
		</div>
	</div>

</div>