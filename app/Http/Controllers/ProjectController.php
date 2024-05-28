<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Project = Project::all();
        return Inertia::render('Admin/Project/Index', [
            'Projects' => $Project,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $Request = $request->validated();
        if ($Request['category'] === 'other') {
            $Request['category'] = $Request['category_other'];
            $Request['category_other'] = '';
        } else {
            $Request['category_other'] = '';
        }

        $Request['image'] = $request->file('image')->store('projects');
        Project::create($Request);
        return redirect(route('admin.project'))->with('success', 'Project Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('Admin/Project/Edit', [
            'Project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $image = $project->image;
        $Request = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'category_other' => 'string',
            'description' => 'required|string',
            'preview' => 'required|boolean',
            'preview_url' => '',
            'source' => 'required|boolean',
            'source_url' => '',
            'share' => 'boolean',
            'skills' => 'required|string',
            'other' => 'required|string',
            'image' => '',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($image);
            $image = $request->file('image')->store('projects');
        }
        $Request['image'] = $image;
        // dd($request);
        $project->update($Request);
        return redirect(route('admin.project'))->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
        return redirect(route('admin.project'))->with('success', 'Project Deleted Successfully');
    }
}
