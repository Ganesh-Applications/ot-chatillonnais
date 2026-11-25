<?php

add_action('init', 'registerCustomPostTypes');

/**
 * Créé les posts types et les taxonomies
 */
function registerCustomPostTypes()
{
    $dir = __DIR__ . '/PostTypes';

    $postTypeDefaults = [
        'public'       => true,
        'has_archive'  => true,
        'supports'     => ['title', 'thumbnail'], //-> Sans Gutenberg
        'show_in_rest' => true,
    ];

    $taxonomyDefaults = [
        'public'       => true,
        'hierarchical' => false,
        'show_in_rest' => true,
    ];

    $postTypes = [
        'accommodation' => [
            'label'           => 'Hébergements',
            'menu_icon'       => 'dashicons-building',
            'rewrite'         => ['slug' => 'accommodation'],
            'taxonomies'      => ['category'],
            'tourinsoft_flux' => 'https://api-v3.tourinsoft.com/api/syndications/decibelles-data.tourinsoft.com/847a060a-c359-489a-ad89-921bd3ac1ec8?format=json',
        ]
    ];

    foreach ($postTypes as $name => $args)
    {
        register_post_type($name, array_merge($postTypeDefaults, $args));
    }

    $taxonomies = [
        'language' => [
            'args' => [
                'label' => 'Langues parlées',
                'slug' => 'languages',
            ],
            'post_types' => ['accommodation'],
        ],
        'equipment' => [
            'args' => [
                'label' => 'Équipements',
                'slug' => 'equipments',
            ],
            'post_types' => ['accommodation'],
        ],
        'service' => [
            'args' => [
                'label' => 'Services',
                'slug' => 'services',
            ],
            'post_types' => ['accommodation'],
        ],
        'payment_method' => [
            'args' => [
                'label' => 'Modes de paiement',
                'slug' => 'payment-methods',
            ],
            'post_types' => ['accommodation'],
        ],
        'accommodation_type' => [
            'args' => [
                'label' => "Types d'hébergement",
                'slug'  => 'accommodation-types',
            ],
            'post_types' => ['accommodation'],
        ],
        'accommodation_rating' => [
            'args' => [
                'label' => 'Classements',
                'slug'  => 'accommodation-ratings',
            ],
            'post_types' => ['accommodation'],
        ],
    ];

    foreach ($taxonomies as $name => $params)
    {
        register_taxonomy($name, $params['post_types'], array_merge($taxonomyDefaults, $params['args']));
    }
}
