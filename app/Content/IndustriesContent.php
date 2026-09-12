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
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Retail',
                'slug' => 'retail',
                'description' => 'Point-of-sale, inventory, and customer management tools built for retail operations.',
                'icon' => 'shopping-bag',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Healthcare',
                'slug' => 'healthcare',
                'description' => 'Secure, workflow-driven software to support administrative and operational needs in healthcare settings.',
                'icon' => 'heart-pulse',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'id' => 4,
                'title' => 'Education',
                'slug' => 'education',
                'description' => 'Platforms that support learning management, administration, and communication for schools and institutions.',
                'icon' => 'graduation-cap',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'id' => 5,
                'title' => 'Transportation',
                'slug' => 'transportation',
                'description' => 'Tools for fleet, logistics, and operations management across transportation businesses.',
                'icon' => 'truck',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'id' => 6,
                'title' => 'Finance',
                'slug' => 'finance',
                'description' => 'Secure, reliable software to support financial operations, reporting, and compliance workflows.',
                'icon' => 'landmark',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'id' => 7,
                'title' => 'Professional Services',
                'slug' => 'professional-services',
                'description' => 'Custom tools for firms managing clients, projects, billing, and internal operations.',
                'icon' => 'briefcase',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'id' => 8,
                'title' => 'SMEs',
                'slug' => 'smes',
                'description' => 'Right-sized software for small and medium businesses ready to move past spreadsheets and manual processes.',
                'icon' => 'store',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'id' => 9,
                'title' => 'Enterprise',
                'slug' => 'enterprise',
                'description' => 'Scalable systems and integrations for larger organizations with more complex operational needs.',
                'icon' => 'building-2',
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

    public static function seo(): array
    {
        return [
            'title' => 'Industries We Work With',
            'description' => 'See the industries Softrix International builds software solutions for, from hospitality and retail to healthcare and enterprise.',
            'keywords' => 'industries, hospitality software, retail software, healthcare software, enterprise software, Softrix International',
            'og_image' => null,
            'canonical' => route('industries'),
        ];
    }
}
