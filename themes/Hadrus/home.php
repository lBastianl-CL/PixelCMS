	<title><?= userHome('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/desple.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/home.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>

<?php include_once("includes/header.php"); ?>

<?php include_once("includes/subheader-me.php"); ?>

<div id="content">
    <div class="container">
<div id="profil54">
      <div id="profil55">
				<?php
					$userId = userHome('id');
					$stmt = $dbh->prepare("SELECT * FROM users_badges WHERE (user_id = :userid) AND (slot_id = 1) LIMIT 4");
					$stmt->bindParam(':userid', $userId);
					$stmt->execute();
					if (!$stmt->RowCount() == 0)
					{
						while($badge = $stmt->fetch())
						{
							echo'
                  <div id="profil56">
            <img class="" draggable="false" oncontextmenu="return false" src="'.$config['badgeURL'].''.filter($badge["badge_code"]).'.GIF" style="">
         </div>
							';
						}
					}

					
					
				?>
               </div>
      <div id="profil57">
         <img class="" draggable="false" oncontextmenu="return false" src="<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= userHome('look'); ?>&amp;size=l" style="">
      </div>
      <div id="profil58">
         <h1><?= userHome('username'); ?></h1>
      </div>
      <div id="profil59">
         <div id="motto">
            <h4><?= userHome('motto'); ?></h4>
         </div>
      </div>
      <div id="profil60"></div>
      <div id="profil61">
        <?php echo date("d-m-y, H:i", userHome('last_online')); ?>
      </div>
      <div id="profil62">
	  
	  				<?php
					$userId = userHome('id');
					$stmt = $dbh->prepare("SELECT * FROM users_settings WHERE user_id = :userid");
					$stmt->bindParam(':userid', $userId);
					$stmt->execute();
					if (!$stmt->RowCount() == 0)
					{
						while($badge = $stmt->fetch())
						{
							echo $badge["achievement_score"];
						}
					}
					else
					{
						echo '0';
					}
				?> </div>
      <div id="profil63">
                  <div id="profil76" style="left:-35px;">
                                 </div>
               </div>
   </div>
      <div id="profil64">
      <div id="profil65" style="background:rgb(249,208,70);">
         <div id="profil68">
            <div id="profil71" style="color:rgb(155,121,4);"><?= userHome('credits'); ?></div>
         </div>
      </div>
      <div id="profil65" style="background:rgb(130,185,230);">
         <div id="profil69">
            <div id="profil71" style="color:rgb(33,105,165);"><?= userHome('vip_points'); ?></div>
         </div>
      </div>
      <div id="profil65" style="background:rgb(81,81,81);">
         <div id="profil70">
            <div id="profil71" style="font-size:120%;color:white;top:85px"><?php if(User::userData('rank')>1){echo $lang["eresvip"] ;} else{ echo $lang["noeresvip"] ; }?> </div>
         </div>
      </div>
   </div>
    <div class="container">

<div id="profil72" style="margin-top: 115px;">
      <div id="profil73"></div>
      <div id="profil74">
                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Hsalasa"] ?> <?= userHome('username'); ?></h4>
                </div>      </div>
      <div id="profil75">
	  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM rooms WHERE owner_id=".userHome('id')." LIMIT 5");
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
   
<div id="profil80" style="margin-top: 115px;">
      <div id="profil81"></div>
      <div id="profil74">
                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Hgroupso"] ?> <?= userHome('username'); ?></h4>
                </div>      </div>
      <div id="profil75">
		  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM guilds WHERE user_id=".userHome('id')." LIMIT 5");
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
                    <h3 style="color: #fff;"><?= $lang["Hgroupso"] ?> <?= userHome('username'); ?></h3>
                </div>
                <div class="modal-body">

		  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM guilds WHERE user_id=".userHome('id'));
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
                    <h3 style="color: #fff;"><?= $lang["Hsalasa"] ?> <?= userHome('username'); ?></h3>
                </div>
                <div class="modal-body">

	  <?php
					$sqlidsala = $dbh->prepare("SELECT * FROM rooms WHERE owner_id=".userHome('id'));
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