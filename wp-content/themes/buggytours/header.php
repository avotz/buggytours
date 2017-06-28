<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package buggytours
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- <div class="preloader">
            <div class="img">
              <span>Loading...</span>
            </div>
            
        </div> -->
        <header class="header">
                
                <div class="inner">
                     <?php wp_nav_menu( array(
			             'theme_location' => 'header',
			             'menu_id' => 'header-menu',
			             'container'       => 'nav',
			            'container_class' => 'header__menu',
			            'container_id'    => '',
			            'menu_class'      => 'header__menu__ul',
			              ) 
			          ); 
			          ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt="Buggy Tours" /></a>

                   
                    <button id="btn-menu" class="header__btn-menu"><i class="icon-menu"></i></button>
                </div>
            
                
               
            
        </header>

