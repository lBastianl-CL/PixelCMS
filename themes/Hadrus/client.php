<?php
	if($hotel['StaffCheckHkClient'] == true)
	{
		if(User::userData('rank') >= $hotel['StaffCheckHkClientMinRank'])
		{
			if(User::userData('slopt_pin') == 0)
			{
				header('Location: /newpin');
				exit;
			}
		}
	}
	if($config['hotelEmu']!="arcturus")
	{
		if(User::userData('slopt_hc') == 0)
		{
			$slopthc = $dbh->prepare("INSERT INTO user_subscriptions (user_id, subscription_id, timestamp_activated, timestamp_expire) VALUES (".User::userData('id').", 'habbo_vip', '1566416817', '3574452017')");
			$slopthc->execute();
			$slopthc1 = $dbh->prepare("UPDATE users SET slopt_hc=1 WHERE id=".User::userData('id'));
			$slopthc1->execute();
		}
	}
	staffCheck();
	Game::sso('client');	
	// Game::homeRoom();	

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?= $config['hotelName'] ?> - <?= $lang["ClientTitulo"]?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/phaser@3.24.1/dist/phaser.min.js"></script>

    <script>window.authTicket = "<?= User::userData('auth_ticket') ?>"; </script>
    
    <link rel="stylesheet" href="/themes/client/assets/styles/loader.css">
    <link rel="stylesheet" href="/themes/client/assets/styles/hotel_view.css">
    <link rel="stylesheet" href="/themes/client/assets/styles/interface.css">
    
    <script src="/themes/client/src/pixel.js" type="module"></script>
    </head>

    <body>
    </body>

</html>