<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Matrimonial.com!</title>
 
    <!-- Bootstrap core CSS -->
    {!! Html::style('/assets/plugins/bootstrap/css/bootstrap.min.css') !!}
 
    <!-- Custom styles for this template -->
    {!! Html::style('/assets/css/navbar-static-top.css') !!}
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
    @yield('head')
 
</head>
 
<body>
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Matrimonial.com!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Session::get('email'))
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Session::get('email') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="logout">Logout</a></li>
                            <!--li><a href="profile/">Edit Profile</a></li-->
                        </ul>
                    </li>
                @else
                    <li><a href="login">Sign In</a></li>
                    <li><a href="register">Sign up</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
 
 
<div class="container">
    @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif
 
    @yield('content')
 
</div> <!-- /container -->
 
 
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

{!! Html::script('/assets/plugins/bootstrap/js/bootstrap.min.js') !!}
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{!! Html::script('/assets/js/ie10-viewport-bug-workaround.js') !!}
<!--script src="/node_modules/angular/angular.js"></script-->
</body>
</html>