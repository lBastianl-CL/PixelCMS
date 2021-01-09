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
</style><div class="center">
	<div style="margin-left: 0px;" class="columright">
		<div style = "" class="box">
			<div class="title">
				<?= $lang["Ssettings"] ?>
			</div>
		<center>	<div class="mainBox" style="float;left">
				<a href="/settingspassword"><?= $lang["Schangepassword"] ?></a><br><br>
				<b><?= $lang["Schangeemail"] ?></b><br><br>
				<a href="/settingshotel"><?= $lang["Shotelsettings"] ?></a>
			</div></center>
		</div>
	</div>
	<div style="margin-left: 10px;" class="columleft">
		<div class="box">
			<div class="title"><?= $lang["Schangeemail"] ?></div>
			<div class='mainBox'>
			<?php User::editEmail(); ?>
				<form action="" method="post">
					<b><?= $lang["Syouremail"] ?></b>
					<input type="text" name="email" value="<?= User::userData('mail') ?>" id="avatarmotto" autocomplete="off" style="margin-bottom: 3px;width: 100%;">
					<span style="font-size:12px;color:gray;"><?= $lang["Syouremailtext"] ?></span>
					<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="account" style="margin-top: 10px;">
				</form>
			</div>
		</div><br><br><br><br>
	</div>

</div>
</div>
</body>
</html>			