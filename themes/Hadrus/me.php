	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/desple.css?<?= $config['css'] ?>?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>

<?php include_once("includes/header.php"); ?>

<?php include_once("includes/subheader-me.php"); ?>

<div id="content">
    <div class="container">

<div class="monhabbo">
   <div id="profil27" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/house18_background_left.png); background-position: bottom left; background-repeat: no-repeat;" >
      <div id="profil28"></div>
      <div id="profil29">
         <img draggable="false" oncontextmenu="return false" id="contourblanc" width="160" src="<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= User::userData('look') ?>&amp;action=std,crr=667&amp;gesture=sml&amp;direction=2&amp;head_direction=2&amp;size=l&amp;img_format=png">
      </div>
      <div id="profil30"><?= $lang["hey"] ?>,
         <?= User::userData('username') ?>       </div>
      <div id="profil31">
         <p id="motto"></p>
      </div>
   </div>
   <a href="/client">
      <div id="monhabbohotel" class="">
         <div id="profil32"></div>
         <div id="profil33">
            <center>
               <?= $lang["Menter"]; ?>
            </center>
         </div>
      </div>
   </a>
   <div id="profil34" style="background:rgb(244,210,76);">
      <div id="profil35" style="background:rgb(241,200,33);">
         <div id="profil36" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -760px -91px;"></div>
      </div>
      <div id="profil37" >
        <?= User::userData('credits') ?> 
      </div>
   </div>
   <div id="profil34" style="background:#db1f51;">
      <div id="profil35" style="background:#db426b;">
         <div id="profil36" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -810px -91px;top:16px;"></div>
      </div>
      <div id="profil37" style="color:#822274;">
         <?= User::userData('activity_points') ?>
      </div>
   </div>
   <div id="profil34" style="background:rgb(112,174,226);">
      <div id="profil35" style="background:rgb(70,152,219);">
         <div id="profil36" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -760px -142px;"></div>
      </div>
      <div id="profil37" style="color:rgb(33,104,163);">
         <?= User::userData('vip_points') ?>  
      </div>
   </div>
   <div id="profil34" style="background:rgb(68,68,68);margin-right:0px;">
      <div id="profil35" style="background:rgb(41,41,41);">
         <div id="profil36" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -811px -142px;"></div>
      </div>
      <div id="profil37" style="color:white;width:60%;">
                  <p><?php if(User::userData('rank')>1){echo $lang["eresvip"] ;} else{ echo $lang["noeresvip"] ; }?> </p>
               </div>
   </div>
</div>
<HR width="80%">
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
   </div>

<div id="profil72">
      <div id="profil73"></div>
      <div id="profil74">
                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Tusalas"] ?></h4>
                </div>      </div>
      <div id="profil75">
	  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM rooms WHERE owner_id=".User::userData('id')." LIMIT 5");
					$sqlidsala->execute();
					while ($getUsersDev = $sqlidsala->fetch())
					{
					?>	
							  <div id="profil76">
						<div id="profil77"></div>
						<div id="profil78">
						   <center>
							  <p><strong><?= filter($getUsersDev['name']) ?></strong></p>
						   </center>
						</div>
					 </div>
		 <?php
					}
					?>
               </div>
      <a href="href="#forgot-rooms" data-slopt-rooms >
	  <div id="profil79">
         <?= $lang["todoslasala"] ?>
      </div></a>
   </div>
   
<div id="profil80">
      <div id="profil81"></div>
      <div id="profil74">
                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Tusgrupos"] ?></h4>
                </div>      </div>
      <div id="profil75">
		  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM guilds WHERE user_id=".User::userData('id')." LIMIT 5");
					$sqlidsala->execute();
					while ($getUsersDev = $sqlidsala->fetch())
					{
					?>	  
<div id="profil76">
            <div id="profil82">
               <img class="" draggable="false" oncontextmenu="return false" src="<?= $config['groupBadgeURL'] ?><?= filter($getUsersDev['badge']) ?>.png" style="">
            </div>
            <div id="profil78">
               <center>
                  <p><strong><?= filter($getUsersDev['name']) ?></strong></p>
               </center>
            </div>
         </div>
		 <?php
					}
					?>	  
               </div>
      <a href="href="#forgot-groups" data-slopt-groups >
	  <div id="profil79">
	  
        <?= $lang["todolosgrupo"] ?>
      </div></a>
   </div>
	</div>
</div><br><br>
<?php include_once("includes/footer.php"); ?>

    <div class="modal fade forgot-groups" id="myGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: 680px; ">
                <div class="modal-header">
                    <span style="width: 70px;"><?= $lang["groupsme"] ?></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="hidden-xs-up">Close</span></button>
                </div>
                <div class="modal-title">
                    <h3 style="color: #fff;"><?= $lang["Tusgrupos"] ?></h3>
                </div>
                <div class="modal-body">

		  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM guilds WHERE user_id=".User::userData('id'));
					$sqlidsala->execute();
					while ($getUsersDev = $sqlidsala->fetch())
					{
					?>	  
<div id="profil76">
            <div id="profil82">
               <img class="" draggable="false" oncontextmenu="return false" src="<?= $config['groupBadgeURL'] ?><?= filter($getUsersDev['badge']) ?>.png" style="">
            </div>
            <div id="profil78">
               <center>
                  <p><strong><?= filter($getUsersDev['name']) ?></strong></p>
               </center>
            </div>
         </div>
		 <?php
					}
					?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade forgot-rooms" id="myRooms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: 680px; ">
                <div class="modal-header">
                    <span style="width: 70px;"><?=$lang["roomsme"] ?></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="hidden-xs-up">Close</span></button>
                </div>
                <div class="modal-title">
                    <h3 style="color: #fff;"><?= $lang["Tusalas"] ?></h3>
                </div>
                <div class="modal-body">

	  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM rooms WHERE owner_id=".User::userData('id'));
					$sqlidsala->execute();
					while ($getUsersDev = $sqlidsala->fetch())
					{
					?>	
							  <div id="profil76">
						<div id="profil77"></div>
						<div id="profil78">
						   <center>
							  <p><strong><?= filter($getUsersDev['name']) ?></strong></p>
						   </center>
						</div>
					 </div>
		 <?php
					}
					?>
                </div>
            </div>
        </div>
    </div>
	
	    <script type="text/javascript">

        $( '[data-slopt-groups]' ).on( 'click', function()
        {
            $( '#myGroup' ).modal( 'show' );

            return false;
        });

    </script>
    <script type="text/javascript">

        $( '[data-slopt-rooms]' ).on( 'click', function()
        {
            $( '#myRooms' ).modal( 'show' );

            return false;
        });

    </script>

</body>
</html>
