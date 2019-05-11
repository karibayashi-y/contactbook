@extends('layouts.admin')

@section('content')

<div class="container">
        
    <div class="row justify-content-center">
            
        <div class="col-md-8">
            
            
                @foreach ($creates as $item )
                @if ($userId == $item->user_id)
                
            <div class="card border-secondary mb-3">
                <div class="card-header"  >
                    <h5 class="float-left">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</h5>
                    <div class="">
                        <button class="btn btn-sm btn-primary float-left"><a href="{{ route('edit.userform', ['form' => $item->id]) }}" class="text-white">編集</a></button>
                        <form method="post" action="{{$item->id}}">
                            @csrf
                                <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                        <p>本日の行事：{{ $item->event }}</p>
                        @if ($item->image_url)
                        <p>画像：<img src ="/{{ $item->image_url}}"></p> 
                        @endif
                        <p>連絡事項：{{ $item->notice }}</p>
                </div>
            </div>
            
            
            @endif
            @endforeach
            
            
            
        
        
    </div>
    </div>
    {{ $creates->links() }}
</div>
@endsection


