<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Redirect;
use Auth;

class UsersController extends Controller
{
    public static function fetch_record_static($table, $key, $value)
    {
        $data = DB::table($table)
        ->OrderBy($key,$value)
        ->get();
        return $data;
    }

    public static function count_record($table)
    {
        return DB::table($table)->count();
    }
    
        public static function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
     }

    public static function getVal($table,$column,$key,$value)
    {
        $result = DB::table($table)
          ->where($key, '=', $value)
          ->orderBy('id','asc')
          ->value($column);
        return $result;       
    }
    
    public function index()
    {
        $loginid = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $user = DB::table('users')
        ->where('id', $loginid)
        ->first();
        return view('users_profile', ['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        return view('users');
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
        'name' => 'required',
        'mobile' => 'required|numeric',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        ]);
        $User = new User;
        $User->name = $request->input('name');
        $User->mobile = $request->input('mobile');
        $User->email = $request->input('email');
        $User->password = Hash::make($request->input('password'));
        $User->role = $request->input('role');
        $User->save();
        Session::flash('success','New User Created.');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
        ->where('id', $id)
        ->first();
        return view('users', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request)
    {
      $host = $request->getHttpHost(); // returns tirit.in
        $file_name="";
        $loginid = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');

        $request->validate([
        'name' => 'required',
        'mobile' => 'required|numeric',
        // 'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        ]);
        

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $file_name = date('Ymdhis').'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/users');
        $image->move($destinationPath, $file_name);
        $file_name = 'users/'.$file_name;   
        }
        else{
          $file_name = DB::table('users')->where('id', $loginid)->value('photo');
        }

        $myArray = array(
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            // 'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'photo' => $file_name
        );

        User::where('id', $loginid)
        ->update($myArray);

        Session::flash('success','Updated.');
        return Redirect::back();
    }



    public function update($id, Request $request)
    {
        $host = $request->getHttpHost(); // returns tirit.in
        $loginid = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');

        $request->validate([
        'name' => 'required',
        'mobile' => 'required|numeric',
        // 'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        ]);
        

        $myArray = array(
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password'))
        );

        User::where('id', $id)
        ->update($myArray);

        Session::flash('success','Updated.');
        return Redirect('/users/create');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disabled($id)
    {
        $myArray = array(
            'status' => 1
        );
        User::where('id', $id)
        ->update($myArray);

        Session::flash('success','Disabled User.');
        return Redirect::back();
    }

    public function enabled($id)
    {
        $myArray = array(
            'status' => 0
        );
        User::where('id', $id)
        ->update($myArray);

        Session::flash('success','Enabled User.');
        return Redirect::back();
    }

    public static function getRole()
    {
        $loginid = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $role = DB::table('users')->where('id', $loginid)->value('role');
        return $role;
    }

    public static function getStatus()
    {
        $loginid = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $status = DB::table('users')->where('id', $loginid)->value('status');
        return $status;
    }

}
