@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Createform') }}</div>
                

                <div class="card-body">
                        @if($errors->any())
                        <div class="error">
                        <ul>
                            @foreach($errors->all() as $message)
                            <li class="text-danger">{{ $message }}</li>
                            @endforeach
                        </ul>
                        </div>
                        @endif
                        @foreach ($users as $user)
                    
                    <form method="POST" action="{{ route('index.createform',['id'=> $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @endforeach

                        <div class="form-group row m-2">
                            <label for="exampleSelect1exampleFormControlSelect1" class="font-weight-bold">{{ __('ユーザー名') }}</label>
                                <select class="custom-select" id="exampleFormControlSelect1" name="user_name">
                                    <option disabled selected>ユーザー名を選択してください</option>
                                        @foreach ($users as $user)
                                            @if(Auth::user()->workspeace == $user->workspeace)
                                            <option>{{ $user->name}}</option>
                                            @endif
                                        @endforeach
                                </select>
                                
                        </div>
                        <div class="form-group row m-2">
                            <label for="event" class="font-weight-bold">{{ __('本日の行事') }}</label>
                            <textarea id="event" type="text"  class="form-control"  name="event" cols="50" rows="10">{{ old('event') }}</textarea>
                            
                        </div>

                        <div class="form-image_url  row m-2 flex-column ">
                            <label for="image_url" class="font-weight-bold">{{ __('写真') }}</label>
                            <input type="file" name="image_url" class="float-left col-xs-small">
                            
                        </div>
                        <div class="form-group row m-2">
                                <label for="notice" class="font-weight-bold">{{ __('連絡事項') }}</label>
                                <textarea id="notice" type="text" class="form-control" name="notice" cols="50" rows="10">{{ old('notice') }}</textarea>
                                
                            </div>
                        <div class="form-group row float-right">
                            <div class="mr-5 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('作成') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection