<?php

namespace App\Content;

/**
 * Static "solutions / products" data source.
 *
 * NOTE: These are currently product CONCEPTS Softrix can build and
 * customize for clients — not established, shipped commercial products.
 * Copy is written accordingly (capability framing, not sales-figure or
 * customer-count claims). When real, named products exist, replace the
 * entries below (or the eventual `products` table rows) with accurate
 * details.
 */
class SolutionsContent
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Restaurant Management System',
                'slug' => 'restaurant-management-system',
                'category' => 'Hospitality',
                'short_description' => 'A comprehensive solution concept for managing restaurant operations.',
                'description' => 'Designed to bring order management, table tracking, inventory, staff scheduling, and sales reporting into a single system for restaurants and food-service businesses.',
                'capabilities' => [
                    'Order & table management',
                    'Inventory & stock tracking',
                    'Staff scheduling & roles',
                    'Sales & performance reporting',
                ],
                'icon' => 'utensils',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Retail Management System',
                'slug' => 'retail-management-system',
                'category' => 'Retail',
                'short_description' => 'Tools for managing sales, inventory, products, and customers.',
                'description' => 'A retail-focused system concept covering point-of-sale, inventory across locations, product catalogs, and customer records to help retailers run day-to-day operations more efficiently.',
                'capabilities' => [
                    'Point-of-sale & checkout flows',
                    'Multi-location inventory tracking',
                    'Product catalog management',
                    'Customer records & purchase history',
                ],
                'icon' => 'shopping-bag',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Business Management Platform',
                'slug' => 'business-management-platform',
                'category' => 'Cross-Industry',
                'short_description' => 'Integrated tools designed to streamline general business operations.',
                'description' => 'A configurable platform concept bringing together operations, staff, reporting, and workflow automation for businesses that have outgrown spreadsheets and disconnected tools.',
                'capabilities' => [
                    'Configurable operational workflows',
                    'Centralized reporting & dashboards',
                    'Role-based team access',
                    'Extensible module architecture',
                ],
                'icon' => 'layout-grid',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];
    }

    public static function active(): array
    {
        $items = array_filter(self::all(), fn ($item) => $item['is_active']);
        usort($items, fn ($a, $b) => $a['sort_order'] <=> $b['sort_order']);

        return array_values($items);
    }

    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }

        return null;
    }

    public static function seo(): array
    {
        return [
            'title' => 'Solutions & Products',
            'description' => 'Explore the software product concepts Softrix International designs and customizes for businesses across industries.',
            'keywords' => 'business management software, restaurant management system, retail management system, Softrix International',
            'og_image' => null,
            'canonical' => route('solutions'),
        ];
    }
}
