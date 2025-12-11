<?php

namespace App\Http\Controllers;

use App\Models\About_Us;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');

     }
    public function index()
    {
       $aboutus=About_Us::latest()->get();
       return view('backend.about.about',compact('aboutus'));
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
            'title'=>'required|unique:about__us',
            'image'=>'required|image|mimes:jpg,jpeg,png|max:5048'
        ],
        [
            'title.required'=>'please enter title',
            'title.unique'=>'title already exist',
            'image.required'=>'please select image ',
            'image.image'=>'please select valid image',
        ]);
        $image=$request->file('image');
        $name_gen=hexdec(uniqid());
        $image_ext=strtolower($image->getClientOriginalExtension());
        $image_name=$name_gen.'.'.$image_ext;
        $path='about/image/';
        $image_url=$path.$image_name;
        $image->move($path,$image_name);
        About_Us::create([
            'title'=>$request->title,
            'describtion'=>$request->describtion,
            'brief_describtion'=>$request->brief_describtion,
            'image'=>$image_url,

        ]);
        return redirect()->back()->with('success' ,'Data Created Successfully');
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(About_Us $about_Us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aboutus=About_Us::find($id);
        return view('backend.about.edit',compact(('aboutus')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $aboutus=About_Us::find($id);
        $validate=$request->validate([
            'title'=>'nullable|unique:about__us',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:5048'
        ],
        [
            'title.required'=>'please enter title',
            'title.unique'=>'title already exist',
            'image.image'=>'please select valid image',
        ]);
        $image=$request->file('image');
        $name_gen=hexdec(uniqid());
        $image_ext=strtolower($image->getClientOriginalExtension());
        $image_name=$name_gen.'.'.$image_ext;
        $path='about/image/';
        $image_url=$path.$image_name;
        $image->move($path,$image_name);
        $aboutus->update([
            'title'=>$request->title,
            'describtion'=>$request->describtion,
            'brief_describtion'=>$request->brief_describtion,
            'image'=>$image_url,

        ]);

        return redirect()->route('About_us')->with('success' ,'Data Updated Successfully');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aboutus=About_Us::find($id);
        $aboutus->delete();
        return redirect()->back()->with('success' ,'Data Deleted Successfully');
    }
}
