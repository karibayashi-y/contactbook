@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                              <th scope="col">氏名</th>
                                <th scope="col">連絡帳一覧画面</th>
                                <th scope="col">連絡帳新規作成</th>
                                <th scope="col">連絡帳編集</th>
                                <th scope="col">データ削除</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>route</td>
                                        <td>作成ボタン</td>
                                        <td>編集ボタン</td>
                                        <td>削除ボタン</td>
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
