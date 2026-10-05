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
        ['label' => 'Products', 'route' => 'solutions'],
        ['label' => 'Solutions', 'route' => 'services'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Contact', 'route' => 'contact'],
    ],

    'cta' => [
        'label' => "Let's Build Together",
        'route' => 'contact',
    ],

    'footer_columns' => [
        [
            'heading' => 'Company',
            'links' => [
                ['label' => 'About Us', 'route' => 'about'],
                ['label' => 'Team', 'route' => 'team'],
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
            'heading' => 'Products',
            'links' => [
                ['label' => 'Restaurant Management System', 'route' => 'solutions'],
                ['label' => 'Hotel Management System', 'route' => 'solutions'],
                ['label' => 'Dental Management System', 'route' => 'solutions'],
            ],
        ],
    ],
];
