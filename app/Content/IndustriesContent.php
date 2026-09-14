<?php

namespace App\Content;

/**
 * Static "industries" data source.
 *
 * Deliberately avoids fabricated statistics (e.g. "we serve 50+ industries",
 * client counts, etc.) per brand guidelines — copy communicates capability
 * and focus areas, not unverifiable claims.
 */
class IndustriesContent
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Hospitality',
                'slug' => 'hospitality',
                'description' => 'Systems for restaurants, hotels, and hospitality operations — from order management to staff scheduling.',
                'icon' => 'utensils',
                'image' => asset('images/industries/hospitality.jpg'),
                'image_alt' => 'Warmly lit restaurant dining room with set tables',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Retail',
                'slug' => 'retail',
                'description' => 'Point-of-sale, inventory, and customer management tools built for retail operations.',
                'icon' => 'shopping-bag',
                'image' => asset('images/industries/retail.jpg'),
                'image_alt' => 'Bright, organized retail clothing store interior',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Healthcare',
                'slug' => 'healthcare',
                'description' => 'Secure, workflow-driven software to support administrative and operational needs in healthcare settings.',
                'icon' => 'heart-pulse',
                'image' => asset('images/industries/healthcare.jpg'),
                'image_alt' => 'Modern clinic hallway with glass doors',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'id' => 4,
                'title' => 'Education',
                'slug' => 'education',
                'description' => 'Platforms that support learning management, administration, and communication for schools and institutions.',
                'icon' => 'graduation-cap',
                'image' => asset('images/industries/education.jpg'),
                'image_alt' => 'Students in a classroom with a teacher presenting',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'id' => 5,
                'title' => 'Transportation',
                'slug' => 'transportation',
                'description' => 'Tools for fleet, logistics, and operations management across transportation businesses.',
                'icon' => 'truck',
                'image' => asset('images/industries/transportation.jpg'),
                'image_alt' => 'Row of parked freight trucks in a fleet yard',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'id' => 6,
                'title' => 'Finance',
                'slug' => 'finance',
                'description' => 'Secure, reliable software to support financial operations, reporting, and compliance workflows.',
                'icon' => 'landmark',
                'image' => asset('images/industries/finance.jpg'),
                'image_alt' => 'Modern glass office building facade',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'id' => 7,
                'title' => 'Professional Services',
                'slug' => 'professional-services',
                'description' => 'Custom tools for firms managing clients, projects, billing, and internal operations.',
                'icon' => 'briefcase',
                'image' => asset('images/industries/professional-services.jpg'),
                'image_alt' => 'Team meeting around a conference table',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'id' => 8,
                'title' => 'SMEs',
                'slug' => 'smes',
                'description' => 'Right-sized software for small and medium businesses ready to move past spreadsheets and manual processes.',
                'icon' => 'store',
                'image' => asset('images/industries/smes.jpg'),
                'image_alt' => 'Clean small business storefront exterior during daytime',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'id' => 9,
                'title' => 'Enterprise',
                'slug' => 'enterprise',
                'description' => 'Scalable systems and integrations for larger organizations with more complex operational needs.',
                'icon' => 'building-2',
                'image' => asset('images/industries/enterprise.jpg'),
                'image_alt' => 'Tall corporate office building exterior',
                'is_active' => true,
                'sort_order' => 9,
            ],
        ];
    }

    public static function active(): array
    {
        $items = array_filter(self::all(), fn ($item) => $item['is_active']);
        usort($items, fn ($a, $b) => $a['sort_order'] <=> $b['sort_order']);

        return array_values($items);
    }

    public static function page(): array
    {
        return [
            'eyebrow' => 'Industries',
            'title' => 'Industries We Build For',
            'description' => 'We design software that adapts to the operational realities of different industries — here\'s where our approach fits well.',
            'primary_button' => [
                'label' => "Let's Talk",
                'route' => 'contact',
            ],
            'secondary_button' => [
                'label' => 'View Products',
                'route' => 'solutions',
            ],
        ];
    }

    public static function focus(): array
    {
        return [
            'eyebrow' => 'Where We Go Deep',
            'title' => 'Strongest fit today',
            'description' => 'Hospitality and healthcare are where our product work is furthest along — with custom software available across every industry we list.',
            'items' => [
                [
                    'title' => 'Hospitality',
                    'description' => 'Restaurants and hotels need systems that keep pace with the floor — orders, rooms, staff, and billing in one place.',
                    'icon' => 'utensils',
                    'image' => asset('images/industries/hospitality.jpg'),
                    'image_alt' => 'Restaurant dining area with staff at work',
                    'product' => 'Restaurant Management System — Ready',
                    'product_route' => 'solutions',
                ],
                [
                    'title' => 'Healthcare',
                    'description' => 'Clinics need secure, workflow-driven tools for appointments, records, and billing without unnecessary complexity.',
                    'icon' => 'heart-pulse',
                    'image' => asset('images/industries/healthcare.jpg'),
                    'image_alt' => 'Modern healthcare clinic interior',
                    'product' => 'Dental Management System — In Development',
                    'product_route' => 'solutions',
                ],
            ],
        ];
    }

    public static function approach(): array
    {
        return [
            'eyebrow' => 'How We Adapt',
            'title' => 'Same engineering discipline. Industry-specific workflows.',
            'body' => 'We do not force a generic template onto every business. We start with how your operations actually run, then design software that fits — whether you need a ready product, a custom build, or a combination of both.',
            'points' => [
                'Workflow-first discovery before technical decisions',
                'Products where they fit; custom builds where they do not',
                'Clear communication across industries and team sizes',
                'Long-term support as your operations evolve',
            ],
            'image' => asset('images/home/about-collab.jpg'),
            'image_alt' => 'Laptop and tablet displaying Softrix business software interfaces',
        ];
    }

    public static function cta(): array
    {
        return [
            'title' => "Don't see your industry listed? Let's talk about what you need.",
            'button' => [
                'label' => "Let's Talk",
                'route' => 'contact',
            ],
        ];
    }

    public static function seo(): array
    {
        return [
            'title' => 'Industries We Work With',
            'description' => 'See the industries Softrix International builds software solutions for, from hospitality and retail to healthcare and enterprise.',
            'keywords' => 'industries, hospitality software, retail software, healthcare software, enterprise software, Softrix International',
            'og_image' => asset('images/home/about-collab.jpg'),
            'canonical' => route('industries'),
        ];
    }
}
