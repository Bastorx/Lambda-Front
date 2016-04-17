function setCookie(sName, data) {
	var today = new Date(), expires = new Date();
	expires.setTime(today.getTime() + (365*24*60*60*1000));
	document.cookie = sName + "=" + encodeURIComponent(data) + ";expires=" + expires.toGMTString();
}
function signin() {
	$( "#logForm" ).submit(function( event ) {

		// Stop form from submitting normally
		event.preventDefault();
	 
		// Get some values from elements on the page:
		var $form = $( this ),
	    loginInscrip = $form.find( "input[name='loginInscrip']" ).val(),
	    mailInscrip = $form.find( "input[name='mailInscrip']" ).val(),
	    passwordInscrip = $form.find( "input[name='passwordInscrip']" ).val(),
	    url = $form.attr( "action" );
	 
		// Send the data using post // inscription
		var posting = $.post( "https://lambda-api.herokuapp.com/api/users/", { username: loginInscrip, email: mailInscrip, password: passwordInscrip } );
	
	});
	document.location.href="index.php";
}