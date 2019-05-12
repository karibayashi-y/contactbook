<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateForms;




class UserCreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.usercreateform');
    }

    public function usercreate(UserCreateForms $request){
        
        $user = new User([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
          'workspeace' => $request->input('workspeace'),
        ]);
        $user->save();
       
        return redirect()->route('admin.home');
      }
}
