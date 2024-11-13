<?php
/**
 * The template for displaying single Written Work posts.
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

                    <!-- Written Work Categories -->
                    <div class="post-categories">
                        <?php 
                        $categories = get_the_terms( get_the_ID(), 'written_work_category' );
                        if ( $categories && ! is_wp_error( $categories ) ) :
                            echo '<span>Categories: ';
                            $category_links = array();
                            foreach ( $categories as $category ) {
                                $category_links[] = '<a href="' . esc_url( get_term_link( $category ) ) . '">' . esc_html( $category->name ) . '</a>';
                            }
                            echo implode( ', ', $category_links );
                            echo '</span>';
                        endif;
                        ?>
                    </div>

                    <!-- Written Work Tags -->
                    <div class="post-tags">
                        <?php 
                        $tags = get_the_terms( get_the_ID(), 'written_work_tag' );
                        if ( $tags && ! is_wp_error( $tags ) ) :
                            echo '<span>Tags: ';
                            $tag_links = array();
                            foreach ( $tags as $tag ) {
                                $tag_links[] = '<a href="' . esc_url( get_term_link( $tag ) ) . '">' . esc_html( $tag->name ) . '</a>';
                            }
                            echo implode( ', ', $tag_links );
                            echo '</span>';
                        endif;
                        ?>
                    </div>

                    <!-- Display Reading Time if present -->
                    <?php 
                    $reading_time = get_post_meta(get_the_ID(), '_reading_time', true);
                    if ($reading_time) : ?>
                        <div class="post-reading-time">
                            <p><strong>Estimated Reading Time:</strong> <?php echo esc_html($reading_time); ?> minutes</p>
                        </div>
                    <?php endif; ?>

                    <!-- Post Content -->
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile;
            else : ?>
                <p><?php _e( 'Sorry, no written works matched your criteria.', 'my_theme' ); ?></p>
            <?php endif; ?>
        </div><!-- .site-content -->

        <?php get_sidebar(); ?>
    </div><!-- .content-wrapper -->
</main>
<?php get_footer(); ?>