@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach ($creates as $item)
            <div class="card border-secondary mb-3">
            <div class="card-header">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>本日の行事：{{ $item->event }}</p>
                    <p>画像：<img src ="/{{ $item->image_url}}"></p>
                    <p>連絡事項：{{ $item->notice }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
