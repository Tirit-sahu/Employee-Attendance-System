<?php

namespace App\Http\Controllers;

use App\position;
use App\employees;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class PositionController extends Controller
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
        //
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
            'name' => 'required' 
        ]);
        $name = $request->input('name');
        $myArray = array( 'name' => $name);
        DB::table('positions')
        ->insert($myArray);
        Session::flash('success','New position added');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(position $position)
    {
        $positions = DB::table('positions')
        ->OrderBy('id', 'DESC')
        ->get();
       return view('position', ['positions'=>$positions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit($id, position $position)
    {
        $position = DB::table('positions')
        ->where('id', $id)
        ->first();
        return view('position_edit', ['position'=>$position]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, position $position)
    {
        $request->validate([
            'name' => 'required|unique:positions'
        ]);
        $myArray = array(
            'name' => $request->input('name')
        );
        DB::table('positions')
        ->where('id', $id)
        ->update($myArray);
        Session::flash('success', 'Position Updated');
        return Redirect('/employees/position');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, position $position)
    {
        $count = DB::table('employees')
        ->where('position', $id)
        ->count();
        if ($count==0) {
        DB::table('positions')->where('id', $id)->delete();
        Session::flash('success', 'Position Deleted.');
        return Redirect::back();
        }else{
        Session::flash('error','Can\'t Delete, This Are Dependent to Employee Section');
        return Redirect::back();
        }
    }
}
