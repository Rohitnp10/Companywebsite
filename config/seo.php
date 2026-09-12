<?php

/**
 * Default / fallback SEO values.
 *
 * Individual pages override these via the $seo array passed from each
 * controller (see app/Content/*Content.php -> seo() methods). This keeps
 * a reusable <x-seo> component working the same way whether the values
 * come from a static array today or a database "pages" table tomorrow.
 */

return [

    'default_title' => 'Softrix International | Technology That Moves Business Forward',
    'title_separator' => ' | ',
    'default_description' => 'Softrix International builds modern software, digital products, and technology solutions that help businesses operate smarter, scale faster, and create better experiences.',
    'default_keywords' => 'Softrix International, custom software development, web application development, mobile app development, UI/UX design, business management systems, cloud solutions',
    'default_og_image' => '/images/og/softrix-default.jpg',
    'twitter_handle' => '@softrixintl',
];
