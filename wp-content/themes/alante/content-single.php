<?php
/**
 * The Single Post content template file.
 *
 * @package ThinkUpThemes
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php thinkup_input_postmedia(); ?>
		<?php alante_thinkup_input_postmeta(); ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alante' ), 'after'  => '</div>', ) ); ?>
		</div><!-- .entry-content -->

		</article>

		<div class="clearboth"></div>