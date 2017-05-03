<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Karta
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?><?php if ( is_page() ) { karta_background_image_url(); } ?>>
	<div id="page" class="site">
			<header id="masthead" class="site-header" role="banner">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="site-branding">
								<?php karta_logo(); ?>
							</div><!-- .site-branding -->

							<nav id="site-navigation" class="main-navigation" role="navigation">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu1">
										<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'karta' ); ?></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="collapse navbar-collapse" id="menu1">
								<?php
								if (has_nav_menu('primary')) {
									wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-navigation__menu', 'container' => '', 'menu_id' => 'primary-menu', 'walker' => new Karta_Walker_Nav_Menu ) );
								}
								?>
								
								<?php

								if ( is_active_sidebar( 'modals-1' ) ) {
									dynamic_sidebar( 'modals-1' );
								}
								?>
                             
								</div>
                                
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			</header><!-- #masthead -->
            <?php //if ( dynamic_sidebar('red_menu_widgets') ) : else : endif; // ccsp - menu vermelho?>
			<?php 
$header_menu_args = array(
	'theme_location'  => 'secundary',
	'menu'            => '',
	'container'       => 'nav',
	'container_class' => 'menu_vermelho',
	'container_id'    => '',
	//'menu_class'      => 'main-navigation__menu',
	'menu_class'      => 'main-navigation__menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);
 
wp_nav_menu( $header_menu_args );
			
			?>
			<div id="content" class="site-content">
