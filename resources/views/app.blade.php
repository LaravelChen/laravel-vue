<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('./css/app.css')}}" rel="stylesheet">
    <link href="{{asset('./css/navbar.css')}}" rel="stylesheet">
    <link href="{{asset('./css/style.css')}}" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#app-navbar-collapse"
                    class="navbar-toggle collapsed"><span class="sr-only">Toggle Navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a href="/" class="navbar-brand">LaravelChen</a>
        </div>
        <div id="app-navbar-collapse" class="collapse navbar-collapse">

            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            LaravelChen <span class="caret"></span>&nbsp&nbsp
                            <img class="img-circle" width="40" src="{{url(Auth::user()->avatar)}}">
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/logout">
                                    退出登录
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Home</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login">Login In</a></li>
                    <li><a href="register">Register</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>