<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.organization_short_name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /*color: #bfbfbf;*/
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                color: #e2e2e2;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            body {
                /*background: url('{{asset("static-img/img-splats.jpg")}}') no-repeat center center fixed;*/
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">           

            <div class="content">
                <div class="title m-b-md">
                    <div>
                        <!--<img src="{{asset("static-img/logo.png")}}">-->
                    </div>
                    {{config('app.name')}}
                </div>

                <!--                <div class="links">
                                    <a href="http://www.boltimizer.com/">Visit Our Website</a>
                                </div>-->

                @if (Route::has('login'))
                <div class="links">
                    @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="{{ url('/login') }}">Login</a>
                    <!--<a href="{{ url('/register') }}">Register</a>-->
                    @endif
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
