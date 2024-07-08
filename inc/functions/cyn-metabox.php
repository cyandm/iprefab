<?php
add_action( 'add_meta_boxes', 'cyn_form_meta_box' );

add_filter( 'manage_form_posts_columns', 'cyn_form_table_head' );
add_action( 'manage_form_posts_custom_column', 'cyn_form_table_column', 10, 2 );

$meta = [ 
	[ 
		'name' => 'phone',
		'label' => pll__( 'phone', 'cyn-dm' ),
	],
	[ 
		'name' => 'email',
		'label' => pll__( 'email', 'cyn-dm' ),
	],
	[ 
		'name' => 'house',
		'label' => pll__( 'house', 'cyn-dm' ),
	],
	[ 
		'name' => 'price',
		'label' => pll__( 'price', 'cyn-dm' ),
	],
	[ 
		'name' => 'city',
		'label' => pll__( 'city', 'cyn-dm' ),
	],
	[ 
		'name' => 'type-house',
		'label' => pll__( 'house', 'cyn-dm' ),
	],
	[ 
		'name' => 'type-villa',
		'label' => pll__( 'villa', 'cyn-dm' ),
	],
	[ 
		'name' => 'looking-for-house',
		'label' => pll__( 'house', 'cyn-dm' ),
	],
	[ 
		'name' => 'looking-for-house-plus-land',
		'label' => pll__( 'house + land', 'cyn-dm' ),
	],



];

function cyn_form_meta_box() {
	add_meta_box( 'information', pll__( 'information', 'cyn-dm' ), function () {
		global $post, $meta;
		?>
		<table>


			<?php
			foreach ( $meta as $meta_item ) :
				if ( get_post_meta( $post->ID, $meta_item['name'], true ) ) :
					?>
					<tr>
						<td colspan="6"><?= $meta_item['label'] ?></td>
						<td colspan="6"><?= get_post_meta( $post->ID, $meta_item['name'], true ) ?></td>
					</tr>

					<?php
				endif;
			endforeach;
			?>


		</table>
		<?php

	}, 'form', 'advanced', 'high' );
}

function cyn_form_table_head( $columns ) {
	$columns['phone'] = pll__( 'phone', 'cyn-dm' );
	$columns['email'] = pll__( 'email', 'cyn-dm' );
	return $columns;
}

function cyn_form_table_column( $column_name, $post_id ) {
	if ( $column_name == 'phone' ) {
		echo get_post_meta( $post_id, 'phone', true );
	}

	if ( $column_name == 'email' ) {
		echo get_post_meta( $post_id, 'email', true );
	}
}