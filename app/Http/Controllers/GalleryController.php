<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
   public function index()
   {
      $gallery=Gallery::latest()->get();
      return view('backend.gallery.index',compact('gallery'));
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
       $validate=$request->validate([
           'image'=>'required|image|mimes:jpg,jpeg,png|max:5048'
       ],
       [
           'image.required'=>'please select image ',
           'image.image'=>'please select valid image',
       ]);
       $image=$request->file('image');
       $name_gen=hexdec(uniqid());
       $image_ext=strtolower($image->getClientOriginalExtension());
       $image_name=$name_gen.'.'.$image_ext;
       $path='gallery/image/';
       $image_url=$path.$image_name;
       $image->move($path,$image_name);
       Gallery::create([
           'image'=>$image_url,
       ]);
       return redirect()->back()->with('success' ,'Data Created Successfully');
       // return $request;
   }

   /**
    * Display the specified resource.
    */
   public function show()
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {
       $gallery=Gallery::find($id);
       return view('backend.gallery.edit',compact(('gallery')));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request,$id)
   {
       $gallery=Gallery::find($id);
       $validate=$request->validate([

           'image'=>'nullable|image|mimes:jpg,jpeg,png|max:5048'
       ],
       [

           'image.image'=>'please select valid image',
       ]);
       $image=$request->file('image');
       $name_gen=hexdec(uniqid());
       $image_ext=strtolower($image->getClientOriginalExtension());
       $image_name=$name_gen.'.'.$image_ext;
       $path='gallery/image/';
       $image_url=$path.$image_name;
       $image->move($path,$image_name);
       $gallery->update([
           'image'=>$image_url,

       ]);

       return redirect()->route('Pictures')->with('success' ,'Data Updated Successfully');
       // return $request;
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {
       $gallery=Gallery::find($id);
       $gallery->delete();
       return redirect()->back()->with('success' ,'Data Deleted Successfully');
   }
}
