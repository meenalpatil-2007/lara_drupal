@extends('app')

@section('content')
{!! Form::open(['action' => 'ProfileController@getSearch', 'class' => 'form-signin', 'role' => 'form', 'method' => 'get']  ) !!}
	<div class="views-exposed-widgets clearfix">
		<div id="edit-combine-wrapper" class="views-exposed-widget views-widget-filter-combine">
			<label for="edit-combine">Name</label>
			<div class="views-widget">
				<div class="form-item form-type-textfield form-item-combine">
					<input type="text" id="edit-combine" name="combine" value="<?php echo isset($userData['combine'])?$userData['combine']:'' ?>" size="30" maxlength="128" class="form-text ctools-auto-submit-processed">
				</div>
			</div>
		</div>
		<div id="edit-field-gender-value-wrapper" class="views-exposed-widget views-widget-filter-field_gender_value">
			<label for="edit-field-gender-value">Gender</label>
			<div class="views-widget">
				<div class="form-item form-type-select form-item-field-gender-value">
					<select id="edit-field-gender-value" name="field_gender_value" class="form-select">
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
			</div>
		</div>
		<div id="edit-field-religion-value-wrapper" class="views-exposed-widget views-widget-filter-field_religion_value">
			<label for="edit-field-religion-value">Religion</label>
			<div class="views-widget">
				<div class="form-item form-type-select form-item-field-religion-value">
					<select id="edit-field-religion-value" name="field_religion_value" class="form-select">
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
		</div>
		<div id="edit-field-living-location-value-wrapper" class="views-exposed-widget views-widget-filter-field_living_location_value">
			<label for="edit-field-living-location-value">Location</label>
			<div class="views-widget">
				<div class="form-item form-type-select form-item-field-living-location-value">
					<select name="field_living_location_value" id="edit-field-living-location-value" size="4" class="form-select">
						<option value="mumbai">Mumbai</option>
						<option value="pune">Pune</option>
						<option value="banglore">Banglore</option>
						<option value="gujarat">Gujarat</option>
					</select>
				</div>
			</div>
		</div>
		<div class="views-exposed-widget views-submit-button">
			<input class="ctools-use-ajax ctools-auto-submit-click js-hide form-submit" type="submit" id="edit-submit-test3" name="" value="Apply">
		</div>
		<div class="views-exposed-widget views-reset-button">
			<input type="submit" id="edit-reset" name="op" value="Reset" class="form-submit">
		</div>
	</div>
{!! Form::close() !!}

@endsection