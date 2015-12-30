 @extends('app')
 
@section('head')
    {!! Html::style('/assets/css/style.css') !!}
	{!! HTML::style('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css') !!}
	{!! Html::script('//code.jquery.com/jquery-1.10.2.js') !!}
	{!! Html::script('//code.jquery.com/ui/1.11.2/jquery-ui.js') !!}
	{!! Html::script('/assets/js/datepicker.js') !!}
	{!! Html::script('/assets/plugins/bootstrap/js/matching-profile.js') !!}
@stop



 @section('content')

 
     <!-- Sneha's Style css -->

<div class="container">
	<div class="col-sm-12 col-md-12 col-lg-12 topp50">
		<div class="row">
			<h4>Create / Edit profile</h4>
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			{!! Form::open(['action' => 'ProfileController@postEditProfile', 'class' => 'form-signin', 'role' => 'form']  ) !!}
			
			<div class="panel panel-default">
				<div class="panel-heading">My Profile Details</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div id="img_box" class="img-responsive">
							
							@if(Common::checkIfExist($item, 'field_profile_img'))
								{!! $item['field_profile_img'][0] !!}
							@elseif(Common::checkIfExist($item, 'gender'))
								{!! Html::image('/assets/plugins/bootstrap/img/'.strtolower($item['gender']).'.png', 'profile', ['typeof' => "foaf:Image", 'class' => 'img-responsive', 'width'=> '200']) !!}
							@else
								{!! Html::image('/assets/plugins/bootstrap/img/default-profile.png', 'profile', ['typeof' => "foaf:Image", 'class' => 'img-responsive', 'width'=> '200']) !!}
								
							@endif	
							
							
							<!--{!! Common::checkIfExist($item, 'profile img') !!}
							{!! Form::file('profile_img', null, ['class' => 'form-control', 'placeholder' => 'Profile Img', 'required', 'autofocus', 'id' => 'inputProfileImg'])!!} -->
							</div>
							<div class="col-sm-offset-4 col-md-offset-4 col-lg-offset-7">
								<button class="btn btn-lg btn-primary " data-wow-delay="1s" data-target="#editImg" data-toggle="modal" name="upload"  id ="profilePic" type="button">Edit/Delete Image</button>
							</div>
							<b>Gender</b>&nbsp;:&nbsp;
								{!!	Form::select(
										'gender',
										['male'=>'Male', 'female'=>'Female'],
										strtolower(Common::checkIfExist($item, 'gender')),
										array(
											'class' => 'form-control',
											'id' => 'inputGender'
										))
								!!}
						</div>					
						
						<div class="col-sm-6 col-md-6 col-lg-6">								
								<b>First Name</b> : {!! Form::text('first_name', Common::checkIfExist($item, 'first name'), ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => 'First Name', 'required', 'autofocus', 'id' => 'inputFirstName']) !!}
							<br/>
								<b>Last Name</b> : {!! Form::text('last_name', Common::checkIfExist($item, 'last name'), ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => 'Last Name', 'required', 'autofocus', 'id' => 'inputLastName' ]) !!}
							
							<b>About me</b>&nbsp;:&nbsp; {!! Form::textarea('about_me', Common::checkIfExist($item, 'about me'), ['class' => 'form-control', 'maxlength' => '100', 'placeholder' => 'About me', 'required', 'autofocus', 'id' => 'inputAboutMe' ]) !!} </br>
							 
						</div>
					</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Personal Details</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Birth Date</b>&nbsp;:&nbsp;							
							{!! Form::text('birth_date', strip_tags(Common::checkIfExist($item, 'birth date')), ['class' => 'form-control', 'placeholder' => 'Birth Date', 'required', 'autofocus', 'id' => 'inputBirthDate']) !!}
							<br/>
							<b>Birth Place</b>&nbsp;:&nbsp; 
							{!! Form::text('birth_place', Common::checkIfExist($item, 'birth place'), ['class' => 'form-control', 'maxlength' => '25', 'placeholder' => 'Birth Place', 'required', 'autofocus', 'id' => 'inputBirthPlace']) !!}
							<br/>
							<b>Marital Status</b>&nbsp;:&nbsp;
									{!!	Form::select(
										'marital_status',										['single'=>'Single','married'=>'Married','widowed'=>'Widowed','divorced'=>'Divorced','seperated'=>'Separated'],
										strtolower(Common::checkIfExist($item, 'marital status')),
										array(
											'class' => 'form-control',
											'id' => 'inputMaritalStatus'
										))
									!!}
								
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Religion</b>&nbsp;:&nbsp; 
									{!!	Form::select(
										'religion',
										['hindu'=>'Hindu', 'sikh'=>'Sikh', 'muslim'=>'Muslim', 'christian'=>'Christian'],
										strtolower(Common::checkIfExist($item, 'religion')),
										array(
											'class' => 'form-control',
											'id' => 'inputReligion'
										))
								!!}
								</br>
							<b>Height</b>&nbsp;:&nbsp; {!!	Form::select(
										'height',										['5'=>'5','5.1'=>'5.1','5.2'=>'5.2','5.3'=>'5.3','5.4'=>'5.4','5.5'=>'5.5','5.6'=>'5.6','5.7'=>'5.7','5.8'=>'5.8','5.9'=>'5.9','5.10'=>'5.10','5.11'=>'5.11'],
										Common::checkIfExist($item, 'height'),
										array(
											'class' => 'form-control',
											'id' => 'inputHeight'
										))
								!!}
								</br>
							<b>Hobbies</b>&nbsp;:&nbsp; 
							{!! Form::text('hobbies', Common::checkIfExist($item, 'hobbies'), ['class' => 'form-control', 'maxlength' => '25','placeholder' => 'Hobbies', 'required', 'autofocus', 'id' => 'inputHobbies']) !!}
							</br>
						</div>
					</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Professional Details</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Education</b>&nbsp;:&nbsp; 
							{!!	Form::select(
										'education',
										['under graduate'=>'Under Graduate', 'graduate'=>'Graduate', 'post graduate'=>'Post Graduate'],
										strtolower(Common::checkIfExist($item, 'education')),
										array(
											'class' => 'form-control',
											'id' => 'inputEducation'
										))
								!!}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Employment type</b>&nbsp;:&nbsp; 
							{!!	Form::select(
										'employment_type',
										['business'=>'Business', 'self employed'=>'Self Employed', 'private'=>'Private', 'govnerment'=>'Govnerment'],
										strtolower(Common::checkIfExist($item, 'employment type')),
										array(
											'class' => 'form-control',
											'id' => 'inputEmploymentType'
										))
								!!}
						</div>
					</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Contact Details</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Living Location</b>&nbsp;:&nbsp;
							{!! Form::text('living_location', Common::checkIfExist($item, 'Living location'), ['class' => 'form-control', 'maxlength' => '25', 'placeholder' => 'Living Location', 'required', 'autofocus', 'id' => 'inputLivingLocation']) !!}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Mobile No.</b>&nbsp;:&nbsp; 
							{!! Form::text('mobile_number', Common::checkIfExist($item, 'mobile number'), ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => 'Mobile Number', 'required', 'autofocus', 'id' => 'inputMobileNumber']) !!}
						</div>
					</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Partner Preference</div>
					<div class="panel-body">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Looking For</b>&nbsp;:&nbsp; 
							{!!	Form::select(
										'looking_for',
										['male'=>'Groom', 'female'=>'Bride'],
										strtolower(Common::checkIfExist($item, 'looking for')),
										array(
											'class' => 'form-control',
											'id' => 'inputLookingFor'
										))
								!!}
							
							<b>Partner Preference</b>&nbsp;:&nbsp; 
							{!! Form::textarea('partner_preference', Common::checkIfExist($item, 'partner preference'), ['class' => 'form-control', 'maxlength' => '100', 'placeholder' => 'Partner Preference', 'required', 'autofocus', 'id' => 'inputPartnerPreference' ]) !!}
							
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<b>Partner Education</b>&nbsp;:&nbsp; 
							{!!	Form::select(
										'partner_education',
										['under graduate'=>'Under Graduate', 'graduate'=>'Graduate', 'post graduate'=>'Post Graduate'],
										strtolower(Common::checkIfExist($item, 'partner education')),
										array(
											'class' => 'form-control',
											'id' => 'inputPartnerEducation'
										))
								!!}
							</br> 
							<b>Partner Age</b>&nbsp;:&nbsp;</br>
							{!!	Form::select(
										'partner_age',										
										['20-25'=>'20-25', '26-30'=>'26-30', '31-35'=>'31-35', '36-40'=>'36-40'],
										Common::checkIfExist($item, 'partner age'),
										array(
											'class' => 'form-control',
											'id' => 'inputPartnerAge'
										))
								!!}
							
														
							<b>Partner Height</b>&nbsp;:&nbsp; 
							{!!	Form::select(
										'partner_height',										
										['5-5.2'=>'5-5.2', '5.3-5.4'=>'5.3-5.4', '5.5-5.6'=>'5.5-5.6', '5.7-5.8'=>'5.7-5.8'],
										Common::checkIfExist($item, 'partner height'),
										array(
											'class' => 'form-control',
											'id' => 'inputHeight'
										))
								!!}
						</div>
					</div>
					<input class="btn btn-lg btn-primary "  data-wow-delay="1s" id="signin" name="action" type="submit" value="Submit">
					<input class="btn btn-lg btn-primary btn btn-danger"  data-wow-delay="1s" id="profile_delete" name="action" type="submit" value="Delete">
			</div>
			{!! Form::close() !!}   
		</div>
	</div>
</div>

<div id="editImg" class="modal fade in" role="dialog" aria-hidden="true">    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#editImg').fadeOut();">&times;</button>
                <h4 class="modal-title">Edit Image Gallery</h4>
            </div>
			<div class="container">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="modal-body">
					<?php $count=1; ?>
						{!! Form::open(['action' => 'ProfileController@postEditProfileImg', 'class' => 'form-signin' ] ) !!}
							{!! Form::text('uid', Common::checkIfExist($item, 'User uid'), ['class' => 'hidden']) !!}
							{!! Form::text('count', $count, ['class' => 'hidden']) !!}
							
						<div id="uploadImg">
							
							</div>
							<button class="btn btn-lg btn-primary btn-block"  id="addImg" type="button">Add Image</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
        </div>  
    </div>    
</div> 