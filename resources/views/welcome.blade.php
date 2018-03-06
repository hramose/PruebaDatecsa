<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 90vh;
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


            .navbar-brand img{
                width: 200px;
                height: 60px;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 60px;
                background-color: #e7e7e7;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" style="min-height: 87px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img alt="Brand" class="img-responsive" src="http://www.datecsa.com.co/wp-content/uploads/2017/06/logo.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top: 15px;">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}"><b>Home</b></a></li>
                            @else
                                <li><a href="{{ route('login') }}"><b>Login</b></a></li>
                                <li><a href="{{ route('register') }}"><b>Registrarse</b></a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <img src="http://www.datecsa.com.co/wp-content/uploads/2015/10/gestion-documental-banner.png"/>
                    </div>
                    <div class="col-xs-6 col-md-4">
                    <h1 style="color:#dedede;">Gestión <br>Documental</h1>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
      <div class="container">
          <br>
        <p class="text-center"><b>&copy; Juan Manuel López Bedoya</b></p>
      </div>
    </footer>
    </body>
</html>
