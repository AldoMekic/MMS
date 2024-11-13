<?php
/**
 * The template for displaying single posts.
 *
 * @copyright  Copyright (c) 2023, My Theme
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>
  <main class="site-main">
    <div class="content-wrapper">
      <div class="site-content single-post-content">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
            
                <!-- Post Title -->
                <h1 class="post-title"><?php the_title(); ?></h1>

                <!-- Post Meta -->
                <div class="post-meta">
                    <span class="post-author">By <?php the_author(); ?></span> |
                    <span class="post-date"><?php the_date(); ?></span>
                </div>

                <!-- Post Content -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

            <?php endwhile;
        else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'my_theme' ); ?></p>
        <?php endif; ?>
      </div><!-- .site-content -->

      <?php get_sidebar(); ?>
    </div><!-- .content-wrapper -->
  </main>
<?php get_footer();
