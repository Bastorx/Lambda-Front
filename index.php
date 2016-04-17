<html>
	<head>
		<title>Application</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css"  href="theme/css/common.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/index.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/index_responsive.css">
		<link rel="stylesheet" type="text/css"  href="theme/css/font-awesome.css">
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
				<div class="pictureBox">
					<div class="picture textaligncenter">
						
						<img id="imageEnCours" />

					</div>
				</div>
				<div class="changesBox mt15 clear overflowhidden">
					<div class="changes textaligncenter floatleft maxw100pc">
						<div class="changePoint dimensions clear overflowhidden">
							<p class="floatleft">Redimensions :</p>
							<div class="sectionWidth ml70 floatleft">
								<label>Width</label><br />
								<input class="inputWidth textaligncenter" type="text" name="width">
								<label>px</label>
							</div>
							<div class="sectionHeight floatleft">
								<label>Height</label><br />
								<input class="inputHeight textaligncenter" type="text" name="height	">
								<label>px</label>
							</div>
							<button class="btn">Modifier</button>
						</div>
						<div class="changePoint filters mt10 clear overflowhidden">
							<p class="floatleft">Conversion :</p>
							<button class="btn">Appliquer</button>
						</div>
						<div class="changePoint flou mt10 clear overflowhidden">
							<p class="floatleft">Flou :</p>
							<button class="btn">Appliquer</button>
						</div>
						<div class="changePoint rograge mt10 clear overflowhidden">
							<p class="floatleft">Rognage :</p>
							<button class="btn">Appliquer</button>
						</div>
						<div class="changePoint rotation mt10 clear overflowhidden">
							<p class="floatleft">Rotation :</p>
							<button class="btn">Modifier</button>
						</div>
						<div class="changePoint sepia mt10 clear overflowhidden">
							<p class="floatleft">Filtre Sepia</p>
							<button class="btn">Appliquer</button>
						</div>
					</div>
					<div class="rightBloc textaligncenter floatleft">
							<div class="sectionSave floatleft mt20 w320 w100pc">
								<button class="btn btnSave w100pc">Sauvegarder</button>
							</div>
							<div class="sectionPrint floatleft mt20 w320 w100pc">
								<button class="btn btnPrint w100pc">Imprimer</button>
							</div>
							<div class="sectionDelete floatleft mt20 w320 w100pc">
								<button class="btn btnDelete w100pc">Supprimer</button>
							</div>
						</div>
				</div>
			</form>
		</div>
		<div id="footer">
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
					url: "https://lambda-api.herokuapp.com/api/Images/"+getUrlVars()["imageId"],
		            success: function (response) {
		            	var url = response.url;
		            	$('#imageEnCours').attr('src', url);
		            	console.log(url);
		            }
				});
			}
			function getUrlVars()
			{
			    var vars = [], hash;
			    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			    for(var i = 0; i < hashes.length; i++)
			    {
			        hash = hashes[i].split('=');
			        vars.push(hash[0]);
			        vars[hash[0]] = hash[1];
			    }
			    return vars;
			}
		</script>
	</body>
</html>