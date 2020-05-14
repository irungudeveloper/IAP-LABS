$(document).ready(function() {
	// here we get our form id from index.php 
	// (<form id="login" action="" method="POST">)
	var login = $('#login');
	// here we get the div class from index.php
	// in this div the AJAX will output the response which mens
	// that will show there the result from /ajax/login.php
	var alert_content = $('.alert_content');
	login.on('submit', function(e) {

		var data = login.serialize();

		console.log(data);

		// e.preventDefault();
		// // here is our ajax function wich looks like this:
		// $.ajax({
		// 	// here is the location to our php file which will be called by AJAX
		// 	url: '../logout.php',
		// 	// the data will be sent using POST method
		// 	type: 'POST',
		// 	// data type is HTML
		// 	dataType: 'html',
		// 	data: login.serialize(),
		// 	// so here before we get any response from it is going to show "Loading..."
		// 	beforeSend: function() {
		// 		alert_content.fadeOut();
		// 		alert_content.fadeIn();
		// 		alert_content.html('Loading...');
		// 	},
		// 	// if the data was successfully sent
		// 	// then it shouw the result in our "alert_content" div
		// 	success: function(data) {
		// 		alert_content.html(data).fadeIn();
		// 		login.trigger('reset');
		// 	},
		// 	error: function(e) {
		// 		console.log(e)
		// 	}
		// });
	});
});