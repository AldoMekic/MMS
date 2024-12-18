<?php
get_header(); ?>

<main class="site-main">
    <div class="content-wrapper"> <!-- Added content-wrapper for consistent layout -->

        <div class="site-content"> <!-- site-content remains here -->
            <h1><?php printf( __( 'Search Results for: %s', 'mytheme' ), get_search_query() ); ?></h1>
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
                        'prev_text' => __( 'Back', 'mytheme' ),
                        'next_text' => __( 'Next', 'mytheme' ),
                    ) );
                else : ?>
                    <p><?php _e( 'Sorry, no results found.', 'mytheme' ); ?></p>
                <?php endif; ?>
            </div>
        </div><!-- .site-content -->

        <?php get_sidebar(); ?> <!-- Sidebar placed here to be on the right side -->
        
    </div><!-- .content-wrapper -->
</main>

<?php get_footer(); ?>