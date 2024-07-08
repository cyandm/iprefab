<?php
$personal_info = [ [ 
	'name' => 'full_name',
	'type' => 'text',
	'class' => '',
	'label' => pll__( 'Full Name' ),
	'is_required' => true,
	'action' => false
], [ 
	'name' => 'email',
	'type' => 'mail',
	'class' => '',
	'label' => pll__( 'Email' ),
	'is_required' => true,
	'action' => false
], [ 
	'name' => 'phone',
	'type' => 'number',
	'class' => '',
	'label' => pll__( 'Phone' ),
	'is_required' => false,
	'action' => false
],
];

$get_advice = [ 
	[ 
		'name' => 'price',
		'type' => 'number',
		'class' => '',
		'label' => pll__( 'Price' ),
		'is_required' => true,
		'action' => '€'
	],
	[ 
		'name' => 'city',
		'type' => 'select',
		'class' => 'city-select-2',
		'options' => [],
		'label' => pll__( 'City' ),
		'is_required' => true,
		'action' => '<i class="iconsax" icon-name="chevron-down"></i>'
	],
];

$form_sections = [ 
	[ 
		'label' => pll__( 'Personal Info' ),
		'inputs' => $personal_info,
	],
	[ 
		'label' => pll__( 'Get Advice For' ),
		'inputs' => $get_advice,
	]
];

$looking_for = [ 
	[ 
		'name' => 'looking-for-house',
		'label' => pll__( 'house' ),
	],
	[ 
		'name' => 'looking-for-house-plus-land',
		'label' => pll__( 'house + land' ),
	],
];

$house_type = [ 
	[ 
		'name' => 'type-house',
		'label' => pll__( 'house'),
	],
	[ 
		'name' => 'type-villa',
		'label' => pll__( 'villa' ),
	],
];


$checklist_sections = [ 
	[ 
		'label' => pll__( 'you looking for ... ' ),
		'inputs' => $looking_for,
	],
	[ 
		'label' => pll__( 'house type' ),
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

			<h4><?php pll_e( 'Contact IPREFAB' ) ?></h4>

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