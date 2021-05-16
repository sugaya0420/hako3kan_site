<?php
/**
 * @package portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('wow animated fadeIn'); ?>>
	<header class="entry-header">
    	<div class="grid grid-pad">
    		<div class="col-1-1">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
				<div class="entry-meta">
					<?php portfolio_posted_on(); ?>
				</div><!-- .entry-meta -->
        	</div><!-- .col-1-1 -->
		</div><!-- .grid -->
	</header><!-- .entry-header -->
    
    <div class="grid grid-pad">
    	<div class="col-1-1">
			<div class="entry-content">
    
   				<?php the_post_thumbnail( 'full', array( 'class' => 'single-thumb' ) ); ?>
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'portfolio' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
    	</div><!-- .col-1-1 -->
    </div><!-- .grid -->
    
    <div class="grid grid-pad">
    	<div class="col-1-1">
			<footer class="entry-footer">
				<?php
					/* translators: used between list items, there is a space after the comma */
					$category_list = get_the_category_list( __( ', ', 'portfolio' ) );

					/* translators: used between list items, there is a space after the comma */
					$tag_list = get_the_tag_list( '', __( ', ', 'portfolio' ) );

					if ( ! portfolio_categorized_blog() ) {
						// This blog only has 1 category so we just need to worry about tags in the meta text
						if ( '' != $tag_list ) {
							$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'portfolio' );
						} else {
							$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'portfolio' );
						}
					} else {
						// But this blog has loads of categories so we should probably display them here
						if ( '' != $tag_list ) {
							$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'portfolio' );
						} else {
							$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'portfolio' );
						}
					} // end check for categories on this blog

					printf(
						$meta_text,
						$category_list,
						$tag_list,
						get_permalink()
					);
				?>

				<?php edit_post_link( __( 'Edit', 'portfolio' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
    	</div><!-- .col-1-1 --> 
    </div><!-- .grid --> 

</article><!-- #post-## -->
