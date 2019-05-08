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

    public function delete(Request $request)
    {
        Createform::find($request->id)->delete();
        return back();
    }

    public function editForm($form_id)
    {
        $createform = Createform::findOrFail($form_id);
        return view('admin/editform/index',[
            'createform' => $createform,
        ]);
    }

    public function update($form_id, Request $request)
    {
        $createform = Createform::findOrFail($form_id);
        $createform->event = $request->event;
        if(($createform->image_url = $request->image_url)!=null)
            {
                $image = $request->image_url->storeAs('public/createform_images', date('YmdHis').'_'. '.jpg');
                $image_place = str_replace('public/', 'storage/', $image);
                $createform->image_url = $image_place;
            }
            else{
                $already = Createform::findOrFail($form_id);
                $createform->image_url = $already->image_url;
            }
        
        $createform->notice = $request->notice;
        $createform->save();

        return redirect()->to(route('index.userform', [
            'id' => $createform->user_name
            ]));
    }
}
