<?php
$house_file = isset( $_GET['house_file'] );
$land_file = isset( $_GET['land_file'] );
$company_file = isset( $_GET['company_file'] );

?>

<h1>
	Import By Excel
</h1>

<?php if ( $house_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p>Houses Uploaded. <a href="<?= admin_url( 'edit.php?post_type=house' ) ?>">View</a></p>
	</div>
<?php endif; ?>

<?php if ( $land_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p>Lands Uploaded. <a href="<?= admin_url( 'edit.php?post_type=land' ) ?>">View</a></p>
	</div>
<?php endif; ?>

<?php if ( $company_file ) : ?>
	<div class="notice notice-success is-dismissible">
		<p>Companies Uploaded. <a href="<?= admin_url( 'edit-tags.php?taxonomy=company' ) ?>">View</a></p>
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
				<th scope="row">Import House</th>
				<td>
					<input name="house"
						   type="file"
						   accept="xlsx" />
				</td>
			</tr>

			<tr>
				<th scope="row">Import Company</th>
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
						Upload Files
					</button>
				</th>
			</tr>
		</tbody>
	</table>
</form>