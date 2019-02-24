<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #658BA1;
                color: #ffffff;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Infinite Evolution
                </div>

                <div class="links">
                    <a href="https://github.com/leecrosdale/larahack-evolution">GitHub</a>
                    <a href="https://larahack.com">Built for LaraHack #3</a>
                </div>

                <br/><hr/><br/>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="color:black">Leaderboard</div>

                            <div class="card-body table-responsive">

                                <table class="table table-striped ">
                                    <tr>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Experience</th>
                                    </tr>
                                    @foreach (\App\User::orderBy('level','DESC')->orderBy('experience', 'DESC')->limit(10)->get() as $user)
                                            <tr>
                                                <td>{{ $user->avatar_name }}</td>
                                                <td>{{ $user->level }}</td>
                                                <td>{{ $user->experience }}</td>
                                            </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </body>
</html>
