<?php

namespace App\Http\Controllers;

use App\Content\IndustriesContent;
use Illuminate\View\View;

class IndustriesController extends Controller
{
    public function index(): View
    {
        return view('pages.industries', [
            'page' => IndustriesContent::page(),
            'focus' => IndustriesContent::focus(),
            'approach' => IndustriesContent::approach(),
            'industries' => IndustriesContent::active(),
            'cta' => IndustriesContent::cta(),
            'seo' => IndustriesContent::seo(),
        ]);
    }
}
