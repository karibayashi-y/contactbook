<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Createform;

class CreateController extends Controller
{
    public function index()
    {
        return view('admin.createform.index');
    }

    public function createForm(Request $request)
    {
        $createform = new Createform();
        $createform->event = $request->event;
        $createform->image_url = $request->image_url->storeAs('public/createform_images', date('YmdHis').'_'. '.jpg');
        $createform->notice = $request->notice;
        $createform->save();
        
        return view('home',[
            'event' => $createform->event,
            'image_url' => str_replace('public/', 'storage/', $createform->image_url),
            'notice' => $createform->notice,
        ]);


    }



}
