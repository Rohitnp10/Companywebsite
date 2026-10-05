<?php

namespace App\Content;

class HomeContent
{
    public static function hero(): array
    {
        return [
            'eyebrow' => 'Software, innovation, and digital products',
            'brand' => config('company.short_name'),
            'title' => 'Building Digital Products That Move Businesses Forward.',
            'description' => 'Modern software solutions designed to simplify operations, improve experiences, and help businesses scale.',
            'image' => asset('images/home/hero-tech.jpg'),
            'image_alt' => 'Dual monitors showing Softrix business analytics dashboards',
            'primary_button' => [
                'label' => 'Explore Our Products',
                'route' => 'solutions',
            ],
            'secondary_button' => [
                'label' => 'Talk to Us',
                'route' => 'contact',
            ],
        ];
    }

    public static function aboutPreview(): array
    {
        return [
            'eyebrow' => 'About Softrix',
            'title' => 'Technology Built Around Your Business',
            'body' => "We're a technology company that designs and builds software around how businesses actually work — not the other way around. From custom platforms to ready-to-adapt business systems, we act as a long-term technology partner rather than a one-off vendor.",
            'image' => asset('images/home/about-collab.jpg'),
            'image_alt' => 'Laptop and tablet displaying Softrix business software interfaces',
            'float_icons' => ['code', 'globe', 'handshake'],
            'button' => [
                'label' => 'Learn More About Us',
                'route' => 'about',
            ],
        ];
    }

    public static function pillars(): array
    {
        return [
            [
                'title' => 'Custom Software',
                'description' => 'Systems shaped around your real workflows.',
                'icon' => 'code',
                'image' => asset('images/home/pillars/custom-software.jpg'),
                'image_alt' => 'Laptop screen displaying colorful lines of code',
            ],
            [
                'title' => 'Ready Products',
                'description' => 'Business platforms you can deploy and grow with.',
                'icon' => 'layout-grid',
                'image' => asset('images/home/pillars/ready-products.jpg'),
                'image_alt' => 'Laptop screen showing performance analytics graphs',
            ],
            [
                'title' => 'Ongoing Partnership',
                'description' => 'Support, iteration, and care after launch.',
                'icon' => 'handshake',
                'image' => asset('images/home/pillars/ongoing-partnership.jpg'),
                'image_alt' => 'Close-up of a professional business handshake',
            ],
        ];
    }

    public static function productShowcase(): array
    {
        return [
            'eyebrow' => 'Flagship Product — Ready Today',
            'title' => 'See the Restaurant Management System in Action',
            'body' => 'One system for the whole floor: orders move from table to kitchen to bill without re-entry, and every sale rolls up into a live dashboard.',
            'image' => asset('images/home/product-restaurant.jpg'),
            'image_alt' => 'Restaurant POS tablet showing order management software',
            'capabilities' => [
                'Order & table management',
                'Kitchen ticket flow',
                'Inventory & stock tracking',
                'Billing, payments & reporting',
            ],
        ];
    }

    public static function devices(): array
    {
        return [
            'eyebrow' => 'Web & Mobile',
            'title' => 'Built for Web. Designed for Mobile.',
            'description' => 'The same product, sized for every screen your team actually works on — front desk, kitchen, or on the floor.',
            'image' => asset('images/home/devices.jpg'),
            'image_alt' => 'Laptop, tablet, and phone showing matching Softrix software dashboards',
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
                    'image' => asset('images/home/why/business-first.jpg'),
                    'image_alt' => 'Person reviewing business charts on a tablet',
                ],
                [
                    'title' => 'Built to Scale',
                    'description' => 'Architecture decisions are made with growth in mind from day one.',
                    'icon' => 'trending-up',
                    'image' => asset('images/home/why/built-to-scale.jpg'),
                    'image_alt' => 'Stock market growth chart displayed on a laptop screen',
                ],
                [
                    'title' => 'Clear Communication',
                    'description' => 'No jargon-heavy updates — just clear, honest progress and timelines.',
                    'icon' => 'message-circle',
                    'image' => asset('images/home/why/clear-communication.jpg'),
                    'image_alt' => 'Team members in a discussion around a table',
                ],
                [
                    'title' => 'Long-Term Partnership',
                    'description' => 'We stay engaged after launch to support, maintain, and extend what we build.',
                    'icon' => 'handshake',
                    'image' => asset('images/home/why/long-term-partnership.jpg'),
                    'image_alt' => 'Two people shaking hands over a document',
                ],
            ],
        ];
    }

    public static function cta(): array
    {
        return [
            'title' => "Let's Build Something That Matters.",
            'description' => 'Have a business challenge or product idea? Let’s turn it into a practical digital solution.',
            'button' => [
                'label' => 'Start a Conversation',
                'route' => 'contact',
            ],
            'secondary' => [
                'label' => 'Explore Products',
                'route' => 'solutions',
            ],
        ];
    }

    public static function process(): array
    {
        return [
            'eyebrow' => 'How We Work',
            'title' => 'From the first conversation to what ships next',
            'steps' => [
                ['title' => 'Discover', 'description' => 'Learn how the business actually operates.'],
                ['title' => 'Define', 'description' => 'Set scope, priorities, and success clearly.'],
                ['title' => 'Design', 'description' => 'Shape flows and interfaces people can use.'],
                ['title' => 'Develop', 'description' => 'Build with maintainable engineering choices.'],
                ['title' => 'Test', 'description' => 'Check the product against real workflows.'],
                ['title' => 'Launch', 'description' => 'Release with a plan for the first weeks.'],
                ['title' => 'Improve', 'description' => 'Stay with the product after it is live.'],
            ],
        ];
    }

    public static function seo(): array
    {
        return [
            'title' => null, // null => falls back to seo.default_title
            'description' => 'Softrix International builds modern software, digital products, and technology solutions that help businesses operate smarter, scale faster, and grow with confidence.',
            'keywords' => config('seo.default_keywords'),
            'og_image' => asset('assets/social/og-image-1200x630.png'),
            'canonical' => route('home'),
        ];
    }
}
