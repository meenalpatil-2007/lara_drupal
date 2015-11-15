
<div id="myModal" class="modal fade in" role="dialog" aria-hidden="true" style="display: block;">
    
    <div class="modal-dialog">
	    <div class="modal-content">
		   	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" onclick="$('#myModal').fadeOut();">&times;</button>
		        <h4 class="modal-title">Message</h4>
		    </div>
			<div class="modal-body">
			    <p class="item-intro text-muted">{!! Session::get('message') !!}</p>
			</div>
		    <div class="modal-footer">
				<button type="button" class="btn btn-primary btn-lg shiny" data-dismiss="modal" aria-hidden="true" onclick="$('#myModal').fadeOut();">Cancel</button>
     		</div>
     	</div>	
	</div>    
    
</div>