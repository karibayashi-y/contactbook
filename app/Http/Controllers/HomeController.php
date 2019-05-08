<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Createform;
use App\User;


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
    {   $creates = Createform::latest()->get();
        return view('home',compact('creates'));
    }
}

