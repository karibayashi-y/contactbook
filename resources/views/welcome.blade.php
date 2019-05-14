<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                
                color: #383838;
                font-family: 'Nunito', sans-serif;
                font-weight: 400;
                margin:0;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                
            }
            .lead{
                font-size:20px;
                
            }
            .small_text{
                font-size:12px;
            }

            
            h1{
                margin:0;
            }
            .j{
                background-image: url('https://s3-ap-northeast-1.amazonaws.com/project-contactbook/back-image/background.jpg');
                background-color: aquamarine;
                background-size: cover;
                background-position: center 100%;
                height:100vh;
                }
            .center{
                text-align: center;
            }
        </style>
    </head>
    <body>
            <div class="j">
                    <div class="container center pt-4">
                      <h1 class="text-center font-weight-bold pt-3">ContactBook</h1>
                      <p class="lead mt-5">管理者サイドに特化した連絡帳アプリです。</p>
                      <p class="lead">簡単なボタン操作で複数人の管理が可能です。</p>
                      <p class="lead">介護施設や幼稚園、習い事など様々なシーンに対応しています。</p>
                      <div class="links mb-3">
                            @guest('admin')
                            <input type="button" onclick="location.href='{{ route('admin.home') }}'" value="管理者で利用する" class="btn btn-info m-1">
                            @else
                            <input type="button" onclick="location.href='{{ route('admin.login') }}'" value="管理者で利用する" class="btn btn-info m-1">
                            @endguest
                            @guest('user')
                            <input type="button" onclick="location.href='{{ route('home') }}'" value="ユーザーで利用する" class="btn btn-warning text-light m-1">
                            @else
                            <input type="button" onclick="location.href='{{ route('login') }}'" value="ユーザーで利用する" class="btn btn-warning　text-light m-1">
                            @endguest
                    </div>
                    <p class="small_text">※デイサービスでの使用例を想定したサンプルをご用意しています。ぜひ上記のボタンからお試しください。</p>

                    </div><!-- /.container -->
                  </div><!-- /.jumbotron -->
                  
    </body>
</html>
