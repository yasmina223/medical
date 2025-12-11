<?php

namespace App\Http\Controllers;

use App\Models\Servic;
use Illuminate\Http\Request;

class ServicController extends Controller
{

     public function __construct()
     {
         $this->middleware('auth');

     }

    public function index()
    {
        $services=Servic::latest()->get();
        return view('backend.services.index',compact('services'));
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
            'title'=>'required|unique:servics',
            'icone'=>'required|image|mimes:jpg,jpeg,png|max:5048'
        ],
        [
            'title.required'=>'please enter title',
            'title.unique'=>'title already exist',
            'icone.required'=>'please select icon ',
            'icone.image'=>'please select valid icon',
        ]);
        $icon=$request->file('icone');
        $name_gen=hexdec(uniqid());
        $image_ext=strtolower($icon->getClientOriginalExtension());
        $image_name=$name_gen.'.'.$image_ext;
        $path='icon/image/';
        $image_url=$path.$image_name;
        $icon->move($path,$image_name);
        Servic::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'icone'=>$image_url,
            'user_id'=>auth()->user()->id
        ]);
        return redirect()->back()->with('success' ,'Service Created Successfully');
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Servic $servic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servic $servic,$id)
    {
        $services=Servic::find($id);
        return view('backend.services.edit',compact('services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $services=Servic::find($id);
        $validate=$request->validate([
            'title'=>'required|unique:servics',
            'icone'=>'nullable|image|mimes:jpg,jpeg,png|max:5048'
        ],
        [
            'title.required'=>'please enter title',
            'title.unique'=>'title already exist',
            'icone.image'=>'please select valid icon',
        ]);
        $icon=$request->file('icone');
        $name_gen=hexdec(uniqid());
        $image_ext=strtolower($icon->getClientOriginalExtension());
        $image_name=$name_gen.'.'.$image_ext;
        $path='icon/image/';
        $image_url=$path.$image_name;
        $icon->move($path,$image_name);
        $services->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'icone'=>$image_url,
            'user_id'=>auth()->user()->id
        ]);
        return redirect()->route('Services')->with('success' ,'Service Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $services=Servic::find($id);
        $services->delete();
        return redirect()->back()->with('success' ,'Service Deleted Successfully');
    }
}
