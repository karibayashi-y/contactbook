@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Createform') }}</div>
                
                <div class="card-body">
                    <form method="post" action="{{ route('edit.userform',['createform' => $createform ]) }}" enctype="multipart/form-data">
                    
                        @csrf
                        @method('PUT')
                        
                            
                        
                        <div class="form-group row">
                            <label for="event" class="col-md-4 col-form-label text-md-right">{{ __('本日の行事') }}</label>
                        <textarea id="event" type="text" class="form-control{{ $errors->has('event') ? ' is-invalid' : '' }}" name="event" value="{{ old('event') }}" required autofocus>{{$createform->event}}</textarea>
                            <div class="col-md-4">
                                @if ($errors->has('event'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('event') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-image_url">
                            <label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('現在の写真') }}</label>
                            @if($createform->image_url = null)
                            
                            <img src ="/{{ $createform->image_url}}">
                            <input type="file" name="image_url">
                        </div>

                        <div class="form-group row">
                                <label for="notice" class="col-md-4 col-form-label text-md-right">{{ __('連絡事項') }}</label>
                        <textarea id="notice" type="text" class="form-control{{ $errors->has('event') ? ' is-invalid' : '' }}" name="notice" value="{{ old('notice') }}" required autofocus>{{$createform->notice}}</textarea>
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
                                    {{ __('編集する') }}
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