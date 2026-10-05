<?php

namespace App\Content;

/**
 * Static "team" data source.
 *
 * Members are intentionally empty — no invented people. When real profiles
 * are available, add records shaped like the example below. Blade already
 * handles the empty state honestly.
 */
class TeamContent
{
    public static function all(): array
    {
        return [
            // Example shape for when real team profiles exist:
            // [
            //     'id' => 1,
            //     'name' => '...',
            //     'role' => '...',
            //     'bio' => '...',
            //     'image' => asset('images/team/...jpg'),
            //     'image_alt' => '...',
            //     'is_active' => true,
            //     'sort_order' => 1,
            // ],
        ];
    }

    public static function active(): array
    {
        $items = array_filter(self::all(), fn ($member) => $member['is_active'] ?? false);
        usort($items, fn ($a, $b) => ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0));

        return array_values($items);
    }

    public static function page(): array
    {
        return [
            'eyebrow' => 'Team',
            'title' => 'The people behind Softrix',
            'description' => 'We are a growing technology company in Kathmandu. Profiles will appear here as we publish them — until then, here is how we work together.',
        ];
    }

    public static function emptyMessage(): string
    {
        return 'Individual team profiles are not published yet. We share how we work and what we value, and we are always interested in meeting talented people.';
    }

    public static function culture(): array
    {
        return [
            'eyebrow' => 'How We Work Together',
            'title' => 'A small team building serious software',
            'body' => 'Softrix is built around craftsmanship, clear communication, and long-term partnership — the same principles we bring to client work.',
            'points' => [
                [
                    'title' => 'Craftsmanship',
                    'description' => 'We take engineering and design quality seriously, because software that businesses depend on deserves to be built well.',
                ],
                [
                    'title' => 'Transparency',
                    'description' => 'Clear communication, honest timelines, and no overselling what a piece of software can do.',
                ],
                [
                    'title' => 'Partnership',
                    'description' => 'We aim to understand the businesses we serve well enough to make good technical recommendations, not just execute instructions.',
                ],
            ],
        ];
    }

    public static function cta(): array
    {
        return [
            'title' => 'Interested in building with us?',
            'button' => [
                'label' => 'View Careers',
                'route' => 'careers',
            ],
        ];
    }

    public static function seo(): array
    {
        return [
            'title' => 'Our Team',
            'description' => 'Meet the Softrix International team — a growing technology company building software for real business operations.',
            'keywords' => 'Softrix International team, software company Kathmandu, technology partner',
            'og_image' => asset('assets/social/og-image-1200x630.png'),
            'canonical' => route('team'),
        ];
    }
}
