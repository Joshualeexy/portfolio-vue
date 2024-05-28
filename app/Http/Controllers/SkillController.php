<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Skills = Skill::all();
        return Inertia::render('Admin/Skill/Index', [
            'Skills' => $Skills,
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
    public function store(Request $request)
    {
        $skillArray =  $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'img' => 'required|file',
        ]);

        $img = $request->img->store('skills');
        $skillArray['img'] = $img;
        Skill::create($skillArray);
        return redirect(route('admin.skills'))->with('success', 'Skill Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        return inertia::render('Admin/Skill/Edit', [
            'Skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        // dd($request);
        $image = $skill->img;
        $skillArray =  $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('img')) {
            Storage::delete($image);
            $image = $request->file('img')->store('skills');
            $skill->update([
                'name' => $skillArray['name'],
                'category' => $skillArray['category'],
                'img' => $image,
            ]);
            return redirect(route('admin.skills'))->with('success', 'Skill Updated Successfully');
        };
        $skill->update([
            'name' => $skillArray['name'],
            'category' => $skillArray['category'],
            'img' => $image,
        ]);
        return redirect(route('admin.skills'))->with('success', 'Skill Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);

        Storage::delete($skill->img);
        $skill->delete();
        return redirect(route('admin.skills'))->with('success', 'Skill Deleted Successfully');
    }
}
