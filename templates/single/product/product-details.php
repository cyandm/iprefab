<?php
$company = get_the_terms( get_queried_object_id(), 'company' )[0];
$company_logo = wp_get_attachment_image(
	get_field( 'logo', 'company_' . $company->term_id ),
	[ 300, 300 ] );

$product_details = [ 
	[ 
		'name' => 'company verification type',
		'value' => ''
	],
	[ 
		'name' => 'age of compony',
		'value' => ''
	],
	[ 
		'name' => 'logo',
		'value' => $company_logo
	],
	[ 
		'name' => 'material',
		'value' => get_field( 'material' )
	],
	[ 
		'name' => 'total area',
		'value' => ''
	],
	[ 
		'name' => 'house area',
		'value' => ''
	],
	[ 
		'name' => 'storage',
		'value' => ''
	],
	[ 
		'name' => 'balcony',
		'value' => ''
	],
	[ 
		'name' => 'garage',
		'value' => ''
	],
	[ 
		'name' => 'kitchen appliances',
		'value' => ''
	],
	[ 
		'name' => 'bathroom appliances',
		'value' => ''
	],
	[ 
		'name' => 'celling style',
		'value' => ''
	],
	[ 
		'name' => 'façade / material',
		'value' => ''
	],
	[ 
		'name' => 'garage (open or close)',
		'value' => ''
	],
];

?>


<div class="product-details">
	<h4>Details</h4>

	<div class="product-details-wrapper">
		<div class="product-table-secondary">
			<?php foreach ( $product_details as $row ) : ?>
				<div class="product-table-secondary-row">
					<div class="product-table-secondary-name">
						<?= $row['name'] ?>
					</div>
					<div class="product-table-secondary-value">
						<?= $row['value'] ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="product-cta">
			<h4>forward to bank</h4>
			<div class="img-wrapper">
				<img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/bank.png' ?>"
					 alt="bank">
			</div>
			<p class="product-cta-description | body-s">
				Designed to be open and spacious, the impressive hillside house sits diagonally to the slope, which
				creates an architecturally individual and fascinating look for the home. The entrance to the home is on
				the side of the upper slope.
			</p>

			<div class="input-wrapper-checkbox">
				<input type="checkbox"
					   class="input-medium">
				<p>
					I accept have a land for this house
				</p>
			</div>

			<button class="btn-primary btn-full"
					disabled>
				Order a bank request
			</button>
		</div>
	</div>
</div>