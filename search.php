<?php
get_header(); 
?>
<div class="site-content">
    <h2><?php printf( __( 'Search Results for: %s', 'mytheme' ), get_search_query() ); ?></h2>
    
    <div class="content-sidebar-wrapper">
        <div class="search-results">
            <?php if ( have_posts() ) : ?>
                <div class="posts-list">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="post-meta"><?php the_date(); ?> by <?php the_author(); ?></div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <?php the_posts_navigation(); ?>
                
            <?php else : ?>
                <p><?php _e( 'Sorry, no results found.', 'mytheme' ); ?></p>
            <?php endif; ?>
        </div>
        
        <?php get_sidebar(); ?>
    </div>
</div><!-- .site-content -->
<?php
get_footer();
