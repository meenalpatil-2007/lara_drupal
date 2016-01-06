@extends('app')

@section('content')
{!! Html::style('/assets/css/style.css') !!}
{!! Html::script('/assets/plugins/bootstrap/js/matching-profile.js') !!}
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
							@if(!empty($item['field_profile_img']))	
							 <div id="myCarousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">
								
									
									@foreach ($item['field_profile_img']  as $key => $profile)													 
										<div class="item<?php echo $key==0 ? ' active':''; ?>">
											{!! $profile !!}
										</div>	
																	  
									 @endforeach
							
									</div>

									<!-- Left and right controls -->
									<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									  <span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
									  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									  <span class="sr-only">Next</span>
									</a>
								  </div>
							@else
									{!! Html::image('/assets/plugins/bootstrap/img/'.strtolower(Common::checkIfExist($item, 'gender')).'.png', 'profile', ['typeof' => "foaf:Image", 'class' => 'img-responsive', 'width'=> '100']) !!}
									
							@endif															
							
							</div>
							{!! Form::text('profile_uid', Common::checkIfExist($item, 'User uid'), ['class' => 'hidden']) !!}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">			
							<h3>{{  Common::checkIfExist($item, 'first name') }}&nbsp;{{  Common::checkIfExist($item, 'last name') }}</h3>	
							<b>About me</b>&nbsp;:&nbsp; {!! wordwrap(Common::checkIfExist($item, 'about me'), 50, "\n", true) !!}</br>
							<b>Gender</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'gender') }}
							<br/><br/>
							@if(Session::get('uid') != $item['User uid'])
								<button class="btn btn-primary"  id="expressInterest" type="button">Express Interest</button>
								<button class="btn btn-primary"  id="shortlist" type="button">ShortList</button>
							@endif
						</div>
					</div>
 			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">Personal Details</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Birth Date</b>&nbsp;:&nbsp; {!!  Common::checkIfExist($item, 'birth date') !!}<br/>
							<b>Birth Place</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'birth place') }}<br/>
							<b>Marital Status</b>&nbsp;:&nbsp; {{ Common::checkIfExist($item, 'marital status') }}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Religion</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'religion') }}</br>
							<b>Height</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'height') }}</br>
							<b>Hobbies</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'hobbies') }}</br>
						</div>
					</div>
 			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Professional Details</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Education</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'education') }}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Employment type</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'employment type') }}
						</div>
					</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Contact Details</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Living Location</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'Living location') }}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Mobile No.</b>&nbsp;:&nbsp; {{ Common::checkIfExist($item, 'mobile number') }}
						</div>
					</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Partner Preference</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Looking For</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'looking for') }}</br>
							<b>Partner Preference</b>&nbsp;:&nbsp; {{  wordwrap(Common::checkIfExist($item, 'partner preference'), 50, "\n", true) }}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Partner Education</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'partner education') }}</br> 
							<b>Partner Age</b>&nbsp;:&nbsp; {{ Common::checkIfExist($item, 'partner age') }}</br>
							<b>Partner Height</b>&nbsp;:&nbsp; {{  Common::checkIfExist($item, 'partner height') }}
						</div>
					</div>
 			</div>
 			</div>
 
 </div>
</div>
 
@endsection

