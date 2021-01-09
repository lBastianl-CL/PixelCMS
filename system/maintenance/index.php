
<!DOCTYPE html>
<html>
<head>
	<title><?= $lang["Mtitle"]?></title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport"><!-- Stylesheets / Fonts / Icons -->
	<link href="data/css/style-leon.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript">
	</script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js">
	</script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="data/css/style.css" rel="stylesheet">
	<script src="data/js/modernizr.js">
	</script>
	<script src="data/js/main.js">
	</script>
</head>
<body>
	<script>
	   $(document).ready(function(){
	     $('.slider').slider({full_width: true, interval:7000});
	   });       
	</script>
	<style>
	.slider .slides {
	   background-color: #9e9e9e;
	   margin: 0;
	   height: 400px;
	   background-position: 0% 100%, right bottom, 0;
	   height: 438px;
	   width: auto;
	   background-color: #53BAF1;
	   border-bottom: solid 2px white;
	}
	.slider .indicators .indicator-item.active {
	   background-color: #607D8B;
	}
	</style>
	<div id="myBtn" style="color: white;position: absolute;right: 7px;bottom: 10px;z-index: 99;cursor: pointer;background-color: #2f2f2f;padding: 10px;border-radius: 5px;">
		<a href="adminlogin">Login Staff</a>
	</div>
	<script>
	var modal = document.getElementById('myModal');

	var btn = document.getElementById("myBtn");

	var span = document.getElementsByClassName("close")[0];

	btn.onclick = function() {
	   modal.style.display = "block";
	}

	span.onclick = function() {
	   modal.style.display = "none";
	}

	window.onclick = function(event) {
	   if (event.target == modal) {
	       modal.style.display = "none";
	   }
	}
	</script>
	<div class="slider fullscreen">
		<ul class="slides">

			<li>
				<img src="">
				<div class="caption center-align">
					<div class="logo"></div>
					<h3><?= $lang["Mtitle"] ?></h3>
						<h5 class="light grey-text text-lighten-3"><?= $lang["MnText"] ?><br/><br/>
				<?= $lang["MnText2"] ?>

					</h5>
				</div>
			</li>
			
			
			<li>
				<img src="">
				<div class="caption center-align">
					<h3><?= $lang["Mtitle2"] ?></h3>
					<h5 class="light grey-text text-lighten-3"><?= $lang["MnText3"]?></h5><br/>
					<center><div id="teamliste" style="margin-right: 1%;">
						<div id="teambox">
							<p class="teamfont" style="color:#31A6E0;"><?= $config["Autor"]?></p>
							<p class="small"><?= $lang["Autor"]?></p>
						</div>
						</center>
				</div>
			</li>
			<li>
				<img src="">
				<div class="caption center-align" style="top: 10%;">
					<h3><?= $lang["Mtitle3"] ?></h3>
					<h5 class="light grey-text text-lighten-3"><?= $lang["MnText5"] ?></h5>
					
					<section id="cd-timeline" class="cd-container">
												<div class="cd-timeline-block">

						    <div class="cd-timeline-content">
								<h2 style="margin:0px; float: left;"><?= $lang["Mtitle4"] ?></h2><br/><br/>
								<div class="soc"><?= $lang["MnText8"]?></div>
								<div class="soc" style="text-align: right;font-size:12px;"><?php $time = time(); echo date("d-m-Y (H:i:s)", $time);?></div>
							</div>
						</div>						<div class="cd-timeline-block">
				

						    <div class="cd-timeline-content">
								<h2 style="margin:0px; float: left;"><?= $lang ["Mtitle5"] ?></h2><br/><br/>
								<div class="soc"><?= $lang["MnText9"]?></div>
								<div class="soc" style="text-align: right;font-size:12px;"><?php $time = time(); echo date("d-m-Y (H:i:s)", $time);?></div>
							</div>
						</div>						<div class="cd-timeline-block">

						    <div class="cd-timeline-content">
								<h2 style="margin:0px; float: left;"><?= $lang ["Mtitle6"] ?></h2><br/><br/>
								<div class="soc"><?= $lang["MnText10"]?></div>
								<div class="soc" style="text-align: right;font-size:12px;"><?php $time = time(); echo date("d-m-Y (H:i:s)", $time);?></div>
							</div>
						</div>					</div>
					</section> 
				</div>
			</li>
		</ul>
	</div>
</body>
</html>