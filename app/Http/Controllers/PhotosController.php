<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
        return view('photos.create')->with('album_id', $album_id);
    }
    
    public function store(Request $request){
        // return 123;
        $request->validate([
            'title' => 'required',
            'photo' => 'required|image|max:1999'
        ]);
        $file_name_with_ext = $request->file('photo')->getClientOriginalName();
        $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $file_name_to_store = $file_name . '_' . time() .  '.' . $extension;
        $path = $request->file('photo')->storeAs('public/photos/' .  $request->input('album_id'), $file_name_to_store);

        //creating album
        $photo = new Photo;

        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $file_name_to_store;

        $photo->save();

        return redirect('/album/' . $request->input('album_id'))->with('success', 'Photo Uploaded');
    }
    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }
    public function destroy($id){
        $photo = Photo::find($id);
        if(Storage::delete('public/photos/' . $photo->album_id . '/' . $photo->photo)){
            $photo->delete();
            return redirect('/')->with('success' , 'Photo Deleted');
        }
    }
}
