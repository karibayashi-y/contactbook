<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Createform;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        $userId = Auth::user()->id;
        $creates = Createform::where('user_id','=',$userId)->paginate(5);

        return view('home',[
            'userId' => $userId,
        ],compact('creates'));
    }
}

