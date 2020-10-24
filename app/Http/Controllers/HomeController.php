<?php

namespace App\Http\Controllers;

use App\User;
use App\feescollection;
use App\students;
use App\schoolmoney;
use App\parents;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
}
