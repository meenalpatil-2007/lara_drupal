@extends('app')

@section('content')
<div class="container">

<div class="page_header">
	<h1>{!! Html::image('assets/images/images.jpg','alt',array('class'=>'header_image')) !!}<small>Search a perfect Match!!!</small>{!! Html::image('assets/images/images.jpg','alt',array('class'=>'header_image')) !!}</h1>
</div>
{!! Form::open(['action' => 'ProfileController@getSearch', 'class' => 'form-inline', 'role' => 'form', 'method' => 'get', 'id' => 'profile_search_form']  ) !!}
	<div class="row" style="padding:10px;">
		<div class="col-xs-6">
			<label for="edit-combine">Name</label>
			<input type="text" id="edit-combine" name="combine" value="<?php echo isset($userData['combine'])?$userData['combine']:'' ?>" size="30" maxlength="128" class="form-control form-text ctools-auto-submit-processed">
		</div>
		<div class="col-xs-6">
			<label for="edit-field-living-location-value">Location</label>
			<input type="text" id="edit-field_living_location_value" name="field_living_location_value" value="<?php echo isset($userData['field_living_location_value'])?$userData['field_living_location_value']:'' ?>" size="30" maxlength="128" class="form-control form-text ctools-auto-submit-processed">
		</div>
	</div>
	<div class="row" style="padding:10px;">
		<div class="col-xs-6">
			<label for="edit-field-gender-value">Gender</label>
			<select id="edit-field-gender-value" name="field_gender_value" class="form-control form-select">
				<?php 
					$selected = isset($userData['field_gender_value'])?$userData['field_gender_value']:'All';
					$selAll = $selm = $self = '';
					if($selected == 'All') $selAll = "selected='selected'";
					if($selected == 'male') $selm = "selected='selected'";
					if($selected == 'female') $self = "selected='selected'";
				?>
				<option value="All" <?php echo $selAll ?>>- Any -</option>
				<option value="male" <?php echo $selm ?>>Male</option>
				<option value="female" <?php echo $self ?>>Female</option>
			</select>
		</div>
		<div class="col-xs-6">
			<label for="edit-field-religion-value">Religion</label>
			<select id="edit-field-religion-value" name="field_religion_value" class="form-control form-select">
				<?php $rel = isset($userData['field_religion_value'])?$userData['field_religion_value']:'All';
					$relAll = $relH = $relM = $relC = $relS = '';
					if($rel == 'All') $relAll = "selected='selected'";
					if($rel == 'hindu') $relH = "selected='selected'";
					if($rel == 'muslim') $relM = "selected='selected'";
					if($rel == 'sikh') $relS = "selected='selected'";
					if($rel == 'christian') $relC = "selected='selected'";
				?>
				<option value="All" <?php echo $relAll ?>>- Any -</option>
				<option value="hindu" <?php echo $relH ?>>Hindu</option>
				<option value="muslim" <?php echo $relM ?>>Muslim</option>
				<option value="sikh" <?php echo $relS ?>>Sikh</option>
				<option value="christian" <?php echo $relC ?>>Christian</option>
			</select>
		</div>
	</div>
	<div class="row" style="padding:10px;">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
				<input class="btn btn-default" type="submit" id="edit-submit-test3" name="" value="Apply">
				<input type="button" id="edit-reset" name="op" value="Reset" class="btn">
		</div>
		<div class="col-xs-4"></div>
	</div>
{!! Form::close() !!}


	<?php foreach ($response as $key => $value) { ?>
	<div class="row" style="padding:10px;">
		<div class="jumbotron col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:10px;">
            <div class="panel panel-default">
                <div class="row padall">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <span></span>
                        <?php echo $value->field_profile_img; ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="clearfix">
                            <div class="pull-left">
                                <span class="fa  icon"> <?php echo $value->field_first_name." ".$value->field_last_name; ?></span>
                            </div>
                            <div class="pull-right">
                                <?php echo $value->field_gender; ?><br/>
                                <?php echo "DoB: ".$value->field_birth_date; ?>
                            </div>
                        </div>
                        <div>
                            <span class="glyphicon glyphicon-envelope"></span> <?php echo $value->users_profile_mail; ?>
                        </div>
                        <div>
                            <h4><span class="fa icon"></span><?php echo $value->field_education; ?></h4>
                            <?php echo $value->field_about_me; ?> <!--span class="fa fa-lock icon pull-right"> Sold</span-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php echo $paginationUI; ?>

</div>
<script type="text/javascript">
	$('#edit-reset').click(function(){
		$('#edit-combine').val('');
		$('#edit-field_living_location_value').val('');
		$('#edit-field-gender-value').val('All');
		$('#edit-field-religion-value').val('All');
		$('#profile_search_form').submit();
	})
</script>
@endsection

