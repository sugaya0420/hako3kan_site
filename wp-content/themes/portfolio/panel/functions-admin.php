<?php
/**
 * portfolio admin functions
 *
 * @package portfolio 
 */

// admin area styling
function custom_colors() {
   echo '<style type="text/css">
          #setting-error-tgmpa {
			border-left: 4px solid #37b492;
			background: url(http://modernthemes.net/wp-content/uploads/2014/11/default_bg.png) repeat repeat #fff;
			padding: 15px 20px;
			}
		  #setting-error-tgmpa p {
			font-size: 14px;
			font-weight: 300 !important; 
			color: #404040;
			margin: 0; 
		  }
		  #setting-error-tgmpa p strong {
			font-weight: 300 !important;
		  }
		  #setting-error-tgmpa p strong a {
			font-size: 14px !important;
			text-decoration: none !important;
			color: #37b492 !important;
			font-weight: 600 !important;
		  }
			
         </style>';
}

add_action('admin_head', 'custom_colors');


/**
 *TGM Plugin activation.
 */
require_once get_template_directory() . '/panel/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'portfolio_recommend_plugin' );
function portfolio_recommend_plugin() { 
 
    $plugins = array(
        // Include plugin from the WordPress Plugin Repository 
		array(
			'name'		=> 'TinyMCE Advanced', // http://wordpress.org/plugins/tinymce-advanced/
			'slug'		=> 'tinymce-advanced',
			'required'	=> false
		),
		
		array(
			'name'		=> 'Black Studio TinyMCE Widget', // http://wordpress.org/plugins/black-studio-tinymce-widget/
			'slug'		=> 'black-studio-tinymce-widget',
			'required'	=> false
		),
		
		array(
			'name'		=> 'Shortcodes Ultimate', // http://wordpress.org/plugins/shortcodes-ultimate/
			'slug'		=> 'shortcodes-ultimate',
			'required'	=> false
		),
		
		array(
			'name'		=> 'WordPress SEO', // http://wordpress.org/plugins/wordpress-seo/
			'slug'		=> 'wordpress-seo',
			'required'	=> false
		)        
    );
 
    tgmpa( $plugins);
 
}
