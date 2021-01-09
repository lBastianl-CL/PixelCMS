<title><?= $config['hotelName'] ?>: <?= userHome('username'); ?> </title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?3242232" type="text/css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/home.css?2" type="text/css">


  
</head>
<body>


 	<?php
	include_once 'includes/header_me.php';
	?>


<br><br>
		<div class="center">
	<div style="    width: 500px; margin-left: 0px;" class="columright">
		<div style = "" class="box">
			<div class="title">
				<?= userHome('username'); ?>'s <?= $lang["Huserprofile"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<div id="column" style="    width: 460px;height: 400px;background: url('<?php echo H. $config['skin']; ?>/assets/images/icons/Hotel_HP_BG.png') no-repeat;background-color: #FFF;">
<br><br><br><br>
					<img src="<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= userHome('look'); ?>&direction=2&size=l&head_direction=3&action=wlk&gesture=sml" style="-webkit-filter: drop-shadow(0 1px 0 #FFFFFF) drop-shadow(0 -1px 0 #FFFFFF) drop-shadow(1px 0 0 #FFFFFF) drop-shadow(-1px 0 0 #FFFFFF);margin-top: -20px;position: absolute;margin-left: 40px;">
					<div class="boxbg3">
						<div class='boxx credits'>
							<?= userHome('username'); ?>  <?= $lang["Hhas"] ?> <b> <?= userHome('credits'); ?> </b> <?= $lang["Hcredits"] ?>
						</div>
						<div class='boxx pixel'>
							<?= userHome('username'); ?>  <?= $lang["Hhas"] ?> <b> <?= userHome('activity_points'); ?> </b> <?= $lang["Hgotw"] ?>
						</div>
						<div class='boxx sterne'>
							<?= userHome('username'); ?>  <?= $lang["Hhas"] ?> <b> <?= userHome('vip_points'); ?> </b> <?= $lang["Hdiamond"] ?>
						</div>
						<div class='boxx register'>
							<?= $lang["Hjoined"] ?> <b><?php echo date("y-m-d, H:i",userHome('account_created')); ?></b>
						</div>
						<div class='boxx register'>
							<?= $lang["Hlastonline"] ?> <b><?php echo date("y-m-d, H:i", userHome('last_online')); ?></b>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="width: 470px;margin-left: 10px;" class="columleft">
		<div class="box">
			<div class="green title">
				<?= $lang["Hbagesof"] ?> <?= userHome('username'); ?>
			</div>
			<div class="mainBox" style="float;left">
				<?php
					$userId = userHome('id');
					$stmt = $dbh->prepare("SELECT * FROM user_badges WHERE user_id = :userid");
					$stmt->bindParam(':userid', $userId);
					$stmt->execute();
					if (!$stmt->RowCount() == 0)
					{
						while($badge = $stmt->fetch())
						{
							echo"<img src=\"".$config['badgeURL']."".filter($badge["badge_id"]).".GIF\">";
						}
					}
					else
					{
						echo userHome('username').' '.$lang["nobadge"].'';
					}
				?>
			</div>
		</div>
		<div class="box">
			<div class="blue title">
				<?= $lang["Hfrendsof"] ?> <?= userHome('username'); ?>
			</div>
			<div class="mainBox" style="float;left">
				<div style="width: 450px; height: 400px; overflow-y: scroll;">
					<?php
						$userId = userHome('id');
						$sql = $dbh->prepare("SELECT * FROM messenger_friendships WHERE user_one_id=:userid OR user_two_id=:userid ORDER BY RAND()");
						$sql->bindParam(':userid', $userId);
						$sql->execute();
						if (!$sql->RowCount() == 0)
						{
							while($news = $sql->fetch())
							{
								$id = (userHome('id') == $news['user_two_id'] ? $news['user_one_id'] : $news['user_two_id']);
								$getUser = $dbh->prepare("SELECT * FROM users WHERE id = :id");
								$getUser->bindParam(':id', $id);
								$getUser->execute();
								$getUserData = $getUser->fetch();
								echo'
								<br> <a href="/home/'.filter($getUserData['username']).'"> <img style="float: right;margin-top: -35px;"src="'. $config['HabboImg'] .'/habbo-imaging/avatarimage?figure='.filter($getUserData['look']).'&direction=4&head_direction=4&gesture=sml&size=b&headonly=0"> 
								<div style="color: #3480d2;margin-left: 20px;"><br>'.filter($getUserData['username']).'</div></a><div style="margin-left: 20px;">'.filter($getUserData['motto']).'</div><br><br><hr>
								
								';
							}
						}
						else
						{
							echo userHome('username').' '.$lang["nofriend"].'';
						}
					?>
				</div>
			</div>
		</div><br><br><br>
	</div>
</div>
</div>
</body>
</html>
