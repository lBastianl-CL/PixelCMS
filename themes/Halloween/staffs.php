<title><?= $config['hotelName'] ?>: <?= $lang["Ccommunity"] ?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?3242232" type="text/css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/home.css?2" type="text/css">


  
</head>
<body>



 	<?php
	include_once 'includes/header_community.php';
	?>

<style>
a{
	color: #236aad;
}
</style>
<br><br>
	<div class="center">
	<div style="width: 600px;"class="columleft">
		<style>
	.staff-offline {
    text-indent: -9999px;
    width: 48px;
    height: 15px;
    position: absolute;
    margin-top: 3px;
    background: url(<?php echo H. $config['skin']; ?>/assets/images/icons/iconoffline.gif);
}
		
	.staff-online {
    text-indent: -9999px;
    width: 48px;
    height: 15px;
    position: absolute;
    margin-top: 3px;
    background: url(<?php echo H. $config['skin']; ?>/assets/images/icons/icononline.png);
}
</style>	
	<?php
			if ($config['hotelEmu'] == 'arcturus')
			{
				$getRanks = $dbh->prepare("SELECT * FROM permissions WHERE id >=11 AND id < 17  ORDER BY id DESC");
			}
			else
			{
				$getRanks = $dbh->prepare("SELECT id,name,badgeid FROM ranks WHERE id >=11 AND id < 17  ORDER BY id DESC");
			}
			$getRanks->execute();
			while ($Ranks = $getRanks->fetch())
			{	
				if ($config['hotelEmu'] == 'arcturus')
				{
					$rankName = $Ranks['rank_name'];
				}
				else
				{
					$rankName = $Ranks['name'];
				}
				echo '
				<div class="box">
				<div class="title">
				' . $rankName . '</div>
				<div class="mainBox" style="float;left">
				<div class="boxHeader"></div>
				';
					$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE (rank = :ranid) AND (hide_staff = 0)");
				$getMembers->bindParam(':ranid', $Ranks['id']);
				$getMembers->execute();
				if ($getMembers->RowCount() > 0)
				{
					while ($member = $getMembers->fetch())
					{
						$username = filter($member['username']);
						$motto = filter($member['motto']);
						$look = filter($member['look']);
						$online = filter($member['online']);
						if($online == 1){ $OnlineStatus = "online"; } else { $OnlineStatus = "offline"; }
					echo '
					<a href="/home/'.$username.'"><div style="pointer;float: left;border: 1px solid #e6e6e6;border-radius: 5px;background: #fbfbfb;padding-top: 20px;border-radius: 5px;width: 280px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;line-height: 30px;">
					<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='.$look.'&head_direction=3&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
					<b  style="font-size: 16px;">' .$username . ' </b> <span class="staff-'.$OnlineStatus.'">0</span> 
					<img src="'.$config['badgeURL'].'' . $Ranks['badgeid'] . '.gif" style="margin-right:5px;" align="right"> 
					</a>
					<br>  <img src="'. H. $config['skin'] .'/assets/images/icons/motto.png"> <i style="font-size: 12px;">' .$motto . '</i>
					<BR>
					</div>
					';
					}
				}
				else
				{
					echo $lang["Snostaff"];
				}
				echo '
				</div>
				</div>';
			}
		?><br><br>
	</div>
<div style="width: 370px;" class="columright">
<div style="width: 370px;" class="columright">
<div class="box">
<div class="black title">
<?= $lang["Sthestaff"] ?>
</div>
<div class="mainBox" style="float;left">
<div class="boxHeader"></div>
<?= $lang["Stheteamtext"] ?></div>
</div>






</div>
	</div>
</body>
</html>