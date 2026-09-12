<?php

namespace App\Content;

/**
 * Thin accessor around config/company.php.
 *
 * Kept as a class (rather than reading config() directly everywhere) so
 * that when company data eventually moves into the database, only this
 * class needs to change into an Eloquent-backed repository — every
 * controller/Blade view that calls CompanyContent::profile() keeps working.
 */
class CompanyContent
{
    public static function profile(): array
    {
        return [
            'name' => config('company.name'),
            'short_name' => config('company.short_name'),
            'legal_suffix' => config('company.legal_suffix'),
            'tagline' => config('company.tagline'),
            'description' => config('company.description'),
            'email' => config('company.email'),
            'support_email' => config('company.support_email'),
            'phone' => config('company.phone'),
            'phone_display' => config('company.phone_display'),
            'address_line' => config('company.address_line'),
            'city' => config('company.city'),
            'country' => config('company.country'),
            'map_embed_url' => config('company.map_embed_url'),
            'social' => config('company.social'),
            'logo' => config('company.logo'),
            'logo_mark' => config('company.logo_mark'),
            'website' => config('company.website'),
            'founded_year' => config('company.founded_year'),
        ];
    }

    public static function social(): array
    {
        return config('company.social', []);
    }
}
