<?php
	if(!defined('SLOPT_CMS')) 
	{ 
		die('Lo sentimos, pero no puede acceder a este archivo!'); 
	}
	function userOfTheWeek()
	{
		global $config;
		echo'
		';
		global $dbh,$lang;
		$getUOTW = $dbh->prepare("SELECT userid,text FROM uotw");
		$getUOTW->execute();
		$getUOTWData = $getUOTW->fetch();
		$getUser = $dbh->prepare("SELECT id,look,username,motto,online FROM users WHERE id = :id");
		$getUser->bindParam(':id', $getUOTWData['userid']);
		$getUser->execute();
		$getUserData = $getUser->fetch();
		$getUserBadge = $dbh->prepare("SELECT id,badge_code,user_id,slot_id FROM users_badges WHERE user_id = :id AND slot_id = 1 LIMIT 1");
		$getUserBadge->bindParam(':id', $getUOTWData['userid']);
		$getUserBadge->execute();
		$getUserDataBadge = $getUserBadge->fetch();
		if ($getUserBadge->RowCount() > 0)
		{
			$userBadge = '<img style="padding-right: 10px;" src="'.$config['badgeURL'].''.$getUserDataBadge['badge_code'].'.gif" align="right">';
		}
		else
		{
			false;
		}
		If($getUser->RowCount() > 0)
		{
			if($getUserData['online'] == 1){ $OnlineStatus = "online"; } else { $OnlineStatus = "offline"; }
			echo '<div class="userNew" style="height: 100px;  background: url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='.filter($getUserData['look']).'&size=l&headonly=1) -5px -10px, url('.H. $config['skin'].'/assets/images/weekly.png);float: left; background-repeat: no-repeat; margin-top: -10px; width: 160px; height: 150px;"></div>';
			echo '<div style="margin-top: 20px;">'.$lang["Hname"].' '.filter($getUserData['username']).'</b><span class="staff-'.$OnlineStatus.'" style=" margin-left: 20px; "></span>';
			echo '<br>'.$lang["Hmotto"].'  <b>'.filter($getUserData['motto']).'</b>'.$userBadge;
			echo '<h4>'.$lang["crazon"].': '.filter($getUOTWData['text']).'</h4></div>';			

		}
		else
		{
			echo '<b style="color:#046fe0;text-decoration: underline;"> </a><span class="staff-'.$OnlineStatus.'"></b> ';
		}
	}
?>