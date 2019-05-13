@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('連絡帳作成') }}</div>
                

                <div class="card-body">
                        @foreach ($users as $user)
                    <form method="POST" action="{{ route('index.createform',['id'=> $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @endforeach

                        <div class="form-group row m-2">
                            <label for="exampleSelect1exampleFormControlSelect1" class="font-weight-bold">{{ __('ユーザー名') }}</label>
                                <select class="custom-select{{ $errors->has('user_name') ? ' is-invalid' : '' }}" id="exampleFormControlSelect1" name="user_name" autofocus>
   
                                    <option disabled selected>選択してください</option>
                                        @foreach ($users as $user)
                                            @if(Auth::user()->workspeace == $user->workspeace)
                                            <option @if(old('user_name')==$user->name) selected @endif>{{ $user->name}}</option>
                                            @endif
                                        @endforeach
                                        @if ($errors->has('user_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                        </span>
                                @endif
                                </select>

                        </div>
                        <div class="form-group row m-2">
                            <label for="event" class="font-weight-bold">{{ __('本日の行事') }}</label>
                            <textarea id="event" type="text"  class="form-control{{ $errors->has('event') ? ' is-invalid' : '' }}"  name="event" cols="50" rows="10">{{ old('event') }}</textarea>
                            @if ($errors->has('event'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('event') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-image_url  row m-2 flex-column ">
                            <label for="image_url" class="font-weight-bold">{{ __('写真') }}</label>
                            <input type="file" name="image_url" class="float-left small">
                        </div>
                        <div class="form-group row m-2">
                                <label for="notice" class="font-weight-bold">{{ __('連絡事項') }}</label>
                                <textarea id="notice" type="text" class="form-control{{ $errors->has('notice') ? ' is-invalid' : '' }}" name="notice" cols="50" rows="10">{{ old('notice') }}</textarea>
                                @if ($errors->has('notice'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group row float-left m-2">
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