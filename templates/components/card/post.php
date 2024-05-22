<?php
$post_id = $args['post_id'] ?? get_the_ID();
$rel = $args['rel'] ?? 'dofollow';

$image = get_the_post_thumbnail( $post_id ) != '' ?
	get_the_post_thumbnail( $post_id ) :
	"<img src=\"" . get_stylesheet_directory_uri() . "/assets/imgs/placeholder.webp \"></img>";

?>

<a href="<?= get_permalink( $post_id ) ?>"
   rel="<?= $rel ?>">
	<article class="post-card">
		<div class="post-card-thumb">
			<?= $image ?>
		</div>

		<div class="post-card-content">
			<h5>
				<?= get_the_title( $post_id ) ?>
			</h5>

			<p>
				<?= str_split( get_the_excerpt( $post_id ), '60' )[0] . '...' ?>
			</p>

			<?php cyn_render_icon_box( 'calendar-2', date_format( get_post_datetime( $post_id ), 'Y/m/d' ) ) ?>
		</div>

	</article>
</a>