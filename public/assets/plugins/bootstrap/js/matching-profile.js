$( document ).ready(function() {
	
	checkInterestExpressed();
	
	var myApp;
	myApp = myApp || (function () {
		return {
	        showPleaseWait: function() {
	        	$('.list-group').addClass('bg');
	        	$('#loadMore').prop( "disabled", true );
	        	$('.glyphicon-refresh').addClass('glyphicon-refresh-animate')
	        },
	        hidePleaseWait: function () {
	        	$('#loadMore').prop( "disabled", false );
	        	$('.list-group').removeClass('bg');
				$('.glyphicon-refresh').removeClass('glyphicon-refresh-animate')
	        },

	    };
	})();
	$(document).on('click', "#loadMore", function () {
		myApp.showPleaseWait();
		$.ajax({
			type: "GET",
			url: "/matching-profile",
		}).done(function(data) {
			$('.list-content').html(data);
			myApp.hidePleaseWait();
		});
	});

	$(document).on('click', "#addImg", function () {
		count = $('input:text[name=count]').val();
		//alert('img'+ count);
		$('#uploadImg').append("<div class='row'><div id='targetLayer'>No Image</div><input type='file' id='imgProfile' name='img"+ count +"' /><button class='btn btn-secondary' id='imgUpload' name='imgUpload_"+ count +"' >Upload</button></div>");
		count++;
		$('input:text[name=count]').val(count);
	});
	
	$(document).on('click', "#imgUpload", function () {	
		var file = $('#imgProfile').val();
		var name = this.getAttribute('name');
		
		//e.preventDefault();
		$.ajax({
        	url: '/add-to-gallery',
			type: 'GET',
			data:  {'filename': file},
			success: function(data)
		    {
				alert(data);
			$("#targetLayer").html(data);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
			
	});	
	
	$(document).on('click', "#profilePic", function () {
		getProfileGalleryAjax();
	});
	
	$(document).on('change', "#fid", function () {
		var str = this.value;	
		var res = str.split("_");
		
			if(res[0] == 'remove'){
				if (confirm('do you want to remove this image from gallery ?')) {
					ajaxCall(res[1], 'remove', '/edit-gallery', '#uploadImg');
					//alert(res[0]);
				} else {
					alert("else");
					return false;
				}
			}
			
		
	});
	
	
	$(document).on('click', "#expressInterest", function () {	
		var interest_to = $('input:text[name=profile_uid]').val();
		//alert(interest_to);
		if (confirm('do you want to express interest ?')) {
			$.ajax({
				type: "GET",
				url: '/send-interest',
				data: { 'interest_to': interest_to},
				success: function(data) {
					//alert(data);
					var htmlData="";
					$('#expressInterest').html('Interest Sent');
				},
			});
		} else {
			return false;
		}				
	});
	
});

function getProfileGalleryAjax() {
	
	$.ajax({
			type: "GET",
			url: "/profile-pic",
			success: function(data) {
				var htmlData="";
				$.each(data, function(index, item) {							
					htmlData += "<img src='" + item['Path'] + "' width='120px' height='120px'/> &nbsp;&nbsp;&nbsp;&nbsp; <select id='fid' name='fid'><option>select</option><option value='remove_" + item['File ID'] + "'>Remove</option><option value='makeDefault_" + item['File ID'] + "'>Make Default Pic</option></select> <br/><br/>";				
				});
				$('#uploadImg').html(htmlData);
			},
			/*error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("some error");
			}*/
		});
	
}

function ajaxCall(fid=null, task=null, uri, divId){
	//alert('xxxxxxx');
	$.ajax({
		type: "GET",
		url: uri,
		data: { 'fid': fid , 'action': task},
		success: function(data) {
			//alert(data);
			var htmlData="";
			$(divId).html(htmlData);
		},
	});
	
}

function checkInterestExpressed(){
	var interest_to = $('input:text[name=profile_uid]').val();
	$.ajax({
		type: "GET",
		url: '/check-interest',
		data: { 'interest_to': interest_to},
		success: function(data) {
			alert(data);
			
			if(!data){
				$('#expressInterest').html('Interest Sent');		
			}								
		},
	});
	
}


