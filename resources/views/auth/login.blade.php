@extends('app')

@section('head')
    {!! Html::style('/assets/css/signin.css') !!}
@stop

@section('content')
  <section id="hero-area">
    <div class="hero-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="title-big wow fadeIn"><i class="fa fa-sign-in"></i></h1>
                    <h2 class="subtitle">Sign-in to access your account</h2>
                </div>
                {!! Form::open(['action' => 'UserController@postLogin', 'class' => 'form-signin', 'role' => 'form']  ) !!}
                    <div class="wow fadeInDown">
                        <label for="inputUsername" class="sr-only">Username</label>
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required', 'autofocus', 'id' => 'inputUsername' ]) !!}
                    </div>

                    <div class="wow fadeInDown" data-wow-delay=".7s">
                        <label for="inputPassword" class="sr-only">Password</label>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required',  'id' => 'inputPassword' ]) !!}
                    </div>

                    <div class="checkbox">
                        <!--label>
                            {!! Form::checkbox('remember', 1) !!} Remember me
             
                        </label-->
                    </div>

                    <button class="btn btn-lg btn-primary btn-block wow fadeInUp"  data-wow-delay="1s" id="signin" type="submit">Sign in</button>
                    <!--button type="button" class="btn btn-lg btn-primary btn-block wow fadeInUp" data-toggle="modal" data-target="#myModal">Forgot Password?</button-->          
                    <!--p><a href="#">Forgot password?</a></p-->
             
                    <!--p class="or-social">Or Use Social Login</p-->
             
                    <!--a href="#" class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
                    <a href="#" class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a-->
                 
                {!! Form::close() !!}   
            </div>
        </div>
    </div>
</section> 
  <!--div id="myModal" class="modal fade in" role="dialog" aria-hidden="true">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModal').fadeOut();">&times;</button>
                <h4 class="modal-title">Request new password</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => 'UserController@postRequestNewPassword', 'class' => 'form-signin' ] ) !!}
                    <label for="inputUsername" class="sr-only">Username</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username or Email', 'required', 'autofocus', 'id' => 'inputUsername' ]) !!}
                    <p></p>
                    <button class="btn btn-lg btn-primary btn-block"  id="signin" type="submit">Request</button>
                {!! Form::close() !!}
            </div>
        </div>  
    </div>    
    
</div-->                               
@endsection
