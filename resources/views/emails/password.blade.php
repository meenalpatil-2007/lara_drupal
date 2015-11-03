<!-- resources/views/emails/password.blade.php -->
@extends(app)

@section('content')

Click here to reset your password: {{ url('password/reset/'.$token) }}

@stop