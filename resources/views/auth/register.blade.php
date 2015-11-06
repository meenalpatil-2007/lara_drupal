@extends('app')
 
@section('head')
    {!! Html::style('/assets/css/register.css') !!}
@stop
 
@section('content')
 
        {!! Form::open(['url' => '#', 'class' => 'form-signin' ] ) !!}
 
        
 
        <h2 class="form-signin-heading">Please register</h2>
 
        <label for="inputEmail" class="sr-only">Email address</label>
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail' ]) !!}
 
        <label for="inputUsername" class="sr-only">Username</label>
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required', 'autofocus', 'id' => 'inputUsername' ]) !!}
 
 
        <label for="inputPassword" class="sr-only">Password</label>
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required',  'id' => 'inputPassword' ]) !!}
 
 
        <label for="inputPasswordConfirm" class="sr-only">Confirm Password</label>
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation', 'required',  'id' => 'inputPasswordConfirm' ]) !!}
 
 
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
 
        <!--p class="or-social">Or Use Social Login</p>
 
        <a class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
        <a class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a-->
 
        {!! Form::close() !!}
 
 
@stop