<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departs=Department::all();
        $doctors = Doctor::latest()->get();
        return view('backend.doctors.doctors', compact('doctors','departs'));
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
            'name'=>'required|unique:doctors',
            'image'=>'required|image|mimes:jpg,jpeg,png|max:5048',
            'face' => 'nullable|url',
            'ansta' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ],
        [
            'name.required'=>'please enter name',
            'name.unique'=>'name already exist',
            'image.required'=>'please select image ',
            'image.image'=>'please select valid image',
            'face.url'=>'please enter valid url',
            'ansta.url'=>'please enter valid url',
            'twitter.url'=>'please enter valid url',
            'linkedin.url'=>'please enter valid url',
        ]);
        $image=$request->file('image');
        $name_gen=hexdec(uniqid());
        $image_ext=strtolower($image->getClientOriginalExtension());
        $image_name=$name_gen.'.'.$image_ext;
        $path='doctors/image/';
        $image_url=$path.$image_name;
        $image->move($path,$image_name);
        Doctor::create([
            'name'=>$request->name,
            'face'=>$request->face,
            'ansta'=>$request->ansta,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'image'=>$image_url,
            'depart_id'=>$request->depart_id

        ]);
        return redirect()->back()->with('success' ,'Data Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $departs=Department::all();
        $doctors = Doctor::find($id);
        return view('backend.doctors.edit', compact('doctors','departs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $departs=Department::all();
        $doctors = Doctor::find($id);
        $validate=$request->validate([
            'name'=>'required|unique:doctors',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:5048',
            'face' => 'nullable|url',
            'ansta' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ],
        [
            'name.required'=>'please enter name',
            'name.unique'=>'name already exist',
            'image.image'=>'please select valid image',
            'face.url'=>'please enter valid url',
            'ansta.url'=>'please enter valid url',
            'twitter.url'=>'please enter valid url',
            'linkedin.url'=>'please enter valid url',
        ]);
        $image=$request->file('image');
        $name_gen=hexdec(uniqid());
        $image_ext=strtolower($image->getClientOriginalExtension());
        $image_name=$name_gen.'.'.$image_ext;
        $path='doctors/image/';
        $image_url=$path.$image_name;
        $image->move($path,$image_name);
        $doctors->update([
            'name'=>$request->name,
            'face'=>$request->face,
            'ansta'=>$request->ansta,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'image'=>$image_url,
            'depart_id'=>$request->depart_id

        ]);
        return redirect()->route('Medicine')->with('success' ,'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $doctors=Doctor::find($id);
       $doctors->destroy($id);
       return redirect()->back()->with('success' ,'Data Deleted Successfully');
    }
}
