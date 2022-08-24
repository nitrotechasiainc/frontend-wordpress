<?php 
/**
 * https://wpastra.com/docs/astra-default-strings/
 */

// "Read More »" ➙ ""
add_filter( 'astra_post_read_more', 'astra_post_read_more' );
function astra_post_read_more() {
    return __( '', 'astra' );
}

// "change Search Results for:" ➙ "Kết quả tìm kiếm cho:"
add_filter( 'astra_the_search_page_title', 'my_function', 10 ); 

function my_function() {
    return sprintf( __( 'Kết quả tìm kiếm cho: %s', 'astra' ), '<span>' . get_search_query() . '</span>' );
}



// Thay thế các từ trong hàm astra_default_strings
add_filter( 'astra_default_strings', 'example_callback', 10 );
function example_callback( $strings ) {   
    
    // Search Page Strings
    $strings['string-search-nothing-found-message']	= __( 'Không tìm thấy kết quả nào trùng khớp', 'astra' );
    $strings['string-search-input-placeholder']	= __( 'Tìm kiếm ...', 'astra' );
    $strings['string-search-nothing-found']		   = __( 'Không kết quả', 'astra' );
    $strings['string-full-width-search-message']	   = __( 'Bắt đầu nhập và nhấn enter để tìm kiếm', 'astra' );
    $strings['string-full-width-search-placeholder']   = __( 'Bắt đầu gõ...', 'astra' );
    $strings['string-header-cover-search-placeholder'] = __( 'Bắt đầu gõ...', 'astra' );
    
    // Single Post Default Strings
    $strings['string-single-page-links-before']	= __( 'Pages:', 'astra' );
    $strings['string-single-navigation-next']	= __('Bài viết tiếp theo', 'astra') . ' →';
    $strings['string-single-navigation-previous']	= '← ' . __('Bài viết trước', 'astra');

    // 404 Page Strings
    $strings['string-404-sub-title']	= __( 'Trang này không tồn tại.', 'astra' );
    $strings['string-404-search-title']	= __( 'Có vẻ như liên kết trỏ đến đây bị lỗi. Có thể thử tìm kiếm?', 'astra' );

    // Comment Template Strings
    $strings['string-comment-reply-link']		= __( 'TRẢ LỜI', 'astra' );
    $strings['string-comment-edit-link']		= __( 'CHỈNH SỬA', 'astra' );
    $strings['string-comment-awaiting-moderation']	= __( 'Bình luận của bạn đang chờ kiểm duyệt.', 'astra' );
    $strings['string-comment-title-reply']		= __( 'Để lại bình luận', 'astra' );
    $strings['string-comment-cancel-reply-link']	= __( 'Hủy trả lời', 'astra' );
    $strings['string-comment-label-submit']		= __( 'dăng bình luận →', 'astra' );
    $strings['string-comment-label-message']	= __( 'Tin nhắn', 'astra' );
    $strings['string-comment-label-name']		= __( 'Tên*', 'astra' );
    $strings['string-comment-label-email']		= __( 'Email*', 'astra' );
    $strings['string-comment-label-website']	= __( 'Website', 'astra' );
    $strings['string-comment-closed']		    = __( 'Comment đã đóng.', 'astra' );
    $strings['string-comment-navigation-title']	= __( 'Điều hướng bình luận', 'astra' );
    $strings['string-comment-navigation-next']	= __( 'Nhận xét mới hơn', 'astra' );
    $strings['string-comment-navigation-previous']	= __( 'Bình luận cũ hơn', 'astra' );
    $strings['string-comment-one-comment']		= __( 'MỘT BÌNH LUẬN', 'astra' );
    $strings['string-comment-multiple-comment']	= __( '%1$s BÌNH LUẬN', 'astra' );

    // Blog Default Strings
    $strings['string-blog-page-links-before']	= __( 'Pages:', 'astra' );
    $strings['string-blog-meta-author-by']		= __( 'Người đăng ', 'astra' );
    $strings['string-blog-meta-leave-a-comment']	= __( 'Để lại bình luận', 'astra' );
    $strings['string-blog-meta-one-comment']	= __( '1 Comment', 'astra' );
    $strings['string-blog-meta-multiple-comment']	= __( '% Comments', 'astra' );
    $strings['string-blog-navigation-next']		= __('Trang tiếp theo', 'astra') . ' →';
    $strings['string-blog-navigation-previous']	= '← ' . __('Trang trước đó', 'astra');

    // Content None
    $strings['string-content-nothing-found-message'] = __( 'Có vẻ như chúng tôi không thể tìm thấy những gì bạn đang tìm kiếm. Có lẽ tìm kiếm có thể giúp ích.', 'astra' );

    return $strings;
}