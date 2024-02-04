<?php
$product_file = isset( $_GET['product_file'] );
$land_file = isset( $_GET['land_file'] );

?>

<h1>
	Import By Excel
</h1>

<?php if ( $product_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p>Products Uploaded. <a href="<?= admin_url( 'edit.php?post_type=product' ) ?>">View</a></p>
	</div>
<?php endif; ?>

<?php if ( $land_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p>Lands Uploaded. <a href="<?= admin_url( 'edit.php?post_type=land' ) ?>">View</a></p>
	</div>
<?php endif; ?>

<form action="<?= admin_url( 'admin.php' ); ?>"
	  enctype="multipart/form-data"
	  method="POST">
	<input type="hidden"
		   name="action"
		   value="cyn_import" />
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">Import lands</th>
				<td>
					<input name="lands"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th scope="row">Import Products</th>
				<td>
					<input name="products"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th>
					<button type="submit"
							class="button button-primary">
						Upload Files
					</button>
				</th>
			</tr>
		</tbody>
	</table>
</form>