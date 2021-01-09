<?php
	if(!defined('SLOPT_CMS')) 
	{ 
		die('Lo sentimos, pero no puede acceder a este archivo!'); 
	}
	function wordFilter($message)
	{
		global $dbh,$config;
		if ($config['newsCommandFilter'] == true)
		{
			$getCharacterFilter = $dbh->prepare("SELECT * FROM wordfilter_characters");
			$getCharacterFilter->execute();
			while($filtergetCharacter = $getCharacterFilter->fetch())
			{
				$message = str_ireplace($filtergetCharacter['character'], $filtergetCharacter['replacement'], $message);
				$getwordFilter = $dbh->prepare("SELECT * FROM wordfilter");
				$getwordFilter->execute();
				while($getFilter = $getwordFilter->fetch())
				{
					$message = str_ireplace($getFilter['word'], $getFilter['replacement'], $message);
				}
			}
			return $message;
		}
		else
		{
			return $message;
		}
	}
?>