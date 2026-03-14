<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::all();
        return view('admin.pages.themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.themes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'title' => 'required|string',
           'description' => 'required|string',
           'theme_id' => 'required|integer',
           'slide' => 'required|file|mimes:pdf,ppt,pptx|max:2048',
            'video' => 'required|file|mimes:mp4|max:7048',
        ]);

        $data = $request->all();
        if ($request->hasFile('slide')) {
            $data['slide'] = $request->file('slide')->store('slides', 'public');
        }

        // сохраняем video
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('videos', 'public');
        }
        Theme::create($data);
        return redirect()->route('themes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        return view('admin.pages.themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        return view('admin.pages.themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'theme_id' => 'required|integer',
            'slide' => 'required|file|mimes:pdf,ppt,pptx,docx,doc,xlsx,xls|max:2048',
            'video' => 'required|file|mimes:mp4|max:7048',
        ]);

        $data = $request->all();
        if ($request->hasFile('slide')) {
            $data['slide'] = $request->file('slide')->store('slides', 'public');
        }

        // сохраняем video
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('videos', 'public');
        }

        $theme->update($data);
        return redirect()->route('themes.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
      $theme->delete();
      return redirect()->route('themes.index');
    }
}
