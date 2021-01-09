	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>

<?php include_once("includes/header.php"); ?>

<?php include_once("includes/subheader-community.php"); ?>

<div id="content">
<style>
.error {
    width: 100%;
    height: 27px;
    border-radius: 5px;
    min-height: 0px; 
    margin-top: -50px;
    position: relative;
    z-index: 1;
    text-align: center;
    font-family: 'Ubuntu', sans-serif;
    font-weight: 800;
    font-size: 16px;
    color: #FFF;
    background: #bb0707;
}
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

    <div class="container">

        <div class="col-xs-7 no-padding-left">
<?php
			if ($config['hotelEmu'] == 'arcturus')
			{
				$getRanks = $dbh->prepare("SELECT * FROM permissions WHERE id >=3 AND id <= 8  ORDER BY id DESC");
			}
			else
			{
				$getRanks = $dbh->prepare("SELECT id,name,badgeid FROM ranks WHERE id >=3 AND id <= 8  ORDER BY id DESC");
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
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4>' . $rankName . '</h4>
                </div>
				';
					$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE (rank = :ranid) AND (hide_staff = 1)");
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
					<a href="/home/'.$username.'" style=" color: #fff; "><div style="pointer;float: left;border: 1px solid #e6e6e6;background: url('. H. $config['skin'].'/assets/images/alfapromo.png);padding-top: 20px;border-radius: 5px;width: 610px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;line-height: 30px;">
					<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='.$look.'&head_direction=2&amp;action=wav&size=l) no-repeat rgba(255, 255, 255, 0.25);background-position: 60% 27%;"></div>
					<div style=" background: rgba(34, 34, 34, 0.36); width: 400px; margin-left: 120px; padding: 8px; border-radius: 5px; "><b  style="font-size: 16px;">' .$username . ' </b> <span class="staff-'.$OnlineStatus.'">0</span> 
					<img src="'.$config['badgeURL'].'' . $Ranks['badge'] . '.gif" style="margin-right:5px;" align="right"> 
					</a>
					<br>  <img src="'. H. $config['skin'] .'/assets/images/icons/motto.png"> <i style="font-size: 12px; color: #fff; ">' .$motto . '</i>
					<BR></div></div>
					
					';
					}
				}
				else
				{
					echo '<center><div style="padding: 10px">'.$lang["Snostaff"].'</div></center>';
				}
				echo '
				</div>
				';
			}
		?>
		</div>
        <div class="col-xs-5">
		
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Sthestaff"] ?></h4>
                </div><div style="padding: 10px;">
				<?= $lang["Stheteamtext"] ?></div></div>
			</div>

    </div>


	</div>

<?php include_once("includes/footer.php"); ?>

</body>
</html>