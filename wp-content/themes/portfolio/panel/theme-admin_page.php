<?php

function FontAwesome_icons() {
    echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet">';
}

add_action('admin_head', 'FontAwesome_icons');
add_action('wp_head', 'FontAwesome_icons');

// admin area styling 
function custom_admin_colors() { 
   echo '<style type="text/css">

body {
	margin: 0px;
}


.grid {
	width: 100%;
	max-width: 1240px;
	min-width: 755px;
	margin: 0 auto;
	overflow: hidden;
}

.grid:after {
	content: "";
	display: table;
	clear: both;
}

.grid-pad {
	padding-top: 20px;
	padding-left: 0px; /* grid-space to left */
	padding-right: 0px; /* grid-space to right: (grid-space-left - column-space) e.g. 20px-20px=0 */
}

.col-1-4 {
	float: left;
	padding-right: 2%; 
	width: 23%;  
	text-align: center;
}

.col-1-3 {
	float: left;
	padding-right: 2%;
	width: 31.333%;
	text-align: center;
	}
	
.fa { 
	font-size: 30px;
	color: #1cbda2;
}

.col-1-4 h4 {
	font-size: 16px;
}

button,
input[type="button"],
input[type="reset"],
input[type="submit"] {
	border: 2px solid;
	border-color: #1cbda2;
	border-radius: 4px;
	background: #1cbda2;
	box-shadow: none;
	font-size: 13px;
	line-height: 1;
	font-weight: 400;
	padding: 0.7em 1.5em 0.7em;
	text-shadow: none;
	color: #fff;
	cursor: pointer;
}

button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover {
	border-color: #1cbda2;
}

button:focus,
input[type="button"]:focus,
input[type="reset"]:focus,
input[type="submit"]:focus,
button:active,
input[type="button"]:active,
input[type="reset"]:active,
input[type="submit"]:active {
	border-color: #1cbda2;
}

button.pro {
	font-size: 24px;
	padding: 1.25em 2em;
	text-align: center;
	margin: 20px auto 0;
	display: block;
}

a { 
	text-decoration: none;
}

.custom-box {
    border: 1px solid #dadada;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 30px;
    overflow: hidden;
    position: relative;
    width: 100%;
}
.custom-box:before {
    content: "";
    display: block;
    padding-top: 90%;
}
.home-collection {
    background: none repeat scroll 0 0 #fff;
}
.custom-content {
    bottom: 0;
    color: white;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}
.custom-content div {
    display: table;
    height: 100%;
    width: 100%;
}
.custom-content span {
    color: #999;
    display: table-cell;
    padding: 20px;
    text-align: center;
    vertical-align: middle;
}
.custom-content span > .fa {
    color: #404040;
    display: block;
    font-size: 50px;
    margin: 0 auto;
    padding: 0 0 20px;
    transition: all 0.2s ease-in-out 0s;
}
.custom-content:hover .fa {
    color: #1cbda2;
    font-size: 58px;
    transition: all 0.2s ease-in-out 0s;
}
.custom-content span > h5 {
    color: #404040;
	font-size: 18px;
	line-height: 20px;
	margin: 0;
}
.custom-content span > p {
    font-size: 15px;
    margin-bottom: 0;
}

@media handheld, only screen and (max-width: 800px) {
	.grid {
		width: 100%;
		min-width: 0;
		margin-left: 0px;
		margin-right: 0px;
		padding-left: 0px; /* grid-space to left */
		padding-right: 10px; /* grid-space to right: (grid-space-left - column-space) e.g. 20px-10px=10px */ 
	}
	
	.col-1-4 {
		float: none;
		padding-right: 0px;
		width: 100%;
		text-align: center;
	}
	
	.col-1-3 {
		float: none;
		padding-right: 0px;
		width: 100%;
		text-align: center; 
	}
}

}

         
			
         </style>';
}

add_action('admin_head', 'custom_admin_colors'); 

     
add_action('admin_menu', 'portfolio_setup_menu');
     
    function portfolio_setup_menu(){
            add_theme_page( 'About ModernThemes', 'About ModernThemes', 'manage_options', 'portfolio-setup', 'portfolio_init' );  
    } 
     
 	function portfolio_init(){
	 	echo '<div class="grid grid-pad"><div class="col-1-1"><h1 style="text-align: center;">'; 
		printf(__('Thank you for using ModernThemes!', 'portfolio' ));
        echo "</h1></div></div>";
		  
		
		
		
			
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;" ><div class="col-1-3"><h2>'; 
		printf(__('Want to Give Back?', 'portfolio' )); 
        echo "</h2>"; 
		
		echo '<p>';
		printf(__('Please help support our mission and continued development of free themes with a donation of $5, $10, $20, or more!', 'portfolio' ));
		echo "</p>";
		
		echo '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LMGYAZW9C5GE" target="_blank" rel="nofollow"><img class="" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation to ModernThemes" /></a></div>';
		
		echo '<div class="col-1-3"><h2>'; 
		printf(__('Documentation', 'portfolio' ));
        echo "</h2>";  
		
		
		echo '<p>';
		printf(__('Check out our <a href="http://modernthemes.net/documentation/">ModernThemes documentation</a> to learn how to use portfolio and all the rest of our themes. ', 'portfolio' )); 
		echo "</p>";
		
		echo '<a href="http://modernthemes.net/documentation/" target="_blank"><button>'; 
		printf(__('Read Docs', 'portfolio' ));
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf(__('About ModernThemes', 'portfolio' ));
        echo "</h2>";  
		
		echo '<p>';
		printf(__('Want more WordPress themes or support and customization? We can probably help you out at <a href="http://modernthemes.net/" target="_blank">modernthemes.net</a>.', 'portfolio' ));  
		echo "</p>";
		
		echo '<a href="http://modernthemes.net/our-company/" target="_blank"><button>';
		printf(__('About Us', 'portfolio' ));
		echo "</button></a></div></div>";
		  
	    
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( __('Premium Membership. Premium Experience.', 'portfolio' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-cogs"></i><h4>'; 
		printf( __('Plugin Compatibility', 'portfolio' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Use our new free plugins with this theme to add functionality for things like projects, clients, team members and more. Compatible with all premium themes!', 'portfolio' ));
		echo '</p></div>';
		
		echo '<div class="col-1-4"><i class="fa fa-desktop"></i><h4>'; 
        printf( __('Agency Designed Themes', 'portfolio' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Look as good as can be with our new premium themes. Each one is agency designed with modern styles and professional layouts.', 'portfolio' ));
		echo '</p></div>'; 
		
        echo '<div class="col-1-4"><i class="fa fa-users"></i><h4>';
        printf( __('Membership Options', 'portfolio' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('We have options to fit every budget. Choose between a single theme, or access to all current and future themes for a year, or forever!', 'portfolio' ));
		echo '</p></div>'; 
		
		echo '<div class="col-1-4"><i class="fa fa-calendar"></i><h4>';
		printf( __( 'Access to New Themes', 'portfolio' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'New themes added monthly! When you purchase a premium membership you get access to all premium themes, with new themes added monthly.', 'portfolio' ));   
		echo '</p></div>';
		
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="https://modernthemes.net/premium-wordpress-themes/" target="_blank"><button class="pro">'; 
		printf( __( 'Get Premium Membership', 'portfolio' ));  
		echo '</button></a></div></div>'; 
	
		 
    }
?>