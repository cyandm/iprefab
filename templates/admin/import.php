<?php
$house_file = isset( $_GET['house_file'] );
$land_file = isset( $_GET['land_file'] );
$company_file = isset( $_GET['company_file'] );

?>

<h1>
	<?php _e( 'Import By Excel', 'cyn-dm' ) ?>
</h1>

<?php if ( $house_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p><?php _e( 'Houses Uploaded.', 'cyn-dm' ) ?>
			<a href="<?= admin_url( 'edit.php?post_type=house' ) ?>">
				<?php _e( 'View', 'cyn-dm' ) ?>
			</a>
		</p>
	</div>
<?php endif; ?>

<?php if ( $land_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p><?php _e( 'Lands Uploaded.', 'cyn-dm' ) ?> <a
			   href="<?= admin_url( 'edit.php?post_type=land' ) ?>"><?php _e( 'View', 'cyn-dm' ) ?></a></p>
	</div>
<?php endif; ?>

<?php if ( $company_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p><?php _e( 'Companies Uploaded.', 'cyn-dm' ) ?> <a
			   href="<?= admin_url( 'edit-tags.php?taxonomy=company' ) ?>"><?php _e( 'View', 'cyn-dm' ) ?></a></p>
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
				<th scope="row"><?php _e( 'Import lands', 'cyn-dm' ) ?></th>
				<td>
					<input name="lands"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'Import House', 'cyn-dm' ) ?></th>
				<td>
					<input name="house"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e( 'Import Company', 'cyn-dm' ) ?></th>
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
						<?php _e( 'Upload Files', 'cyn-dm' ) ?>
					</button>
				</th>
			</tr>
		</tbody>
	</table>
</form>