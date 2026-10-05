<?php

namespace App\Content;

/**
 * Static "projects" data source.
 *
 * No real client engagements are represented yet, so entries below are
 * clearly-labeled internal/concept builds rather than fabricated client
 * work. Replace with real case studies as they become available — the
 * shape (id, slug, category, features, is_featured) mirrors
 * a future `projects` database table.
 */
class ProjectsContent
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Restaurant Management System',
                'subtitle' => 'Concept Build',
                'slug' => 'restaurant-management-system-concept',
                'category' => 'Hospitality',
                'description' => 'An internal concept build demonstrating order management, table tracking, and inventory workflows for restaurant operations.',
                'image' => 'images/home/product-restaurant.jpg',
                'icon' => 'utensils',
                'features' => ['Order & table management', 'Inventory tracking', 'Sales reporting'],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Retail Management System',
                'subtitle' => 'Concept Build',
                'slug' => 'retail-management-system-concept',
                'category' => 'Retail',
                'description' => 'A concept build exploring point-of-sale and inventory management workflows for small to mid-sized retailers.',
                'image' => 'images/projects/retail-management.jpg',
                'icon' => 'shopping-bag',
                'features' => ['Point-of-sale flow', 'Inventory management', 'Customer records'],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Business Management Platform',
                'subtitle' => 'Concept Build',
                'slug' => 'business-management-platform-concept',
                'category' => 'Cross-Industry',
                'description' => 'A modular concept platform for centralizing operational reporting and workflow automation.',
                'image' => 'images/projects/business-management-platform.jpg',
                'icon' => 'layout-grid',
                'features' => ['Configurable workflows', 'Centralized dashboards', 'Role-based access'],
                'is_featured' => false,
                'sort_order' => 3,
            ],
        ];
    }

    public static function page(): array
    {
        return [
            'eyebrow' => 'Projects',
            'title' => "What We've Been Building",
            'description' => 'A look at the concept builds we use to demonstrate our engineering and design approach — clearly labeled as internal work, not client case studies.',
            'primary_button' => [
                'label' => "Let's Talk",
                'route' => 'contact',
            ],
            'secondary_button' => [
                'label' => 'Our Products',
                'route' => 'solutions',
            ],
        ];
    }

    public static function approach(): array
    {
        return [
            'eyebrow' => 'How We Present Work',
            'title' => 'Honest portfolio. Real engineering.',
            'body' => 'Until we have published client engagements, this page shows internal concept builds only. They demonstrate how we think about workflows, interfaces, and maintainable architecture — without inventing case studies.',
            'points' => [
                'Clearly labeled as concept / internal builds',
                'Focused on operational workflows, not demos for demos\' sake',
                'Practical architecture suited to the problem',
                'A path from concept work into production products',
            ],
            'image' => asset('images/home/devices.jpg'),
            'image_alt' => 'Laptop, tablet, and phone showing Softrix software dashboards',
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
            'og_image' => asset('assets/social/og-image-1200x630.png'),
            'canonical' => route('projects'),
        ];
    }
}
