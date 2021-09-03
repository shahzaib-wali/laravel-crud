<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('all',['action'=>'create']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|min:3',
           'email' => 'email|required|min:7',
        ]);

        $std = new students();
        $std->name = $request->input('name');
        $std->email = $request->input('email');
        $std->save();
        Session::flash('msg','Record saved!');
        return redirect('/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(students $students)
    {
       $stds = $students::orderBy('id','DESC')->paginate(4);
       return view('all',['action'=>'show'],compact('stds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(students $students,$id)
    {
        $std = students::find($id);
        return view('all',['action'=>'edit'],compact('std'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $students,$id)
    {

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'email|required|min:7',
        ]);

        $std = students::find($id);
        $std->name = $request->input('name');
        $std->email = $request->input('email');
        $std->save();
        Session::flash('msg','Record updated!');
        return redirect('/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $students,$id)
    {
        $students::destroy($id);
        Session::flash('msg','Record deleted!');
        return redirect('/show');

    }
}
