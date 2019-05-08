<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Createform;
use App\User;

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

    public function create(Request $request)
    {

        $createform = new Createform();
        $createform->user_name = $request->user_name;
        $createform->event = $request->event;
        if(($createform->image_url = $request->image_url)!=null)
            {
                $image = $request->image_url->storeAs('public/createform_images', date('YmdHis').'_'. '.jpg');
                $image_place = str_replace('public/', 'storage/', $image);
                $createform->image_url = $image_place;
            }
        $createform->notice = $request->notice;
        $createform->save();

        return redirect()->to(route('index.userform', [
            'id' => $createform->user_name
            ]));

        
    }

}
