<?php

namespace App\Http\Controllers;

use App\Content\ServicesContent;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(): View
    {
        return view('pages.services', [
            'page' => ServicesContent::page(),
            'engagement' => ServicesContent::engagement(),
            'partnership' => ServicesContent::partnership(),
            'services' => ServicesContent::active(),
            'cta' => ServicesContent::cta(),
            'seo' => ServicesContent::seo(),
        ]);
    }
}
