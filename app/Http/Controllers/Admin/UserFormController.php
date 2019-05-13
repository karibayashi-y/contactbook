<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Createform;
use Illuminate\Support\Facades\DB;

class UserFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showUserForm()
    {
        $url = url()->full();
        $url = preg_replace( '/\?.+$/', '', $url );
        $tmp = explode("/", $url);
        $userId = end($tmp);

        $users = DB::table('users')->where('id','=',$userId)->value('name');

        $creates = Createform::latest()->where('user_id','=',$userId)->paginate(5);
        $page =DB::table('createforms')->where('user_id','=',$userId)->value('user_id');

        return view('admin/createform/user',[
            'users' => $users,
            'userId' => $userId,
            'page' => $page,
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
                $image = $request->image_url->storeAs('public/createform_images', date('YmdHis').'_'.$createform->user_id.'.jpg');
                $image_replace = str_replace('public/', 'storage/', $image);
                $createform->image_url = $image_replace;
            }
            else{
                $already = Createform::findOrFail($form_id);
                $createform->image_url = $already->image_url;
            }
        $createform->notice = $request->notice;
        $createform->save();

        return redirect()->route('index.userform', [
            'form_id' => $createform->user_id
            ]);
    }
}
