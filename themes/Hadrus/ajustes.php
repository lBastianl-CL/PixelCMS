	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/desple.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>

<?php include_once("includes/header.php"); ?>

<?php include_once("includes/subheader-me.php"); ?>

<div id="content">
<style>
.error {
    width: 100%;
    height: 37px;
    border-radius: 5px;
    margin-top: -30px;
    line-height: 50px;
    position: relative;
    z-index: 1;
    text-align: center;
    font-family: 'Ubuntu', sans-serif;
    font-weight: 800;
    font-size: 16px;
    color: #FFF;
    background: #bb0707;
}
</style>
    <div class="container">
<div id="settings12" style=" background: #fff; padding: 20px; margin-top: 20px; border-radius: 5px; ">
   <div id="settings1"></div>
   <div id="settings2"><?= $lang["Shotelsettings"] ?></div>
   
     <form action="" method="POST">
					<?php User::editHotelSettings(); 
						$getUser = $dbh->prepare("SELECT * FROM users WHERE id = :id");
						$getUser->bindParam(':id', $_SESSION['id']);
						$getUser->execute();
						$stats = $getUser->fetch();
					?>
					
					
   <div id="settings3">
      <div id="settings4" style="background:rgb(50, 152, 49);">
         <div id="settings5"></div>
         <div id="settings6" style="color:#fff;"><?= $lang["Sallowfrends1"] ?></div>
      </div>
	  
      <div id="settings7" style="background:rgb(84, 183, 83);">
         <?= $lang["Sallowfrendssub1"]?>
         <div id="settings8" style="border-bottom:3px dashed rgb(50, 152, 49);"></div>
      </div>
	  
	  
<div id="settings9">
         <div class="settwait1" id="settings11">
		 
						<div id="rght"> <input type="radio" class="option-input radio" name="hinstellingenv" id="true" value="0" novalidate="" 	<?php if($stats['ignore_invites'] == 0 ){ echo "checked";}else {echo '';}?>> 
							<div class="<?php if($stats['ignore_invites'] == 0 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_true_1"> 
								<label for="true"> 
									<img src="<?php echo H. $config['skin']; ?>/assets/images/image_969.png"> 
								</label> 
							</div> <br>
								<div style=" margin-left: 80px; margin-top: -50px; ">
							<input type="radio" class="option-input radio" name="hinstellingenv" id="false" value="1" novalidate="" 	<?php if($stats['ignore_invites'] == 0 ){ echo "";}else {echo 'checked';}?>> 
							<div class="<?php if($stats['ignore_invites'] == 1 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_false_1"> 
								<label for="false"> 
									<img src="<?php echo H. $config['skin']; ?>/assets/images/image_969_1.png"> 
								</label> 
							</div> 
						</div> 							
				</div> 	
		 </div>
      </div>
         </div>
   <div id="settings3">
      <div id="settings4" style="background:#FF5722;">
         <div style="position:absolute;height:50px;width:40px;background:url(<?php echo H. $config['skin']; ?>/assets/images/pagesettings.png) -407px -50px;left:17px;top:17px;"></div>
         <div id="settings6" style="color:#fff;"><?= $lang["Sallowlook2"] ?></div>
      </div>
      <div id="settings7" style="background:rgb(253, 154, 122);">
         <?= $lang["Sallowlooksub2"] ?>
         <div id="settings8" style="border-bottom:3px dashed rgb(255, 87, 34);"></div>
      </div>
<div id="settings9">
         <div class="settwait1" id="settings11">
		 
		 
							<div id="rght"> 
								<input type="radio" class="option-input radio" name="hinstellingenl" id="true2" value="1" novalidate="" <?php if($stats['allow_mimic'] == 0 ){ echo "checked";}else {echo '';}?>> 
								<div class="<?php if($stats['allow_mimic'] == 1 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_true_2"> 
									<label for="true2"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/image_969.png"> 
									</label> 
								</div> <br>
								<div style=" margin-left: 80px; margin-top: -50px; ">
								<input type="radio" class="option-input radio" name="hinstellingenl" id="false2" value="0" novalidate="" <?php if($stats['allow_mimic'] == 0 ){ echo "";}else {echo 'checked';}?>> 
								<div class="<?php if($stats['allow_mimic'] == 0 ){ echo "burst_active";}else {echo 'burst';}?>" id="img_false_2"> 
									<label for="false2"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/image_969_1.png"> 
									</label> 
								</div> 
							</div> 
					</div> 	
		 
		 </div>
      </div>
         </div>
		 
   <div id="settings3">
      <div id="settings4" style="background:#2196F3;">
         <div style="position:absolute;height:45px;width:40px;background:url(<?php echo H. $config['skin']; ?>/assets/images/pagesettings.png) -360px -55px;left:17px;top:17px;"></div>
         <div id="settings6" style="color:white;"><?= $lang["Sallowonline3"] ?></div>
      </div>
      <div id="settings7" style="background:rgb(134,188,232);">
        <?= $lang["Sallowonlinesub"] ?>
         <div id="settings8" style="border-bottom:3px dashed rgb(37,126,199);"></div>
      </div>
<div id="settings9">
         <div class="settwait1" id="settings11">
		 
							<div id="rght"> 
								<input type="radio" class="option-input radio" name="hinstellingeno" id="true3" value="1" novalidate="" <?php if($stats['hide_online'] == 0 ){ echo "checked";}else {echo '';}?>> 
								<div class="<?php if($stats['hide_online'] == 0 ){ echo "burst";}else {echo 'burst_active';}?>" id="img_true_3"> 
									<label for="true3"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/image_969.png"> 
									</label> 
								</div> <br>
								<div style=" margin-left: 80px; margin-top: -50px; ">
								<input type="radio" class="option-input radio" name="hinstellingeno" id="false3" value="0" novalidate="" <?php if($stats['hide_online'] == 0 ){ echo "";}else {echo 'checked';}?>> 
								<div class="<?php if($stats['hide_online'] == 1 ){ echo "burst";}else {echo 'burst_active';}?>" id="img_false_3"> 
									<label for="false3"> 
										<img src="<?php echo H. $config['skin']; ?>/assets/images/image_969_1.png"> 
									</label> 
								</div> 
								</div> 
							</div>
		 
		 
		 </div>
      </div>
	  						<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="hotelsettings" style="margin-top: 10px;margin: 9px;float: right;background: #268025;border: 2px solid #2caf2b;border-radius: 6px;-webkit-border-radius: 6px;-moz-border-radius: 6px;-ms-border-radius: 6px;-o-border-radius: 6px;padding: 20px;display: block;font-family: 'Ubuntu', sans-serif;font-weight: 400;font-size: 16px;color: #fff;line-height: 0px;width: 290px;">
</form>
         </div>
   <div class="end"></div>
   <div id="settings18"><?= $lang["Sconfig"] ?></div>
   				<?php User::editPassword(); ?>
				<?php User::editEmail(); ?><br>
   <a href="href="#pass" data-slopt-pass><div id="settings13">
      <div id="settings14" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pagesettings.png) -182px 0px;"></div>
      <div id="settings15"><?= $lang["Sconfig1"]?></div>
   </div></a>
   <a href="href="#email" data-slopt-email>   <div id="settings13">
       <div class="nmail" id="settings45n"></div>
            <div id="settings14" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pagesettings.png) 0px 0px;"></div>
      <div id="settings15"><?= $lang["Sconfig2"]?></div>
   </div></a>
   <div class="end"></div>
   <div style="position:relative;width:100%;height:15px;"></div>
</div>
    </div>


	</div>
</div>

    <div class="modal fade pass" id="myPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: 680px; ">
                <div class="modal-header">
                    <span style="width: 70px;"><?= $lang["Scontra"] ?></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="hidden-xs-up">Close</span></button>
                </div>
                <div class="modal-title">
                    <h3 style="color: #fff;"><?= $lang["Schangepassword"] ?></h3>
                </div>
                <div class="modal-body">
				<form action="" method="POST" style="padding: 30px;">

					<b><?= $lang["Spasswordnow"] ?></b>
					<input  placeholder="*****************" type="password" name="oldpassword" value="" style="margin-bottom: 3px;width: 100%;"><br>
					<span style="font-size:12px;color:gray;"><?= $lang["Spasswordnowtext"] ?></span><br><br>
					<b><?= $lang["Snewpassword"] ?></b>
					<input  placeholder="*****************"  type="password" name="newpassword" value="" style="margin-bottom: 3px;width: 100%;"><br>
					<span style="font-size:12px;color:gray;"><?= $lang["Snewpasswordtext"] ?></span>
					<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="password" style="margin-top: 10px;margin: 9px;float: right;background: #268025;border: 2px solid #2caf2b;border-radius: 6px;-webkit-border-radius: 6px;-moz-border-radius: 6px;-ms-border-radius: 6px;-o-border-radius: 6px;padding: 20px;display: block;font-family: 'Ubuntu', sans-serif;font-weight: 400;font-size: 16px;color: #fff;line-height: 0px;" >
				</form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade email" id="myEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: 680px; ">
                <div class="modal-header">
                    <span style="width: 70px;"><?= $lang["Scontra"] ?></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="hidden-xs-up">Close</span></button>
                </div>
                <div class="modal-title">
                    <h3 style="color: #fff;"><?= $lang["Schangeemail"] ?></h3>
                </div>
                <div class="modal-body">
				<form action="" method="post" style="padding: 30px;">
					<b><?= $lang["Syouremail"] ?></b>
					<input type="text" name="email" value="<?= User::userData('mail') ?>" autocomplete="off" style="margin-bottom: 3px;width: 100%;">
					<span style="font-size:12px;color:gray;"><?= $lang["Syouremailtext"] ?></span>
					<input type="submit" class="submit" value="<?= $lang["Ssave"] ?>" name="account" style="margin-top: 10px;margin: 9px;float: right;background: #268025;border: 2px solid #2caf2b;border-radius: 6px;-webkit-border-radius: 6px;-moz-border-radius: 6px;-ms-border-radius: 6px;-o-border-radius: 6px;padding: 20px;display: block;font-family: 'Ubuntu', sans-serif;font-weight: 400;font-size: 16px;color: #fff;line-height: 0px;" >
				</form>
                </div>
            </div>
        </div>
    </div>
<?php include_once("includes/footer.php"); ?>
	    <script type="text/javascript">

        $( '[data-slopt-pass]' ).on( 'click', function()
        {
            $( '#myPass' ).modal( 'show' );

            return false;
        });

    </script>
	    <script type="text/javascript">

        $( '[data-slopt-email]' ).on( 'click', function()
        {
            $( '#myEmail' ).modal( 'show' );

            return false;
        });

    </script>
</body>
</html>