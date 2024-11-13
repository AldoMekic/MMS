<?php
/**
 * The template for displaying 404 error pages.
 *
 * @copyright  Copyright (c) 2023, My Theme
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>
<main class="site-main">
    <div class="content-wrapper">
        <div class="site-content error-404-content">
            <!-- 404 Error Title -->
            <h1 class="error-title"><?php _e( 'There has been an error', 'my_theme' ); ?></h1>

            <!-- 404 Error Message -->
            <p class="error-message">
                <?php _e( 'Sorry, the page you are looking for could not be found. It might have been moved, deleted, or does not exist.', 'my_theme' ); ?>
            </p>

            <!-- Link to Homepage -->
            <p><a href="<?php echo home_url(); ?>" class="error-home-link">
                <?php _e( 'Return to the homepage', 'my_theme' ); ?>
            </a></p>
        </div><!-- .site-content -->

        <?php get_sidebar(); ?>
    </div><!-- .content-wrapper -->
</main>
<?php get_footer();
