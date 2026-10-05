<?php

namespace App\Content;

/**
 * Static "services" data source.
 *
 * Deliberately shaped like rows from a future `services` database table
 * (id, slug, sort_order, is_active, timestps-style fields) so that the
 * eventual swap to Eloquent is a one-line change in the controller:
 *
 *   Static:  ServicesContent::active()
 *   Future:  Service::where('is_active', true)->orderBy('sort_order')->get()
 *
 * Blade components consume these as plain arrays and don't know or care
 * which source produced them.
 */
class ServicesContent
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Custom Software Development',
                'slug' => 'custom-software-development',
                'short_description' => 'Tailored software built around how your business actually operates, not the other way around.',
                'description' => 'We design and build custom software solutions that map to your real workflows — replacing spreadsheets, manual processes, and off-the-shelf tools that no longer fit as you grow.',
                'icon' => 'code',
                'image' => asset('images/services/custom-software-development.jpg'),
                'image_alt' => 'Monitor displaying software code in an editor',
                'features' => [
                    'Requirements discovery & solution architecture',
                    'Scalable backend & database design',
                    'Ongoing iteration as your business evolves',
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'id' => 2,
                'title' => 'Web Application Development',
                'slug' => 'web-application-development',
                'short_description' => 'Fast, secure, and maintainable web applications built for real business workflows.',
                'description' => 'From internal business tools to customer-facing platforms, we build web applications that are performant, secure, and easy to extend over time.',
                'icon' => 'globe',
                'image' => asset('images/services/web-application-development.jpg'),
                'image_alt' => 'Code editor showing application source on a dark screen',
                'features' => [
                    'Clean, maintainable application architecture',
                    'Responsive, accessible interfaces',
                    'API-ready architecture',
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'id' => 3,
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'short_description' => 'Native-feeling mobile experiences for iOS and Android.',
                'description' => 'We build mobile applications that feel fast and native, whether you need a companion app to an existing platform or a standalone product.',
                'icon' => 'device-mobile',
                'image' => asset('images/services/mobile-app-development.jpg'),
                'image_alt' => 'Smartphone home screen with app icons',
                'features' => [
                    'Cross-platform & native development options',
                    'Clean, intuitive mobile UX',
                    'Integration with existing backends and APIs',
                ],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'id' => 4,
                'title' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'short_description' => 'Interfaces designed around clarity, usability, and brand consistency.',
                'description' => 'Good software should feel effortless. Our design process focuses on real user needs, clean information hierarchy, and interfaces that support the way people actually work.',
                'icon' => 'pencil-ruler',
                'image' => asset('images/services/ui-ux-design.jpg'),
                'image_alt' => 'Hand-drawn website wireframe sketches',
                'features' => [
                    'User research & wireframing',
                    'Design systems & component libraries',
                    'Prototyping & usability validation',
                ],
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'id' => 5,
                'title' => 'Business Management Systems',
                'slug' => 'business-management-systems',
                'short_description' => 'Systems that bring operations, inventory, staff, and reporting into one place.',
                'description' => 'We build management systems that consolidate day-to-day operations — from inventory and staff to sales and reporting — into a single, coherent platform.',
                'icon' => 'briefcase',
                'image' => asset('images/services/business-management-systems.jpg'),
                'image_alt' => 'Performance analytics graphs on a laptop screen',
                'features' => [
                    'Operational workflow automation',
                    'Role-based access & permissions',
                    'Centralized reporting & dashboards',
                ],
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'id' => 6,
                'title' => 'Cloud & Digital Solutions',
                'slug' => 'cloud-digital-solutions',
                'short_description' => 'Cloud infrastructure and digital transformation support that scales with you.',
                'description' => 'We help businesses move to the cloud and modernize digital operations with infrastructure that is secure, cost-aware, and built to scale.',
                'icon' => 'cloud',
                'image' => asset('images/services/cloud-digital-solutions.jpg'),
                'image_alt' => 'Server equipment in a professional data center',
                'features' => [
                    'Cloud architecture & migration planning',
                    'Scalable, secure infrastructure',
                    'Monitoring & performance optimization',
                ],
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'id' => 7,
                'title' => 'System Integration',
                'slug' => 'system-integration',
                'short_description' => 'Connecting the tools you already use so data flows without manual work.',
                'description' => 'We integrate disparate systems, APIs, and third-party services so information moves automatically across your business instead of being re-entered by hand.',
                'icon' => 'link',
                'image' => asset('images/services/system-integration.jpg'),
                'image_alt' => 'Fiber optic cables connected to a network switch',
                'features' => [
                    'API design & third-party integrations',
                    'Data synchronization between systems',
                    'Legacy system connectivity',
                ],
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'id' => 8,
                'title' => 'Software Maintenance & Support',
                'slug' => 'software-maintenance-support',
                'short_description' => 'Ongoing care that keeps your software reliable, secure, and up to date.',
                'description' => 'Software needs upkeep. We provide ongoing maintenance, monitoring, and support so the systems we build (or ones you already have) stay dependable over time.',
                'icon' => 'wrench',
                'image' => asset('images/services/software-maintenance-support.jpg'),
                'image_alt' => 'Technician repairing a computer server',
                'features' => [
                    'Bug fixes & performance monitoring',
                    'Security patches & dependency updates',
                    'Responsive support agreements',
                ],
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];
    }

    public static function active(): array
    {
        $services = array_filter(self::all(), fn ($service) => $service['is_active']);
        usort($services, fn ($a, $b) => $a['sort_order'] <=> $b['sort_order']);

        return array_values($services);
    }

    public static function featured(int $limit = 6): array
    {
        return array_slice(self::active(), 0, $limit);
    }

    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $service) {
            if ($service['slug'] === $slug) {
                return $service;
            }
        }

        return null;
    }

    public static function page(): array
    {
        return [
            'eyebrow' => 'What We Do',
            'title' => 'Services built around how your business actually runs',
            'lede' => 'From first conversation to long-term support — structured delivery for software your team can rely on.',
            'description' => 'From first line of code to long-term support, here\'s how we help businesses build and maintain the software they run on.',
            'image' => asset('images/home/devices.jpg'),
            'image_alt' => 'Laptop, tablet, and phone showing Softrix software dashboards',
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

    public static function engagement(): array
    {
        return [
            'eyebrow' => 'How Engagement Works',
            'title' => 'A clear path from idea to ongoing support',
            'description' => 'We keep delivery structured and communication simple — so you always know what is happening and why.',
            'steps' => [
                [
                    'title' => 'Discover',
                    'description' => 'We map your workflows, constraints, and goals before proposing a technical approach.',
                    'icon' => 'message-circle',
                ],
                [
                    'title' => 'Design',
                    'description' => 'We shape architecture and interfaces around how your team will actually use the product.',
                    'icon' => 'pencil-ruler',
                ],
                [
                    'title' => 'Build',
                    'description' => 'We develop in focused iterations with clear milestones and maintainable code.',
                    'icon' => 'code',
                ],
                [
                    'title' => 'Support',
                    'description' => 'After launch we stay engaged — fixing, improving, and extending what we ship.',
                    'icon' => 'wrench',
                ],
            ],
        ];
    }

    public static function partnership(): array
    {
        return [
            'eyebrow' => 'More Than Delivery',
            'title' => 'Software that stays useful after launch',
            'body' => 'Shipping is only part of the job. We design for maintainability, document what matters, and remain available as your operations evolve — whether that means new features, integrations, or ongoing care.',
            'points' => [
                'Business-first requirements, not template features',
                'Modern, maintainable engineering choices',
                'Clear communication and honest timelines',
                'Support and iteration after go-live',
            ],
            'image' => asset('images/home/hero-tech.jpg'),
            'image_alt' => 'Dual monitors showing business analytics dashboards',
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
            'title' => 'Our Services',
            'description' => 'Explore the software development, design, and technology services Softrix International offers to help businesses build and scale.',
            'keywords' => 'software development services, web development, mobile app development, UI/UX design, Softrix International',
            'og_image' => asset('assets/social/og-image-1200x630.png'),
            'canonical' => route('services'),
        ];
    }
}
