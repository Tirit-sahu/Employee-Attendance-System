<?php

namespace App\Http\Controllers;

use App\apply_attendance;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class ApplyAttendanceController extends Controller
{

    
   public static function myStaticQuery($qry)
      {
          $result = DB::select($qry);
          return $result;
      }


   public function filter(Request $request)
   {
       $emp_id = $request->input('employee');
       $frome_date = date('Y-m-d',strtotime($request->input('frome_date')));
       $to_date = date('Y-m-d',strtotime($request->input('to_date')));
       $apply_attendances='';
       if ($emp_id != null && $frome_date != null && $to_date != null) {
            $apply_attendances = DB::table('apply_attendances')
           ->where('employee_id', $emp_id)           
           ->whereBetween('date', array($frome_date, $to_date))
           ->get();
       }else if ($emp_id == null && $frome_date != null && $to_date != null) {
           $apply_attendances = DB::table('apply_attendances')
           ->whereBetween('date', array($frome_date, $to_date))
           ->get();
       }
       if ($emp_id != null && $frome_date == null && $to_date == null) {
           $apply_attendances = DB::table('apply_attendances')
           ->where('employee_id', $emp_id)
           ->get();
       }else{

       }

       $columDateFilter = DB::table('apply_attendances')
       ->whereBetween('date', array($frome_date, $to_date))
       ->groupBy('date')
       ->get();
       
       return view('attendance_view', ['apply_attendances_filter'=>$apply_attendances, 'columDateFilter'=>$columDateFilter]);
   }

    public static function fetch_record_static($table, $key, $value)
    {
        $data = DB::table($table)
        ->OrderBy($key,$value)
        ->get();
        return $data;
    }

    public static function getVal($table,$column,$key,$value)
    {
        $result = DB::table($table)
          ->where($key, '=', $value)
          ->orderBy('id','asc')
          ->value($column);
        return $result;       
    }

    public function absent(Request $request)
    {
        $respose = array();
        $emp_id = $request->emp_id;
        $date = date('Y-m-d');
        $where = array(
            'date' => $date,
            'employee_id' => $emp_id
        );
        $check = DB::table('apply_attendances')
        ->where($where)
        ->count();
        if ($check == 0) {
            $myArray = array(
                'employee_id' => $emp_id,
                'date' => $date,
                'attendance' => 'A'
            );
            DB::table('apply_attendances')
            ->insert($myArray);
            $respose = array(
                'success' => true,
                'error' => false,
                'message' => 'Attendance apply successfully '
            );
        }else{
            $respose = array(
                'success' => false,
                'error' => true,
                'message' => 'Already attendance apply'
            );
        }

        return json_encode($respose);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function present(Request $request)
    {
        $respose = array();
        $emp_id = $request->emp_id;
        $date = date('Y-m-d');
        $where = array(
            'date' => $date,
            'employee_id' => $emp_id
        );
        $check = DB::table('apply_attendances')
        ->where($where)
        ->count();
        if ($check == 0) {
            $myArray = array(
                'employee_id' => $emp_id,
                'date' => $date,
                'attendance' => 'P'
            );
            DB::table('apply_attendances')
            ->insert($myArray);
            $respose = array(
                'success' => true,
                'error' => false,
                'message' => 'Attendance apply successfully '
            );
        }else{
            $respose = array(
                'success' => false,
                'error' => true,
                'message' => 'Already attendance apply'
            );
        }

        return json_encode($respose);
    }


    public function holiday(Request $request)
    {
        $respose = array();
        $emp = DB::table('employees')->get();
        $date = date('Y-m-d');
        $where = array(
            'date' => $date,
        );
        $check = DB::table('apply_attendances')
        ->where($where)
        ->count();
        if ($check == 0) {

            foreach ($emp as $row) {
            
            $myArray = array(
                'employee_id' => $row->id,
                'date' => $date,
                'attendance' => 'H'
            );
            DB::table('apply_attendances')
            ->insert($myArray);
            }
            $respose = array(
                'success' => true,
                'error' => false,
                'message' => 'Attendance apply successfully '
            );
        }else{
            $respose = array(
                'success' => false,
                'error' => true,
                'message' => 'Already attendance apply'
            );
        }

        return json_encode($respose);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\apply_attendance  $apply_attendance
     * @return \Illuminate\Http\Response
     */
    public function show(apply_attendance $apply_attendance)
    {
        return view('attendance_view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\apply_attendance  $apply_attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(apply_attendance $apply_attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\apply_attendance  $apply_attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apply_attendance $apply_attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\apply_attendance  $apply_attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(apply_attendance $apply_attendance)
    {
        //
    }
}
