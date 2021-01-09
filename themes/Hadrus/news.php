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
.errorSucces {
    background: #222;
    color: #fff;
    padding: 10px 30px;
    margin-bottom: 20px;
}
</style>
    <div class="container">

        <div class="col-xs-7 no-padding-left">

		
		<?php
			if (empty($_GET['id']))
			{
			?>
			<div class='box'>
				<div class='title'><?= $lang["Nnotfoundheader"] ?></div>
				<div class='mainBox'>
					<?= $lang["Nnotfoundtxt"] ?>
				</div>
			</div>
			<?php
			}
			else
			{
				if (!is_numeric($_GET['id']))
				{
					exit('Shut up!');
				}
				$news = $dbh->prepare("SELECT id,title,longstory FROM cms_news WHERE id = :newsid");
				$news->bindParam(':newsid', $_GET['id']);
				$news->execute();
				if ($news->RowCount() == 1)
				{
					while ($news2 = $news->fetch())
					{
						echo'
            <div class="habbo-box content">
			    <div class="habbo-box-header title-blue">
                    <h4>'.filter($news2["title"]).'</h4>
                </div>
				'.html_entity_decode($news2['longstory']).'</div>
				';
					}
				}
				else
				{
				?>
				<div class='box'>
					<div class='title'><?= $lang["Nnotfoundheader"] ?></div>
					<div class='mainBox'>
						<?= $lang["Nnotfoundtxt"] ?>
					</div>
				</div>
				<?php
				}
			}
		?>
		<style>
			.mainnewscolumn{
			width: 100%;
			float: left;
			box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.09),0 1px 2px rgba(0, 0, 0, 0.43);
			margin-bottom: 10px;
			border-radius: 3px;
			}
			.button{
			margin-top: 10px;
			margin: 9px;
			float: right;
			background: #268025;
			border: 2px solid #2caf2b;
			border-radius: 6px;
			-webkit-border-radius: 6px;
			-moz-border-radius: 6px;
			-ms-border-radius: 6px;
			-o-border-radius: 6px;
			padding: 20px 10px 20px;
			display: block;
			font-family: 'Ubuntu', sans-serif;
			font-weight: 400;
			font-size: 16px;
			color: #fff;
			line-height: 0px;
		}
			.newscolumnname{
			float: left;
			margin-top: 9px;
			margin-left: -5px;
			font-weight: bold;
			font-size: 14px;
			width: 65%;
			}
			.newscolumndate{
			float: right;
			margin-top: 9px;
			padding-right: 10px;
			}
			.newscolumndelete{
			float: right;
			margin-top: 6px;
			padding-right: 3px;
			}
			.newscolumnmessage{
			float: left;
			margin-top: 14px;
			font-size: 14px;
			height: 49px;
			overflow: auto;
			}
			textarea {
				width: 95%;
				margin-left: 10px;
				height: 100px;
				padding: 12px 20px;
				box-sizing: border-box;
				border: none;
				margin-top: 10px;
				border-radius: 3px;
				background-color: #f8f8f8;
				resize: none;
			}
			.habbo-box p {
				width: 95%;
				margin: 10px auto;
				font-family: 'Ubuntu', sans-serif;
				font-weight: 400;
				font-size: 15px;
			}
		</style>
            <div class="habbo-box content">
			    <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Nnewscommands"] ?></h4>
                </div>
				<?= deleteCommand() ?>
				<?php
					$getMessage = $dbh->prepare("SELECT id,userid,newsid,date,message,hash FROM cms_news_message WHERE newsid = :id");
					$getMessage->bindParam(':id', $_GET['id']);
					$getMessage->execute();
					if ($getMessage->RowCount() > 0)
					{
						while ($getMessageData = $getMessage->fetch())
						{
							$getMessageUser = $dbh->prepare("SELECT id,username,look FROM users WHERE id = :id");
							$getMessageUser->bindParam(':id', $getMessageData['userid']);
							$getMessageUser->execute();
							$user = $getMessageUser->fetch();
							echo'
							
							
							
							<div class="mainnewscolumn">
							<div id="newscolumn" style="border: 2px dotted rgba(0, 0, 0, 0.2);padding: 10px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:105px;width: 105px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='.filter($user["look"]).'&amp;head_direction=3&size=l&amp;action=wav) no-repeat;background-position: 50% 30%;"></div>
							<div class="newscolumnname">
							'.filter($user["username"]).'
							</div>';
							if ($getMessageData['userid'] == User::userData('id') || User::userData('rank') >= 3)
							{
								echo'
								<div class="newscolumndelete">
								<form method="post">
								<button name="deletecommand" type="submit" style="border: 0; background: transparent">
								<img src="'.H. $config['skin'].'/assets/images/icons/trash.png" width="16" height="16" alt="delete" />
								<input type="hidden" name="hashid" value="'.filter($getMessageData['hash']).'">
								</button>
								</form>
								</div>
								';
							}
							echo '
							<div class="newscolumndate">
							'.filter(gmdate("d-m-y", $getMessageData["date"])).'
							</div>
							<div class="newscolumnmessage">
							'.filter(html_entity_decode($getMessageData["message"])).'
							</div>
							</div>';
						}
					}
					else{
						echo '<br><center>'.$lang["Nnocommands"].'<br><br>';
					}
				?>
			</div>
            <div class="habbo-box content">
			    <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Nnewscommands"] ?></h4>
                </div>
				<br><?= newsComment() ?>
				<form method="post">
					<textarea name="message"></textarea>
					<input type="submit" class="button" value="<?= $lang["Ncommandbutton"] ?>" name="newscomment" style="margin-top: 10px;">
				</form>
			</div>
		</div>
				
        <div class="col-xs-5">
		
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["NlikeTitle"] ?></h4>
                </div><div style="padding: 5px;">
				<br><?= newsLike() ?>
				<b style="font-size:15px;margin-left: 90px;font-weight: 400;"><?= newsLikeCount() ?> <?= $lang["Nuserslikenews"] ?></b> 
				<img style="float:right;margin-right: 80px;" src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969.png"><br>
				<form method="post">
					<input type="submit" class="button" value="<?= $lang["Nuserslikenewsbutton"] ?>" name="likenews" style="margin-top: 20px;width: 200px;"><br><br>
				</form>
				</center></div>
			</div>
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Muotw"] ?></h4>
                </div><div style="padding: 5px;"></div>
				<?= userOfTheWeek() ?><div style="padding: 15px;"></div>
			</div>
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Mnewinhabbo"] ?></h4>
                </div>
				<div style=" margin-left: 50px; ">
<?php
					$sqlGetUsersByRankDev = $dbh->prepare("SELECT username,look FROM users ORDER BY ID DESC LIMIT 2");
					$sqlGetUsersByRankDev->execute();
					while ($getUsersDev = $sqlGetUsersByRankDev->fetch())
					{
					?>
	<div class="userNewBox" style="border-radius: 20%;width: 130px;height: 100px;">
						<a href="/home/<?= filter($getUsersDev['username']) ?>" style="color: #fff;"><div class="userNew" style="background: url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($getUsersDev['look']) ?>&direction=4&head_direction=4&headonly=0&size=l);background-position: -5px -40px;width: 130px;float: left;background-repeat: no-repeat;height: 89px;"></div>
							<div class="userNewName" style="width: 129px;margin-top: -10px;background-color: #222;">
							<?= filter($getUsersDev['username']) ?></a>
						</div>
					</div>
					<?php
					}
				?>
            </div>
		</div>

    </div>


	</div>

<?php include_once("includes/footer.php"); ?>

</body>
</html>