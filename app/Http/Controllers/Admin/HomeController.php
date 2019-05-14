<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Createform;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $workspeace = Auth::user()->workspeace;
        $users = User::where('workspeace','=',$workspeace)->paginate(5);


        return view('admin.home',[
            'workspeace'=> $workspeace,
        ],compact('users'));
    }

    public function deleteform()
    {   
        $users = User::all();
        $creates = Createform::all();

        $url = url()->full();
        $tmp = explode("/", $url);
        $userId = end($tmp);

        return view('admin/deleteform/index',[
            'userId' => $userId,
            'creates' => $creates,
        ],compact('users'));

        }

    public function delete(Request $request)
    {
        DB::table('createforms')->where('user_id','=',$request->id)->delete();
        User::find($request->id)->delete();

        return redirect()->route('admin.home');
    }
}
