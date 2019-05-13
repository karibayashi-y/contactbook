<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-center {
                position: absolute;
                top: 5px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                /* text-transform: uppercase; */
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .jumbotron {
                /* background-image: url("xxx.jpg"); */
                background-color: aquamarine;
                background-size: cover;
                background-position: center 100%;
                }
        </style>
    </head>
    <body>
            <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                      <h1 class="display-4 text-center">ContactBook</h1>
                      <p class="lead">様々なシーンでお使いいただける、管理者サイドの連絡帳アプリです。</p>
                      <p>お試しはこちらから</p>
                      <p>※デーサービスでの使用例</p>
                      <a href="">管理者ログイン（お試し）</a>
                        <a href="">ユーザーログイン（お試し）</a>
                    </div><!-- /.container -->
                  </div><!-- /.jumbotron -->
                  <div class="container">
                        <div class="flex-center position-ref full-height">

                                    <div class="top-center links">
                                            @guest('admin')
                                            <a href="{{ route('admin.home') }}" rel="noopener" target="_blank" >adminLogin</a>
                                            @else
                                            <a href="{{ route('admin.login') }}" rel="noopener" target="_blank" >adminLogin</a>
                                            @endguest
                                            @guest('user')
                                            <a href="{{ route('home') }}" rel="noopener" target="_blank" >userLogin</a>
                                            @else
                                            <a href="{{ route('login') }}" rel="noopener" target="_blank" >userLogin</a>
                                            @endguest
                                    </div>
                            </div>
                  </div><!-- /.container -->
    </body>
</html>
