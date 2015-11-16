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

    {!! Html::style('/assets/css/main.css') !!}

    <!-- Responsive Style -->
    {!! Html::style('/assets/css/responsive.css') !!}

    <!--Icon Font-->
    {!! Html::style('/assets/plugins/bootstrap/fonts/font-awesome/font-awesome.min.css') !!}


    <!-- Extras -->
    {!! Html::style('/assets/extras/animate.css') !!}

    @yield('head')
 
</head>
 
<body>
<!-- Static navbar -->
    <div class="logo-menu">
        @include('menu.nav')
    </div>

    
 
    @if (Session::has('message'))
        @include('errors.error')
    @endif

    @yield('content')

    @include('footer')
  
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {!! Html::script('/assets/plugins/bootstrap/js/bootstrap.min.js') !!}


    <!-- WOW JS plugin for animation -->
    {!! Html::script('/assets/plugins/bootstrap/js/wow.js') !!}

    <!-- All JS plugin Triggers -->
    {!! Html::script('/assets/plugins/bootstrap/js/main.js') !!}

</body>
</html>