@extends('app')

@section('head')
    {!! Html::style('/assets/css/recommendedmatches.css') !!}
	{!! Html::script('/assets/plugins/bootstrap/js/bootstrap-slider.js') !!}    
@stop

@section('content')
<div class="container bootstrap snippet">
test
	<div class="row">
	<div class="jumbotron list-content">
    <ul class="list-group">
      <li  class="list-group-item title">
        Recommended Matches 
        <div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
      </li>
      <li  class="list-group-item text-left">
      <a href="#" class="name">
        {!! Html::image('/assets/plugins/bootstrap/img/1.jpg', 'a picture', ['class' => 'img-thumbnail']) !!}
            Juan guillermo cuadrado
        </a>
        <label class="pull-right">
            <!--a  class="btn btn-success btn-xs glyphicon glyphicon-ok"  title="View"></a>
            <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash"  title="Delete"></a-->
            <a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment"  title="Send message"></a>
        </label>
        <div class="break"></div>
      </li>
      <li  class="list-group-item text-left">
      <a href="#" class="name">
          {!! Html::image('/assets/plugins/bootstrap/img/2.jpg', 'a picture', ['class' => 'img-thumbnail']) !!}
          James Rodriguez (10)
        </a>
        <label class="pull-right">
            <!--a  class="btn btn-success btn-xs glyphicon glyphicon-ok"  title="View"></a>
            <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash"  title="Delete"></a-->
            <a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment"  title="Send message"></a>
        </label>
        <div class="break"></div>
      </li>
      <li  class="list-group-item text-left">
      <a href="#" class="name">
          {!! Html::image('/assets/plugins/bootstrap/img/3.jpg', 'a picture', ['class' => 'img-thumbnail']) !!}
            Mariana pajon
          </a>
        <label class="pull-right">
            <!--a  href="#" class="btn btn-success btn-xs glyphicon glyphicon-ok"  title="View"></a>
            <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash"  title="Delete"></a-->
            <a  href="#" class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment"  title="Send message"></a>
        </label>
        <div class="break"></div>
      </li>
      <li  class="list-group-item text-left">
        <a class="btn btn-block btn-primary">
            <i class="glyphicon glyphicon-refresh"></i>
            Load more...
        </a>
      </li>
    </ul>
  </div>
  </div>
  </div>
</div>

@endsection