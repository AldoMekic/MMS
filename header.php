<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<style>
    .site-header {
        background-color: <?php echo get_theme_mod('header_background_color', '#333'); ?>;
    }

    .main-navigation .primary-menu a {
        color: <?php echo get_theme_mod('header_text_color', '#ffffff'); ?>;
    }

    .site-logo img {
    width: <?php echo get_theme_mod('logo_width', 250); ?>px;
    height: <?php echo get_theme_mod('logo_height', 60); ?>px;
    max-width: 100%;
    max-height: 100%;
    }

    .main-navigation .primary-menu a.active,
.main-navigation .primary-menu a:hover {
    color: <?php echo get_theme_mod('header_highlight_color', '#ffcc00'); ?>;
}

.main-navigation .primary-menu .current-menu-item a {
    color: <?php echo get_theme_mod('header_highlight_color', '#ffcc00'); ?>;
}

</style>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="header-inner">
        <!-- Logo Section -->
        <div class="site-logo">
    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        $logo_width = get_theme_mod('logo_width', 250);
        $logo_height = get_theme_mod('logo_height', 60);
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
                'add_li_class'   => 'current-menu-item', // This ensures the class is applied.
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