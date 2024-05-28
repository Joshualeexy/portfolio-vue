<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        $Categories = Category::all();
        $BlogPosts = Blogpost::latest()->get();

        return Inertia::render('Blog/Index', [
            'Categories' => $Categories,
            'BlogPosts' => $BlogPosts

        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($blogpost)
    {
        // dd(str_replace('-', ' ', $blogpost));
        $Categories = Category::all();
        $BlogPosts = Blogpost::where('title', '=', str_replace('-', ' ', $blogpost))->first();
        return Inertia::render('Blog/Show', [
            'Categories' => $Categories,
            'BlogPost' => $BlogPosts
        ]);
    }
}
