<?php

namespace App\Http\Controllers;

use App\Content\TeamContent;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        return view('pages.team', [
            'page' => TeamContent::page(),
            'members' => TeamContent::active(),
            'emptyMessage' => TeamContent::emptyMessage(),
            'culture' => TeamContent::culture(),
            'cta' => TeamContent::cta(),
            'seo' => TeamContent::seo(),
        ]);
    }
}
