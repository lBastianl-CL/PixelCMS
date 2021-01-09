<title><?= $config['hotelName'] ?>: <?= $lang["Ccommunity"] ?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css?45">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?43" type="text/css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/home.css?245" type="text/css">


  
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
				<?= $lang["Crandomplayers"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				<?php
					$sqlGetUsersByRankDev = $dbh->prepare("SELECT username,look FROM users ORDER BY RAND() DESC LIMIT 4");
					$sqlGetUsersByRankDev->execute();
					while ($getUsersDev = $sqlGetUsersByRankDev->fetch())
					{
					?>
					<div class="userNewBox" style=" border-radius: 20%; width: 130px; height: 100px; ">
						<a href="/home/<?= filter($getUsersDev['username']) ?>"><div class="userNew" style="background: url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($getUsersDev['look']) ?>&direction=3&head_direction=3&action=wav&headonly=0&size=l);background-position: -5px -40px;width: 130px;float: left;background-repeat: no-repeat;height: 89px;"></div>
							<div class="userNewName" style="width: 129px;margin-top: -10px;background-color: #222;">
							<?= filter($getUsersDev['username']) ?></a>
						</div>
					</div>
					<?php
					}
					echo "</div>";
				?>
			</div><div style="width: 100%;"class="columleft">
		
					<div class="box">
						<div class="title blue">
							<?= $lang["Smostdia"] ?>
						</div>
						<div class="mainBox" style="float;left">
							<?php 
								if ($config['hotelEmu'] == 'arcturus')
								{
									$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type > 0 ORDER BY `amount` DESC  LIMIT 2");
									$belcr_get2->execute();
									while ($belcr_row2 = $belcr_get2->fetch())
									{
										$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
										$belcr_get->bindParam(':id', $belcr_row2['user_id']);
										$belcr_get->execute();
										$belcr_row = $belcr_get->fetch();
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 280px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip"> <img src="<?php echo H. $config['skin']; ?>/assets/images/icons/diamondje.png" align="right">
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row2['amount']) ?></b> <?= $lang["Sdiamond"] ?>
									</div>
									<?php
									}
								}
								else
								{
									$belcr_get = $dbh->prepare("SELECT id,vip_points,username,look from users WHERE rank < 2 ORDER BY `vip_points` DESC  LIMIT 2");
									$belcr_get->execute();
									while ($belcr_row = $belcr_get->fetch())
									{
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 280px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>"> <img src="<?php echo H. $config['skin']; ?>/assets/images/icons/diamondje.png" align="right">
										
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row['vip_points']) ?></b> <?= $lang["Sdiamond"] ?>
									</div>
									<?php
									}
								}
								echo "</div>";
							?>
						</div>
						<div class="box">
							<div class="title purple">
								<?= $lang["Smostduck"] ?>
							</div>
							<div class="mainBox" style="float;left">
								<?php 
								if ($config['hotelEmu'] == 'arcturus')
								{
									$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type > 0 ORDER BY `amount` DESC  LIMIT 2");
									$belcr_get2->execute();
									while ($belcr_row2 = $belcr_get2->fetch())
									{
										$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
										$belcr_get->bindParam(':id', $belcr_row2['user_id']);
										$belcr_get->execute();
										$belcr_row = $belcr_get->fetch();
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 280px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>"> <img src="<?php echo H. $config['skin']; ?>/assets/images/icons/ducket.png" align="right">
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row2['amount']) ?></b> <?= $lang["Sduckets"] ?>
									</div>
									<?php
									}
								}
								else
								{
									$belcr_get = $dbh->prepare("SELECT id,activity_points,username,look from users WHERE rank < 2 ORDER BY `activity_points` DESC  LIMIT 2");
									$belcr_get->execute();
									while ($belcr_row = $belcr_get->fetch())
									{
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 280px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>"> <img src="<?php echo H. $config['skin']; ?>/assets/images/icons/ducket.png?v=1" align="right">
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row['activity_points']) ?></b> <?= $lang["Sduckets"] ?>
									</div>
									<?php
									}
								}
								echo "</div>";
							?>
							</div>
							<div class="box">
								<div class="title yellow">
									<?= $lang["Smostcred"] ?>
								</div>
								<div class="mainBox" style="float;left">
									<?php 
										$belcr_get = $dbh->prepare("SELECT id,credits,username,look from users WHERE rank < 2 ORDER BY `credits` DESC  LIMIT 2");
										$belcr_get->execute();
										while ($belcr_row = $belcr_get->fetch())
										{
										?>
										<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 280px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
											<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=3&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
											<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
											<a href="/home/<?= filter($belcr_row['username']) ?>"> <img src="<?php echo H. $config['skin']; ?>/assets/images/icons/credit.gif" align="right">
											</a>
											<br> <b style="font-size: 12px;"><?= filter($belcr_row['credits']) ?></b> <?= $lang["Scredits"] ?>
										</div>
										<?php
										}
										echo "</div>";
									?>
								</div><br><br><br><br></div>
		</div>
		<div class="columright">
			<div class="boxnews">
				<?php
					$sql = $dbh->prepare("SELECT id,title,image,shortstory FROM cms_news ORDER BY id DESC LIMIT 1");
					$sql->execute();
					while ($news = $sql->fetch())
					{
						echo'
						<div class="newsFirstImage" style="background-image: url('.filter($news["image"]).');">
						<div class="newsTitle">
						'.filter($news["title"]).'
						</div>
						<div class="newsTitleShort">
						'.filter($news["shortstory"]).'
						</div>
						<div class="newsTitleRead">
						<div class="newsTitleReadName">
						<a href="/news/'.filter($news["id"]).'">'.$lang["Mreadmore"].' »</a>
						</div>
						</div>
						</div>';
					}
				?>
			</div>
						<div class="box">
				<div class="title green">
					<?= $lang["Muotw"] ?>
				</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					<?= userOfTheWeek() ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>