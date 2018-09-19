<?php

function rb_share_main_shortcode( $atts, $content, $tag ) {
    
    global $post;

    $current_url = get_the_permalink();

    // Do things before processing the shortcode 
    switch ( $tag ) {

        case 'facebook':
            $icon = apply_filters( 'facebook_icon', '<span class="dashicons dashicons-facebook-alt"></span>' );
            $share_link = apply_filters( 'facebook_share_link', 'https://www.facebook.com/sharer/sharer.php?u=' . $current_url, $current_url );
            $classes = apply_filters( 'facebook_classes', 'dashicons-before dashicons-facebook-alt button button-social button-facebook' );

        break;

        case 'twitter':
            $icon = apply_filters( 'twitter_icon', '<span class="dashicons dashicons-twitter"></span>' );
            $share_link = apply_filters( 'twitter_share_link',  'http://twitter.com/share?url=' . $current_url, $current_url );
            $classes = apply_filters( 'twitter_classes', 'dashicons-before dashicons-twitter button button-social button-twitter' );
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

    printf( '<a target="_blank" class="%s" href="%s">%s</a>', $classes, $link, $atts_array['text'] );

    return ob_get_clean();
}

// Add shortcodes for each case
add_shortcode( 'facebook', 'rb_share_main_shortcode' );
add_shortcode( 'twitter', 'rb_share_main_shortcode' );

// Add filter to conditionally replace the Facebook share link if a custom one is being used
add_filter( 'facebook_share_link', 'facebook_check_for_custom_url', 20, 1 );
function facebook_check_for_custom_url( $args ) {
    $facebook_custom_url = get_post_meta( get_the_ID(), 'facebookurl', true );
    
    // Return the custom lnk instead of the page link if there is one
    if ( $facebook_custom_url )
        return $facebook_custom_url;  
    
    // Otherwise, leave it alone
    return $args;
}

// Add filter to conditionally replace the Twitter share link if a custom one is being used
add_filter( 'twitter_share_link', 'twitter_check_for_custom_url', 20, 1 );
function twitter_check_for_custom_url( $args ) {
    $twitter_custom_url = get_post_meta( get_the_ID(), 'twitterurl', true );
    
    // Return the custom lnk instead of the page link if there is one
    if ( $twitter_custom_url )
        return $twitter_custom_url;  
    
    // Otherwise, leave it alone
    return $args;
}