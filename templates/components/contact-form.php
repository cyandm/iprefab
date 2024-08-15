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

$get_advice = [ 
	[ 
		'name' => 'price',
		'type' => 'number',
		'class' => '',
		'label' => __( 'price' , 'cyn-dm'),
		'is_required' => true,
		'action' => '€'
	],
	[ 
		'name' => 'city',
		'type' => 'select',
		'class' => 'city-select-2',
		'options' => [],
		'label' => __( 'city', 'cyn-dm' ),
		'is_required' => true,
		'action' => '<i class="iconsax" icon-name="chevron-down"></i>'
	],
];

$form_sections = [ 
	[ 
		'label' => __( 'personal info', 'cyn-dm' ),
		'inputs' => $personal_info,
	],
	[ 
		'label' => __( 'get advice for' , 'cyn-dm'),
		'inputs' => $get_advice,
	]
];

$looking_for = [ 
	[ 
		'name' => 'looking-for-house',
		'label' => __( 'house' , 'cyn-dm'),
	],
	[ 
		'name' => 'looking-for-house-plus-land',
		'label' => __( 'house + land' , 'cyn-dm'),
	],
];

$house_type = [ 
	[ 
		'name' => 'type-house',
		'label' => __( 'house', 'cyn-dm'),
	],
	[ 
		'name' => 'type-villa',
		'label' => __( 'villa' , 'cyn-dm'),
	],
];


$checklist_sections = [ 
	[ 
		'label' => __( 'you looking for ... ', 'cyn-dm' ),
		'inputs' => $looking_for,
	],
	[ 
		'label' => __( 'house type', 'cyn-dm' ),
		'inputs' => $house_type,
	]
]


	?>

<div class="form-wrapper"
	 id="contactFormPopUp">
	<form class="form">
		<div class="form_header">
			<i class="iconsax"
			   id="contactFormPopupCloser"
			   icon-name="x-circle"></i>

			<h4><?php _e( 'contact iprefab' , 'cyn-dm') ?></h4>

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
										<?php echo $input['label'] ?>
										<?php echo $input['is_required'] ? ' *' : '' ?>
									</span>

									<input type="<?php echo $input['type'] ?>"
										   class="<?php echo $input['class'] ?>"
										   name="<?php echo $input['name'] ?>"
								   		<?php echo $input['is_required'] ? 'required' : '' ?>
										   id="<?php echo $input['name'] ?>">

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