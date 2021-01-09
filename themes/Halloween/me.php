		<title> <?= $config['hotelName'] ?> - <?=  User::userData('username')?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?44" type="text/css">
	

  
</head>
<body>


 	<?php
	include_once 'includes/header_me.php';
	?>


<br><br>
		
<div class="center">
	<div class="columleft">
		<div class="boxuser">
			<div class="userfirst">
				<div class="useravatar">
					<div class="avatar" style="background-image:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= User::userData('look') ?>&amp;direction=2&amp;head_direction=3&amp;action=crr=667&amp;gesture=sml&size=l);border: 4px solid #fff;background-position: 00px -32px;margin-top: 20px;border-radius: 50%;background-color: rgba(255, 255, 255, 0.7);"></div>
				</div>
				<div class="usernamebox">
					<div class="diamonds">
						<?= $lang["Hdiamond"] ?>: <?= User::userData('vip_points') ?>
					</div>
				</div><br><br><br>
				<div class="usernamebox">
					<div class="gotw">
					<?= $lang["Hgotw"] ?>: <?= User::userData('gotw_points') ?>
					</div>
				</div><br><br><br>
					<div class="usernamebox">
					<div class="credits">
					<?= $lang["Hcredits"] ?>: <?= User::userData('credits') ?>
					</div>
				</div>
				
			</div>
			<a href="client">
<button style="margin-left: 10px;background-color: #137d40;border-bottom: 3px solid #183c27;color: #fff;width: 96.7%;margin-top: 10px;border-top: none;border-left: none;border-right: none;border-radius: 10px 10px 10px 10px;padding: 14px;font-size: 16px;">Entrar al hotel</button></a>		</div>
		<div style="padding: 10px;height: 100;" class="box">
						<div class="blue title">
			<?= $lang["Refer"] ?>
				</div><br><br>
				<?= User::userRefClaim(); ?>
				
			<div class="boxreferidos">
	<img src="<?php echo H. $config['skin']; ?>/assets/images/compreferido.png">
	<div class="boxreferidos txtlink">
	<a style="color:black;line-height:35px;font-size: 12px;margin-left:22px;"><?= $config['hotelUrl'] ?>/register/<?= User::userData('username') ?></a>
	</div>

	<div style="background: #bb2a2a;box-shadow:0 2px 2px rgba(0,0,0,.05), inset 0 -2px 0 rgba(0,0,0,.12), inset 0 1px 0 rgba(255,255,255,.3), 0 0 5px rgba(0,0,0,0.3);margin-top: -90px;font-family: arial;font-size: 16px;" class="btnreferido">
<p style="background: #fff;-webkit-background-clip: text;">
<?php
						$refCount = $dbh->prepare("SELECT refid FROM referrer WHERE refid = :refid");
						$refCount->bindParam(':refid', $_SESSION['id']);
						$refCount->execute();
						echo $refCount->RowCount();
					?>
					
 <?= $lang["MrefUsers"] ?></p>

	</div>
		<div style="margin-top:-44px;margin-right:15px;background: #158d8e;box-shadow:0 2px 2px rgba(0,0,0,.05), inset 0 -2px 0 rgba(0,0,0,.12), inset 0 1px 0 rgba(255,255,255,.3), 0 0 5px rgba(0,0,0,0.3);font-family: sans-serif;font-size:20px;border-bottom: 2px solid #fff;float:right;" class="btnreferido">

					<?php
						$bankCount = $dbh->prepare("SELECT userid,diamonds FROM referrerbank WHERE userid = :userid");
						$bankCount->bindParam(':userid', $_SESSION['id']);
						$bankCount->execute();
						$bankCountData = $bankCount->fetch();
						if($bankCount->RowCount() == 0)
						{
							echo'0';
						}
						else
						{
							echo $bankCountData['diamonds'];
						}
					?>
					<img src="<?php echo H. $config['skin']; ?>/assets/images/icons/diaicon.png" align="">
				</div>
				<form method="post">
<input type="submit" class="submit" value="Reclamar" name="claimdiamonds" style="margin-top: 0px;border-radius: 3px;height: 35px;width: 130px;float: right;margin-right: 18px;padding-left: 0px;background: #1d8e15 !important;box-shadow: 0 2px 2px rgba(0,0,0,.05), inset 0 -2px 0 rgba(0,0,0,.12), inset 0 1px 0 rgba(255,255,255,.3), 0 0 5px rgba(0,0,0,0.3);color: #fff;">

					</form>

	
	</div>
	<style>
	
.boxreferidos{
	margin-top:15px;
	width: 590px;
	height:155px;
	background: url('<?php echo H. $config['skin']; ?>/assets/images/vB0nlt.png') no-repeat;
	text-align:center;
	font-family:Sansation_Bold_Italic;
	font-size:15px;
	border-radius:4px;
	border: 2px solid white;
}

.boxreferidos .txthead{
	width:100%;
	margin-top:0px;
	height:40px;
	border-radius:0px;
	background:rgba(36,94,125,0.6);
	background-position:top;
	color:#fada00;
	font-size:30px;
	border:0px;
}
.boxreferidos .txtlink{
    width: 250px;
    height: 30px;
    background: #fff;
    border-radius: 20px;
    border: none;
    color: black;
    font-family: sans-serif;
    font-size: 9px;
    margin-top: -10px;
    margin-left: 175px;
}
.boxrimg{

}

.btnreferido{
	font-family:BebasNeue;
	line-height:40px;
	width: 130px;
	height:40px;
	color:white;
	font-size:25px;
	border-radius:5px;
	margin-left:15px;
	margin-top:-9px;
}

@media screen and (max-width:800px) {
	
	header {
	width: 1100px;

}

	</style>
	
		</div>
		<div class="box">
			<div class="lblue title">
				<?= $lang["Mnewinhabbo"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<?php
					$sqlGetUsersByRankDev = $dbh->prepare("SELECT username,look FROM users ORDER BY ID DESC LIMIT 4");
					$sqlGetUsersByRankDev->execute();
					while ($getUsersDev = $sqlGetUsersByRankDev->fetch())
					{
					?>
	<div class="userNewBox" style="border-radius: 20%;width: 130px;height: 100px;background: #cacaca;">
						<a href="/home/<?= filter($getUsersDev['username']) ?>"><div class="userNew" style="background: url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($getUsersDev['look']) ?>&direction=3&head_direction=3&action=wav&headonly=0&size=l);background-position: -5px -40px;width: 130px;float: left;background-repeat: no-repeat;height: 89px;"></div>
							<div class="userNewName" style="width: 129px;margin-top: -10px;background-color: #222;">
							<?= filter($getUsersDev['username']) ?></a>
						</div>
					</div>
					<?php
					}
					echo "</div>";
				?>
			</div>
			
<br><br><br>

			

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
			
<div class="columright">
			<div class="boxnews">
							</div>
			<div class="box">
				<div class="title green">
					<?= $lang["Radio"]?>
					</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					
					<div class="radioContent">	
<audio controls autoplay id="myaudio" style="width:90; height:10" src="<?php echo $config['ipradio'] ?>;"></audio>			
</div>
					
	
			</div>
		</div>		</div>
		
		
		
		
		
<div class="columright">
			<div class="boxnews">
							</div>
			<div class="box">
				<div class="title green">
<?= $lang["Cnowinroom"] ?>
					</div>
				<div class="mainBox" style="float;left">
					<div class="boxHeader"></div>
					
					<?php
	$sql = $dbh->prepare("SELECT id,users_now,caption,owner FROM rooms WHERE users_now > 0 ORDER BY users_now DESC LIMIT 5");
	$sql->execute();
	while ($on = $sql->fetch())
	{
	?>	<br>
	<a  style="text-decoration: none;color: #000;">
		<img  src="<?php echo H. $config['skin']; ?>/assets/images/icons/habbo_online_anim.gif" align="right"> 
		<?php
			if ($on['users_now'] == 0)
			{
				$onlineUsers = '<img style="padding-right: 10px;margin-top: 10px;" src="'. H. $config['skin'] .'/assets/images/icons/room_icon_1.gif" align="left">';
			}
			else if ($on['users_now'] > 29)
			{
				$onlineUsers = '<img style="padding-right: 10px;margin-top: 10px;" src="'. H. $config['skin'] .'/assets/images/icons/room_icon_5.gif" align="left">';
			}
			else if ($on['users_now'] > 19)
			{
				$onlineUsers = '<img style="padding-right: 10px;margin-top: 10px;" src="'. H. $config['skin'] .'/assets/images/icons/room_icon_4.gif" align="left">';
			}
			else if ($on['users_now'] > 9)
			{
				$onlineUsers = '<img style="padding-right: 10px;margin-top: 10px;" src="'. H. $config['skin'] .'/assets/images/icons/room_icon_3.gif" align="left">';
			}
			else if ($on['users_now'] > 0)
			{
				$onlineUsers = '<img style="padding-right: 10px;margin-top: 10px;" src="'. H. $config['skin'] .'/assets/images/icons/room_icon_2.gif" align="left">';
			}
			echo $onlineUsers;
			$getMembers = $dbh->prepare("SELECT username FROM users WHERE id = :owner");
			$getMembers->bindParam(':owner', $on['owner']);
			$getMembers->execute();
			$getMemberss = $getMembers->fetch();
			
			
			
		?>
		<div class="users_now">
		</div>
		<div class="caption">
		<?php echo filter($on['caption']); ?>                   </div>
		<div class="owner">
			<?= $lang["Cnowinroom1"] ?> <b><?php echo filter($on['users_now']); ?></b> <?= $lang["Cnowinroom2"] ?><br>
			<div style="margin-left: 40px;"><?= $lang["Cnowinroom3"] ?>: <a style="color: #222;" href="/home/<?= filter($getMemberss['username']) ?>"><?php echo filter($getMemberss['username']); ?></a>
		</div></div>
		<br><hr>
	</a>

	<?php
	}
?>
					</div>
		</div>		<br><br><br>		
	</div>
		
		
		
		
		</div>


	</body>
