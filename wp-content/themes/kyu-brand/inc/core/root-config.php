<?php
error_reporting( E_ALL & ~E_NOTICE );
error_reporting( E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

add_filter( 'show_admin_bar', '__return_false' );
add_action( 'admin_print_scripts-profile.php', 'amm_hat_add_css_style' );
function amm_hat_add_css_style() {
    ?>
    <style type="text/css">
        .show-admin-bar {
            display: none !important;
        }
    </style>
    <?php
}