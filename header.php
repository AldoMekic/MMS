<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<style>
    .site-header {
    background-color: <?php echo get_theme_mod( 'header_background_color', '#333' ); ?>;
    padding: 20px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
</style>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="header-inner">
        <!-- Logo Section -->
        <div class="site-logo">
            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                the_custom_logo();
            } else { ?>
                <h1><?php bloginfo( 'name' ); ?></h1>
            <?php } ?>
        </div>

        <!-- Primary Menu -->
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
            ) );
            ?>
        </nav>

        <!-- Social Media Links Widget -->
        <div class="header-widgets">
            <?php if ( is_active_sidebar( 'header-widget' ) ) :
                dynamic_sidebar( 'header-widget' );
            endif; ?>
        </div>
    </div>
</header>