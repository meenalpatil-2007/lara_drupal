@extends('app')

@section('content')
{!! Html::style('/assets/css/style.css') !!}
<?php //echo "<pre>"; print_r($item); exit; ?>
    <!-- Sneha's Style css -->
<div class="container">
<div class="col-sm-12 col-md-12 col-lg-12 topp50">
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">My Profile Details</div>
			<div class="panel-body">
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div id="img_box" class="img-responsive">
				{!!$item['profile img']!!}							
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">			
				<h3>{{ $item['first name'] }}&nbsp;{{ $item['last name'] }}</h3>	
				<b>About me</b>&nbsp;:&nbsp; {{ $item['about me'] }}</br>
				<b>Gender</b>&nbsp;:&nbsp; {{ $item['gender'] }}
			</div>
			</div>
	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Personal Details</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Birth Date</b>&nbsp;:&nbsp; {!! $item['birth date'] !!}<br/>
			<b>Birth Place</b>&nbsp;:&nbsp; {{ $item['birth place'] }}<br/>
			<b>Marital Status</b>&nbsp;:&nbsp; {{ $item['marital status'] }}
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Religion</b>&nbsp;:&nbsp; {{ $item['religion'] }}</br>
			<b>Height</b>&nbsp;:&nbsp; {{ $item['height'] }}</br>
			<b>Hobbies</b>&nbsp;:&nbsp; {{ $item['hobbies'] }}</br>
		</div>
		</div>

	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Professional Details</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Education</b>&nbsp;:&nbsp; {{ $item['education'] }}
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Employment type</b>&nbsp;:&nbsp; {{ $item['employment type'] }}
		</div>
		</div>

	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Contact Details</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Living Location</b>&nbsp;:&nbsp; {{ $item['Living location'] }}
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Mobile No.</b>&nbsp;:&nbsp; {{ $item['mobile number'] }}
		</div>
		</div>

	</div>
	<div class="panel panel-default">
	<div class="panel-heading">Partner Preference</div>
		<div class="panel-body">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Looking For</b>&nbsp;:&nbsp; {{ $item['looking for'] }}
			<b>Partner Preference</b>&nbsp;:&nbsp; {{ $item['partner preference'] }}
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<b>Partner Education</b>&nbsp;:&nbsp; {{ $item['partner education'] }}</br> 
			<b>Partner Age</b>&nbsp;:&nbsp; {{ $item['partner age'] }}</br>
			<b>Partner Height</b>&nbsp;:&nbsp; {{ $item['partner height'] }}
		</div>
		</div>

	</div>
</div>
</div>
</div>




@endsection
</div>
</div>