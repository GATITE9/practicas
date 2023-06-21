<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Trackcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::where("user_id", auth()->id())->orderByDesc('id')->paginate(4);
        return view('tracks.index', compact('tracks'));
       // $tracks = Track::all();
       // return view('tracks.index',compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'track create';
        $route = route('tracks.store');
        $button= 'register';
       return view('tracks.create', compact('title','route','button'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:100',
            'audio' => 'required|mimes:mp3,duration_max:340',
            ]);
            $path = "public/audios/no_mames.mp3";
            if ($request->hasFile('audio'))
            $path = $request->audio->store('public/audios');
            $track = Track::create([
            'title' => $request->title,
            'path' => $path,
            ]);
            $track->save();
            return redirect()->route('tracks.index')->with('success','Stored with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
            //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        $title = 'Track edit';
        $route = route('tracks.update', ['track' => $track]);
        $button = 'Update';
        return view('tracks.edit', compact('title', 'route', 'button', 'track'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'required|min:2|max:100',
            'audio' => 'required|mimes:mp3,duration_max:340',
        ]);
        $path = $track->path;
        if ($request->hasFile('audio')) {
            $track->deleteAudio();
            $path = $request->audio->store('public/audios');
        }
        $track->fill([
            'title' => $request->title,
            'path' => $path,
        ]);
        $track->save();
        return redirect()->route('tracks.index')->with('success', 'Edited with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete();
        $track->deleteAudio();
        return redirect()->route('tracks.index')->with('success', 'Deleted with success');
    
    }
}
