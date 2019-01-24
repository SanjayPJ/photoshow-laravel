<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }
    public function create(){
        return view('albums.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'cover_image' => 'required|image|max:1999'
        ]);
        $file_name_with_ext = $request->file('cover_image')->getClientOriginalName();
        $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $file_name_to_store = $file_name . '_' . time() .  '.' . $extension;
        $path = $request->file('cover_image')->storeAs('public/album_covers', $file_name_to_store);

        //creating album
        $album = new Album;

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $file_name_to_store;

        $album->save();

        return redirect('/')->with('success', 'Album Created');
    }
}
