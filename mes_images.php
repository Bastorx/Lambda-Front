<html>
	<head>
		<title>Application</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css"  href="theme/css/common.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/mes_images.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/mes_images_responsive.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/font-awesome.css">
		<link href="theme/css/style_5/style.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	</head>

	<body>
		<div id="wrapper" class="clear overflowhidden">
			<img class="logo floatleft" src="theme/images/logo2.png" />
			<p class="title">Modification d'Images</p>
		</div>
		<?php include'include/header.php'; ?>
		<div id="main" class="clear">
			<form action="https://lambda-api.herokuapp.com/api/Images/upload" method="post" enctype="multipart/form-data" id="changeForm">
				<div class="sectionNew floatleft mt20 w320 w100pc" onclick="$('#importPhotoBtn').removeClass('hide');">
					<p class="ffcalibri newImage w100pc textaligncenter mt15">Choisir une image</p><input class="btnNew w100pc" type="file" id="addFile"></input>
				</div>
				<button id="importPhotoBtn" class="w100pc btnImport mt20 hide" type="submit">Importer image</button>
			</form>
			<div class="pictureBox clear overflowhidden" id="testBox">
			</div>
		</div>
		<div id="footer" class="floatleft">
			© CloudCamp 2016
		</div>
		<script type="text/javascript" src="theme/js/pirobox_extended_feb_2011.js"></script>
		<script type="text/javascript">
		//Zoom sur les images
			$(document).ready(function() {
				$.piroBox_ext({
					piro_speed :700,
					bg_alpha : 0.5,
					piro_scroll : true,
					piro_drag :false,
					piro_nav_pos: 'bottom'
				});
			});

			//Importation des images
		    $('#changeForm').submit(function( event ) {
		        event.preventDefault();

		 		var data = $('#addFile').prop('files')[0];
		 		var form = new FormData();
		 		form.append('file', data);

		        $.ajax({
		            url: "https://lambda-api.herokuapp.com/api/Images/upload",
		            type: "post",
		            headers: {
		            	"Authorization": getCookie("accessTokens")
		            },
		            contentType: false,
		            processData: false,
		            dataType: 'json',
		            data: form,
		            success: function (response) {
		            }
		        });
		    });

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
				$.ajaxSetup({
					headers: {
		            	"Authorization": getCookie("accessTokens")
		            }
				});
				console.log(getCookie("accessTokens"));
				$.ajax({
					headers: {
		            	"Authorization": getCookie("accessTokens")
		            },
					url: "https://lambda-api.herokuapp.com/api/users/"+getCookie('userID')+"/images",
					
		            success: function (response) {
		            	for(i=0; i < response.length; i++)
		            	{
		            		var url = response[i].url;
		            		$("#testBox").append("<div class='picture"+i+" gallery textaligncenter w50pc floatleft'></div>");
		            		$(".picture"+i).append("<a class='linkImage"+i+"' href='index.php?imageId=" + response[i].id + "' rel='gallery' class='pirobox_gall'></a>");
		            		$(".linkImage"+i).append("<img id='imageEnCours"+i+"' class='imgGallery' src='"+url+"' />");
		            	}
		            	console.log(response);
		            }
				});

			}

		</script>
	</body>
</html>