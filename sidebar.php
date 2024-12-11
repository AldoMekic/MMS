<?php
/**
 * The sidebar template part.
 *
 * @copyright  Copyright (c) 2023, My Theme
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
<style>
    .sidebar-menu li a {
    display: block;
    text-decoration: none;
    color: #333;
    font-weight: bold;
    border: 2px solid <?php echo get_theme_mod('sidebar_border_color', '#0073aa'); ?>;
    border-radius: 8px;
    padding: 10px 15px;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
}

.sidebar-menu li a:hover {
    color: #fff;
    background-color: <?php echo get_theme_mod('sidebar_hover_color', '#0073aa'); ?>;
    border-color: <?php echo get_theme_mod('sidebar_border_color', '#0073aa'); ?>;
    transform: scale(1.05);
}
</style>
    <aside id="secondary" class="widget-area">
        <ul class="sidebar-menu" style="list-style: none;">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </ul>
    </aside>
<?php }