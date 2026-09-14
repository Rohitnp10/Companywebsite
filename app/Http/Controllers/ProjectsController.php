<?php

namespace App\Http\Controllers;

use App\Content\ProjectsContent;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    public function index(): View
    {
        $projects = ProjectsContent::ordered();

        return view('pages.projects', [
            'page' => ProjectsContent::page(),
            'approach' => ProjectsContent::approach(),
            'projects' => $projects,
            'featured' => ProjectsContent::featured(),
            'cta' => ProjectsContent::cta(),
            'seo' => ProjectsContent::seo(),
        ]);
    }
}
