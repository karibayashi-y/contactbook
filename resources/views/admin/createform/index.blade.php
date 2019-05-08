@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Createform') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('index.createform') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleSelect1exampleFormControlSelect1">ユーザー名</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="user_name">
                                    <option>ユーザー名を選択してください</option>
                                        @foreach ($users as $user)
                                            @if(Auth::user()->workspeace == $user->workspeace)
                                            <option>{{ $user->name}}</option>
                                            @endif
                                        @endforeach
                                </select>
                        </div>


                        <div class="form-group row">
                            <label for="event" class="col-md-4 col-form-label text-md-right">{{ __('本日の行事') }}</label>
                            <textarea id="event" type="text" class="form-control{{ $errors->has('event') ? ' is-invalid' : '' }}" name="event" value="{{ old('event') }}" required autofocus></textarea>
                            <div class="col-md-4">
                                @if ($errors->has('event'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('event') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-image_url">
                            <label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('写真') }}</label>
                            <input type="file" name="image_url">
                        </div>

                        <div class="form-group row">
                                <label for="notice" class="col-md-4 col-form-label text-md-right">{{ __('連絡事項') }}</label>
                                <textarea id="notice" type="text" class="form-control{{ $errors->has('event') ? ' is-invalid' : '' }}" name="notice" value="{{ old('notice') }}" required autofocus></textarea>
                                <div class="col-md-4">
                                    @if ($errors->has('notice'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('notice') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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