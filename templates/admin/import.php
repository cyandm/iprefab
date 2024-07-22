<?php
$house_file = isset( $_GET['house_file'] );
$land_file = isset( $_GET['land_file'] );
$company_file = isset( $_GET['company_file'] );

?>

<h1>
	<?php pll_e( 'Import By Excel' ) ?>
</h1>

<?php if ( $house_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p><?php pll_e( 'Houses Uploaded.' ) ?>
			<a href="<?= admin_url( 'edit.php?post_type=house' ) ?>">
				<?php pll_e( 'View' ) ?>
			</a>
		</p>
	</div>
<?php endif; ?>

<?php if ( $land_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p><?php pll_e( 'Lands Uploaded.' ) ?> <a
			   href="<?= admin_url( 'edit.php?post_type=land' ) ?>"><?php pll_e( 'View' ) ?></a></p>
	</div>
<?php endif; ?>

<?php if ( $company_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p><?php pll_e( 'Companies Uploaded.' ) ?> <a
			   href="<?= admin_url( 'edit-tags.php?taxonomy=company' ) ?>"><?php pll_e( 'View' ) ?></a></p>
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
				<th scope="row"><?php pll_e( 'Import lands' ) ?></th>
				<td>
					<input name="lands"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th scope="row"><?php pll_e( 'Import House' ) ?></th>
				<td>
					<input name="house"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th scope="row"><?php pll_e( 'Import Company' ) ?></th>
				<td>
					<input name="company"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th>
					<button type="submit"
							class="button button-primary">
						<?php pll_e( 'Upload Files' ) ?>
					</button>
				</th>
			</tr>
		</tbody>
	</table>
</form>