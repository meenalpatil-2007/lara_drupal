@extends('app')

@section('head')
    {!! Html::style('/assets/css/recommendedmatches.css') !!}
	{!! Html::script('/assets/plugins/bootstrap/js/bootstrap-slider.js') !!}
	{!! Html::script('/assets/plugins/bootstrap/js/matching-profile.js') !!}    
@stop

@section('content')
<div class="container bootstrap snippet">
	<div class="row">
	<div class="list-content">
	@if($profiles)
		@include('profile.matching_profile')
	@endif	
	</div>
	</div>
</div>

@endsection
