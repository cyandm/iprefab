<?php
$rel = $args['rel'] ?? 'dofollow';

$image = get_the_post_thumbnail() != '' ?
	get_the_post_thumbnail() :
	"<img src=\"" . get_stylesheet_directory_uri() . "/assets/imgs/placeholder.webp \"></img>";

?>

<a href="<?= get_permalink() ?>"
   rel="<?= $rel ?>">
	<article class="post-card">
		<div class="post-card-thumb">
			<?= $image ?>
		</div>

		<div class="post-card-content">
			<h5>
				<?= get_the_title() ?>
			</h5>

			<p>
				<?= str_split( get_the_excerpt(), '60' )[0] . '...' ?>
			</p>

			<?php cyn_render_icon_box( 'calendar-2', date_format( get_post_datetime(), 'Y/m/d' ) ) ?>
		</div>

	</article>
</a>