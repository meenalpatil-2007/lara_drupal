@extends('app')
 
@section('head')
    {!! Html::style('/assets/css/register.css') !!}
@stop
 
@section('content')
    <section id="hero-area">
        <div class="hero-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                            <h1 class="title-big wow fadeIn">Join Us Today!</h1>
                            <h3  class="subtitle">Registration is simple and easy</h2>
                            <h3>Enjoy our Awesomeness</h3>
                    </div>
 
                    {!! Form::open(['action' => 'UserController@postRegister', 'class' => 'form-signin' ] ) !!}
             
                        <div class="wow fadeInDown">
                            <label for="inputEmail" class="sr-only">Email address</label>
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail' ]) !!}
                        </div>

                        <div class="wow fadeInDown" data-wow-delay=".7s"> 
                            <label for="inputUsername" class="sr-only">Username</label>
                            {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required', 'autofocus', 'id' => 'inputUsername' ]) !!}
                        </div>
                 
                        <div class="wow fadeInDown" data-wow-delay=".9s">
                            <label for="inputPassword" class="sr-only">Password</label>
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required',  'id' => 'inputPassword' ]) !!}
                        </div>    
                 
                        <div class="wow fadeInDown" data-wow-delay="1s">
                            <label for="inputPasswordConfirm" class="sr-only">Confirm Password</label>
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation', 'required',  'id' => 'inputPasswordConfirm' ]) !!}
                        </div>
             
                        <button class="btn btn-lg btn-primary btn-block wow fadeInUp"  data-wow-delay="1.2s" type="submit">Register</button>
                        
                        <!--p class="or-social">Or Use Social Login</p>
                 
                        <a class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
                        <a class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a-->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section> 
@stop