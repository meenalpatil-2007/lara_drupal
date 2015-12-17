$(function() {
    $( "#inputBirthDate" ).datepicker({
		dateFormat: "yy-mm-dd",		
	});
	
	
	$(document).on('click', "#profile_delete", function () {	
		var r = confirm("Are you sure, you want to delete?");
			if (r == true) {
				return true;
			} else {
				return false;
			}
	});	
});