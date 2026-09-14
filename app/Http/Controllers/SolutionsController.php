<?php

namespace App\Http\Controllers;

use App\Content\SolutionsContent;
use Illuminate\View\View;

class SolutionsController extends Controller
{
    public function index(): View
    {
        $solutions = SolutionsContent::active();

        return view('pages.solutions', [
            'page' => SolutionsContent::page(),
            'flagship' => SolutionsContent::flagship(),
            'platform' => SolutionsContent::platform(),
            'solutions' => $solutions,
            'ready' => array_values(array_filter($solutions, fn ($s) => $s['status'] === 'ready')),
            'upcoming' => array_values(array_filter($solutions, fn ($s) => $s['status'] === 'in_development')),
            'cta' => SolutionsContent::cta(),
            'seo' => SolutionsContent::seo(),
        ]);
    }
}
