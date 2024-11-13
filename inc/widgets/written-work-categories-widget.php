<?php
// File: inc/widgets/written-work-categories-widget.php

class Written_Work_Categories_Widget extends WP_Widget {
    
    // Constructor
    public function __construct() {
        parent::__construct(
            'written_work_categories_widget', // Base ID
            __( 'Written Work Categories', 'my_theme' ), // Name
            array( 'description' => __( 'A Widget that displays Written Work Categories', 'my_theme' ) ) // Args
        );
    }

    // Widget output
    public function widget( $args, $instance ) {
        // Start widget
        echo $args['before_widget'];

        // Widget title
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Display the Written Work Categories list
        wp_list_categories( array(
            'taxonomy'   => 'written_work_category', // Custom taxonomy for Written Works
            'title_li'   => '', // Remove the default title
            'show_count' => true, // Show post count
            'hierarchical' => true, // Hierarchical display (parent-child categories)
            'echo' => true,
        ));

        // End widget
        echo $args['after_widget'];
    }

    // Widget form in the admin area
    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : __( 'Written Work Categories', 'my_theme' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'my_theme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    // Update widget options
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}