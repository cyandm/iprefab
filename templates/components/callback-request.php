<?php
$personal_info = [ [ 
	'name' => 'full_name',
	'type' => 'text',
	'class' => '',
	'label' => __( 'full name', 'cyn-dm' ),
	'is_required' => true,
	'action' => false
], [ 
	'name' => 'email',
	'type' => 'mail',
	'class' => '',
	'label' => __( 'email' , 'cyn-dm'),
	'is_required' => true,
	'action' => false
], [ 
	'name' => 'phone',
	'type' => 'number',
	'class' => '',
	'label' => __( 'phone' , 'cyn-dm'),
	'is_required' => false,
	'action' => false
],
];

$white_castle = [ 
	[ 
		'name' => 'description',
		'type' => 'textarea',
		'class' => '',
		'label' => __( 'description' , 'cyn-dm'),
		'is_required' => false,
		'action' => false
	],
];

$form_sections = [ 
	[ 
		'label' => __( 'personal info', 'cyn-dm' ),
		'inputs' => $personal_info,
	]
];

$looking_for = [ 
	[ 
		'name' => 'looking-for-customization',
		'label' => __( 'customization' , 'cyn-dm'),
	],
	[ 
		'name' => 'looking-for-house-details',
		'label' => __( 'house details', 'cyn-dm' ),
	],
];

$reach_type = [ 
	[ 
		'name' => 'type-call',
		'label' => __( 'call' , 'cyn-dm'),
	],
	[ 
		'name' => 'type-email',
		'label' => __( 'email' , 'cyn-dm'),
	],
];


$checklist_sections = [ 
	[ 
		'label' => __( 'i\'m looking for ...' , 'cyn-dm'),
		'inputs' => $looking_for,
	],
	[ 
		'label' => __( 'how we can reach you?' , 'cyn-dm'),
		'inputs' => $reach_type,
	]
]

	?>

<div class="form-wrapper"
	 id="callBackPopUp">
	<form class="form">
		<div class="form_header">
			<i class="iconsax"
			   id="callBackPopupCloser"
			   icon-name="x-circle"></i>

			<h4><?php _e( 'Contact Iprefab' , 'cyn-dm') ?></h4>

			<span></span>
		</div>

		<?php foreach ( $form_sections as $section ) : ?>

			<div class="form_section">
				<h4><?php echo $section['label'] ?></h4>

				<div class="d-grid gap-16">
					<?php foreach ( $section['inputs'] as $input ) : ?>
						<label for="<?php echo $input['name'] ?>"
							   class="input-wrapper">

							<span class="input-label">
								<?php echo $input['is_required'] ? $input['label'] . ' *' : $input['label']  ?>
							</span>

							<?php if ( $input['type'] === 'textarea' ) : ?>
								<textarea></textarea>

							<?php else : ?>
								<input type="<?php echo $input['type'] ?>"
									   class="<?php echo $input['class'] ?>"
									   name="<?php echo $input['name'] ?>"
						   			<?php echo $input['is_required'] ? 'required' : '' ?>
									   id="<?php echo $input['name'] ?>" />
							<?php endif; ?>



							<?php if ( $input['action'] !== '' ) : ?>
								<span class="input-action">
									<?php echo $input['action'] ?>
								</span>
							<?php endif; ?>
						</label>
					<?php endforeach; ?>
				</div>
			</div>

		<?php endforeach; ?>

		<?php foreach ( $checklist_sections as $section ) : ?>

			<div class="form_checklist">
				<h3><?php echo $section['label'] ?></h3>

				<div>

					<?php foreach ( $section['inputs'] as $input ) : ?>
						<div class="input-wrapper-checkbox">

							<input type="checkbox"
								   class="input-medium"
								   name="<?php echo $input['name'] ?>">
							<span><?php echo $input['label'] ?></span>


						</div>
					<?php endforeach; ?>

				</div>

			</div>

		<?php endforeach; ?>


		<input type="submit"
			   class="btn-primary btn-small">
	</form>


</div>