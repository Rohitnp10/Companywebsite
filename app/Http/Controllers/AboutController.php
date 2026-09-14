<?php

namespace App\Http\Controllers;

use App\Content\AboutContent;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        return view('pages.about', [
            'whoWeAre' => AboutContent::whoWeAre(),
            'mission' => AboutContent::mission(),
            'vision' => AboutContent::vision(),
            'values' => AboutContent::values(),
            'approach' => AboutContent::approach(),
            'techPhilosophy' => AboutContent::technologyPhilosophy(),
            'cta' => AboutContent::cta(),
            'seo' => AboutContent::seo(),
        ]);
    }
}
