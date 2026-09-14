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
                'image' => asset('images/home/product-restaurant-thumb.jpg'),
                'image_alt' => 'Restaurant management software interface on a tablet',
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
                'image' => asset('images/home/product-hotel-thumb.jpg'),
                'image_alt' => 'Hotel operations software dashboard preview',
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
                'image' => asset('images/home/product-dental-thumb.jpg'),
                'image_alt' => 'Dental clinic management software preview',
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

    public static function page(): array
    {
        return [
            'eyebrow' => 'Products',
            'title' => 'Operational systems for the businesses that run on them',
            'lede' => 'Restaurant Management System is ready today. Hotel and Dental systems are in active development — with honest status on every product.',
            'description' => 'Restaurant Management System is live and in use today. Hotel and Dental Management Systems are in active development.',
            'primary_button' => [
                'label' => "Let's Talk",
                'route' => 'contact',
            ],
            'secondary_button' => [
                'label' => 'Our Services',
                'route' => 'services',
            ],
        ];
    }

    public static function flagship(): array
    {
        $ready = collect(self::active())->firstWhere('status', 'ready');

        return [
            'eyebrow' => 'Flagship Product',
            'title' => $ready['title'] ?? 'Restaurant Management System',
            'body' => $ready['description'] ?? '',
            'capabilities' => $ready['capabilities'] ?? [],
            'category' => $ready['category'] ?? 'Hospitality',
            'icon' => $ready['icon'] ?? 'utensils',
            'image' => asset('images/home/product-restaurant.jpg'),
            'image_alt' => 'Restaurant POS tablet showing order management software',
        ];
    }

    public static function platform(): array
    {
        return [
            'eyebrow' => 'Product Approach',
            'title' => 'Built as complete operational systems',
            'body' => 'Each product is designed around a real industry workflow — not as a loose collection of features. We focus on the day-to-day work of the floor, desk, or clinic, then expand from a solid core.',
            'points' => [
                'Honest status — ready means ready, in development means in progress',
                'Industry-specific workflows, not generic templates',
                'Web-ready interfaces designed for real operating environments',
                'Room to customize and extend as your business grows',
            ],
            'image' => asset('images/home/devices.jpg'),
            'image_alt' => 'Laptop, tablet, and phone showing matching Softrix dashboards',
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
            'title' => 'Solutions & Products',
            'description' => 'Explore Softrix International products — Restaurant Management System is ready today, with Hotel and Dental systems in development.',
            'keywords' => 'restaurant management system, hotel management system, dental management system, business management software, Softrix International',
            'og_image' => asset('images/home/product-restaurant.jpg'),
            'canonical' => route('solutions'),
        ];
    }
}
