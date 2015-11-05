@extends('app')

@section('head')
    {!! Html::style('/assets/css/signin.css') !!}
@stop

@section('content')
{!! Form::open(['action' => 'UserController@postLogin', 'class' => 'form-signin']  ) !!}
 
        
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required', 'autofocus', 'id' => 'inputUsername' ]) !!}
        
        <label for="inputPassword" class="sr-only">Password</label>
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required',  'id' => 'inputPassword' ]) !!}
 
        <div class="checkbox">
            <label>
                {!! Form::checkbox('remember', 1) !!} Remember me
 
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p><a href="#">Forgot password?</a></p>
 
        <!--p class="or-social">Or Use Social Login</p-->
 
        <!--a href="#" class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
        <a href="#" class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a-->
 
        {!! Form::close() !!}                   
@endsection