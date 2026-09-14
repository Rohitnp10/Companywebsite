<?php

namespace App\Content;

/**
 * Static "solutions / products" data source.
 *
 * Restaurant Management System is Softrix's flagship product and the only
 * one currently ready; Hotel and Dental are in active development. Each
 * entry carries a `status` (ready | in_development) driving the badge shown
 * on the homepage product cards — keep copy honest to that status, no
 * shipped-feature claims for anything still in development.
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
                'status' => 'ready',
                'short_description' => 'Our flagship product — a complete system for managing restaurant operations end to end.',
                'description' => 'Order management, table tracking, kitchen coordination, inventory, staff scheduling, billing, and sales reporting, all in a single system for restaurants and food-service businesses.',
                'capabilities' => [
                    'Order & table management',
                    'Kitchen display & ticket flow',
                    'Inventory & stock tracking',
                    'Billing, payments & reporting',
                ],
                'icon' => 'utensils',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Hotel Management System',
                'slug' => 'hotel-management-system',
                'category' => 'Hospitality',
                'status' => 'in_development',
                'short_description' => 'A complete system for managing hotel operations, currently in development.',
                'description' => 'Being built to bring reservations, room and housekeeping status, guest billing, and front-desk operations into a single system for hotels and lodging businesses.',
                'capabilities' => [
                    'Reservations & room status',
                    'Guest check-in / check-out',
                    'Housekeeping coordination',
                    'Billing & invoicing',
                ],
                'icon' => 'building-2',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Dental Management System',
                'slug' => 'dental-management-system',
                'category' => 'Healthcare',
                'status' => 'in_development',
                'short_description' => 'A complete system for managing dental clinic operations, currently in development.',
                'description' => 'Being built to bring appointment scheduling, patient records, treatment history, and billing into a single system for dental clinics.',
                'capabilities' => [
                    'Appointment scheduling',
                    'Patient records & history',
                    'Treatment plan tracking',
                    'Billing & invoicing',
                ],
                'icon' => 'heart-pulse',
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
            'keywords' => 'restaurant management system, hotel management system, dental management system, business management software, Softrix International',
            'og_image' => null,
            'canonical' => route('solutions'),
        ];
    }
}
