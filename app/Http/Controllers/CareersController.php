<?php

namespace App\Http\Controllers;

use App\Content\CareersContent;
use Illuminate\View\View;

class CareersController extends Controller
{
    public function index(): View
    {
        return view('pages.careers', [
            'jobs' => CareersContent::active(),
            'whyJoinUs' => CareersContent::whyJoinUs(),
            'noOpeningsMessage' => CareersContent::noOpeningsMessage(),
            'seo' => CareersContent::seo(),
        ]);
    }
}
