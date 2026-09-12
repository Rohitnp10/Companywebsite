<?php

namespace App\Http\Controllers;

use App\Content\IndustriesContent;
use Illuminate\View\View;

class IndustriesController extends Controller
{
    public function index(): View
    {
        return view('pages.industries', [
            'industries' => IndustriesContent::active(),
            'seo' => IndustriesContent::seo(),
        ]);
    }
}
