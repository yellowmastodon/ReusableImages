<?php namespace ProcessWire;
/**
 * Joined info for all modules related to Reusable Images
 */
$common_title = __('Reusable Images', 'ReusableImages');
$common_icon = 'refresh';
$common_author = 'Juraj Mydla';
$common_version = 001;
$common_deps = ['ProcessWire>=3.0.179', 'PHP>=7.4.0'];

return [
    'Fieldtype' => [
        'title' => "$common_title",
        'summary' => 'Fieldtype that allows reuse of images across pages.',
        'author' => $common_author,
        'version' => $common_version,
        'requires' => $common_deps,
        'installs' => ['InputfieldImageReusable', 'ProcessImageReusable'],
        'autoload' => true,
        'icon' => $common_icon,
    ],
    'Inputfield' => [
        'title' => "$common_title (Inputfield)",
        'summary' => 'Inputfield that allows reuse of images across pages.',
        'author' => $common_author,
        'version' => $common_version,
        'requires' => $common_deps,
        'installs' => ['FieldtypeImageReusable'],
        'autoload' => true,
        'icon' => $common_icon,
    ],
    'Process' => [
        'title' => "$common_title (Process)",
        'summary' => 'Process for Inputfield and Fieldtype Reusable Images that stores one or more GIF, JPG, or PNG images with additional meta informations',
        'author' => $common_author,
        'version' => $common_version,
        'requires' => $common_deps,
        'autoload' => true,
        'installs' => ['FieldtypeImageReusable'],
        'icon' => $common_icon,
        'page' => [
            'name' => 'edit-reusable-images',
            'title' => __('Shared Media', 'ReusableImages'),
        ]
    ]
];
