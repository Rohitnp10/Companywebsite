<?php

namespace App\Http\Controllers;

use App\Content\ServicesContent;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(): View
    {
        return view('pages.services', [
            'services' => ServicesContent::active(),
            'seo' => ServicesContent::seo(),
        ]);
    }
}
