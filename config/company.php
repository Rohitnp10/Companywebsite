<?php

/**
 * Centralized company configuration.
 *
 * This is the SINGLE source of truth for all company identity and contact
 * information across the entire website. Nothing below should ever be
 * hard-coded again inside a Blade view or component.
 *
 * When this business becomes dynamic (e.g. multi-tenant, or company details
 * move into a database "settings" table), this file can be replaced by a
 * config-caching call to a Settings model/repository without touching any
 * Blade file, since every view only ever reads config('company.*').
 */

return [

    'name' => 'Softrix International Pvt. Ltd.',
    'short_name' => 'Softrix',
    'legal_suffix' => 'International Pvt. Ltd.',

    'tagline' => 'Technology That Moves Business Forward.',

    'description' => 'Softrix International builds modern software, digital products, and technology solutions designed to help businesses operate smarter, scale faster, and create better experiences.',

    'founded_year' => 2024,

    /*
    |--------------------------------------------------------------------------
    | Contact
    |--------------------------------------------------------------------------
    */
    'email' => 'info@softrixinternational.com',
    'support_email' => 'support@softrixinternational.com',
    'phone' => '+977-1-4000000',
    'phone_display' => '+977 1-400-0000',

    /*
    |--------------------------------------------------------------------------
    | Location
    |--------------------------------------------------------------------------
    |
    | IMPORTANT: This is temporary/placeholder information. The company may
    | relocate or expand in the future. Because every view reads location
    | data from here (config('company.address') / config('company.city') /
    | config('company.country')), changing offices later requires editing
    | ONLY this array — never search-and-replace across Blade files.
    |
    */
    'address_line' => 'Kathmandu, Nepal',
    'street' => '',
    'city' => 'Kathmandu',
    'state' => '',
    'country' => 'Nepal',
    'postal_code' => '',
    'map_embed_url' => 'https://maps.google.com/maps?q=Kathmandu,Nepal&output=embed',

    /*
    |--------------------------------------------------------------------------
    | Social Links
    |--------------------------------------------------------------------------
    */
    'social' => [
        [
            'label' => 'LinkedIn',
            'icon' => 'linkedin',
            'url' => 'https://www.linkedin.com/company/softrix-international',
        ],
        [
            'label' => 'Facebook',
            'icon' => 'facebook',
            'url' => 'https://www.facebook.com/softrixinternational',
        ],
        [
            'label' => 'X (Twitter)',
            'icon' => 'twitter',
            'url' => 'https://twitter.com/softrixintl',
        ],
        [
            'label' => 'GitHub',
            'icon' => 'github',
            'url' => 'https://github.com/softrix-international',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Brand Assets
    |--------------------------------------------------------------------------
    */
    'logo' => '/images/logo.svg',
    'logo_mark' => '/images/logo-mark.svg',
    'favicon' => '/favicon.ico',

    'website' => 'https://www.softrixinternational.com',
];
