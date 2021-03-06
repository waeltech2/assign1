<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Auth;
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('Admin'))
        {
            return view('admin');
        }else
        {
            return view('home');
        }
        
    }
     public function admin(Request $request)
    {
        if (Auth::user()->hasRole('Admin'))
        {
            return view('admin');
        }else
        {
            return view('home');
        }
        
    }
}
