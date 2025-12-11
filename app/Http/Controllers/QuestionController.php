<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questiones=Question::latest()->get();
        return view('backend.question.index',compact('questiones'));
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
            'question'=>'required',
            'answer'=>'required'
        ],
        [
            'question.required'=>'please enter question',
            'answer.required'=>'please enter answer ',

        ]);
        Question::create([
            'question'=>$request->question,
            'answer'=>$request->answer,

        ]);
        return redirect()->back()->with('success' ,'Data Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $questiones=Question::find($id);
        return view('backend.question.edit',compact('questiones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $questiones=Question::find($id);
        $validate=$request->validate([
            'question'=>'required',
            'answer'=>'required'
        ],
        [
            'question.required'=>'please enter question',
            'answer.required'=>'please enter answer ',

        ]);
        $questiones->update([
            'question'=>$request->question,
            'answer'=>$request->answer,
        ]);
        return redirect()->route('questiones')->with('success' ,'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {$questiones=Question::find($id);
        $questiones->delete();
        return redirect()->back()->with('success' ,'Data Deleted Successfully');  //
    }
}
