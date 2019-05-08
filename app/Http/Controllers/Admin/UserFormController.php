<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Createform;

class UserFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showUserForm()
    {
        $users = User::all();
        $creates = Createform::latest()->get();

        $url = url()->full();
        $tmp = explode("/", $url);
        $endid = end($tmp);
        $userName = urldecode($endid);


        
        return view('admin/createform/user',[
            'users' => $users,
            'userName' => $userName,
        ],compact('creates'));
    }
}
