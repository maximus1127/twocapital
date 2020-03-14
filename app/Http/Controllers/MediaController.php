<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;

class MediaController extends Controller
{
    public function create()
    {
        $medias = Media::all();
        return view('add-media', compact('medias'));
    }

    public function store(Request $request)
    {
        $media = new Media();
        $media->link = $request->media_link;
        $media->title = $request->media_title;
        if ($media->save()) {
            return back();
        }
    }

    public function destroy(Media $media)
    {
        $media->destroy();
        return back();
    }

    public function spaMedia()
    {
        $medias = Media::all();
        return view('spa-views.media', compact('medias'));
    }
}
