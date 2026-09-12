<?php

namespace App\Http\Controllers;

use App\Content\ProjectsContent;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    public function index(): View
    {
        return view('pages.projects', [
            'projects' => ProjectsContent::ordered(),
            'seo' => ProjectsContent::seo(),
        ]);
    }
}
