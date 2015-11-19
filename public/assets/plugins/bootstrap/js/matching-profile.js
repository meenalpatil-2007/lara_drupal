$( document ).ready(function() {
	$('#loadMore').click( function () {
		$.ajax({
		  url: "/profile/matching-profile",
		  context: document.body
		}).done(function(data) {
			alert(data);
		});
	});
});