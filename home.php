<?php
/**
 * The template for displaying the blog posts page.
 *
 * @copyright  Copyright (c) 2023, My Theme
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

<main class="site-main">
    <div class="content-wrapper">
        <div class="site-content blog-posts-content">
            <h1>Blog</h1>
            <div class="posts-list">
                <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span><?php the_date(); ?></span> | 
                                <span><?php the_author(); ?></span>
                            </div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    <?php endwhile;

                    // Pagination
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( 'Back', 'my_theme' ),
                        'next_text' => __( 'Next', 'my_theme' ),
                    ) );
                else : ?>
                    <p><?php _e( 'No posts found.', 'my_theme' ); ?></p>
                <?php endif; ?>
            </div>
        </div><!-- .site-content -->
        <?php get_sidebar(); ?>
    </div><!-- .content-wrapper -->
</main>

<?php get_footer(); ?>