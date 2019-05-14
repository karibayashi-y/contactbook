@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('編集') }}</div>
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
                    <form method="post" action="{{ route('edit.userform',['createform' => $createform ]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-image_url row m-2 flex-column">
                                @if($createform->image_url)
                                <label for="image_url" class="font-weight-bold">{{ __('現在の写真') }}</label>
                                <img src ="{{ url("https://s3-ap-northeast-1.amazonaws.com/project-contactbook/images/$createform->image_url") }}" class="rounded mx-auto d-block img-fluid">
                               @endif
                                <input type="file" name="image_url" class="float-left small mt-2">
                        </div>
                        <div class="form-group row m-2">
                                <label for="event" class="font-weight-bold">{{ __('スケジュール') }}</label>
                                <textarea id="event" type="text"  class="form-control"  name="event" cols="50" rows="10">{{ $createform->event }}</textarea>
                        </div>
                        <div class="form-group row m-2">
                                <label for="notice" class="font-weight-bold">{{ __('連絡事項') }}</label>
                                <textarea id="notice" type="text" class="form-control" name="notice" cols="50" rows="10">{{ $createform->notice }}</textarea>
                        </div>
                        <div class="form-group row float-right">
                                <div class="mr-5 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('再送信') }}
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