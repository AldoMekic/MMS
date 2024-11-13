<?php

require_once get_template_directory() . '/inc/widgets/written-work-categories-widget.php';

/**
 * My Theme functions and definitions
 *
 * @copyright  Copyright (c) 2023, My Theme
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Theme custom_logo.
 */
add_theme_support( 'custom-logo' );

// Ovde cemo da dodajemo funkcionalnosti nasoj temi

function my_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'my_theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar that appears on the right.', 'my_theme' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Area', 'my_theme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Appears in the footer area', 'my_theme' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );

function my_theme_menus() {
    register_nav_menus( array(
        'primary'  => __( 'Primary Menu', 'my_theme' ),
        'footer'   => __( 'Footer Menu', 'my_theme' ),
        'sidebar'  => __( 'Sidebar Menu', 'my_theme' ),  // New sidebar menu
    ) );
}
add_action( 'after_setup_theme', 'my_theme_menus' );

// Register widget areas
function my_theme_widget_areas() {
    register_sidebar( array(
        'name'          => __( 'Header Social Media Widget', 'my_theme' ),
        'id'            => 'header-widget',
        'before_widget' => '<div class="header-widget">',
        'after_widget'  => '</div>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'my_theme' ),
        'id'            => 'footer-widget',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'my_theme_widget_areas' );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'body-styles', get_template_directory_uri() . '/inc/css/body.css' );
    wp_enqueue_style( 'header-styles', get_template_directory_uri() . '/inc/css/header.css' );
    wp_enqueue_style( 'footer-styles', get_template_directory_uri() . '/inc/css/footer.css' );
    wp_enqueue_style( 'archive-styles', get_template_directory_uri() . '/inc/css/archive.css' );
    wp_enqueue_style( 'content-styles', get_template_directory_uri() . '/inc/css/content.css' );
    wp_enqueue_style( 'post-styles', get_template_directory_uri() . '/inc/css/post.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Register custom taxonomies for "Written Work" post type
function my_theme_custom_taxonomies() {

    // Custom Category for Written Work
    register_taxonomy( 'written_work_category', 'written_work', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __( 'Written Work Categories' ),
            'singular_name' => __( 'Written Work Category' ),
            'search_items' => __( 'Search Written Work Categories' ),
            'all_items' => __( 'All Written Work Categories' ),
            'parent_item' => __( 'Parent Written Work Category' ),
            'parent_item_colon' => __( 'Parent Written Work Category:' ),
            'edit_item' => __( 'Edit Written Work Category' ),
            'update_item' => __( 'Update Written Work Category' ),
            'add_new_item' => __( 'Add New Written Work Category' ),
            'new_item_name' => __( 'New Written Work Category Name' ),
            'menu_name' => __( 'Written Work Categories' ),
        ),
        'rewrite' => array(
            'slug' => 'written-work-category',
            'with_front' => true,
            'hierarchical' => true
        ),
    ));

    // Custom Tags for Written Work
    register_taxonomy( 'written_work_tag', 'written_work', array(
        'hierarchical' => false,
        'labels' => array(
            'name' => __( 'Written Work Tags' ),
            'singular_name' => __( 'Written Work Tag' ),
            'search_items' => __( 'Search Written Work Tags' ),
            'all_items' => __( 'All Written Work Tags' ),
            'edit_item' => __( 'Edit Written Work Tag' ),
            'update_item' => __( 'Update Written Work Tag' ),
            'add_new_item' => __( 'Add New Written Work Tag' ),
            'new_item_name' => __( 'New Written Work Tag Name' ),
            'menu_name' => __( 'Written Work Tags' ),
        ),
        'rewrite' => array(
            'slug' => 'written-work-tag',
            'with_front' => true,
        ),
    ));
}

add_action( 'init', 'my_theme_custom_taxonomies' );


// Register the "Written Work" custom post type
function my_theme_register_written_work() {
    $labels = array(
        'name'                  => _x( 'Written Works', 'Post type general name', 'my_theme' ),
        'singular_name'         => _x( 'Written Work', 'Post type singular name', 'my_theme' ),
        'menu_name'             => _x( 'Written Works', 'Admin Menu text', 'my_theme' ),
        'name_admin_bar'        => _x( 'Written Work', 'Add New on Toolbar', 'my_theme' ),
        'add_new'               => __( 'Add New', 'my_theme' ),
        'add_new_item'          => __( 'Add New Written Work', 'my_theme' ),
        'new_item'              => __( 'New Written Work', 'my_theme' ),
        'edit_item'             => __( 'Edit Written Work', 'my_theme' ),
        'view_item'             => __( 'View Written Work', 'my_theme' ),
        'all_items'             => __( 'All Written Works', 'my_theme' ),
        'search_items'          => __( 'Search Written Works', 'my_theme' ),
        'not_found'             => __( 'No written works found.', 'my_theme' ),
        'not_found_in_trash'    => __( 'No written works found in Trash.', 'my_theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'menu_icon'          => 'dashicons-edit',
        'rewrite'            => array( 'slug' => 'written-work' ),
    );

    register_post_type( 'written_work', $args );
}
add_action( 'init', 'my_theme_register_written_work' );

// Add category and tag support for "Written Work"
function my_theme_custom_post_type() {
    register_post_type( 'written_work',
        array(
            'labels' => array(
                'name' => __( 'Written Works' ),
                'singular_name' => __( 'Written Work' ),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'written-works' ),
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            'taxonomies' => array( 'written_work_category', 'written_work_tag' ), // Use custom taxonomies only
        )
    );
}
add_action( 'init', 'my_theme_custom_post_type' );

add_action( 'template_redirect', function() {
    if ( is_page( 'written-works' ) ) {
        wp_redirect( home_url( '/written-works/' ) );
        exit;
    }
});

// Register the Written Work Categories Widget
function register_written_work_categories_widget() {
    register_widget( 'Written_Work_Categories_Widget' );
}
add_action( 'widgets_init', 'register_written_work_categories_widget' );

// Add a custom meta box for the "Reading Time" field
function dodaj_custom_reading_time_polje() {
    add_meta_box(
        'reading_time_meta_box', // ID
        'Reading Time (Minutes)', // Title
        'prikazi_custom_reading_time_polje', // Callback function
        'written_work', // Post type
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'dodaj_custom_reading_time_polje');

// Display the custom field for "Reading Time"
function prikazi_custom_reading_time_polje($post) {
    // Retrieve the current value of the "Reading Time" field
    $reading_time = get_post_meta($post->ID, '_reading_time', true);
    ?>
    <label for="reading_time">Reading Time (in minutes)</label>
    <input type="number" id="reading_time" name="reading_time" value="<?php echo esc_attr($reading_time); ?>" min="1" />
    <?php
}

// Save the custom field value for "Reading Time"
function sacuvaj_custom_reading_time_polje($post_id) {
    // Check if the custom field value is set
    if (array_key_exists('reading_time', $_POST)) {
        // Sanitize and save the "Reading Time" field value
        update_post_meta(
            $post_id,
            '_reading_time',
            sanitize_text_field($_POST['reading_time'])
        );
    }
}
add_action('save_post', 'sacuvaj_custom_reading_time_polje');

function mytheme_customize_register($wp_customize) {
    // Header & Footer section
    $wp_customize->add_section('header_footer_colors', array(
        'title'    => __('Header & Footer', 'mytheme'),
        'priority' => 30,
    ));

    // Header Background Color
    $wp_customize->add_setting('header_background_color', array(
        'default'   => '#333333',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label'    => __('Header Background Color', 'mytheme'),
        'section'  => 'header_footer_colors',
    )));

    // Footer Background Color
    $wp_customize->add_setting('footer_background_color', array(
        'default'   => '#333333',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array(
        'label'    => __('Footer Background Color', 'mytheme'),
        'section'  => 'header_footer_colors',
    )));

    // Header Text Color
    $wp_customize->add_setting('header_text_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
        'label'    => __('Header Text Color', 'mytheme'),
        'section'  => 'header_footer_colors',
    )));

    // Footer Text Color
    $wp_customize->add_setting('footer_text_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array(
        'label'    => __('Footer Text Color', 'mytheme'),
        'section'  => 'header_footer_colors',
    )));

    // Logo Width
    $wp_customize->add_setting('logo_width', array(
        'default'   => 250,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('logo_width', array(
        'type'     => 'number',
        'section'  => 'header_footer_colors',
        'label'    => __('Logo Width', 'mytheme'),
        'description' => __('Adjust the width of the logo.'),
        'input_attrs' => array('min' => 50, 'max' => 500),
    ));

    // Logo Height
    $wp_customize->add_setting('logo_height', array(
        'default'   => 60,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('logo_height', array(
        'type'     => 'number',
        'section'  => 'header_footer_colors',
        'label'    => __('Logo Height', 'mytheme'),
        'description' => __('Adjust the height of the logo.'),
        'input_attrs' => array('min' => 50, 'max' => 500),
    ));
}
add_action('customize_register', 'mytheme_customize_register');