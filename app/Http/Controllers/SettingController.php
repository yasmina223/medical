<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::firstOrCreate();

        return view('backend.setting.setting', compact('settings'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name'=> 'required',
            'email'=> 'required|email',
            'phone'=>'required',
            

        ]
        ,[

            'name.required' => 'please enter your name',
            'email.url' => 'please enter a valid email',
            'phone.required'=>'please enter your phone',

        ]);

        $settings=Setting::find($id);
        Setting ::where('id', $id)->update($request->except('_token','_method'));
        $settings->save();
        // dd($request->all());
       return redirect()->route('settings')->with('success' ,'Data Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
