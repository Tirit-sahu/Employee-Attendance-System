<?php

namespace App\Http\Controllers;

use App\employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use Image;

class EmployeesController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getVal($table,$column,$key,$value)
    {
        $result = DB::table($table)
          ->where($key, '=', $value)
          ->orderBy('id','asc')
          ->value($column);
        return $result;       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = DB::table('positions')
        ->get();
        return view('employees_add', ['positions'=>$positions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name="";
        $request->validate([
        'name' => 'required',
        'father' => 'required',
        'mobile' => 'required',
        'position' => 'required',
        'photo' => 'nullable',
        'address' => 'address'
        ]);


        if ($request->hasFile('image')) {

        $image = $request->file('image');
        $input['imagename'] = date('Ymdhis').'.'.$image->extension();
     
        $destinationPath = public_path('/employees');
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        $file_name = 'employees/'.$input['imagename'];

        }else{
            $file_name = 'employees/employee.jpg';
        }
        

        $employees = new employees;
        $employees->fullName = $request->input('name');
        $employees->father = $request->input('father');
        $employees->mobile = $request->input('mobile');
        $employees->position = $request->input('position');
        $employees->photo = $file_name;
        $employees->address = $request->input('HomeAddress');        
        $employees->save();
        // $insertedId = $employees->id;
        Session::flash('success','New Employee Created.');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        $employees = DB::table('employees')
        ->orderBy('id', 'DESC')
        ->get();
        return view('employees_view', ['employees'=>$employees]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id, employees $employees)
    {
        $employees = DB::table('employees')
        ->where('id', $id)
        ->first();

        $positions = DB::table('positions')
        ->get();

        return view('employees_edit', ['employees'=>$employees, 'positions'=>$positions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, employees $employees)
    {
        $request->validate([
        'name' => 'required',
        'father' => 'required',
        'mobile' => 'required',
        'position' => 'required',
        'photo' => 'nullable',
        'address' => 'address'
        ]);


        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $input['imagename'] = date('Ymdhis').'.'.$image->extension();
     
        $destinationPath = public_path('/employees');
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        $file_name = 'employees/'.$input['imagename'];

        }else{
            $file_name = DB::table('employees')
            ->where('id', $id)
            ->value('photo');
        }

        $myArray = array(
            'fullName' => $request->input('name'),
            'father'   => $request->input('father'),
            'mobile' => $request->input('mobile'),
            'position' => $request->input('position'),
            'address' => $request->input('HomeAddress'),
            'photo' => $file_name
        );
        employees::where('id', $id)
        ->update($myArray);

        Session::flash('success','Employee Updated.');
        return Redirect('/employees/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, employees $employees)
    {
        DB::table('employees')
        ->where('id', $id)
        ->delete();
        Session::flash('success','Employee Deleted.');
        return Redirect::Back();
    }
}
