<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;




class UserCreateController extends Controller
{
    

    public function index()
    {
        return view('admin.usercreateform');
    }

    public function usercreate(Request $request){
        // バリデーション
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        // DB
        $user = new User([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
        ]);
        $user->save();
       
        return redirect()->route('admin.home');
      }
}
