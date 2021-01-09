<title><?= $config['hotelName'] ?>: <?= $lang["Nnews"] ?></title>
	    <link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/style.css?45">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/main2.css?43" type="text/css">
		<link rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/home.css?245" type="text/css">


  
</head>
<body>


 	<?php
	include_once 'includes/header_me.php';
	?>


<br><br>
<div class="center">
	<div style="margin-left: 0px;" class="columright">
		<div style = "" class="box">
			<div class="title">
				<?=  $lang["Nnews"] ?>
			</div>
			<div class="mainBox" style="float;left">
				<?php
					for ($i = 0; $i < 6; $i++)
					{
						$sectionName = "";
						$sectionCutoffMax = 0;
						$sectionCutoffMin = 0;
						switch ($i)
						{
							case 0:
							$sectionName = ''.$lang["Ntoday"].'';
							$sectionCutoffMax = time();
							$sectionCutoffMin = time() - 86400;
							break;
							case 1:
							$sectionName = ''.$lang["Nyesterday"].'';
							$sectionCutoffMax = time() - 86400;
							$sectionCutoffMin = time() - 172800;
							break;
							case 2:
							$sectionName = ''.$lang["Nthisweek"].'';
							$sectionCutoffMax = time() - 172800;
							$sectionCutoffMin = time() - 604800;
							break;
							case 3:
							$sectionName = ''.$lang["Nlastweek"].'';
							$sectionCutoffMax = time() - 604800;
							$sectionCutoffMin = time() - 1209600;
							break;
							case 4:
							$sectionName = ''.$lang["Nthismonth"].'';
							$sectionCutoffMax = time() - 1209600;
							$sectionCutoffMin = time() - 2592000;
							break;
							case 5:
							$sectionName = ''.$lang["Nlastmonth"].'';
							$sectionCutoffMax = time() - 2592000;
							$sectionCutoffMin = time() - 5184000;
							break;
						}
						$getArticles = $dbh->prepare("SELECT id,date,title FROM cms_news WHERE date >= :sectionCutoffMin AND date <= :sectionCutoffMax ORDER BY date DESC");
						$getArticles->bindParam(':sectionCutoffMin', $sectionCutoffMin);
						$getArticles->bindParam(':sectionCutoffMax', $sectionCutoffMax);
						$getArticles->execute();
						if ($getArticles->RowCount() > 0)
						{
							echo '
							<h2 style="font-size: 100%;color: #348396;">' . filter($sectionName) . '</h2>
							';
							while ($a = $getArticles->fetch())
							{
								echo '<a href="/news/' . filter($a['id']) . '" class="llink active" style="color: #000 !important;">' . filter($a['title']) . '&nbsp;&raquo;</a><br>';
							}
						}
					}
				?>
			</div>
		</div>
		<style>
			.buttonlike {
			background: #1d0fda !important;
			}
		</style>
		<div class='box'>
			<div class='title green'><?= $lang["NlikeTitle"] ?></div>
			<div class='mainBox'>
				<br><br><br><br><center><?= newsLike() ?>
				<b style="font-size:15px; "><?= newsLikeCount() ?> <?= $lang["Nuserslikenews"] ?></b> <img style="float:right;" src="<?php echo H. $config['skin']; ?>/assets/images/account/image_969.png">
				</center><form method="post">
					<input type="submit" class="buttonlike" value="<?= $lang["Nuserslikenewsbutton"] ?>" name="likenews" style="margin-top: 10px;">
				</form>
			</div>
		</div>
	</div>
	<div style="margin-left: 10px;" class="columleft">
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
						echo'<div class="box">
						<div class="title">
						'.filter($news2["title"]).'
						</div>
						<div class="mainBox newsBox" style="float;left">
						<div class="boxHeader"></div>
						'.html_entity_decode($news2['longstory']).'
						</div>
						</div>';
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
			height: 100px;
			float: left;
			box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.09),0 1px 2px rgba(0, 0, 0, 0.43);
			margin-bottom: 10px;
			border-radius: 3px;
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
			width: 83%;
			height: 49px;
			overflow: auto;
			}
			textarea {
			width: 100%;
			height: 100px;
			padding: 12px 20px;
			box-sizing: border-box;
			border: 1px solid #ccc;
			border-radius: 3px;
			background-color: #f8f8f8;
			resize: none;
			}
		</style>
		<div class='box'>
			<div class='title blue'><?= $lang["Nnewscommands"] ?></div>
			<div class='mainBox'>
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
							echo'<div class="mainnewscolumn">
							<div id="newscolumn" style="border: 2px dotted rgba(0, 0, 0, 0.2);padding: 10px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:55px;width: 55px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='.filter($user["look"]).'&amp;head_direction=3&amp;action=wav) no-repeat;background-position: 50% 10%;"></div>
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
						echo $lang["Nnocommands"];
					}
				?>
			</div>
		</div>

		<div class='box'>
			<div class='title'><?= $lang["Npostcommand"] ?></div>
			<div class='mainBox'>
				<?= newsComment() ?>
				<form method="post">
					<textarea name="message"></textarea>
					<input type="submit" class="button" value="<?= $lang["Ncommandbutton"] ?>" name="newscomment" style="margin-top: 10px;">
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
</html>