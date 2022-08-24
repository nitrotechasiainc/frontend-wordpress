<?php 
/** Disable trình soạn thảo Gutenberg*/
add_filter('use_block_editor_for_post', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_false' );


/** Enable trình soạn thảo Gutenberg đối với bài post có ID = 1*/
// if ( is_admin() ):
//   add_filter( 'use_block_editor_for_post', 'home_page_enable_block_editor', 10, 2 );
// endif;
 
// function home_page_enable_block_editor($use_block_editor, $post) {
//   if ( 1 === $post->ID ){
//       return true;
//     }
//   return $use_block_editor;
// }

/** Enable trình soạn thảo Gutenberg đối với page*/
// if ( is_admin() ):
//     add_filter( 'use_block_editor_for_post', 'page_enable_block_editor', 10, 2 );
// endif;
 
// function page_enable_block_editor( $u, $post ) {
//     if ( 'post' === $post->post_type ):
//         return false;
//     endif;
//     return true;
// }