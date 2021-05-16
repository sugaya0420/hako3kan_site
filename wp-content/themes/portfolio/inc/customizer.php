<?php
/**
 * portfolio Theme Customizer
 *
 * @package portfolio
 */
 
function portfolio_theme_customizer( $wp_customize ) {
	
	//allows donations
    class portfolio_Info extends WP_Customize_Control { 
     
        public $label = '';
        public function render_content() { 
        ?>

        <?php
        }
    }	
	
	// Donations
    $wp_customize->add_section(
        'portfolio_theme_info',
        array(
            'title' => __('Like Portfolio? Help Us Out.', 'portfolio'), 
            'priority' => 5,
            'description' => __('We do all we can do to make all our themes free for you. While we enjoy it, and it makes us happy to help out, a little appreciation can help us to keep theming.</strong><br/><br/> Please help support our mission and continued development with a donation of $5, $10, $20, or if you are feeling really kind $100..<br/><br/> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LMGYAZW9C5GE" target="_blank" rel="nofollow"><img class="" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation to ModernThemes" /></a>'), 
        )
    );  
	 
    //Donations section
    $wp_customize->add_setting('portfolio_help', array(   
			'sanitize_callback' => 'portfolio_no_sanitize', 
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new portfolio_Info( $wp_customize, 'portfolio_help', array(
        'section' => 'portfolio_theme_info', 
        'settings' => 'portfolio_help', 
        'priority' => 10
        ) )
    ); 
	
	// Fonts  
    $wp_customize->add_section(
        'portfolio_typography',
        array(
            'title' => __('Google Fonts', 'portfolio' ),  
            'priority' => 39,
        )
    );
	
    $font_choices =  
        array(
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville', 
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'portfolio_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Libre Baskerville is the default Heading font.', 'portfolio'),
            'section' => 'portfolio_typography',
            'choices' => $font_choices
        )
    );
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'portfolio_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Libre Baskerville is the default Body font.', 'portfolio' ), 
            'section' => 'portfolio_typography',  
            'choices' => $font_choices
        ) 
    ); 

	// Colors
    $wp_customize->add_setting( 'portfolio_link_color', array( 
        'default'     => '',   
        'sanitize_callback' => 'sanitize_hex_color', 
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_link_color', array(
        'label'	   => 'Link Color', 
        'section'  => 'colors',
        'settings' => 'portfolio_link_color',
		'priority' => 3 
    ) ) );
	
	$wp_customize->add_setting( 'portfolio_hover_color', array(
        'default'     => '',   
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_hover_color', array(
        'label'	   => 'Hover Color', 
        'section'  => 'colors',
        'settings' => 'portfolio_hover_color',
		'priority' => 4  
    ) ) );
	
	$wp_customize->add_setting( 'portfolio_custom_color', array( 
        'default'     => '', 
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_custom_color', array(
        'label'	   => 'Theme Color',
        'section'  => 'colors',
        'settings' => 'portfolio_custom_color', 
		'priority' => 1
    ) ) );
	
	$wp_customize->add_setting( 'portfolio_custom_color_hover', array( 
        'default'     => '', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_custom_color_hover', array(
        'label'	   => 'Theme Hover Color',
        'section'  => 'colors',
        'settings' => 'portfolio_custom_color_hover', 
		'priority' => 2
    ) ) );
	
	//Animations
	$wp_customize->add_section( 'portfolio_animations' , array(  
	    'title'       => __( 'Animations', 'portfolio' ),
	    'priority'    => 22, 
	    'description' => 'We can make things fly across the screen.',
	) );
	
    $wp_customize->add_setting(
        'portfolio_animate',
        array(
            'sanitize_callback' => 'portfolio_sanitize_checkbox',
            'default' => 0,
        )       
    );
    $wp_customize->add_control( 
        'portfolio_animate',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box if you want to disable the animations.', 'portfolio'),
            'section' => 'portfolio_animations',  
            'priority' => 1,           
        )
    );

    // Logo upload
    $wp_customize->add_section( 'portfolio_logo_section' , array(  
	    'title'       => __( 'Logo and Icons', 'portfolio' ),
	    'priority'    => 21, 
	    'description' => 'Upload a logo to replace the default site name and description in the header. Also, upload your site favicon and Apple Icons.',
	) );

	$wp_customize->add_setting( 'portfolio_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'portfolio_logo', array(
		'label'    => __( 'Logo', 'portfolio' ),
		'section'  => 'portfolio_logo_section', 
		'settings' => 'portfolio_logo',
		'priority' => 1,
	) ) ); 
	
	// Logo Width
	$wp_customize->add_setting( 'logo_size', array(
		'default'	        => '200',
		'sanitize_callback' => 'portfolio_sanitize_text', 
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo_size', array( 
		'label'    => __( 'Change the width of the Logo in PX.', 'portfolio' ),
		'description'    => __( 'Only enter numeric value', 'portfolio' ),
		'section'  => 'portfolio_logo_section', 
		'settings' => 'logo_size',  
		'priority'   => 2 
	) ) );
	
	//Favicon Upload
	$wp_customize->add_setting( 
		'site_favicon',
		array(
			'default' => (get_stylesheet_directory_uri() . '/img/favicon.png'), 
			'sanitize_callback' => 'esc_url_raw',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon (16x16 pixels)', 'portfolio' ),
			   'type' 			=> 'image',
               'section'        => 'portfolio_logo_section',
               'settings'       => 'site_favicon',
               'priority' => 2,
            )
        )
    );
    //Apple touch icon 144
    $wp_customize->add_setting(
        'apple_touch_144',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'portfolio' ),
               'type'           => 'image',
               'section'        => 'portfolio_logo_section',
               'settings'       => 'apple_touch_144',
               'priority'       => 11,
            )
        )
    );
    //Apple touch icon 114
    $wp_customize->add_setting(
        'apple_touch_114',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw', 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'portfolio' ),
               'type'           => 'image',
               'section'        => 'portfolio_logo_section',
               'settings'       => 'apple_touch_114',
               'priority'       => 12,
            )
        )
    );
    //Apple touch icon 72
    $wp_customize->add_setting(
        'apple_touch_72',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'portfolio' ),
               'type'           => 'image',
               'section'        => 'portfolio_logo_section',
               'settings'       => 'apple_touch_72',
               'priority'       => 13,
            )
        )
    );
    //Apple touch icon 57
    $wp_customize->add_setting(
        'apple_touch_57',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'portfolio' ),
               'type'           => 'image',
               'section'        => 'portfolio_logo_section',
               'settings'       => 'apple_touch_57',
               'priority'       => 14,
            )
        )
    ); 
	
	// Home Intro Section
	$wp_customize->add_section( 'portfolio_home_section', array(
		'title'          => 'Home Page', 
		'priority'       => 24,
		'description' => 'Edit your home page'
	) );
	
	// Home Intro Section
	$wp_customize->add_setting('active_intro', 
	    array(
	        'sanitize_callback' => 'portfolio_sanitize_checkbox',
	    ) 
	); 
	
	$wp_customize->add_control( 
    'active_intro', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Home Intro Text',  
        'section' => 'portfolio_home_section', 
		'priority'   => 1  
    ));
	
	// Main Image
	$wp_customize->add_setting( 'home_bg_image', array(
		'default' => (get_stylesheet_directory_uri() . '/img/portfolio-bg.jpg'),      
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'widget_bg_image', array( 
		'label'    => __( 'Background Image', 'portfolio' ), 
		'section'  => 'portfolio_home_section',  
		'settings' => 'home_bg_image',
		'priority'   => 2
	) ) ); 
	
	// Intro Text
	$wp_customize->add_setting( 'intro_text' ,
	    array(
	        'sanitize_callback' => 'portfolio_sanitize_text',
	    ) 
	);
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'intro_text', array(
		'label'    => __( 'Intro Title Text', 'portfolio' ),
		'section'  => 'portfolio_home_section', 
		'settings' => 'intro_text',
		'priority'   => 3
	) ) );
	
	// Intro Text Box
	$wp_customize->add_setting( 'intro_textbox' ,
	    array(
	        'sanitize_callback' => 'portfolio_sanitize_text',
	    ) 
	);
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'intro_textbox', array( 
    'label' => __( 'Intro Text Box', 'portfolio' ), 
    'section' => 'portfolio_home_section',
    'settings' => 'intro_textbox', 
	'type'     => 'textarea', 
	'priority'   => 4
	) ) );
	
	// Description Text Box
	$wp_customize->add_setting( 'description_textbox' ,
	    array(
	        'sanitize_callback' => 'portfolio_sanitize_text',
	    ) 
	);
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'description_textbox', array( 
    'label' => __( 'Home Page Description Text', 'portfolio' ), 
    'section' => 'portfolio_home_section', 
    'settings' => 'description_textbox', 
	'type'     => 'textarea', 
	'priority'   => 5
	) ) );
	
	$wp_customize->add_setting( 'portfolio_blog_hover_color', array( 
        'default'     => '', 
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_blog_hover_color', array(
        'label'	   => 'Blog Hover Background Color',
		'description' => 'Change the color of your hover background color', 
        'section'  => 'portfolio_home_section',
        'settings' => 'portfolio_blog_hover_color', 
		'priority' => 6  
    ) ) );
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => __( 'Footer', 'portfolio' ),
    	'priority' => 32,
    	'description' => __( 'Customize your footer area', 'portfolio' )
	) );
	
	// Footer Byline Text 
	$wp_customize->add_setting( 'portfolio_footerid',
	    array(
	        'sanitize_callback' => 'portfolio_sanitize_text',
	    ) 
	);
	  
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_footerid', array(
    'label' => __( 'Footer Byline Text', 'portfolio' ),
    'section' => 'footer-custom', 
    'settings' => 'portfolio_footerid', 
	'priority'   => 1  
	) ) ); 

    // Choose excerpt or full content on blog
    $wp_customize->add_section( 'portfolio_layout_section' , array( 
	    'title'       => __( 'Layout', 'portfolio' ),
	    'priority'    => 45, 
	    'description' => 'Change how portfolio displays posts', 
	) );

	$wp_customize->add_setting( 'portfolio_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'portfolio_sanitize_index_content',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_post_content', array(
		'label'    => __( 'Post content', 'portfolio' ),
		'section'  => 'portfolio_layout_section',
		'settings' => 'portfolio_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts', 
			'option2' => 'Full content',
			),
	) ) );
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
        )       
    );
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 2, 
        'section'     => 'portfolio_layout_section',
        'label'       => __('Excerpt length', 'portfolio'),
        'description' => __('Choose your excerpt length here. Default: 30 words', 'portfolio'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5
        ), 
    ) );  

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 10; 

	// Enqueue scripts for real-time preview
	wp_enqueue_script( 'portfolio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
 

}
add_action('customize_register', 'portfolio_theme_customizer');


/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
function portfolio_sanitize_hex_color( $color ) {
	if ( '#FF0000' === $color ) 
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function portfolio_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}

//Checkboxes
function portfolio_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function portfolio_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function portfolio_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Sanitizes Fonts 
function portfolio_sanitize_fonts( $input ) {  
    $valid = array(
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville', 
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function portfolio_no_sanitize( $input ) {
} 

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function portfolio_add_customizer_css() {
	$color = portfolio_sanitize_hex_color( get_theme_mod( 'portfolio_link_color' ) );
	?>
	<!-- portfolio customizer CSS -->
	<style>
		body { border-color: <?php echo $color; ?>; } 
		
		a { color: <?php echo $color; ?>; }
		
		figure.effect-chico { background: <?php echo get_theme_mod( 'portfolio_blog_hover_color' ) ?>; } 
		
		.main-navigation li:hover > a, a:hover { color: <?php echo get_theme_mod( 'portfolio_hover_color' ) ?>; }
		 
		.cbp-spmenu h3, .site-description-square { background: <?php echo get_theme_mod( 'portfolio_custom_color' ) ?>; } 
		.main-navigation .current_page_item a, .main-navigation .current-menu-item a, a:focus, a:active, a span.meta-nav { color: <?php echo get_theme_mod( 'portfolio_custom_color' ) ?> !important; }
		
		.home-entry-title:after, .member-entry-title:after, .works-entry-title:after, .client-entry-title:after, .home-news h5:after, .home-team h5:after, .home-cta h6:after, .footer-contact h5:after, .member h5:after { border-color: <?php echo get_theme_mod( 'portfolio_custom_color' ) ?>; } 
		
		.main-navigation ul ul li, blockquote, .entry-title:after, .page-title:after { border-color: <?php echo get_theme_mod( 'portfolio_custom_color' ) ?>; } 
		  
		button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo get_theme_mod( 'portfolio_custom_color' ) ?>; border-color: <?php echo get_theme_mod( 'portfolio_custom_color' ) ?>; }  
		
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { border-color: <?php echo get_theme_mod( 'portfolio_custom_color_hover') ?>; background: <?php echo get_theme_mod( 'portfolio_custom_color_hover') ?>; }
		
		.navigation-container button:hover, .navigation-container button { background: none; }  
		  
	</style>
<?php }
add_action( 'wp_head', 'portfolio_add_customizer_css' );  
