<?php

/**
 * Centralized navigation configuration.
 *
 * Uses Laravel named routes (never hard-coded URLs) so link targets can
 * change without editing the navigation itself. Structured as an array of
 * records so it could later be swapped for a `navigation_items` database
 * table with zero changes to the Blade navbar/footer components.
 */

return [

    'primary' => [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Services', 'route' => 'services'],
        ['label' => 'Solutions', 'route' => 'solutions'],
        ['label' => 'Industries', 'route' => 'industries'],
        ['label' => 'Projects', 'route' => 'projects'],
        ['label' => 'Careers', 'route' => 'careers'],
        ['label' => 'Contact', 'route' => 'contact'],
    ],

    'cta' => [
        'label' => "Let's Talk",
        'route' => 'contact',
    ],

    'footer_columns' => [
        [
            'heading' => 'Company',
            'links' => [
                ['label' => 'About Us', 'route' => 'about'],
                ['label' => 'Careers', 'route' => 'careers'],
                ['label' => 'Projects', 'route' => 'projects'],
                ['label' => 'Contact', 'route' => 'contact'],
            ],
        ],
        [
            'heading' => 'Services',
            'links' => [
                ['label' => 'Custom Software Development', 'route' => 'services'],
                ['label' => 'Web Application Development', 'route' => 'services'],
                ['label' => 'Mobile App Development', 'route' => 'services'],
                ['label' => 'UI/UX Design', 'route' => 'services'],
            ],
        ],
        [
            'heading' => 'Solutions',
            'links' => [
                ['label' => 'Restaurant Management System', 'route' => 'solutions'],
                ['label' => 'Retail Management System', 'route' => 'solutions'],
                ['label' => 'Business Management Platform', 'route' => 'solutions'],
            ],
        ],
    ],
];
