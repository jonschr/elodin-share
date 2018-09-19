<?php

/**
 * Checks all post types for support
 * Don't fire this until the wp_loaded hook to make sure everything has a chance to register things
 * 
 * @return array including the names of each CPT that supports social sharing
 */
function es_get_supported_cpts() {
	
	$post_types = get_post_types();

	$supported_types = array();

	foreach( $post_types as $post_type ) {

		if( post_type_supports( $post_type, 'social' ) )
			$supported_types[] = $post_type;
		
	}

	return $supported_types;
}

/**
 * Add support to the default content types we want to register
 */
add_action( 'init', 'es_add_default_cpt_sharing_support' );
function es_add_default_cpt_sharing_support() {
	add_post_type_support( 'page', 'social' );
	add_post_type_support( 'post', 'social' );
}