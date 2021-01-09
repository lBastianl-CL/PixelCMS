<title><?= $config['hotelName'] ?>: <?= $lang["Nrewards"]; ?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?2" type="text/css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/home.css?2" type="text/css">


  
</head>
<body>



 	<?php
	include_once 'includes/header_community.php';
	?>


<br><br>
	<div class="center">
	<div class="columleft">
		<div class="box">
			<div class="title">
<?= $lang["Rrewards"]; ?> <?= $lang["RGotw"]; ?>
			</div>
			<div class="mainBox" style="float;left">

		
			
			<div class="at-reward-card">
  <div class="at-reward-card__header">

  </div>
  <div class="at-reward-card__content">
    <h2><?= $lang["Rewardtext2"] ?> 50 <?= $lang["RGotw"]; ?>!</h2>
    <p><?= $lang["Rewardtext"] ?></p>
  </div><br><br>
  <div class="at-reward-card__footer">
    <button class="at-reward-card__button"><?= $lang["Rbutton2"] ?></button>
    <button class="at-reward-card__button"><?= $lang["Rbutton1"] ?></button>
  </div>
</div>
		</div>
	</div>
	
	
			<div class="box">
			<div class="title">
<?= $lang["Rrewards"]; ?> <?= $lang["RDiamonds"]; ?>
			</div>
			<div class="mainBox" style="float;left">

		
			
			<div class="at-reward-card">
  <div class="at-reward-card__header_diamonds">

  </div>
  <div class="at-reward-card__content_diamonds">
    <h2><?= $lang["Rewardtext2"] ?> 50 <?= $lang["RDiamonds"]; ?>!</h2>
    <p><?= $lang["Rewardtext"] ?></p>
  </div><br><br>
  <div class="at-reward-card__footer">
    <button class="at-reward-card__button"><?= $lang["Rbutton2"] ?></button>
    <button class="at-reward-card__button_diamonds"><?= $lang["Rbutton1"] ?></button>
  </div>
</div>
		</div>
	</div>
	
	<br><br><br><br><br><br>
	</div>
	</div>
	
	<div class="columright">
			<div class="boxnews">
							</div>
			<div class="box">
				<div class="title green">
					<?= $lang["Rewtitlebox"]?>
					</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					<b><?= $lang["Rewtextbox1"]?></b><br><br>
				<?= $lang["Rewtextbox2"] ?>
					<br><br>
					<b><?= $lang["Rewtextbox3"] ?></b><br><br>
		<?= $lang["Rewtextbox4"] ?>



					
	
			</div>
		</div>		</div>
	
	
</body>
</html>