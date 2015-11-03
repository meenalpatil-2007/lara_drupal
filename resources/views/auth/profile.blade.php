@extend('app')
$section('content')


  Form::model($user, array('route' => array('user.update', $user->id)))

@endsection