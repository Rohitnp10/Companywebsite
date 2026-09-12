<?php

namespace App\Content;

class AboutContent
{
    public static function whoWeAre(): array
    {
        return [
            'title' => 'Who We Are',
            'body' => "Softrix International is a technology company that designs, builds, and maintains software for businesses looking to operate smarter and scale faster. We work as a technology partner rather than a one-off vendor — staying close to how our clients' businesses actually run so the software we build fits, rather than forcing a fit.",
        ];
    }

    public static function mission(): array
    {
        return [
            'title' => 'Mission',
            'body' => 'To help businesses move forward through thoughtfully engineered software — built around real operational needs, not generic templates.',
        ];
    }

    public static function vision(): array
    {
        return [
            'title' => 'Vision',
            'body' => 'To be a trusted global technology partner known for building reliable, well-designed software that businesses can grow on.',
        ];
    }

    public static function values(): array
    {
        return [
            [
                'title' => 'Craftsmanship',
                'description' => 'We take engineering and design quality seriously, because software that businesses depend on deserves to be built well.',
                'icon' => 'gem',
            ],
            [
                'title' => 'Transparency',
                'description' => 'Clear communication, honest timelines, and no overselling what a piece of software can do.',
                'icon' => 'eye',
            ],
            [
                'title' => 'Partnership',
                'description' => 'We aim to understand our clients\u2019 businesses well enough to make good technical recommendations, not just execute instructions.',
                'icon' => 'handshake',
            ],
            [
                'title' => 'Long-Term Thinking',
                'description' => 'We build systems designed to be maintained and extended, not just shipped.',
                'icon' => 'trending-up',
            ],
        ];
    }

    public static function approach(): array
    {
        return [
            'title' => 'Our Approach',
            'steps' => [
                [
                    'title' => 'Understand',
                    'description' => 'We start by understanding the operational reality of your business — the workflows, constraints, and goals behind the request.',
                ],
                [
                    'title' => 'Design',
                    'description' => 'We design solutions and interfaces around how your team will actually use them, not around what looks good in isolation.',
                ],
                [
                    'title' => 'Build',
                    'description' => 'We develop using modern, maintainable technology choices suited to the scale of the problem.',
                ],
                [
                    'title' => 'Support',
                    'description' => 'Software needs upkeep. We stay engaged after launch to fix, improve, and extend what we\u2019ve built.',
                ],
            ],
        ];
    }

    public static function technologyPhilosophy(): array
    {
        return [
            'title' => 'Technology Philosophy',
            'body' => 'We choose technology based on the problem at hand, not trends. That means favoring proven, well-supported tools, designing for maintainability from day one, and avoiding unnecessary complexity that slows a business down later.',
        ];
    }

    public static function seo(): array
    {
        return [
            'title' => 'About Us',
            'description' => 'Learn about Softrix International\u2019s mission, values, and approach to building technology solutions for businesses.',
            'keywords' => 'about Softrix International, software company, technology partner, mission, values',
            'og_image' => null,
            'canonical' => route('about'),
        ];
    }
}
