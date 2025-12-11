<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appoinments = Appoinment::latest()->get();
        $departs = Department::all();
        $doctors = Doctor::all();
        $settings=Setting::all();

        return view('backend.appoinment.index', compact('appoinments','departs','doctors','settings'));
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
        Appoinment::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'date'=>$request->date,
            'depart_id'=>$request->depart_id,
            'doctor_id'=>$request->doctor_id,
            'message'=>$request->message


        ]);
        return redirect()->route('appoinment');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appoinment $appoinment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appoinment $appoinment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appoinment $appoinment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getdoctors($id)
    {
        $products = DB::table('doctors')->where('depart_id', $id)->pluck('doctor_id', 'id');
        return json_encode($products);
    }
}
