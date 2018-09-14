<?php

'location' => array(
	array(
		array(
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'issues',
		),
	),
	array(
		array(
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'page',
		),
	),
),

if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_5b9aa2e69f265',
	'title' => 'Social',
	'fields' => array(
		array(
			'key' => 'field_5b9aa78fac39e',
			'label' => 'About sharing links',
			'type' => 'message',
			'message' => 'Please note that the link to this piece of content will be added automatically, so there\'s no need to include that. Leave this blank to allow for just the link to the current page to be shared, or write whatever you\'d like to say here to add that text!',
			'new_lines' => 'wpautop',
			'wrapper' => array(
				'width' => '50',
			),
		),
		array(
			'key' => 'field_5b9aa2f1f9730',
			'label' => 'Facebook text',
			'name' => 'sharefacebook',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
			),
			'rows' => 4,
		),
		array(
			'key' => 'field_5b9aa2fdf9731',
			'label' => 'Twitter text',
			'name' => 'sharetwitter',
			'type' => 'textarea',
			'wrapper' => array(
				'width' => '25',
			),
			'maxlength' => 140,
			'rows' => 4,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'issues',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => 'Please note that the link to this piece of content will be added automatically, so there\'s no need to include that. Leave this blank to allow for just the link to the current page to be shared, or write whatever you\'d like to say here to add that text!',
));

endif;