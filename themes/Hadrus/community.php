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

		
            <div class="news-articles habbo-box">
				<?php
					$sql = $dbh->prepare("SELECT id,title,image,shortstory FROM cms_news ORDER BY id DESC LIMIT 1");
					$sql->execute();
					while ($news = $sql->fetch())
					{
						echo'
                <div class="article-main" style="background-image: url( '.filter($news["image"]).');">
					<h3>'.filter($news["title"]).'</h3>

                    <p>'.filter($news["shortstory"]).'</p>

                    <a href="/news/'.filter($news["id"]).'">'.$lang["Mreadmore"].'</a>

						</div>';
					}
				?>
                <div class="sub-articles">
<?php
						$getArticles = $dbh->prepare("SELECT id,date,title,shortstory FROM cms_news ORDER BY date DESC LIMIT 2");
						$getArticles->execute();
						$contararticles = $dbh->prepare("SELECT id,date,title,shortstory FROM cms_news");
						$contararticles->execute();
						$contar = $contararticles->fetch();
						if ($getArticles->RowCount() > 0)
						{
							while ($a = $getArticles->fetch())
							{
							echo '
							                        <div class="sub-article">

                            <p>
                                <a href="/news/' . filter($a['id']) . '">' . filter($a['title']) . '&nbsp;&raquo;</a>
                                <span>' . filter($a['shortstory']) . '&nbsp;&raquo;</span>
                            </p>

							</div>
							';
							}
						}
					if($contar['id']<=0)
					{
						echo'
                <div class="article-main" style="background-image: url('.$config['hotelUrl'].'/adminpan/img/newsimages/22.png);">
					<h3>'.$lang["Islogan1"].'</h3>

                    <p>'.$lang["Itext2"].'</p>


						</div>		
							  <div class="sub-article">
                            <p>
                                <a href="#">'.$lang["Islogan1"].'</a>
                                <span>'.$lang["Itext3header"].'&nbsp;&raquo;</span>
                            </p>

							</div>';
					}	
				?>
                    
                </div>

            </div>
			            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Smostdia"] ?></h4>
                </div>
	<?php 
								if ($config['hotelEmu'] == 'arcturus')
								{
									$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type > 0 ORDER BY `amount` DESC  LIMIT 2");
									$belcr_get2->execute();
									while ($belcr_row2 = $belcr_get2->fetch())
									{   
										$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
										$belcr_get->bindParam(':id', $belcr_row2['user_id']);
										
										
											$belcr_get->execute();
										
										$belcr_row = $belcr_get->fetch();
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 300px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=2&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>" class="tooltip">
										<div style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -760px -142px;height: 50px; width: 50px; position: absolute; margin-left: 240px; margin-top: -40px;" ></div>
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row2['amount']) ?></b> <?= $lang["Sdiamond"] ?>
									</div>
									<?php
									}
								}
								else
								{
									$belcr_get = $dbh->prepare("SELECT id,vip_points,username,look from users WHERE rank < 2 ORDER BY `vip_points` DESC  LIMIT 2");
									$belcr_get->execute();
									while ($belcr_row = $belcr_get->fetch())
									{
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 300px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=2&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>"> 
										<div style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -760px -142px;height: 50px; width: 50px; position: absolute; margin-left: 240px; margin-top: -40px;" ></div>
										
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row['vip_points']) ?></b> <?= $lang["Sdiamond"] ?>
									</div>
									<?php
									}
								}
							?>
            </div>
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Smostduck"] ?></h4>
                </div>
				<?php 
								if ($config['hotelEmu'] == 'arcturus')
								{
									$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type > 0 ORDER BY `amount` DESC  LIMIT 2");
									$belcr_get2->execute();
									while ($belcr_row2 = $belcr_get2->fetch())
									{
										$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
										$belcr_get->bindParam(':id', $belcr_row2['user_id']);
										$belcr_get->execute();
										$belcr_row = $belcr_get->fetch();
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 300px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=2&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>"> 
										<div style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -760px -142px;height: 50px; width: 50px; position: absolute; margin-left: 240px; margin-top: -40px;" ></div>
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row2['amount']) ?></b> <?= $lang["Sduckets"] ?>
									</div>
									<?php
									}
								}
								else
								{
									$belcr_get = $dbh->prepare("SELECT id,activity_points,username,look from users WHERE rank < 2 ORDER BY `activity_points` DESC  LIMIT 2");
									$belcr_get->execute();
									while ($belcr_row = $belcr_get->fetch())
									{
									?>
									<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 300px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=2&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
										<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
										<a href="/home/<?= filter($belcr_row['username']) ?>">
										<div style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -810px -91px;height: 50px; width: 50px; position: absolute; margin-left: 240px; margin-top: -40px;" ></div>
										</a>
										<br> <b style="font-size: 12px;"><?= filter($belcr_row['activity_points']) ?></b> <?= $lang["Sduckets"] ?>
									</div>
									<?php
									}
								}
							?>
            </div>
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Smostcred"] ?></h4>
                </div>
	<?php 
										$belcr_get = $dbh->prepare("SELECT id,credits,username,look from users WHERE rank < 2 ORDER BY `credits` DESC  LIMIT 2");
										$belcr_get->execute();
										while ($belcr_row = $belcr_get->fetch())
										{
										?>
										<div style="pointer;float: left;padding-top: 20px;border-radius: 5px;width: 300px;margin-bottom: 10px;margin-left: 5px;background: #f3f3f3;margin-right: 5px;line-height: 30px;">
											<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&head_direction=2&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
											<b  style="font-size: 16px;"><?= filter($belcr_row['username']) ?> </b> 
											<a href="/home/<?= filter($belcr_row['username']) ?>"> 
											<div style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -760px -91px;height: 50px; width: 50px; position: absolute; margin-left: 240px; margin-top: -40px;" ></div>

											</a>
											<br> <b style="font-size: 12px;"><?= filter($belcr_row['credits']) ?></b> <?= $lang["Scredits"] ?>
										</div>
										<?php
										}
									?>
            </div>
				</div>
        <div class="col-xs-5">
		
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
						<a href="/home/<?= filter($getUsersDev['username']) ?>" style="color: #fff;"><div class="userNew" style="background: url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($getUsersDev['look']) ?>&direction=3&head_direction=2&headonly=0&size=l);background-position: -5px -40px;width: 130px;float: left;background-repeat: no-repeat;height: 102px;"></div>
							<div class="userNewName" style="width: 129px;margin-top: -25px;background-color: #171717d9;">
							<?= filter($getUsersDev['username']) ?></a>
						</div>
					</div>
					<?php
					}
				?>
            </div>
		</div>
		
<div class="habbo-box content">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=776490619194494';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Mfb"] ?></h4>
                </div>
					<div class="boxHeader" style="margin-left: 10px;">
					<div class="fb-page" data-href="<?php echo $config['linkfb']; ?>" data-tabs="timeline" data-width="400" data-height="350" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"></div>
					</div>
					<div class="boxHeader" style=" padding: 5px; "><br>
					</div>

        </div>



    </div>


	</div>

<?php include_once("includes/footer.php"); ?>

</body>
</html>