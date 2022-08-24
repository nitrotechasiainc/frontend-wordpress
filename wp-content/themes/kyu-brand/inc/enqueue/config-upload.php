<?php
/********************************************************************
* Cho phép tải lên cho các tệp hình ảnh Webp
********************************************************************/ 
add_filter('mime_types', 'webp_upload_mimes');
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}

/********************************************************************
* Kích hoạt xem trước / hình thu nhỏ cho các tệp hình ảnh Webp.
********************************************************************/
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}

/********************************************************************
* Nén các tệp hình ảnh Webp xuống 75%
********************************************************************/
function filter_webp_quality( $quality, $mime_type ) {
    if ( 'image/webp' === $mime_type ) {
       return 75;
    }
    return $quality;
  }
  add_filter( 'wp_editor_set_quality', 'filter_webp_quality', 10, 2 );

/********************************************************************
* Cho phép tải lên cho các tệp hình ảnh SVG
********************************************************************/ 
add_filter('upload_mimes', 'vector_upload_mimes');
function vector_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

/********************************************************************
* Kích hoạt xem trước / hình thu nhỏ cho các tệp hình ảnh Webp.
********************************************************************/
function fix_svg() {
  echo '<style type="text/css">
            #postimagediv #set-post-thumbnail{width: 100%;}
            #postimagediv #set-post-thumbnail img{width: 100%;}
        </style>';
}
add_action( 'admin_head', 'fix_svg' );