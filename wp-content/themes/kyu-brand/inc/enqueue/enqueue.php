<?php
add_action( 'wp_enqueue_scripts', 'enqueue_styles', 200 );
function enqueue_styles(): void {
    $lists_css = [
        'new-style'    => '/assets/css/build/style.css',
        'new-concept'  => '/assets/css/build/concept.css',
        'new-menu'     => '/assets/css/build/menu.css',
        'new-news'     => '/assets/css/build/news.css',
        'new-shop'     => '/assets/css/build/shop.css',
        'new-shop-top' => '/assets/css/build/shop-top.css',
        'new-top'      => '/assets/css/build/top.css',
    ];
    foreach ( $lists_css as $key => $value ) {
        wp_enqueue_style( $key, get_stylesheet_directory_uri() . $value, array(), @filemtime( trailingslashit( get_theme_file_path() ) . $value ) );
    }
}
