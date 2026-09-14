<?php

namespace App\Http\Controllers;

use App\Content\HomeContent;
use App\Content\IndustriesContent;
use App\Content\ServicesContent;
use App\Content\SolutionsContent;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            'hero' => HomeContent::hero(),
            'aboutPreview' => HomeContent::aboutPreview(),
            'pillars' => HomeContent::pillars(),
            'services' => ServicesContent::featured(6),
            'solutions' => SolutionsContent::active(),
            'productShowcase' => HomeContent::productShowcase(),
            'devices' => HomeContent::devices(),
            'industries' => IndustriesContent::active(),
            'whySoftrix' => HomeContent::whySoftrix(),
            'cta' => HomeContent::cta(),
            'seo' => HomeContent::seo(),
        ]);
    }
}
