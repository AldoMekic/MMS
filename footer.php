<style>
    .site-footer {
        background-color: <?php echo get_theme_mod('footer_background_color', '#333'); ?>;
    }

    .footer-navigation .footer-menu a {
        color: <?php echo get_theme_mod('footer_text_color', '#ffffff'); ?>;
    }
    .footer-logo img {
    width: <?php echo get_theme_mod('logo_width', 250); ?>px;
    height: <?php echo get_theme_mod('logo_height', 50); ?>px;
    max-width: 100%;
    max-height: 100%;
}

.footer-navigation .footer-menu a.active,
.footer-navigation .footer-menu a:hover {
    color: <?php echo get_theme_mod('footer_highlight_color', '#ffcc00'); ?>;
}

.footer-navigation .footer-menu .current-menu-item a {
    color: <?php echo get_theme_mod('footer_highlight_color', '#ffcc00'); ?>;
}
</style>

<footer id="footer" class="site-footer">
    <div class="footer-inner">
        <!-- Footer Logo -->
        <div class="footer-logo">
    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        $logo_width = get_theme_mod('logo_width', 250);
        $logo_height = get_theme_mod('logo_height', 50);
        the_custom_logo();
    } else { ?>
        <h2><?php bloginfo( 'name' ); ?></h2>
    <?php } ?>
</div>

        <!-- Footer Menu -->
        <nav class="footer-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
                'add_li_class'   => 'current-menu-item', // Adds the active class.
            ) );
            ?>
        </nav>

        <!-- Footer Widgets -->
        <div class="footer-widgets">
            <?php if ( is_active_sidebar( 'footer-widget' ) ) :
                dynamic_sidebar( 'footer-widget' );
            endif; ?>
        </div>
    </div>

    <?php wp_footer(); ?>
</footer>
</body>
</html>


