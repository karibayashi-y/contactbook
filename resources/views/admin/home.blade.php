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
                                <th scope="col">氏名</th>
                                <th scope="col">連絡帳一覧画面</th>
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
                                    <td>
                                        <button type="button" class="btn btn-info">
                                            <a class="text-white" href="{{ route('index.userform', ['id' => $user->id]) }}">個別ページ</a>
                                        </button>
                                    </td>
                                    {{-- <form method="post" action="{{route('deleteform',['id' => $user->id])}}">
                                            @csrf --}}
                                    <td>
                                        {{-- <button　class="btn"><a href="{{ route('deleteform', ['id' => $user->id]) }}">削除</a></button> --}}
                                        <button type="button" class="btn btn-danger">
                                                <a class="text-white" href="{{route('deleteform',['id' => $user->id])}}">削除</a>
                                            </button>
                                        
                                        {{-- <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'> --}}
                                    
                                    </td>
              
                                            
                                </form>
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
