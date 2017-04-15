<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GalleryController extends Controller
{
    public function index(){
        $galleries = DB::table('galleries')->get();
        return view('gallery/index',compact('galleries'));
    }

    public function create(){
        //check if logged in
        if(!Auth::check()){
            return \Redirect::Route('gallery.index');
        }
        return view('gallery.create');
    }

    public function store(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        if($cover_image){
            $cover_image_filename = $cover_image->getClientOriginalName();
            $cover_image->move(public_path('images'),$cover_image_filename);
        }
        else{
            $cover_image_filename = 'noimage.jpg';
        }
        DB::table('galleries')->insert(
            [
                'name'=>$name,
                'description'=>$description,
                'cover_image'=>$cover_image_filename,
                'owner_id'=>$owner_id
            ]
        );
        return \Redirect::Route('gallery.index')->with('message','Gallery Created');
    }
    public function show($id){
        $gallery = DB::table('galleries')->where('id',$id)->first();
        $photos = DB::table('photos')->where('gallery_id',$id)->get();

        return view('gallery/show',compact('gallery','photos'));
    }
}
