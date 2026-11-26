<?php

add_action('init', 'registerCustomPostTypes');

/**
 * Créé les posts types et les taxonomies
 */
function registerCustomPostTypes()
{
    $dir = __DIR__ . '/PostTypes';

    $postTypeDefaults = [
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'thumbnail'], //-> Sans Gutenberg
        'show_in_rest' => true,
    ];

    $taxonomyDefaults = [
        'public' => true,
        'hierarchical' => false,
        'show_in_rest' => true,
    ];

    $postTypes = [
        'accommodation' => [
            'label' => 'Hébergements',
            'menu_icon' => 'dashicons-building',
            'rewrite' => ['slug' => 'accommodation'],
            'taxonomies' => ['category'],
            'tourinsoft_flux' => 'https://api-v3.tourinsoft.com/api/syndications/decibelles-data.tourinsoft.com/847a060a-c359-489a-ad89-921bd3ac1ec8?format=json',
        ],
        'restaurant' => [
            'label' => 'Restaurants',
            'menu_icon' => 'dashicons-food',
            'rewrite' => ['slug' => 'restaurant'],
            'taxonomies' => ['category'],
            'tourinsoft_flux' => 'https://api-v3.tourinsoft.com/api/syndications/decibelles-data.tourinsoft.com/65754bc1-d51d-4e0c-88c9-2169315797c1?format=json'
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
            ],
            'post_types' => ['accommodation'],
        ],
        'equipment' => [
            'args' => [
                'label' => 'Équipements',
            ],
            'post_types' => ['accommodation', 'restaurant'],
        ],
        'label' => [
            'args' => [
                'label' => 'Labels',
            ],
            'post_types' => ['restaurant'],
        ],
        'service' => [
            'args' => [
                'label' => 'Services',
            ],
            'post_types' => ['accommodation'],
        ],
        'payment_method' => [
            'args' => [
                'label' => 'Modes de paiement',
            ],
            'post_types' => ['accommodation'],
        ],
        'accommodation_type' => [
            'args' => [
                'label' => "Types d'hébergement",
            ],
            'post_types' => ['accommodation'],
        ],
        'accommodation_rating' => [
            'args' => [
                'label' => 'Classements',
            ],
            'post_types' => ['accommodation'],
        ],
        'restaurant_type' => [
            'args' => [
                'label' => 'Types de restauration',
            ],
            'post_types' => ['restaurant'],
        ],
        'restaurant_category' => [
            'args' => [
                'label' => 'Catégories de restaurant',
            ],
            'post_types' => ['restaurant'],
        ],
        'culinary_specialty' => [
            'args' => [
                'label' => 'Spécialités culinaires',
            ],
            'post_types' => ['restaurant'],
        ],
        'restaurant_rating' => [
            'args' => [
                'label' => 'Classements',
            ],
            'post_types' => ['restaurant'],
        ],
        'guide_rating' => [
            'args' => [
                'label' => 'Classements guides',
            ],
            'post_types' => ['restaurant'],
        ],
        'logis_rating' => [
            'args' => [
                'label' => 'Classements Logis',
            ],
            'post_types' => ['restaurant'],
        ],
    ];

    foreach ($taxonomies as $name => $params)
    {
        register_taxonomy($name, $params['post_types'], array_merge($taxonomyDefaults, $params['args']));
    }
}
