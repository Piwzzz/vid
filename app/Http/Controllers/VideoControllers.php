<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoControllers extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(2);
        return view('video.index', compact('videos'))->with('i', (request()->input('page', 1) - 1) * 2);
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vidio' => 'required|file|mimes:mp4|max:10048',
            'caption' => 'max:100', // Making the 'caption' field optional
        ]);

        $params = $request->all();

        if ($request->hasFile('vidio')) {
            $path = $request->file('vidio')->store('uploads');
            $params['vidio'] = $path;
        }

        $video = Video::create($params);

        if ($video) {
            return redirect(route('video.index'))->with('success', 'Added!');
        }

        return redirect(route('video.index'))->with('error', 'Gagal!');
    }

    public function destroy(Video $video)
    {
        if ($video->vidio) {
            Storage::delete($video->vidio);
        }

        if ($video->delete()) {
            return redirect(route('video.index'))->with('success', 'Deleted!');
        }

        return redirect(route('video.index'))->with('error', 'Sorry, unable to delete this!');
    }
}
