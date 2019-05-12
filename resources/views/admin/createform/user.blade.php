@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach ($creates as $item )
                @if ($userId == $item->user_id)
                
            <div class="card border-secondary mb-4">
                <div class="card-header d-flex  justify-content-between">
                    <h4 class="mt-2">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</h4>
                    <div class="d-flex m-2">
                        <input type="submit" onclick="location.href='{{route('edit.userform', ['form' => $item->id])}}'"value="編集" class="btn btn-sm btn-primary mr-3">
                        <form method="post" action="{{$item->id}}">
                            @csrf
                                <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                        @if ($item->image_url)
                        <img src ="/{{ $item->image_url}}" class="rounded mx-auto d-block img-fluid">
                        @endif
                        <h6 class="far fa-clock font-weight-bold m-2">スケジュール</h6>
                        <pre>{{ $item->event }}</pre>
                        <h6 class="fas fa-broadcast-tower font-weight-bold m-2">連絡事項</h6>
                        <pre>{{ $item->notice }}</pre>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    {{ $creates->links('pagination.default') }}
</div>
@endsection


