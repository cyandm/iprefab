<?php
$primary_data = [ 
	[ 
		'icon' => 'money-4',
		'text' => 'fee',
		'value' => '€' . number_format( get_field( 'helsinki_price' ) ),
	],
	[ 
		'icon' => 'location',
		'text' => 'location',
		'value' => 'location',
	],
	[ 
		'icon' => 'home-2',
		'text' => 'house area',
		'value' => '<span>' . get_field( 'apartment_area' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'size',
		'text' => 'total area',
		'value' => '<span>' . get_field( 'total_area' ) . '</span>' . '<span class="unit">m<sup>2</sup></span>',
	],
	[ 
		'icon' => 'box-x',
		'text' => 'rooms',
		'value' => get_field( 'rooms' ),
	],
	[ 
		'icon' => 'layers-1',
		'text' => 'floors',
		'value' => get_field( 'number_of_floors' ),
	],

];




?>


<div class="product-primary-info">

	<p class="h4">
		Primary
	</p>

	<div class="product-table-primary">
		<?php foreach ( $primary_data as $key => $data ) : ?>
			<div class="product-feature-box">
				<div class="product-feature-top">
					<i class="iconsax"
					   icon-name="<?= $data['icon'] ?>"></i>
					<span class="caption"><?= $data['text'] ?></span>
				</div>
				<div class="product-feature-value">
					<span class="caption"><?= $data['value'] ?></span>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</div>