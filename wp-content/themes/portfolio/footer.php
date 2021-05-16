<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package portfolio
 */
?>

	</section><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="grid grid-pad">
        	<div class="col-1-1">
            
				<div class="socials">
                	<?php echo portfolio_media_icons(); // social icons ?> 
				</div><!-- socials -->
        	
            	<div class="site-info">
					<?php if ( get_theme_mod( 'portfolio_footerid' ) ) : ?> 
        				<?php echo get_theme_mod( 'portfolio_footerid' ); // footer id ?>  
					<?php else : ?>  
    					<?php	printf( __( 'Theme: %1$s by %2$s', 'portfolio' ), 'portfolio', '<a href="http://modernthemes.net" rel="designer">modernthemes.net</a>' ); ?> 
					<?php endif; ?> 
			</div><!-- .site-info -->
            
            </div><!-- col-1-1 -->
        </div><!-- grid -->
	</footer><!-- #colophon --> 
     
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
