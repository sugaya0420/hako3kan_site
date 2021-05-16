<?php
/**
 * @package portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('wow animated fadeIn'); ?>>
<div class="grid grid-pad">
	<div class="col-1-1">
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php portfolio_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
    
    

	<div class="entry-content">
    	<?php
				if ( 'option2' == portfolio_sanitize_index_content( get_theme_mod( 'portfolio_post_content' ) ) ) :
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'portfolio' ) );
				else :
				the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'portfolio' ) );
				endif; 
		?>
    	 
		<?php  /*$content = get_the_content(); $trimmed_content = wp_trim_words( $content, 40, '<a href="'. get_permalink() .'"> ...Read More</a>' ); echo $trimmed_content;  */?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'portfolio' ), 
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'portfolio' ) );
				if ( $categories_list && portfolio_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'portfolio' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'portfolio' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'portfolio' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'portfolio' ), __( '1 Comment', 'portfolio' ), __( '% Comments', 'portfolio' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
    
    </div><!-- col-1-1 -->
</div><!-- grid -->
</article><!-- #post-## -->