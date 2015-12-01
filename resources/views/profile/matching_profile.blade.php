
@if ($profiles)
<ul class="list-group">
	<li  class="list-group-item header title">
	    Recommended Matches 
	    <div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
	</li>
	<div class="test " onmouseover="document.body.style.overflow='hidden';" onmouseout="document.body.style.overflow='auto';">
	
	@foreach ($profiles as $profile)
	  	<li  class="list-group-item text-left col-sm-6 col-md-4 col-lg-4">
	      	<a href="/profile/view/<?php echo $profile['Uid']; ?>" class="name">
	      	@if($profile['profile img'])
	      		{!! $profile['profile img'] !!}
	      	@else
	      		{!! Html::image('/assets/plugins/bootstrap/img/'.strtolower($profile['gender']).'.png') !!}
	      		
	      	@endif	
		        {{ $profile['fname'] }} {{ $profile['lname'] }}

	      	</a>
	      	
	      	<div class="subtitle-small ext-box glyphicon glyphicon-envelope "><div class="int-box">{!! $profile['email'] !!}</div></div>
	      	<div class="subtitle-small ext-box glyphicon glyphicon-registration-mark"><div class="int-box">{{ $profile['religion'] }}</div></div>
			<div class="subtitle-small ext-box glyphicon glyphicon-search "><div class="int-box">{{ $profile['looking for'] }}</div></div>
	      	<div class="subtitle-small ext-box glyphicon glyphicon-home "><div class="int-box">{{ $profile['living location'] }}</div></div>
	      	<div class="subtitle-small ext-box glyphicon glyphicon-education "><div class="int-box">{{ $profile['education'] }}</div></div>
			<div class="subtitle-small ext-box <?php echo strtolower($profile['gender']) == 'male' ? 'fa fa-male': 'fa fa-female';?> "><div class="int-box">{{ $profile['gender'] }}</div></div>
	        <div class="subtitle-small ext-box fa fa-sort-numeric-desc "><div class="int-box">{{ $profile['height'] }}</div></div>
	        
	        <!--label class="pull-right">
	            <a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment"  title="Send message"></a>
	        </label-->
	        <div class="break"></div>
	  	</li>
	@endforeach
	</div>
	<li  class="list-group-item text-left">
	    <a class="btn btn-block btn-primary" id="loadMore">
	        <i class="glyphicon glyphicon-refresh"></i>
	        Load more...
	    </a>
	</li>

</ul>
@endif
