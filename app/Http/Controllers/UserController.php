<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use Validator;
use Session;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index')->with('users',$users);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::lists('name','id');
        $roles = ['admin','player'];
        return View('admin.create', ['roles' => $roles ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $user->roles()->attach(Role::where('name', 'Player')->first());
        Session::flash('success', 'User was successful added!');
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //$rolelists = Role::lists('name','id');
        return View('admin/edit', [ 'user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $user = User::find($id);
        $role = 2;//Role::find(Input::get('role'));
        $user->name   = Input::get('name');
        $user->username      = Input::get('username');
        $user->email      = Input::get('email');
        $password_input = Input::get('password');
        if(empty($password_input)) //if password left blank
            {
                $user->roles()->detach();
                $user->roles()->attach($role);
                $user->save();
            }else //if admin enter the password
            {
                $user->password   = bcrypt(Input::get('password'));
                $user->roles()->detach();
                $user->roles()->attach($role);
                $user->save();
            }

        Session::flash('success', 'User was successful updated!');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('success', 'User was successful deleted!');
        return redirect('admin/users');
    }
}
