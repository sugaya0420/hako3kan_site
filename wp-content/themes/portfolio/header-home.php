<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package portfolio
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php add_action( 'wp_enqueue_scripts', 'portfolio_scripts' ); ?>
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_144') ) : ?>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('apple_touch_144')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_114') ) : ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('apple_touch_114')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_72') ) : ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('apple_touch_72')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_57') ) : ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('apple_touch_57')); ?>" />
<?php endif; ?> 
<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'portfolio' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding home-branding"> 
			
            <?php if ( get_theme_mod( 'portfolio_logo' ) ) : ?>     
    				<div class="site-logo"> 
       					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'portfolio_logo' ) ); ?>' <?php if ( get_theme_mod( 'logo_size' ) ) : ?>width="<?php echo get_theme_mod( 'logo_size' ); ?>"<?php endif; ?> alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a> 
    				</div><!-- site-logo -->
				<?php else : ?>
    				<hgroup> 
       					<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
    				</hgroup>
				<?php endif; ?> 
            
		</div><!-- site-branding -->  

	    <div class="navigation-container home-navigation-container"> 			
            <button class="toggle-menu menu-right push-body"><span class="hide-on-mobile">Menu</span> <i class="fa fa-bars fa-2x"></i></button>       
        </div><!-- navigation-container --> 	
    
    </header><!-- #masthead -->        
    
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">	
    	<h3>Menu</h3>	
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?> 
    </nav>	
            
            
    <section id="content" class="site-content">
