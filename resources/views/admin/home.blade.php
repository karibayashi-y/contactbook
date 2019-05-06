@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>利用者一覧</h4>
                    
                            <div class="float-right">
                                    <a href="{{route('admin.usercreateform')}}"><button type="button" class="btn btn-primary">
                                {{ __('利用者新規登録') }}
                                </button></a>
                            </div>
                            
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">氏名</th>
                                <th scope="col">連絡帳一覧画面</th>
                                <th scope="col">連絡帳新規作成</th>
                                <th scope="col">データ削除</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        @if($user->workspeace != Auth::user()->workspeace)
                                            @continue
                                        @endif
                                            <th scope="row">{{ $user->name }}</th>
                                            <td>route</td>
                                            <td><button type="button" class="btn btn-primary"><a class="text-white" href="{{route('index.createform')}}">作成</a></button></td>
                                            <td><button type="button" class="btn btn-danger">削除</button></td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
