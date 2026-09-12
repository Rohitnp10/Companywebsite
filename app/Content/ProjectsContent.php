<?php

namespace App\Content;

/**
 * Static "projects" data source.
 *
 * No real client engagements are represented yet, so entries below are
 * clearly-labeled internal/concept builds rather than fabricated client
 * work. Replace with real case studies as they become available — the
 * shape (id, slug, category, technologies, features, is_featured) mirrors
 * a future `projects` database table.
 */
class ProjectsContent
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Restaurant Management System (Concept Build)',
                'slug' => 'restaurant-management-system-concept',
                'category' => 'Hospitality',
                'description' => 'An internal concept build demonstrating order management, table tracking, and inventory workflows for restaurant operations.',
                'image' => null,
                'technologies' => ['Laravel', 'MySQL', 'Alpine.js', 'Tailwind CSS'],
                'features' => ['Order & table management', 'Inventory tracking', 'Sales reporting'],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Retail Management System (Concept Build)',
                'slug' => 'retail-management-system-concept',
                'category' => 'Retail',
                'description' => 'A concept build exploring point-of-sale and inventory management workflows for small to mid-sized retailers.',
                'image' => null,
                'technologies' => ['Laravel', 'MySQL', 'Tailwind CSS'],
                'features' => ['Point-of-sale flow', 'Inventory management', 'Customer records'],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Business Management Platform (Concept Build)',
                'slug' => 'business-management-platform-concept',
                'category' => 'Cross-Industry',
                'description' => 'A modular concept platform for centralizing operational reporting and workflow automation.',
                'image' => null,
                'technologies' => ['Laravel', 'PostgreSQL', 'Tailwind CSS'],
                'features' => ['Configurable workflows', 'Centralized dashboards', 'Role-based access'],
                'is_featured' => false,
                'sort_order' => 3,
            ],
        ];
    }

    public static function featured(): array
    {
        $items = array_filter(self::all(), fn ($item) => $item['is_featured']);
        usort($items, fn ($a, $b) => $a['sort_order'] <=> $b['sort_order']);

        return array_values($items);
    }

    public static function ordered(): array
    {
        $items = self::all();
        usort($items, fn ($a, $b) => $a['sort_order'] <=> $b['sort_order']);

        return $items;
    }

    public static function seo(): array
    {
        return [
            'title' => 'Projects',
            'description' => 'A look at the concept builds and internal projects Softrix International has developed to demonstrate its engineering approach.',
            'keywords' => 'Softrix International projects, portfolio, concept builds',
            'og_image' => null,
            'canonical' => route('projects'),
        ];
    }
}
