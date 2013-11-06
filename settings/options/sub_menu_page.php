<?php namespace PaintCloud\WP\Settings;

$page = new Page('My Sub Menu', array('type' => 'submenu', 'parent_slug' => 'my-menu'));

$settings = array();

// Submenu Section One
// ------------------------//
$settings['Submenu Section One'] = array('info' => 'Submenu section one information.');

$fields = array();
$fields[] = array(
	'type' 	=> 'text',
	'name' 	=> 'my_textfield',
	'label' => 'My Text Field'
	);

$fields[] = array(
	'type' 	=> 'color',
	'name' 	=> 'my_colorfield',
	'label' => 'My Color Field'
	);

$fields[] = array(
	'type' 	=> 'textarea',
	'name' 	=> 'my_textarea',
	'label' => 'My Textarea'
	);

$fields[] = array(
	'type' 	=> 'checkbox',
	'name' 	=> 'my_checkbox',
	'label' => 'My Checkbox'
	);

$fields[] = array(
	'type' 	=> 'upload',
	'name' 	=> 'my_upload',
	'label' => 'My Upload'
	);

$settings['Submenu Section One']['fields'] = $fields;


new OptionPageBuilderSingle($page, $settings);