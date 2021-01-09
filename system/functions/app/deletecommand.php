<?php
	if(!defined('SLOPT_CMS')) 
	{ 
		die('Lo sentimos, pero no puede acceder a este archivo!'); 
	}
	function deleteCommand()
	{
		global $dbh,$lang;
		if (isset($_POST['deletecommand']))
		{
			$getCommandUserId = $dbh->prepare("SELECT userid FROM cms_news_message WHERE userid = :id");
			$getCommandUserId->bindParam(':id', $_SESSION['id']);
			$getCommandUserId->execute();
			$getCommandUserId2 = $getCommandUserId->fetch();
			if (User::userData('id') == $getCommandUserId2['userid'] ||  User::userData('rank') >= 3)
			{
				$deleteCommand = $dbh->prepare("DELETE FROM cms_news_message WHERE hash= :hash AND newsid = :newsid");
				$deleteCommand->bindParam(':hash', $_POST['hashid']);
				$deleteCommand->bindParam(':newsid', $_GET['id']);
				$deleteCommand->execute();
				return Html::errorSucces($lang["Coment1"]);
			}
			else
			{
				return Html::error($lang["Coment2"]);
			}
		}
	}
?>	