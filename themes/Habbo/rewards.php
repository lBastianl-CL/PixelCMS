<title><?= $config['hotelName'] ?>: <?= $lang["Nrewards"]; ?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css?45">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?43" type="text/css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/home.css?245" type="text/css">


      <style>


#notice {
  position: fixed;
  right: 20px;
  top: 90px;
  background-color: rgba(0, 0, 0, 0.8);
  padding: 20px 20px 20px 100px;
  color: #fff;
  border-bottom: 4px solid #bada55;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
}
#notice > span {
  display: block;
}

#trophy-icon {
  position: absolute;
  left: 20px;
  top: 50%;
  color: #FED65E;
}

#notice-title {
  font-size: 120%;
  color: #a8cf2d;
}

#notice-desc {
  font-size: 90%;
  color: #dedede;
}


i#trophy-icon {
    background: url(<?php echo H. $config['skin']; ?>/assets/images/premio.png) no-repeat;
    width: 60px;
    height: 50px;
    top: 15px;
    background-size: 100%;
}
    </style>

  
</head>
<body>



 	<?php
	include_once 'includes/header_rewards.php';
	?>


<br><br>
	<div class="center">
	<div class="columleft">
	
			<div class="box">
			<div class="title">
<?= $lang["Rrewards"]; ?> <?= $lang["RDiamonds"]; ?>
			</div>
			<div class="mainBox" style="float;left">

						<?= User::userRewardclain(); ?>

			
			<div class="at-reward-card">
  <div class="at-reward-card__header_diamonds">

  </div>
  <div class="at-reward-card__content_diamonds">
    <h2><?= $lang["Rewardtext2"] ?> <?= User::userData('rewards') ?> <?= $lang["RDiamonds"]; ?></h2>
    <p><?= $lang["Rewardtext"] ?></p>
  </div><br><br>
  <div class="at-reward-card__footer">
	<form method="post" style=" width: 100%; ">
    <button class="at-reward-card__button_diamonds" name="clainrewards"><?= $lang["Rbutton1"] ?></button>
	</form>
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

