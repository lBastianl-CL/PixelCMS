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
				<center><a href="/settingspassword"><?= $lang["Schangepassword"] ?></a><br><br>
				<a href="/settingsemail"><?= $lang["Schangeemail"] ?></a><br><br>
				<b><?= $lang["Shotelsettings"] ?></b></center>
			</div>
		</div>
	</div>
	<div style="margin-left: 10px;" class="columleft">
		<div class="box">
			<div class="title"><?= $lang["Shotelsettings"] ?></div>
			<form action="" method="POST">
				<div style="
				padding-top: 50px;"class='mainBox'>
					<?php User::editHotelSettings(); 
						$getUser = $dbh->prepare("SELECT * FROM users WHERE id = :id");
						$getUser->bindParam(':id', $_SESSION['id']);
						$getUser->execute();
						$stats = $getUser->fetch();
					?>
					<div class="oddeven"> 
						<div id="lft"><?= $lang["Sallowfrends"] ?>
						</div> 
						<div id="rght"> <input type="radio" class="hidde" name="hinstellingenv" id="true" value="0" novalidate="" 	<?php if($stats['ignore_invites'] == 0 ){ echo "checked";}else {echo '';}?>> 
							<div class="<?php if($stats['ignore_invites'] == 0 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_true_1"> 
								<label for="true"> 
									<img src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969.png"> 
								</label> 
							</div> 
							<input type="radio" class="hidde" name="hinstellingenv" id="false" value="1" novalidate="" 	<?php if($stats['ignore_invites'] == 0 ){ echo "";}else {echo 'checked';}?>> 
							<div class="<?php if($stats['ignore_invites'] == 1 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_false_1"> 
								<label for="false"> 
									<img src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969_1.png"> 
								</label> 
							</div> 
						</div> 
						<div class="c">
						</div> </div> 
						<div class="oddeven"> 
							<div id="lft"><?= $lang["Sallowlook"] ?>
							</div> 
							<div id="rght"> 
								<input type="radio" class="hidde" name="hinstellingenl" id="true2" value="1" novalidate="" <?php if($stats['allow_mimic'] == 0 ){ echo "checked";}else {echo '';}?>> 
								<div class="<?php if($stats['allow_mimic'] == 1 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_true_2"> 
									<label for="true2"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969.png"> 
									</label> 
								</div> 
								<input type="radio" class="hidde" name="hinstellingenl" id="false2" value="0" novalidate="" <?php if($stats['allow_mimic'] == 0 ){ echo "";}else {echo 'checked';}?>> 
								<div class="<?php if($stats['allow_mimic'] == 0 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_false_2"> 
									<label for="false2"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969_1.png"> 
									</label> 
								</div> 
							</div> 
							<div class="c">
							</div> 
						</div> 
						<div class="oddeven"> 
							<div id="lft"><?= $lang["Sallowonline"] ?>
							</div> 
							<div id="rght"> 
								<input type="radio" class="hidde" name="hinstellingeno" id="true3" value="1" novalidate="" <?php if($stats['hide_online'] == 0 ){ echo "checked";}else {echo '';}?>> 
								<div class="<?php if($stats['hide_online'] == 0 ){ echo "burst";}else {echo 'burst_active';}?>" id="img_true_3"> 
									<label for="true3"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969.png"> 
									</label> 
								</div> 
								<input type="radio" class="hidde" name="hinstellingeno" id="false3" value="0" novalidate="" <?php if($stats['hide_online'] == 0 ){ echo "";}else {echo 'checked';}?>> 
								<div class="<?php if($stats['hide_online'] == 1 ){ echo "burst";}else {echo 'burst_active';}?>" id="img_false_3"> 
									<label for="false3"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969_1.png"> 
									</label> 
								</div> 
							</div> 
							<div class="c">
							</div> 
						</div> 
						<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="hotelsettings" style="margin-top: 10px;">
				</form>
			</div>
		</div><br><br><br><br>
	</div>

</div>
</div>
</body>
</html>			