<?php
/**
 * The template for displaying all pages.
 *
 * @copyright  Copyright (c) 2023, My Theme
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>
<main class="site-main">
    <div class="content-wrapper">
        <div class="site-content single-page-content">

            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                
                    <!-- Page Title -->
                    <h1 class="page-title"><?php the_title(); ?></h1>

                    <!-- Page Content -->
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile;
            else : ?>
                <p><?php _e( 'Sorry, no page content available.', 'my_theme' ); ?></p>
            <?php endif; ?>
        </div><!-- .site-content -->

        <?php get_sidebar(); ?>
    </div><!-- .content-wrapper -->
</main>
<?php get_footer();