<html>
	<head>
		<title>Application</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css"  href="theme/css/common.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/connexion.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/connexion_responsive.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/font-awesome.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script type="text/javascript" src="theme/js/script.js"></script>
	</head>

	<body>
		<div id="wrapper" class="clear overflowhidden">
			<img class="logo floatleft" src="theme/images/logo2.png" />
			<p class="title">Modification d'Images</p>
		</div>
		<?php include'include/deconnexion.php'; ?>
		<div id="main" class="clear">
			<form action="/" id="logForm">
				<div class="connexionBox floatleft w65pc h54pc clear overflowhidden w100pc">
					<div class="connexion textaligncenter w90pc floatleft mt3pc">
						<h1>Connexion</h1>
						<div class="sectionLogin">
							<i class="fa fa-user" aria-hidden="true"></i><span class="asterix">*</span>
							<input class="inputLogin textaligncenter mt20 h30 w50pc" type="text" name="loginConnect" placeholder="Login">
						</div>
						<div class="sectionPassword">
							<i class="fa fa-key" aria-hidden="true"></i><span class="asterix">*</span>
							<input class="inputPassword textaligncenter mt20 h30 w50pc" type="password" name="passwordConnect" placeholder="Mot de passe">
						</div>
						<button class="btn btnConnect" onclick="login();">Me connecter</button>
					</div>
					<div class="sideBlocRight floatright h100pc w10pc showDesktop"></div>
					<div class="sideBlocBottomConnexion floatleft w35pc showPhone w100pc"></div>
				</div>
				<div class="inscriptionBox floatleft w65pc h59pc w100pc">
					<div class="inscription textaligncenter w90pc floatright mt3pc">
						<h1>Inscription</h1>
						<div class="sectionLogin">
							<i class="fa fa-user" aria-hidden="true"></i><span class="asterix">*</span>
							<input class="inputLogin textaligncenter mt20 h30 w50pc" type="text" name="loginInscrip" placeholder="Login">
						</div>
						<div class="sectionMail">
							<i class="fa fa-envelope" aria-hidden="true"></i><span class="asterix">*</span>
							<input class="inputMail textaligncenter mt20 h30 w50pc" type="email" name="mailInscrip" placeholder="E-mail">
						</div>
						<div class="sectionPassword">
							<i class="fa fa-key" aria-hidden="true"></i><span class="asterix">*</span>
							<input class="inputPassword textaligncenter mt20 h30 w50pc" type="password" name="passwordInscrip" placeholder="Mot de passe">
						</div>
						<button class="btn btnInscrip" onclick="signin();">M'inscrire</button>
					</div>
					<div class="sideBlocLeft floatleft h100pc w10pc showDesktop"></div>
					<div class="sideBlocBottomInscription floatleft w35pc showPhone w100pc"></div>
				</div>
			</form>	
		</div>
		<div id="footer" class="floatleft">
			© CloudCamp 2016
		</div>
		<script type="text/javascript">
		function login() {
			$( "#logForm" ).submit(function( event ) {
 
				// Stop form from submitting normally
				event.preventDefault();
			 
				// Get some values from elements on the page:
				var $form = $( this ),
			    loginConnect = $form.find( "input[name='loginConnect']" ).val(),
			    passwordConnect = $form.find( "input[name='passwordConnect']" ).val(),
			    url = $form.attr( "action" );
			 
				// Send the data using post // connexion
				var posting = $.post( "https://lambda-api.herokuapp.com/api/users/login", { username: loginConnect, password: passwordConnect }, function(data){ 
					//console.log(data.id); 
					setCookie("accessTokens", data.id)
					setCookie("userID", data.userId)
				});
			});
			document.location.href="index.php";
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
		function setCookie(sName, data) {
			var today = new Date(), expires = new Date();
			expires.setTime(today.getTime() + (365*24*60*60*1000));
			document.cookie = sName + "=" + encodeURIComponent(data) + ";expires=" + expires.toGMTString();
		}
		
		</script>
	</body>
</html>