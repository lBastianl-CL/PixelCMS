		<title> <?= $config['hotelName'] ?> - <?=  User::userData('username')?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?4" type="text/css">
	

  
</head>
<body>

 	<?php
	include_once 'includes/header_me.php';
	?>


<br><br>
		<script>
		
		</script>
<style>
a {
    text-decoration: none !important;
    color: #222;
}
</style>
<div class="center">
	<div style="margin-left: 0px;" class="columright">
		<div style = "" class="box">
			<div class="title">
				<?= $lang["Ssettings"] ?>
			</div>
			<div class="mainBox" style="float;left">
			<center><b><?= $lang["Schangepassword"] ?></a></b><br><br>
			<a href="/settingsemail"><?= $lang["Schangeemail"] ?></a><br><br>
			<a href="/settingshotel"><?= $lang["Shotelsettings"] ?></a>
			</center></div>
		</div>
	</div>
	<div style="margin-left: 10px;" class="columleft">
		<div class="box">
			<div class="title"><?= $lang["Schangepassword"] ?></div>
			<div class='mainBox'>
				<form action="" method="POST">
				<?php User::editPassword(); ?>
					<b><?= $lang["Spasswordnow"] ?></b>
					<input  placeholder="*****************" type="password" name="oldpassword" value="" id="avatarmotto" style="margin-bottom: 3px;width: 100%;"><br>
					<span style="font-size:12px;color:gray;"><?= $lang["Spasswordnowtext"] ?></span><br><br>
					<b><?= $lang["Snewpassword"] ?></b>
					<input  placeholder="*****************"  type="password" name="newpassword" value="" id="avatarmotto" style="margin-bottom: 3px;width: 100%;"><br>
					<span style="font-size:12px;color:gray;"><?= $lang["Snewpasswordtext"] ?></span>
					<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="password" style="margin-top: 10px;">
				</form>
			</div>
		</div><br><br><br><br>
	</div>

</div>
</div>
</body>
</html>			