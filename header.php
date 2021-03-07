<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wattever2021
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'wattever2021'); ?></a>

        <header id="masthead" class="site-header">
            <div id="relative-container">
                <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-whatever.png" alt="Logo WattEver"></a>

                <!-- MAIN NAV -->
			<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_class'        => 'nav navbar-nav',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'navbarNavDropdown'
					)
				);
				?>
			</nav><!-- #site-navigation -->
            </div>
        </header>