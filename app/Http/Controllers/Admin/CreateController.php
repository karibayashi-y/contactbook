<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\CreateForm;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateForms;



class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function showCreateForm()
    {
        $users = User::all();
        return view('admin.createform.index',[
            'users' => $users,
        ]);
    }

    public function create(CreateForms $request)
    {

        $createform = Createform::all();

        $createform->user_name = $request->user_name;
        $createform->user_id = DB::table('users')->where('name','=',$createform->user_name)->value('id');
        $createform->event = $request->event;
        if(($createform->image_url = $request->image_url)!=null)
            {
                $image = $request->image_url->storeAs('public/createform_images', date('YmdHis').'_'.$createform->user_id.'.jpg');
                $image_place = str_replace('public/', 'storage/', $image);
                $createform->image_url = $image_place;
            }
        $createform->notice = $request->notice;
        $createform->save();
        

        return redirect()->route('index.userform', [
            'id' => $createform->user_id,
        ],compact('creates'));
    }

}
