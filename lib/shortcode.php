<?php

function rb_share_main_shortcode( $atts, $content, $tag ) {
    
    global $post;

    $current_url = get_the_permalink();

    //* Do things before processing the shortcode 
    switch ( $tag ) {
        case 'facebook':
            $icon = '<span class="dashicons dashicons-facebook-alt"></span>';
            $share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $current_url;
            $classes = 'dashicons-before dashicons-facebook-alt';

        break;

        case 'twitter':
            $icon = '<span class="dashicons dashicons-twitter"></span>';
            $share_link = 'http://twitter.com/share?url=' . $current_url;
            $classes = 'dashicons-before dashicons-twitter';
        break;
    }

    $atts_array = shortcode_atts( array(
        'href' => $share_link,
        'url' => $share_link,
        'text' => 'Share on ' . $tag,
        'class' => null,
        'icon' => $icon,
    ), $atts );

    if ( $atts_array['url'] )
        $link = $atts_array['url'];

    if ( $atts_array['href'] )
        $link = $atts_array['href'];

    if ( $classes ) {
        $class = $atts_array['class'] . ' ' . $classes;
    } else {
        $class = $atts_array['class'];
    }

    ob_start();

    printf( '<a target="_blank" class="button button-social %s" href="%s">%s</a>', $classes, $link, $atts_array['text'] );

    return ob_get_clean();
}

//* Add shortcodes for each case
add_shortcode( 'facebook', 'rb_share_main_shortcode' );
add_shortcode( 'twitter', 'rb_share_main_shortcode' );