<?php
/** Site Public */
function kukun_header_metadata() {?>
    <link rel="icon" href="/wp-content/themes/astra-child/images/icon.svg" type="image/svg+xml">
<?php }
add_action( 'wp_head', 'kukun_header_metadata' );


/** Site Admin */
function kukun_admin_header_metadata() {?>
    <link rel="icon" href="/wp-content/themes/astra-child/images/icon.svg" type="image/svg+xml">
<?php }
add_action( 'admin_head', 'kukun_admin_header_metadata' );