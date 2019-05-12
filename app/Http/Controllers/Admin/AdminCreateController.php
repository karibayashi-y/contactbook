<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCreateForms;





class AdminCreateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.admincreateform');
    }

    public function admincreate(AdminCreateForms $request){
        
      $admin = new Admin([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'workspeace' => $request->input('workspeace'),
      ]);
      $admin->save();
     
      return redirect()->route('admin.home');
    }
}
