<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PhotoController extends Controller
{
    public function create($gallery_id)
    {
        if(!Auth::check()){
            return \Redirect::Route('gallery.index');
        }
        return view('photo/create',compact('gallery_id'));
    }

    public function store(Request $request){
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        if($image){
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'),$image_filename);
        }
        else{
            $cover_image_filename = 'noimage.jpg';
        }
        DB::table('photos')->insert(
            [
                'title'=>$title,
                'description'=>$description,
                'gallery_id'=>$gallery_id,
                'location'=>$location,
                'image'=>$image_filename,
                'owner_id'=>$owner_id
            ]
        );
        return \Redirect::Route('gallery.show',array('id' => $gallery_id));
    }
    public function details($id){
        die($id);
    }
}
