<?php

namespace App\Content;

class ContactContent
{
    public static function intro(): array
    {
        return [
            'title' => "Let's Talk",
            'description' => "Have an idea, a business challenge, or a system that needs rebuilding? Tell us about it and we'll get back to you.",
        ];
    }

    public static function subjects(): array
    {
        return [
            'General Inquiry',
            'Project Discussion',
            'Careers',
            'Partnership',
            'Support',
            'Other',
        ];
    }

    public static function seo(): array
    {
        return [
            'title' => 'Contact Us',
            'description' => 'Get in touch with Softrix International to discuss your project, ask a question, or explore a partnership.',
            'keywords' => 'contact Softrix International, get in touch, software development inquiry',
            'og_image' => null,
            'canonical' => route('contact'),
        ];
    }
}
