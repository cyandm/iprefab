<?php
$personal_info = [ [ 
	'name' => 'full_name',
	'type' => 'text',
	'label' => __( 'Full Name', 'cyn-dm' ),
	'is_required' => true,
	'action' => false
], [ 
	'name' => 'email',
	'type' => 'mail',
	'label' => __( 'Email', 'cyn-dm' ),
	'is_required' => true,
	'action' => false
], [ 
	'name' => 'phone',
	'type' => 'tel',
	'label' => __( 'Phone', 'cyn-dm' ),
	'is_required' => false,
	'action' => false
],
];

$get_advice = [ 
	[ 
		'name' => 'price',
		'type' => 'number',
		'label' => __( 'Price', 'cyn-dm' ),
		'is_required' => false,
		'action' => 'dollar-circle'
	],
	[ 
		'name' => 'city',
		'type' => 'select',
		'options' => [],
		'label' => __( 'City', 'cyn-dm' ),
		'is_required' => true,
		'action' => 'chevron-down'
	],
];

$form_sections = [ 
	[ 
		'label' => __( 'Personal Info', 'cyn-dm' ),
		'inputs' => $personal_info,
	],
	[ 
		'label' => __( 'Get Advice For', 'cyn-dm' ),
		'inputs' => $get_advice,
	]
];

$looking_for = [ 
	__( 'house', 'cyn-dm' ),
	__( 'house + land', 'cyn-dm' )
];

$house_type = [ 
	__( 'house', 'cyn-dm' ),
	__( 'villa', 'cyn-dm' ),
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
	<form action=""
		  class="form">
		<div class="form_header">
			<i class="iconsax"
			   id="contactFormPopupCloser"
			   icon-name="x-circle"></i>

			<h4><?php _e( 'Contact IPREFAB', 'cyn-dm' ) ?></h4>

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
								   name="full_name"
						   		<?php echo $input['is_required'] ? 'required' : '' ?>
								   id="full_name">

							<?php if ( $input['action'] !== '' ) : ?>
								<span class="input-action">
									<i class="iconsax"
									   icon-name="<?php echo $input['action'] ?>"></i>
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
								   name="<?php echo $input ?>">
							<span><?php echo $input ?></span>


						</div>
					<?php endforeach; ?>

				</div>

			</div>

		<?php endforeach; ?>



		<input type="submit"
			   class="btn-primary btn-small">

	</form>
</div>