<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Createform;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateForms;
use Illuminate\Support\Facades\Storage;


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
        $createform = new Createform();
        $createform->user_name = $request->user_name;
        $createform->user_id = DB::table('users')->where('name','=',$createform->user_name)->value('id');
        $createform->event = $request->event;
            if(($createform->image_url = $request->image_url)!=null)
                {
                    $file = $request->file('image_url');
                    $rename = (date('YmdHis').'_'.$createform->user_id.'.jpg');
                    $path = Storage::disk('s3')->putFileas('/images', $file, $rename, 'public');
                    $createform->image_url = $rename;
                }
        $createform->notice = $request->notice;
        $createform->save();

        return redirect()->route('index.userform',[
            'id' => $createform->user_id,
        ]);
    }

}