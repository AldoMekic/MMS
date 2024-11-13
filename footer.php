<style>
.site-footer {
    background-color: <?php echo get_theme_mod( 'footer_background_color', '#333' ); ?>;
    color: #ffffff;
    padding: 30px 0;
    text-align: center;
}
</style>

<footer id="footer" class="site-footer">
    <div class="footer-inner">
        <!-- Footer Logo -->
        <div class="footer-logo">
            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
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


