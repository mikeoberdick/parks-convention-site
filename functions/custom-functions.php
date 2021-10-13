<?php

//custom excerpts
if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
    function understrap_all_excerpts_get_more_link( $post_excerpt ) {
        if ( ! is_admin() ) {
            $post_excerpt = $post_excerpt . '<a href = "' . get_permalink() . '"> Read More...</a></p>';
        }
        return $post_excerpt;
    }
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

//Shrink the excerpt
function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
?>