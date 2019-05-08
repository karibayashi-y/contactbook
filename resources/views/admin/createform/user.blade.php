@extends('layouts.admin')

@section('content')

<div class="container">


       
           
       
    <div class="row justify-content-center">
            
        <div class="col-md-8">
    
               
                @foreach ($creates as $item )
                @if ($username == $item->user_name)
                    
                
        
            <div class="card border-secondary mb-3">
            <div class="card-header">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</div>
                
            <a href="">削除</a>
            
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
            @endif
            @endforeach
           
        </div>
    </div>
    
       
</div>
@endsection