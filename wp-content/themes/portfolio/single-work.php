<?php
/**
 * The template for displaying all work posts.
 *
 * @package portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area single-blog-post">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('wow animated fadeIn'); ?>>
			<header class="entry-header single-work-header">
    			<div class="grid grid-pad">
                    <div class="col-1-1">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                
                        <div class="entry-meta">
							<?php
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
                    	</div><!-- .entry-meta -->
                    </div><!-- .col-1-1 -->
				</div><!-- .grid -->
			</header><!-- .entry-header -->
            
    <div class="portfolio-slider">
    <?php the_post_thumbnail( 'full', array( 'class' => 'single-thumb' ) ); ?>
    </div><!-- .portfolio-slider -->
    
    <div class="grid grid-pad">
    	<div class="col-1-1">
			<div class="entry-content">
    
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
				<?php edit_post_link( __( 'Edit', 'portfolio' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
    	</div><!-- .col-1-1 -->
    </div><!-- .grid -->
</article><!-- #post-## -->


			<?php portfolio_post_nav(); ?>

			<div class="grid grid-pad wow animated fadeIn">
            	<div class="col-1-1">
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>
            	</div><!-- col-1-1 -->
            </div><!-- grid -->

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->  
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>