<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Inertia\Inertia;
use App\Models\Skill;
use App\Models\Project;

class PageController extends Controller
{
    public function index(){

        return Inertia::render('Index',[
            'Skills' => Skill::all(),
            'BlogPosts' => Blogpost::latest()->take(6)->get(),
            'Projects' => Project::all(),
        ]);
    }
}
