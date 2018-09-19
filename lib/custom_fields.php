<?php

//* After WordPress is loaded, we can reasonably check what all CPTs support this functionality and add the field group wherever appropriate
add_action( 'wp_loaded', 'es_register_fields' );
function es_register_fields() {

	//* Check to see what post types have been declared as supporting sharing (posts and pages are default)
	$cpts = es_get_supported_cpts();
	
	//* Add the slug for each CPT to an array of arrays
	foreach ( $cpts as $cpt ) {

		$locations[] = array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => $cpt,
			)
		);
	}

	//* Register the field group
	acf_add_local_field_group( array(
		'key' => 'group_5b9aa2e69f265',
		'title' => 'Social',
		'fields' => array(
			array(
				'key' => 'field_5b9aa78fac39e',
				'label' => 'About sharing links',
				'type' => 'message',
				'message' => 'If you\'d like to use more custom URLs from a service like <a href="http://hrefshare.com" target="_blank">hrefshare.com</a> which allow for custom preset tweets or customizable Facebook preview text, you can paste in those URLs here.',
				'new_lines' => 'wpautop',
			),
			array(
				'key' => 'field_5b9aa2f1f9730',
				'label' => 'Facebook Share URL',
				'name' => 'facebookurl',
				'type' => 'url',
			),
			array(
				'key' => 'field_5b9aa2f1f9738',
				'label' => 'Twitter Share URL',
				'name' => 'twitterurl',
				'type' => 'url',
			),
		),
		'location' => $locations,
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => 'Please note that the link to this piece of content will be added automatically, so there\'s no need to include that. Leave this blank to allow for just the link to the current page to be shared, or write whatever you\'d like to say here to add that text!',
	) );

}

