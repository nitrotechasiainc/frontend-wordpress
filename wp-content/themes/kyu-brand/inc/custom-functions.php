<?php
/** Core config*/
require_once CHILD_THEME_DIR . 'inc/core/root-config.php';

/** Enqueue file, meta, script, html, upload*/
require_once CHILD_THEME_DIR . 'inc/enqueue/enqueue-core.php';
require_once CHILD_THEME_DIR . 'inc/enqueue/enqueue-head.php';
require_once CHILD_THEME_DIR . 'inc/enqueue/config-upload.php';

/** Module */
require_once CHILD_THEME_DIR . 'inc/modules/add_theme_support.php';
require_once CHILD_THEME_DIR . 'inc/modules/change-existing-label.php';
require_once CHILD_THEME_DIR . 'inc/modules/duplicate-post.php';
require_once CHILD_THEME_DIR . 'inc/modules/remove-extra-image-sizes.php';
require_once CHILD_THEME_DIR . 'inc/modules/setting-text-editor.php';

/** Custom  Theme */
require_once CHILD_THEME_DIR . 'inc/custom-theme/astra-translate.php';


/** Debug Admin Menus */

// if (!function_exists('debug_admin_menus')):
//     function debug_admin_menus() {
//     if ( !is_admin())
//             return;
//         global $submenu, $menu, $pagenow;
//         if ( current_user_can('manage_options') ) { // ONLY DO THIS FOR ADMIN
//             if( $pagenow == 'index.php' ) {  // PRINTS ON DASHBOARD
//                 echo '<pre>'; print_r( $menu ); echo '</pre>'; // TOP LEVEL MENUS
//                 echo '<pre>'; print_r( $submenu ); echo '</pre>'; // SUBMENUS
//             }
//         }
//     }
//     add_action( 'admin_notices', 'debug_admin_menus' );
//     endif;