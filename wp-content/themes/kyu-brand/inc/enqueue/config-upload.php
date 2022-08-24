<?php
add_filter( 'mime_types', 'webp_upload_mimes' );
function webp_upload_mimes( $mimes ): array {
    $mimes['webp'] = 'image/webp';
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

add_filter( 'file_is_displayable_image', 'webp_is_displayable', 10, 2 );
function webp_is_displayable( $result, $path ) {
    if ( $result === false ) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info                    = @getimagesize( $path );

        if ( empty( $info ) ) {
            $result = false;
        } elseif ( ! in_array( $info[2], $displayable_image_types ) ) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}

add_action( 'admin_head', 'fix_svg' );
function fix_svg(): void {
    echo '<style type="text/css">
            #postimagediv #set-post-thumbnail{width: 100%;}
            #postimagediv #set-post-thumbnail img{width: 100%;}
        </style>';
}
