
@if ($profiles)

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
	@foreach ($profiles as $profile)
	  	<li  class="list-group-item text-left">
	      	<a href="#" class="name">
	      	@if($profile['profile img'])
	      		{!! $profile['profile img'] !!}
	      	@endif	
		        <span> {{ $profile['fname'] }} {{ $profile['lname'] }}</span>
	      	</a>
	        <!--label class="pull-right">
	            <a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment"  title="Send message"></a>
	        </label-->
	        <div class="break"></div>
	  	</li>
	@endforeach
	<li  class="list-group-item text-left">
	    <a class="btn btn-block btn-primary" id="loadMore">
	        <i class="glyphicon glyphicon-refresh"></i>
	        Load more...
	    </a>
	</li>
</ul>

@endif
