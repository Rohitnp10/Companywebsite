<?php

namespace App\Content;

class HomeContent
{
    public static function hero(): array
    {
        return [
            'eyebrow' => 'Softrix International',
            'title' => 'Building Digital Solutions That Move Businesses Forward.',
            'description' => 'Softrix International builds modern software, digital products, and technology solutions designed to help businesses operate smarter, scale faster, and create better experiences.',
            'primary_button' => [
                'label' => 'Explore Our Solutions',
                'route' => 'solutions',
            ],
            'secondary_button' => [
                'label' => "Let's Talk",
                'route' => 'contact',
            ],
        ];
    }

    public static function aboutPreview(): array
    {
        return [
            'eyebrow' => 'About Softrix',
            'title' => 'Technology Built Around Your Business',
            'body' => 'We\u2019re a technology company that designs and builds software around how businesses actually work — not the other way around. From custom platforms to ready-to-adapt business systems, we act as a long-term technology partner rather than a one-off vendor.',
            'button' => [
                'label' => 'Learn More About Us',
                'route' => 'about',
            ],
        ];
    }

    public static function whySoftrix(): array
    {
        return [
            'eyebrow' => 'Why Softrix',
            'title' => 'What Sets Us Apart',
            'items' => [
                [
                    'title' => 'Business-First Engineering',
                    'description' => 'We design software around your operational reality, not generic templates.',
                    'icon' => 'target',
                ],
                [
                    'title' => 'Built to Scale',
                    'description' => 'Architecture decisions are made with growth in mind from day one.',
                    'icon' => 'trending-up',
                ],
                [
                    'title' => 'Clear Communication',
                    'description' => 'No jargon-heavy updates — just clear, honest progress and timelines.',
                    'icon' => 'message-circle',
                ],
                [
                    'title' => 'Long-Term Partnership',
                    'description' => 'We stay engaged after launch to support, maintain, and extend what we build.',
                    'icon' => 'handshake',
                ],
            ],
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
            'title' => null, // null => falls back to seo.default_title
            'description' => 'Softrix International builds modern software, digital products, and technology solutions that help businesses operate smarter, scale faster, and grow with confidence.',
            'keywords' => config('seo.default_keywords'),
            'og_image' => null,
            'canonical' => route('home'),
        ];
    }
}
