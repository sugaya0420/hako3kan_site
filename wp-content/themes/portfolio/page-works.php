<?php
/**
Template Name: Works Archive
 *
 * @package portfolio
 */

get_header(); ?>

    
	<div id="primary" class="content-area works-page">
		<main id="main" class="site-main" role="main">     

			<div class="grid grid-pad">
				<div class="col-1-1">       
    				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title default-color">', '</h1>' ); ?>
					</header><!-- .entry-header -->
				</div><!-- .col-1-1 -->
			</div><!-- .grid -->
        
        	<div class="grid grid-pad">
				<?php query_posts( array ( 'post_type' => 'work', 'posts_per_page' => -1 ) );
			
				while ( have_posts() ) : the_post(); ?> 

					<?php get_template_part( 'content', 'works' ); ?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- .grid -->
		</main><!-- #main -->
	</div><!-- #primary --> 
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
