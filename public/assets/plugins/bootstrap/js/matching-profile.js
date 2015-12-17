$( document ).ready(function() {
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
		$('#uploadImg').append("<input type='file' />");		
	});
	
	
	
	$(document).on('click', "#profilePic", function () {
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
	});
	
	$(document).on('change', "#fid", function () {
		var str = this.value;	
		var res = str.split("_");
		
			if(res[0] == 'remove'){
				if (confirm('do you want to remove this image from gallery ?')) {
					return true;
				} else {
					return false;
				}
			}
			alert(res[0]);
		$.ajax({
			type: "POST",
			url: "/edit-gallery",
			data: { 'fid': res[1] , 'action': res[0]},
			success: function(data) {
				var htmlData="";
				$('#uploadImg').html(htmlData);
			},
		});
	});
	
	
});