@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @foreach ($users as $user)
                    @if ($userId == $user->id)
                        <h4 class="fas fa-exclamation-circle text-danger">{{ $user->name }}さんのデータをすべて削除します。</h4>
                </div>
                    <div class="card-body">
                        <form method="post" action="{{$user->id}}">
                            @csrf
                                <h5>削除される内容</h5>
                                    <ul>
                                        <li>氏名、メールアドレス、パスワード情報</li>
                                        <li>作成した連絡帳→<a class="" href="{{ route('index.userform', ['id' => $user->name]) }}">連絡帳ページ</a></li>
                                    </ul>
                                    <p>※削除すると元の状態に戻せません。
                                        <br>また、{{ $user->name }}さんはログインできなくなります。</p>
                                    <input type="button" onclick="location.href='{{route('admin.home')}}'"value="削除しない" class='btn btn-primary'>
                                    <input type='submit' value='削除する' class='btn btn-danger'>
                        </form>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
