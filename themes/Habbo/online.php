<title><?= $config['hotelName'] ?>: <?= $lang["Oonline3"] ?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css?45">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?43" type="text/css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/home.css?245" type="text/css">


  
</head>
<body>



 	<?php
	include_once 'includes/header_community.php';
	?>
<style>
a{
	color: #222;
}
</style>

<br><br>
	<div class="center">
	<div style="width: 100%;" class="columleft">
		<div class="box">
			<div class="title blue">
				<?= $lang["Oonline3"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<?php 
					$getOnline = $dbh->prepare("SELECT id,username,motto,online,look from users WHERE online = '1' ORDER BY RAND()");
					$getOnline->execute();
					if ($getOnline->RowCount() > 0)
				{
					while ($onlineRow = $getOnline->fetch())
					{
					?>
					<div style="pointer;float: left;border: 1px solid #e2e2e2;border-radius: 5px;padding-top: 20px;border-radius: 5px;width: 280px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;    line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($onlineRow['look']) ?>&head_direction=3&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
					<b style="font-size: 16px; color: black;"><a href = "/home/<?= filter($onlineRow['username']) ?>"><?= filter($onlineRow['username']) ?> </a></b><br><?= filter($onlineRow['motto']) ?></a>
				</div>		
				<?php
				}
				}
				else
				{
					echo ' '.$lang["Oonline4"].'</div>';
				}
			?>
		</div>
			<br><br><br><br><br><br></div>
		</div>
	</div>
</body>
</html>