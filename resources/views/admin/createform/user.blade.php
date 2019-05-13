@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3 class="font-weight-bold">連絡帳（{{$users}}）</h3>
                @foreach ($creates as $item )
                @if ($userId == $item->user_id)
            <div class="card border-secondary mb-4">
                <div class="card-header d-flex  justify-content-between">
                    <h4 class="mt-2 d-none d-sm-block">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</h4>
                    <h6 class="mt-2 d-block d-sm-none">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</h6>
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
                        <img src ="/{{ $item->image_url}}" class="rounded mx-auto d-block img-fluid m-3">
                        @endif
                        <h5 class="far fa-clock font-weight-bold m-3 d-none d-sm-block">&thinsp;スケジュール</h5>
                        <h6 class="far fa-clock font-weight-bold m-1 d-block d-sm-none">&thinsp;スケジュール</h6>
                        <div cols="50" rows="10">{!! nl2br(e($item->event)) !!}</div>
                        <h5 class="fas fa-broadcast-tower font-weight-bold mx-3 mt-5 mb-3 d-none d-sm-block">&thinsp;連絡事項</h5>
                        <h6 class="fas fa-broadcast-tower font-weight-bold mx-1 mt-3 mb-1 d-block d-sm-none">&thinsp;連絡事項</h6>
                        <div cols="50" rows="10">{!! nl2br(e($item->notice)) !!}</div>
                </div>
            </div>
            @endif
            @endforeach
            @if($page)
                {{ $creates->links('pagination.default') }}
            @endif
        </div>
    </div>
</div>

@endsection


