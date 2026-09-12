@props(['seo' => []])

@php
    // Every page passes a $seo array (see app/Content/*Content.php::seo()).
    // Falls back to config/seo.php defaults when a page omits a field.
    // Later, these values can come straight from a `pages` database table
    // via the same $seo array shape — this component never changes.
    $title = $seo['title'] ?? null;
    $fullTitle = $title
        ? $title . config('seo.title_separator') . config('company.short_name')
        : config('seo.default_title');

    $description = $seo['description'] ?? config('seo.default_description');
    $keywords = $seo['keywords'] ?? config('seo.default_keywords');
    $ogImage = $seo['og_image'] ?? config('seo.default_og_image');
    $canonical = $seo['canonical'] ?? url()->current();
@endphp

<title>{{ $fullTitle }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<link rel="canonical" href="{{ $canonical }}">

<meta property="og:type" content="website">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:site_name" content="{{ config('company.name') }}">
@if($ogImage)
    <meta property="og:image" content="{{ asset($ogImage) }}">
@endif

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:site" content="{{ config('seo.twitter_handle') }}">
@if($ogImage)
    <meta name="twitter:image" content="{{ asset($ogImage) }}">
@endif
