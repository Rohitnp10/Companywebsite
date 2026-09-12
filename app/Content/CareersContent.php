<?php

namespace App\Content;

/**
 * Static "careers" data source.
 *
 * Currently empty (no fabricated openings), matching a future
 * `jobs` database table filtered by is_active = true. The controller/
 * view handle the empty state honestly rather than inventing vacancies.
 */
class CareersContent
{
    public static function all(): array
    {
        return [
            // Example shape for when real openings exist:
            // [
            //     'id' => 1,
            //     'title' => 'Backend Engineer (Laravel)',
            //     'slug' => 'backend-engineer-laravel',
            //     'department' => 'Engineering',
            //     'location' => 'Kathmandu, Nepal (Remote-friendly)',
            //     'employment_type' => 'Full-time',
            //     'description' => '...',
            //     'requirements' => ['...'],
            //     'is_active' => true,
            // ],
        ];
    }

    public static function active(): array
    {
        return array_values(array_filter(self::all(), fn ($job) => $job['is_active'] ?? false));
    }

    public static function whyJoinUs(): array
    {
        return [
            [
                'title' => 'Meaningful Work',
                'description' => 'Build software that solves real operational problems for real businesses.',
                'icon' => 'target',
            ],
            [
                'title' => 'Room to Grow',
                'description' => 'Work across the stack and take ownership as the company grows.',
                'icon' => 'trending-up',
            ],
            [
                'title' => 'Collaborative Culture',
                'description' => 'A team that values craftsmanship, honesty, and continuous learning.',
                'icon' => 'users',
            ],
        ];
    }

    public static function noOpeningsMessage(): string
    {
        return "We don't have any open positions right now, but we're always interested in meeting talented people.";
    }

    public static function seo(): array
    {
        return [
            'title' => 'Careers',
            'description' => 'Explore career opportunities at Softrix International and learn what it\u2019s like to work with our team.',
            'keywords' => 'Softrix International careers, jobs, hiring',
            'og_image' => null,
            'canonical' => route('careers'),
        ];
    }
}
