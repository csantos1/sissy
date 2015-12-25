<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sissy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'sissy'); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding layout-container">
        
			<?php
			if ( get_theme_mod( 'sissy_logo' ) ) : ?>
				<div class='site-logo'>
                    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'sissy_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
                </div>
			<?php else : ?>
				<div class='site-logo'><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" /></a></div>
            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
 ?>
                <div class="site-description"><?php echo $description;
    /* WPCS: xss ok. */
 ?></div>
			<?php
            endif;
			
            endif;
 ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
        
        <div id="mobile-header">
            <a id="responsive-menu-button" href="#sidr-main"><i class="fa fa-bars"><span class="screen-reader-text"><?php esc_html_e('Open Menu', 'sissy'); ?></span></i>
</a>
        </div>
			
			<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => 'div', 'container_class' => 'layout-container')); ?>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
