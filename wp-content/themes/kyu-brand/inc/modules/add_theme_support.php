<?php 
/** Đăng ký thêm cột thông tin trong danh sách post admin
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 * https://developer.wordpress.org/reference/hooks/manage_post-post_type_posts_custom_column/
 * https://developer.wordpress.org/reference/hooks/manage_post_type_posts_columns/
*/

add_filter( 'manage_posts_columns', 'wpdocs_posts_thumb_columns', 5 );
add_action( 'manage_posts_custom_column', 'wpdocs_posts_custom_columns', 5, 2 );
function wpdocs_posts_thumb_columns( $columns ) {
    $post_new_columns = array(
       'post_thumbs'    => esc_html__( 'Thumbnail', 'text_domain' ),
       'author'         => esc_html__( 'Author', 'text_domain' ),
       'nta_number'     => esc_html__( 'Sort order', 'text_domain' ),
    );
    return array_merge( $columns, $post_new_columns );
}
function wpdocs_posts_custom_columns( $column_name, $id ) {
    if ( 'post_thumbs' === $column_name ) {
        the_post_thumbnail( 'thumbnail' );
    }
}

// rearrange the order of columns
add_filter( 'manage_post_posts_columns', 'wpdocs_item_columns' );
function wpdocs_item_columns( $columns ) {
    $custom_col_order = array(
        'cb' => $columns['cb'],
        'post_thumbs' => $columns['post_thumbs'],
        'title' => $columns['title'],
        'categories' => $columns['categories'],
        'tags' => $columns['tags'],
        'author' => $columns['author'],
        'date' => $columns['date']
    );
    return $custom_col_order;
}