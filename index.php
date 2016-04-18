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
			<form id="changeForm">
				<div class="pictureBox">
					<div class="picture textaligncenter">
						
						<img id="imageEnCours" />

					</div>
				</div>
				<div class="changesBox mt15 clear overflowhidden">
					<div class="changes textaligncenter floatleft maxw100pc">
						<div class="changePoint dimensions clear overflowhidden">
							<p class="floatleft w130px">Redimensions :</p>
							<div class="sectionWidth ml70 floatleft">
								<label>Width (px)</label><br />
								<input class="inputWidth textaligncenter" type="text" name="width">
							</div>
							<div class="sectionHeight floatleft">
								<label>Height (px)</label><br />
								<input class="inputHeight textaligncenter" type="text" name="height">
							</div>
							<div class="sectionHeight floatleft">
								<label>Sans proportions</label><br />
								<input class="inputHeight textaligncenter" type="checkbox" name="options" value="!">
							</div>
							<button class="btn" type="button" id="dimensions">Modifier</button>
						</div>
						<div class="changePoint flou mt10 clear overflowhidden">
							<p class="floatleft w130px">Flou :</p>
							<div class="sectionWidth ml70 floatleft">
								<label>Sigma</label><br />
								<input class="inputSigma textaligncenter" type="text" name="sigma">
							</div>
							<div class="sectionWidth ml70 floatleft">
								<label>Radius</label><br />
								<input class="inputRadius textaligncenter" type="text" name="radius">
							</div>
							<button class="btn" type="button" id="blur">Appliquer</button>
						</div>
						<div class="changePoint rognage mt10 clear overflowhidden">
							<p class="floatleft w130px">Rognage :</p>
							<div class="sectionWidth ml70 floatleft">
								<label>Width (px)</label><br />
								<input class="inputWidth textaligncenter" type="text" name="width">
							</div>
							<div class="sectionHeight floatleft ml70">
								<label>Height (px)</label><br />
								<input class="inputHeight textaligncenter" type="text" name="height">
							</div>
							<div class="sectionWidth ml70 floatleft">
								<label>X</label><br />
								<input class="inputWidth textaligncenter" type="text" name="x">
							</div>
							<div class="sectionHeight floatleft ml70">
								<label>Y</label><br />
								<input class="inputHeight textaligncenter" type="text" name="y">
							</div>
							<button class="btn" type="button" id="rognage">Appliquer</button>
						</div>
						<div class="changePoint rotation mt10 clear overflowhidden">
							<p class="floatleft w130px">Rotation :</p>
							<div class="sectionHeight floatleft ml70">
								<label>Angle</label><br />
								<input class="inputHeight textaligncenter" type="text" name="angle">
							</div>
							<button class="btn" type="button" id="rotate">Modifier</button>
						</div>
						<div class="changePoint sepia mt10 clear overflowhidden">
							<p class="floatleft w130px">Filtre Sepia</p>
							<button class="btn" type="button" id="sepia">Appliquer</button>
						</div>
					</div>
					<!-- <div class="rightBloc textaligncenter floatleft">
							<div class="sectionSave floatleft mt20 w320 w100pc">
								<button class="btn btnSave w100pc">Sauvegarder</button>
							</div>
							<div class="sectionPrint floatleft mt20 w320 w100pc">
								<button class="btn btnPrint w100pc">Imprimer</button>
							</div>
							<div class="sectionDelete floatleft mt20 w320 w100pc">
								<button class="btn btnDelete w100pc">Supprimer</button>
							</div>
						</div> -->
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

				$("#blur").on("click", function(){
					var a = $(".flou").find( "input[name='sigma']" ).val();
					var b = $(".flou").find( "input[name='radius']" ).val();
					console.log("test", getUrlVars());
					var url = "https://lambda-api.herokuapp.com/api/Images/"+getUrlVars()["imageId"]+"/edit?op=blur&params="+a+"&params="+b;

					$('#imageEnCours').attr('src', url);
				});

				$("#dimensions").on("click", function(){
					var a = $(".dimensions").find( "input[name='width']" ).val();
					var b = $(".dimensions").find( "input[name='height']" ).val();
					var c = null;
					if (c = $(".dimensions").find( "input[name='options']" ).is(':checked'))
					{
						c = "!";
					}
					console.log("resize", getUrlVars());
					var url = "https://lambda-api.herokuapp.com/api/Images/"+getUrlVars()["imageId"]+"/edit?op=resize&params="+a+"&params="+b+"&params="+c;

					$('#imageEnCours').attr('src', url);
				});

				$("#rognage").on("click", function(){
					var a = $(".rognage").find( "input[name='width']" ).val();
					var b = $(".rognage").find( "input[name='height']" ).val();
					var c = $(".rognage").find( "input[name='x']" ).val();
					var d = $(".rognage").find( "input[name='y']" ).val();
					console.log("resize", getUrlVars());
					var url = "https://lambda-api.herokuapp.com/api/Images/"+getUrlVars()["imageId"]+"/edit?op=crop&params="+a+"&params="+b+"&params="+c+"&params="+d;

					$('#imageEnCours').attr('src', url);
				});
				
				$("#rotate").on("click", function(){
					var a = $(".rotation").find( "input[name='angle']" ).val();
					console.log("resize", getUrlVars());
					var url = "https://lambda-api.herokuapp.com/api/Images/"+getUrlVars()["imageId"]+"/edit?op=rotate&params="+a;

					$('#imageEnCours').attr('src', url);
				});

				$("#sepia").on("click", function(){
					var url = "https://lambda-api.herokuapp.com/api/Images/"+getUrlVars()["imageId"]+"/edit?op=sepia";

					$('#imageEnCours').attr('src', url);
				});
			


		</script>
	</body>
</html>