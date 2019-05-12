@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="infinite-scroll">
                @foreach ($creates as $item )
            <div class="card border-secondary mb-4">
                <div class="card-header d-flex  justify-content-between">
                    <h4 class="mt-2 d-none d-sm-block">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</h4>
                    <h6 class="mt-2 d-block d-sm-none">{{ date('Y年n月j日', strtotime($item->updated_at)) }}</h6>
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
                @endforeach
                {{ $creates->links() }}
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('ul.pagination').hide();
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<div>読み込み中...</div>',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
        </script>
@endsection



