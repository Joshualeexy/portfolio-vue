<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia::render('Admin/Language/Index', [
            $language = Language::all()
        ]);
    }
    public function get()
    {
        return  Language::all();
       
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
    public function store(Request $request)
    {
        $Request = $request->validate([
            'name' => 'required:string',
            'image' => 'required:file',
            'other' => 'string'
        ]);
        $Request['image'] = $request->file('image')->store('languages');
        Language::create($Request);
        return redirect(route('admin.languages'))->with('success', 'Language Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        Storage::delete($language->image);
        $language->delete();
        return redirect(route('admin.languages'))->with('success', 'Language Deleted Successfully');
    }
}
