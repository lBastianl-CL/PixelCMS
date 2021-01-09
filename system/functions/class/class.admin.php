<?php
	if(!defined('SLOPT_CMS')) 
	{ 
		die('Lo sentimos, pero no puede acceder a este archivo!'); 
	}
	/* 
		Functions list Class Admin.
		--------------- 
		error();
		gelukt();
		CheckRank();
		staffpin();
		staffCheck();
		UpdateUser();
		UpdateUserOfTheWeek();
		UpdateNews();
		searchUser();
		searchRank();
		searchUserOfTheWeek();
		EditUser();
		EditUserOfTheWeek();
		EditNews();
		LookSollie();
		DeleteNews();
		DeleteSollie();
		DeleteBans();
		PostNews();
	*/
	Class Admin
	{
		public static function error($errorName)
		{
			echo "<div class=\"alert alert-block alert-danger \"><strong>" . $errorName . "</div>";
		}
		public static function succeed($errorName)
		{
			echo "<div class=\"alert alert-block alert-success \"><strong>" . $errorName . "</div>";
		}
	
		public static function CheckRank($rank)
		{
			global $config;
			{
				if (User::userData('rank') <= $rank)
				{
					header('Location: '.$config['hotelUrl'].'/index');	
					exit();
				}
			}
		}
		public static function UpdateUser()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$upateUser = $dbh->prepare("UPDATE users SET 
				motto=:motto,
				username=:name,
				mail=:mail,
				credits=:credits,
				vip_points=:vip_points,
				activity_points=:activity_points
				WHERE username = :name");
				$upateUser->bindParam(':motto', $_POST['motto']); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->bindParam(':mail', $_POST['mail']); 
				$upateUser->bindParam(':credits', $_POST['credits']); 
				$upateUser->bindParam(':vip_points', $_POST['vip_points']); 
				$upateUser->bindParam(':activity_points', $_POST['activity_points']); 
				$upateUser->execute(); 
				Admin::succeed("".$lang["HkError2"] ."");
			}	
		}
		public static function LookSollie()
		{
			global $dbh, $lang;
			if (isset($_POST['updaterank'])) 
			{
				if($_POST['rank'] > User::userData('rank'))
				{
					Admin::error("".$lang["HkError3"]."");
				}
				else
				{
				$upateUser = $dbh->prepare("UPDATE users SET 
				username=:name,
				pin=:pin,
				rank=:rank,
				hide_staff=:hide_staff
				WHERE username = :name");
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->bindParam(':pin', $_POST['pin']); 
				$upateUser->bindParam(':rank', $_POST['rank']); 
				$upateUser->bindParam(':hide_staff', $_POST['hide_staff']); 
				$upateUser->execute(); 
				Admin::succeed("".$lang["HkError4"]."");
				}
			}	
		}
			public static function userreward()
		{
			global $dbh, $lang;
			if (isset($_POST['rewardrefresh']))
			{
						$addDiamondsRef = $dbh->prepare("UPDATE users SET rewards= :reward");
						$addDiamondsRef->bindParam(':reward', $_POST['pointsreward']);
						$addDiamondsRef->execute();
						Admin::succeed("".$lang["HkError5"]."");
						

			}
		}
			public static function userrewardempty()
		{
			global $dbh, $lang;
			if (isset($_POST['rewardrefreshempty']))
			{
						$addDiamondsRef = $dbh->prepare("UPDATE users SET rewards=0 WHERE id>0");
						$addDiamondsRef->execute();
						Admin::succeed("".$lang["HkError6"]."");
						

			}
		}
		public static function UpdateUserOfTheWeek()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$getUserData = $dbh->prepare("SELECT id,username FROM users WHERE username = :name");
				$getUserData->bindParam(':name', $_POST['naam']); 
				$getUserData->execute(); 
				$upateUser2 = $getUserData->fetch();
				if ($upateUser = $dbh->prepare("UPDATE uotw SET userid=:userdata,text=:txt"))
				{
					$upateUser->bindParam(':userdata', $upateUser2['id']); 
					$upateUser->bindParam(':txt', $_POST['uftwtext']); 
					$upateUser->execute();
					Admin::succeed("".$lang["HkError7"]."");
				}
				else 
				{
					Admin::error("".$lang["HkError8"] ."");
				}  
			}
		}
		public static function UpdateNews()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$editNews = $dbh->prepare("UPDATE cms_news SET 
				id=:id,
				title=:title,
				shortstory=:shortstory,
				longstory=:longstory,
				image=:topstory
				WHERE id = :id");
				$editNews->bindParam(':title', $_POST['title']);
				$editNews->bindParam(':shortstory', $_POST['shortstory']);
				$editNews->bindParam(':topstory', $_POST['topstory']);
				$editNews->bindParam(':longstory', $_POST['longstory']);
				$editNews->bindParam(':id', $_POST['id']);
				$editNews->execute();
				Admin::succeed("".$lang["HkError9"]."");
			}
		}
		public static function searchUser()
		{
			global $dbh,$config,$lang;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed(''.$lang["HkError10"].' '.$_POST['user'].' '.$lang["HkError12"].', <a href ="'.$config['hotelUrl'].'/adminpan/gebruiker/'.$_POST['user'].'">'.$lang["HkError13"].'</a> '.$lang["HkError14"].'');
				}
				else
				{
					Admin::error("".$lang["HkError10"]." ".$_POST['user']." ".$lang["HkError11"]."");
				}
			}
		}
		public static function searchRank()
		{
			global $dbh,$config,$lang;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed(''.$lang["HkError10"].' '.$_POST['user'].' '.$lang["HkError12"].', <a href ="'.$config['hotelUrl'].'/adminpan/gebrank/'.$_POST['user'].'">'.$lang["HkError13"].'</a> '.$lang["HkError14"].'');
				}
				else
				{
					Admin::error("".$lang["HkError10"]." ".$_POST['user']." ".$lang["HkError11"]."");
				}
			}
		}
	
		public static function searchUserOfTheWeek()
		{
			global $dbh,$config,$lang;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed(''.$lang["HkError10"].' '.$_POST['user'].' '.$lang["HkError12"].', <a href ="'.$config['hotelUrl'].'/adminpan/giveuseroftheweek/'.$_POST['user'].'">'.$lang["HkError13"].'</a> '.$lang["HkError14"].' '.$config['hotelName'].' ');
				}
				else
				{
					Admin::error("".$lang["HkError10"]." ".$_POST['user']." ".$lang["HkError11"]."");
				}
			}
		}
		public static function EditUser($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['user'])) {
				$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
				$getUser->bindParam(':username', $_GET['user']);
				$getUser->execute();
				if ($getUser->RowCount() == 1) 
				{
					$user = $getUser->fetch();
					return filter($user[$variable]);
				} 
				else 
				{
					Admin::error("".$lang["HkError10"] ." ".$lang["HkError11"].""); exit;
				}
			}
		}
		public static function EditUserOfTheWeek($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['user'])) {
				$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
				$getUser->bindParam(':username', $_GET['user']);
				$getUser->execute();
				if ($getUser->RowCount() == 1) 
				{
					$user = $getUser->fetch();
					return filter($user[$variable]);
				} 
				else 
				{
					Admin::error("".$lang["HkError10"] ." ".$lang["HkError11"].""); exit;
				}
			}
		}
		public static function EditNews($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['news'])) 
			{
				$getNews = $dbh->prepare("SELECT * FROM cms_news WHERE id=:newsid LIMIT 1");
				$getNews->bindParam(':newsid', $_GET['news']);
				$getNews->execute();
				if ($getNews->RowCount() == 1) 
				{
					$news = $getNews->fetch();
					return $news[$variable];
				} 
				else 
				{
					Admin::error("".$lang["HkError17"].""); exit;
				}
			}
		}
		public static function DeleteNews()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteNews = $dbh->prepare("DELETE FROM cms_news WHERE id=:newsid");
				$deleteNews->bindParam(':newsid', $_GET['delete']);
				$deleteNews->execute();
				Admin::succeed(''.$lang["HkError18"].'');
			}
		}
		public static function DeleteBans()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM bans WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::succeed(''.$lang["HkError19"].'');
			}
		}
		public static function DeleteReport()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM cms_report WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::succeed(''.$lang["HkError20"].'');
			}
		}
		public static function DelectBadge()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM cms_badges WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::succeed(''.$lang["HkError21"].'');
			}
		}
		public static function PostNews()
		{
			global $dbh, $lang;
			if (isset($_POST['postnews']))
			{
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['news'] = $_POST['news'];
				if (!empty($_POST['title']))
				{
					if (!empty($_POST['news']))
					{
						$postNews = $dbh->prepare("
						INSERT INTO cms_news(title,image,shortstory,longstory,author,date,type,roomid,updated)
						VALUES
						(
						:title,
						:topstory, 
						:slogan,
						:news,
						:id,
						'" . time() . "',
						'1',
						'1',
						'1'
						)");
						$postNews->bindParam(':title', $_POST['title']);
						$postNews->bindParam(':slogan', $_POST['slogan']);
						$postNews->bindParam(':topstory', $_POST['topstory']);
						$postNews->bindParam(':news', $_POST['news']);
						$postNews->bindParam(':id', $_SESSION['id']);
						$postNews->execute();
						$_SESSION['title'] = '';
						$_SESSION['kort'] = '';
						$_SESSION['news'] ='';
						Admin::succeed("".$lang["HkError22"]."");
					}
					else
					{
						Admin::error("".$lang["HkError23"]."");
						return;
					}
				}
				else
				{
					Admin::error("".$lang["HkError24"]."");
					return;
				}
			}
			else
			{
			}
		}
	}
?>							