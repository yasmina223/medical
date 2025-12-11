<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');

     }
    public function index()
    {
        $departs=Department::latest()->get();
       return view('backend.departments.dep',compact('departs'));
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
        $path='depart/image/';
        $image_url=$path.$image_name;
        $image->move($path,$image_name);
        Department::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'brief_description'=>$request->brief_description,
            'image'=>$image_url,

        ]);
        return redirect()->back()->with('success' ,'Data Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $departs=Department::find($id);
       return view('backend.departments.edit',compact('departs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $departs=Department::find($id);
        $validate=$request->validate([
            'title'=>'required|unique:about__us',
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
        $path='depart/image/';
        $image_url=$path.$image_name;
        $image->move($path,$image_name);
        $departs->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'brief_description'=>$request->brief_description,
            'image'=>$image_url,

        ]);
        return redirect()->route('Departs')->with('success' ,'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $departs=Department::find($id);
       $departs->delete();
       return redirect()->back()->with('success' ,'Data Deleted Successfully');
    }
}
