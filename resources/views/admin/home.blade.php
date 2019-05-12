@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>ユーザー一覧</h4>
                            <div class="float-right">
                                    <input type="button" onclick="location.href='{{route('admin.usercreateform')}}'"value="ユーザー新規登録" class="btn btn-primary">
                            </div>
                </div>
                <div class="card-body">
                    <input type="button" onclick="location.href='{{route('index.createform')}}'"value="連絡帳作成" class="btn btn-success mb-4 float-right">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" class="text-center">氏名</th>
                                <th scope="col" class="text-center">連絡帳一覧画面</th>
                                <th scope="col" class="text-center">データ削除</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        @if($user->workspeace != Auth::user()->workspeace)
                                            @continue
                                        @endif
                                        <th scope="row" class="text-center ">{{ $user->name }}</th>
                                        <td>
                                            <div class="text-center">
                                                <input type="button" onclick="location.href='{{route('index.userform', ['id' => $user->id])}}'" value="個別ページ" class="btn btn-info text-white">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <input type="button" onclick="location.href='{{route('deleteform',['id' => $user->id])}}'" value="削除" class="btn btn-danger">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    {{ $users->links('pagination.default') }}
</div>
@endsection
