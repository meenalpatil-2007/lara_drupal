<html>
<head>
<title>@yield('title')</title>
</head>
<body>
	<?php


		if (Auth::check()) { ?>
		    {!! Html::link('users/logout', 'Logout') !!}
		<?php } else { ?>
			{!! Html::link('users/login', 'Login') !!} | {!! Html::link('users/register', 'Register') !!}
		<?php }
	?>
<br/>
<br/>
<br/>

@yield('content')

@yield('sidebar')
</body>