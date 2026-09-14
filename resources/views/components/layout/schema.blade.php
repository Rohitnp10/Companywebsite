@props(['seo' => []])

{{--
    Sitewide JSON-LD structured data: Organization + WebSite, plus an
    automatic BreadcrumbList for every page below the homepage. Built
    entirely from config('company.*') and the page's own $seo array, so it
    never claims anything not already stated elsewhere on the site (no
    fake reviews, ratings, or FAQs).
--}}
@php
    $company = \App\Content\CompanyContent::profile();
    $orgId = $company['website'] . '/#organization';

    $organization = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => $orgId,
        'name' => $company['name'],
        'alternateName' => $company['short_name'],
        'url' => $company['website'],
        'logo' => asset($company['logo']),
        'description' => $company['description'],
        'email' => $company['email'],
        'telephone' => $company['phone'],
        'foundingDate' => (string) $company['founded_year'],
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => $company['city'],
            'addressCountry' => $company['country'],
        ],
        'sameAs' => collect($company['social'])->pluck('url')->values()->all(),
    ];

    $website = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => $company['website'] . '/#website',
        'url' => $company['website'],
        'name' => $company['name'],
        'publisher' => ['@id' => $orgId],
    ];

    $graphs = [$organization, $website];

    $routeName = request()->route()?->getName();
    if ($routeName && $routeName !== 'home') {
        $pageTitle = $seo['title'] ?? ucfirst(str_replace(['-', '.'], ' ', $routeName));

        $graphs[] = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => route('home'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => $pageTitle,
                    'item' => url()->current(),
                ],
            ],
        ];
    }
@endphp
@foreach($graphs as $graph)
<script type="application/ld+json">{!! json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endforeach
