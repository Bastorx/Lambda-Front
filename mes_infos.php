<html>
	<head>
		<title>Application</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css"  href="theme/css/common.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/mes_infos.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/mes_infos_responsive.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/font-awesome.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	</head>

	<body>
		<div id="wrapper" class="clear overflowhidden">
			<img class="logo floatleft" src="theme/images/logo2.png" />
			<p class="title">Modification d'Images</p>
		</div>
		<?php include'include/header.php'; ?>
		<div id="main">
			<div class="infos floatleft w65pc h35pc clear overflowhidden w100pc">
				<div class="logInfos wauto floatleft">
					<i class="fa fa-user" aria-hidden="true"></i><span id="login" class="ffcalibri">&nbsp;&nbsp;&nbsp;Login :&nbsp;&nbsp;&nbsp;</span>
					<br /><br />
					<i class="fa fa-envelope" aria-hidden="true"></i><span id="email" class="ffcalibri">&nbsp;&nbsp;&nbsp;Email :&nbsp;&nbsp;&nbsp;</span>
				</div>
				
				<div class="sideBlocRight floatright h100pc w10pc showDesktop"></div>
				<div class="sideBlocBottom floatleft w35pc showPhone w100pc"></div>
			</div>
		</div>
		<div id="footer" class="floatleft">
			© CloudCamp 2016
		</div>
		<script type="text/javascript">

			function getCookie(sName) {
			        var cookContent = document.cookie, cookEnd, i, j;
			        var sName = sName + "=";
			 
			        for (i=0, c=cookContent.length; i<c; i++) {
			                j = i + sName.length;
			                if (cookContent.substring(i, j) == sName) {
			                        cookEnd = cookContent.indexOf(";", j);
			                        if (cookEnd == -1) {
			                                cookEnd = cookContent.length;
			                        }
			                        return decodeURIComponent(cookContent.substring(j, cookEnd));
			                }
			        }       
			        return null;
			}

		        if(getCookie('userID') != null)
				{
					console.log('step 0');
					console.log(getCookie("accessTokens"));
					$.ajax({
						headers: {
			            	"Authorization": getCookie("accessTokens")
			            },
						url: "https://lambda-api.herokuapp.com/api/users/"+getCookie('userID'),
						
			            success: function (response) {
			            	var login = response.username;
			            	var email = response.email;

			            	$('#login').append(login);
			            	$('#email').append(email);

			            	console.log(login);
			            	console.log(email);
			            }
					});
				}
		</script>
	</body>
</html>