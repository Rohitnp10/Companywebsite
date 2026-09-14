<?php

namespace App\Content;

class AboutContent
{
    public static function whoWeAre(): array
    {
        return [
            'eyebrow' => 'About Softrix',
            'title' => 'Software built around how businesses actually work',
            'lede' => 'We design, build, and maintain systems for teams that need software to fit real operations — not the other way around.',
            'body' => "Softrix International is a technology company that designs, builds, and maintains software for businesses looking to operate smarter and scale faster. We work as a technology partner rather than a one-off vendor — staying close to how our clients' businesses actually run so the software we build fits, rather than forcing a fit.",
            'image' => asset('images/home/about-collab.jpg'),
            'image_alt' => 'Laptop and tablet displaying Softrix business software interfaces',
            'highlights' => [
                [
                    'title' => 'Technology partner',
                    'description' => 'Engaged beyond launch — not a one-off vendor relationship.',
                    'icon' => 'handshake',
                ],
                [
                    'title' => 'Business-first software',
                    'description' => 'Built around real workflows, constraints, and growth plans.',
                    'icon' => 'target',
                ],
                [
                    'title' => 'Maintainable systems',
                    'description' => 'Designed to be extended, supported, and trusted over time.',
                    'icon' => 'trending-up',
                ],
            ],
        ];
    }

    public static function mission(): array
    {
        return [
            'title' => 'Mission',
            'body' => 'To help businesses move forward through thoughtfully engineered software — built around real operational needs, not generic templates.',
            'icon' => 'target',
        ];
    }

    public static function vision(): array
    {
        return [
            'title' => 'Vision',
            'body' => 'To be a trusted global technology partner known for building reliable, well-designed software that businesses can grow on.',
            'icon' => 'eye',
        ];
    }

    public static function values(): array
    {
        return [
            [
                'title' => 'Craftsmanship',
                'description' => 'We take engineering and design quality seriously, because software that businesses depend on deserves to be built well.',
                'icon' => 'gem',
                'image' => asset('images/about/values/craftsmanship.jpg'),
                'image_alt' => 'Hands carefully carving wood with a chisel',
            ],
            [
                'title' => 'Transparency',
                'description' => 'Clear communication, honest timelines, and no overselling what a piece of software can do.',
                'icon' => 'eye',
                'image' => asset('images/about/values/transparency.jpg'),
                'image_alt' => 'Transparent glass-walled office building',
            ],
            [
                'title' => 'Partnership',
                'description' => "We aim to understand our clients' businesses well enough to make good technical recommendations, not just execute instructions.",
                'icon' => 'handshake',
                'image' => asset('images/about/values/partnership.jpg'),
                'image_alt' => 'Team members joining hands in unity',
            ],
            [
                'title' => 'Long-Term Thinking',
                'description' => 'We build systems designed to be maintained and extended, not just shipped.',
                'icon' => 'trending-up',
                'image' => asset('images/about/values/long-term-thinking.jpg'),
                'image_alt' => 'Long road extending into the distance toward mountains',
            ],
        ];
    }

    public static function approach(): array
    {
        return [
            'eyebrow' => 'How We Work',
            'title' => 'Our Approach',
            'description' => 'A clear path from understanding your operations to supporting what we ship.',
            'steps' => [
                [
                    'title' => 'Understand',
                    'description' => 'We start by understanding the operational reality of your business — the workflows, constraints, and goals behind the request.',
                    'icon' => 'message-circle',
                ],
                [
                    'title' => 'Design',
                    'description' => 'We design solutions and interfaces around how your team will actually use them, not around what looks good in isolation.',
                    'icon' => 'pencil-ruler',
                ],
                [
                    'title' => 'Build',
                    'description' => 'We develop with maintainable choices suited to the scale of the problem — and to the team that will own it.',
                    'icon' => 'code',
                ],
                [
                    'title' => 'Support',
                    'description' => "Software needs upkeep. We stay engaged after launch to fix, improve, and extend what we've built.",
                    'icon' => 'wrench',
                ],
            ],
        ];
    }

    public static function technologyPhilosophy(): array
    {
        return [
            'eyebrow' => 'Our Thinking',
            'title' => 'Technology Philosophy',
            'body' => 'We choose technology based on the problem at hand, not trends. That means favoring proven, well-supported tools, designing for maintainability from day one, and avoiding unnecessary complexity that slows a business down later.',
        ];
    }

    public static function cta(): array
    {
        return [
            'title' => "Have an idea or business challenge? Let's build something valuable.",
            'button' => [
                'label' => "Let's Talk",
                'route' => 'contact',
            ],
        ];
    }

    public static function seo(): array
    {
        return [
            'title' => 'About Us',
            'description' => "Learn about Softrix International's mission, values, and approach to building technology solutions for businesses.",
            'keywords' => 'about Softrix International, software company, technology partner, mission, values',
            'og_image' => asset('images/home/about-collab.jpg'),
            'canonical' => route('about'),
        ];
    }
}
