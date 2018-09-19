<?php
/*
	Plugin Name: Elodin Simple Sharing
	Plugin URI: http://elod.in
	Description: An addon which sets up several ways to share
	Version: 1.0
    Author: Jon Schroeder
    Author URI: http://elod.in

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/

/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'ELODIN_SHARE', dirname( __FILE__ ) );

// Show notice if ACF isn't installed.
add_action( 'admin_notices', 'es_error_notice_ACF' );
function es_error_notice_ACF() {
    
    if( !class_exists( 'acf_pro_updates' ) ) {
        echo '<div class="error notice"><p>Please install and activate the <a target="_blank" href="https://www.advancedcustomfields.com/pro/">Advanced Custom Fields Pro</a> plugin. Without it, the Elodin Simple Sharing plugin won\'t operate correctly</p></div>';

    }

}

if( class_exists( 'acf_pro_updates' ) ) {

    // Includes
    include_once( 'lib/post_type_sharing_support.php' );
    include_once( 'lib/shortcode.php' );
    include_once( 'lib/custom_fields.php' );

}