    <title><?= $config['hotelName'] ?> - <?php echo $lang["Rregister"] ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/avatargenerate.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/fonts.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>


<body>


<header style=" height: 50px; min-height: 130px; ">

    <div class="container">

        <a href="." class="brand" style=" margin: 0; "></a>


        <div class="col-xs-12 col-md-8 pull-md-right login-form">

        
        </div>
    </div>

</header>
<div id="content">

    
    <div class="container">

        <div class="col-xs-7 no-padding-left" style="background: #fff;padding: 5px 10px !important;margin-top: 20px;border-radius: 5px;background-image: url(<?php echo H. $config['skin']; ?>/assets/images/COMP-Scene-2-Forever-Alone.png);background-position: 200px;">
                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Rregister"] ?></h4>
                </div>
									<?php User::Register(); ?>

		<div style="padding: 30px;">
        <h2 style=" color: #2268a0; "><?php echo $lang['Rdatos']; ?></h2>
        <p><?php echo $lang['Rdatos1']; ?></p>


    <div class="col-md-4 no-padding" >

        <form method="POST">

            <div class="col-md-12 username-input">


                <fieldset class="form-group">
                    <label for="usuario" class="text-error"></label>
                    <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['Ruser']; ?>" style=" width: 60%; ">
                </fieldset>
				
                <fieldset class="form-group">
                    <label for="mision" class="text-error"></label>
                    <input type="text" class="form-control" name="motto" placeholder="<?= $config['startMotto'] ?>" style=" width: 60%; ">
                </fieldset>
            </div>          
        <h2 style=" color: #2268a0; "><?php echo $lang['Rusers']; ?></h2>
        <p><?php echo $lang['Rusers2']; ?></p>

			<div class="col-md-12 username-input">


                <fieldset class="form-group">
                    <label for="password" class="text-error"></label>
                    <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['Rpassword']; ?>" style=" width: 60%; ">
                </fieldset>

                <fieldset class="form-group">
                    <label for="habboPassword" class="text-error"></label>
                    <input type="password" class="form-control" name="password_repeat" placeholder="<?php echo $lang['Rrepeatpassword']; ?>" style=" width: 60%; ">
                </fieldset>

                <fieldset class="form-group">
                    <label for="email" class="text-error"></label>
                    <input type="email" class="form-control" name="email" placeholder="<?php echo $lang['Remail']; ?>" style=" width: 60%; ">
                </fieldset>
			
				
            </div>

			<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
			
            <div class="col-md-4 no-padding">
                <a href="#register" data-slopt-register class="newbottonr" style="padding: 15px 10px;font-size: 15px;font-weight: 100;width: 200px">
                    <span class="font-weight-bold"><?php echo $lang["Rbutton"]?></span>
					</a>
			</div>
            <div class="col-md-4 no-padding">
                <a href="/" class="newbotton" style="margin-left: 20px;padding: 16px 17px;font-size: 15px;font-weight: 100;width: 200px">
                    <span class="font-weight-bold"><?php echo $lang["Rlogin"]?></span>

			   </a><br><br>
            </div>

			
</div>



	

    </div>
    </div>
	
						<div class="col-xs-5" style=" top: -20px; ">

							<div class="habbo-box content">
								<div class="habbo-box-header title-blue">
									<h4><?= $lang["Rregister2"] ?></h4>
								</div>
						<div style="padding: 20px;margin-top: -25px;">
										<center>										
											  <img src="<?php echo H. $config['skin']; ?>/assets/images/look1.png">
											  <img src="<?php echo H. $config['skin']; ?>/assets/images/look2.png">
																	
										<div>
										  <label style=" font-size: 14px; color: #545454; ">

											<input type="radio" class="option-input radio" name="genero" value="hombre" checked="">
											<?php echo $lang["Rhombre"]?></label>
										  <label style=" font-size: 14px; color: #545454; ">
										  
											<input type="radio" class="option-input radio" name="genero" value="mujer" style="font-size: 16px;margin-left: 20px;">
											<?php echo $lang["Rmujer"]?>  </label>

										</div>
											  <img src="<?php echo H. $config['skin']; ?>/assets/images/MRG01.gif">
											  <img src="<?php echo H. $config['skin']; ?>/assets/images/MRG02.gif">
											  <img src="<?php echo H. $config['skin']; ?>/assets/images/MRG03.gif">
											  <img src="<?php echo H. $config['skin']; ?>/assets/images/MRG04.gif">
											  <img src="<?php echo H. $config['skin']; ?>/assets/images/MRG05.gif">
											<div style="margin-left: -15px; ">
											  <label style=" margin-left: 15px; "><input type="radio" class="option-input radio" name="placa" value="MRG01" checked=""></label>
											  <label style=" margin-left: 15px; "><input type="radio" class="option-input radio" name="placa" value="MRG02"></label>
											  <label style=" margin-left: 15px; "><input type="radio" class="option-input radio" name="placa" value="MRG03"></label>
											  <label style=" margin-left: 15px; "><input type="radio" class="option-input radio" name="placa" value="MRG04"></label>
											  <label style=" margin-left: 15px; "><input type="radio" class="option-input radio" name="placa" value="MRG05"></label>

											</div>	
											
										</div>
									</center>
									<br>
					</div>
				</div>

</div>


		
					</div>


					<div class="modal fade forgot-password" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<span style="width: 90px;"><?php echo $lang["Raun"]?></span>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="hidden-xs-up">Close</span></button>
								</div>
								<div class="modal-body">
					
									<br>

										<div class="col-md-3 no-padding" style="float: left;min-height: 40px;margin-top: 15px;width 120px;margin-left: 130px;width: 200px;">
										
											<button type="submit" name="register" class="newbottonr" style="padding: 15px 10px;font-size: 15px;font-weight: 100;width: 200px">
												<span><?php echo $lang["Rbutton"]?></span>
											</button>

											</div>

								</div>
							</div>
						</div>
					</div>
</form>
<?php include_once("includes/footer.php"); ?>


</body>
</html>
<style>
footer{
	position: inherit;
}
.error{
    padding: 13px;
    margin-top: -24px;
    border-radius: 5px;
}
</style>