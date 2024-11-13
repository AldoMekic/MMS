<?php
/**
 * The sidebar template part.
 *
 * @copyright  Copyright (c) 2023, My Theme
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    <aside class="sidebar">
        
        <!-- Dynamic Widgets -->
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside>
<?php }