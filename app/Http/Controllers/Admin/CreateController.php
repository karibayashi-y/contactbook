<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Createform;


class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        return view('admin.createform.index');
    }

    public function createForm(Request $request)
    {

        $createform = new Createform();
        $createform->event = $request->event;
        $image = $request->image_url->storeAs('public/createform_images', date('YmdHis').'_'. '.jpg');
        $image_place = str_replace('public/', 'storage/', $image);
        $createform->image_url = $image_place;
        $createform->notice = $request->notice;
        $createform->save();

        $creates = Createform::latest()->get();

        return view('home'
        ,compact('creates'));


    }



}
