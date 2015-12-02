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
	        	$('.list-group').removeClass('bg');
	        	$('#loadMore').prop( "disabled", false );
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

});