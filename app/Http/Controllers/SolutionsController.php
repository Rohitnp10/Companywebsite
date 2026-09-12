<?php

namespace App\Http\Controllers;

use App\Content\SolutionsContent;
use Illuminate\View\View;

class SolutionsController extends Controller
{
    public function index(): View
    {
        return view('pages.solutions', [
            'solutions' => SolutionsContent::active(),
            'seo' => SolutionsContent::seo(),
        ]);
    }
}
