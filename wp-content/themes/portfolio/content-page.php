<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('wow animated fadeIn'); ?>>
	      
    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title default-color">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'portfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
