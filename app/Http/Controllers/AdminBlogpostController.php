<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class AdminBlogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categories = Category::all();
        $BlogPosts = Blogpost::all();
        return Inertia::render('Admin/Blog/Index', [
            'Categories' => $Categories,
            'BlogPosts' => $BlogPosts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories = Category::all();
        return Inertia::render('Admin/Blog/Create', [
            'Categories' => $Categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $Request = $request->validated();
        $Request['share'] = true;
        if ($Request['category'] == 'other') {
            $Request['category'] = $Request['category_other'];
            $Request['category_other'] = '';
        } else {
            $Request['category_other'] = '';
        }

        if ($Request['save_category_others'] && !empty($Request['category_other'])) {
            Category::create([
                'name' => $Request['category_other']
            ]);
        }

        if ($request->hasFile('image')) {
            $Request['image'] =  $request->file('image')->store('Blogposts');
        }
        unset($Request['category_other']);

        if (Blogpost::create($Request)) {
            return redirect(route('admin.blogpost.index'))->with('success', 'Post Uploaded Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogpost)
    {
        return inertia::render('Admin/Blog/Edit', [
            'Categories' => Category::all(),
            'blogpost' => $blogpost,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Blogpost $blogpost)
    {
        $Request = $request->validated();

        $Request['share'] = true;
        if ($Request['category'] == 'other') {
            $Request['category'] = $Request['category_other'];
            $Request['category_other'] = '';
        } else {
            $Request['category_other'] = '';
        }

        if ($Request['save_category_others'] && !empty($Request['category_other'])) {
            Category::create([
                'name' => $Request['category_other']
            ]);
        }

        if ($request->hasFile('image')) {
            Storage::delete($Request['image']);
            $Request['image'] =  $request->file('image')->store('Blogposts');
        }
        unset($Request['category_other']);

        if ($blogpost->update($Request)) {
            return redirect(route('admin.blogpost.index'))->with('success', 'Post Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogpost $blogpost)
    {
        Storage::delete($blogpost->image);
        $blogpost->delete();
        return redirect(route('admin.blogpost.index'))->with('success', 'Post Deleted Successfully');
    }
}
