<?php namespace ProcessWire;


$config = [

    //Reference to admin page, updated on install
    'imageFolderPage' => [
        'type' => 'integer',
		'collapsed' => Inputfield::collapsedHidden,
		'value' => 0
    ],

	'inheritDescriptionSettings' => [
		'type' => 'checkbox', 
		'label' => __('Inherit description', 'ReusableImages'), 
		'checkboxLabel' => __('Inherit', 'ReusableImages'),
		'value' => 1, // default value
		'description' => __('Fields of type InputfieldImageReusable inherit the description settings. This is a default value, can still be overriden in field settings.', 'ReusableImages'), // like description but appears under field
	],
	
	'inheritCustomFieldSettings' => [
		'type' => 'checkbox', 
		'label' => __('Inherit custom fields', 'ReusableImages'), 
		'checkboxLabel' => __('Inherit'),
		'value' => 1, // default value
		'description' => __('Fields of type InputfieldImageReusable inherit the same custom fields template. This is a default value, can still be overriden in field settings.', 'ReusableImages'), // like description but appears under field
	]

	/* // Radio buttons: greetingType
	'greetingType' => [
		'type' => 'radios', 
		'label' => __('Greeting Type'), 
		'options' => [
			// options array of value => label
			'message' => __('Message'), 
			'warning' => __('Warning'),
			'error' => __('Error'), 
		],
		'value' => 'warning', // default value
		'optionColumns' => 1, // make options display on one line
		'notes' => __('Choose wisely'), // like description but appears under field
	] */
]; 