<?php
/**
 * The template used for displaying page content in page-works.php
 *
 * @package portfolio
 */
?>

<div class="col-1-3">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
    		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-square'); ?></a>
        	<hr class="line" />
			<h4><?php the_title(); ?></h4>
        
        	<p class="works-meta">	<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'portfolio' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'portfolio' ) );

			if ( ! portfolio_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( '%2$s', 'portfolio' );
				} else {
					$meta_text = __( '', 'portfolio' );
				}
			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '%1$s %2$s', 'portfolio' );
				} else {
					$meta_text = __( '%1$s', 'portfolio' );
				}
			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
			?>
			</p><!-- .works-meta -->
	
    	</div><!-- .entry-content -->
    
	</article><!-- #post-## -->
</div><!-- col-1-3 --> 