   <?php
	
	if(isset($_GET['userref'])) {
		$userref = $_GET['userref'];
	}
	else{
		$userref = '';
	}
	
?>
   <link type="text/css" rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/index.css?32"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">	  
	  <title><?php echo $lang["Rregister"] ?></title>
	  
<nav class="nav-extended" style="background-color: rgba(167, 217, 242, 0.6);">
<div class="nav-wrapper" style=" height: 250px !important; background: url(<?php echo H. $config['skin']; ?>/assets/images/headerhallowen.png);background-position: -20px; border-bottom: 2px solid #eee;margin-top: -8px; ">	<div class="onlineBox" style="top:60px;margin-left: -60px;margin-top: 38px;"><div class="arrow"></div>
	
	<font color="white"> <b>...<a href="/"><div class="btn" style="margin-left:6px;background:#5D8E6D;border-bottom:2px solid rgba(0,0,0,.4);margin-top:-4px;margin-right:-17px;font-family: sans-serif;"><b><?php echo $lang["Rlogin"]?></b></div></font>
			</div>
      <a><div class="logo" style="font-family: sans-serif;font-size: 60px;"><?= $config['hotelName'] ?></div></a>
    </div>
<nav style="margin-top:-66px;line-height:30px;">
  <div class="nav-wrapper" style="line-height:30px;">
	  </div>
</nav>

  </nav>

<div class="container">
<div class="grid_9" style="float:left;">
							<?php User::Register();?>

	<div class="contentBox" style="padding-right:17px;">
<div class="contentTitle"><i class="material-icons right">account_circle</i><?php echo $lang['Iregister2']; ?></div>
<div class="row">
    <form class="col s12" method="POST" action="#">
      <div class="row" style="margin-top:2px;">
	  <small style="margin-left:30px;color:#444"><?php echo $lang['Ruser']; ?></small><br>
          <input minlength="2" maxlength="15" placeholder="<?php echo $lang['Ruser']; ?>" name="username" id="habbo-name" type="text" class="validate" style=" padding: 0px 12px; height: 34px; width: 275px; margin-left:30px; border-radius: 2px; line-height: 18px; font-size: 12px; border: 2px solid #999; box-shadow: inset 0px 3px 0px 0px #f1f1f1; background:#fff; color:#666; " required="">
		  </div>
      <div class="row" style="margin-top:-30px;">
	  <small style="margin-left:30px;color:#444"><?php echo $lang['Rmotto']; ?></small><br>
          <input minlength="2" maxlength="30" value="<?= $config['startMotto'] ?>" name="motto" id="motto" type="text" class="validate" style=" padding: 0px 12px; height: 34px; width: 275px; margin-left:30px; border-radius: 2px; line-height: 18px; font-size: 12px; border: 2px solid #999; box-shadow: inset 0px 3px 0px 0px #f1f1f1; background:#fff; color:#666; " required="">
		  </div>
        <div class="row" style="margin-top:-30px;margin-bottom:-10px;">
		<small style="margin-left:30px;color:#444"><?php echo $lang['Remail']; ?></small><br>
          <input placeholder="<?php echo $lang['Remail']; ?>" id="habbo-email" name="email" class="validate" style=" padding: 0px 12px; height: 34px; width: 275px; margin-left:30px; border-radius: 2px; line-height: 18px; font-size: 12px; border: 2px solid #999; box-shadow: inset 0px 3px 0px 0px #f1f1f1; background:#fff; color:#666; " required="">
</div>
        <div class="row" style="margin-bottom:-10px;">
		<small style="margin-left:30px;color:#444"><?php echo $lang['Rpassword']; ?></small><br>
<input placeholder="<?php echo $lang['Rpassword']; ?>" id="habbo-password" name="password" type="password" class="validate" style=" padding: 0px 12px; height: 34px; width: 275px; margin-left:30px; border-radius: 2px; line-height: 18px; font-size: 12px; border: 2px solid #999; background:#fff; box-shadow: inset 0px 3px 0px 0px #f1f1f1; color:#666; " required="">
        </div>
        <div class="row" style="margin-bottom:-10px;">
		<small style="margin-left:30px;color:#444"><?php echo $lang['Rrepeatpassword']; ?></small><br>
<input placeholder="<?php echo $lang['Rrepeatpassword']; ?>" id="habbo-password2" name="password_repeat" type="password" class="validate" style=" padding: 0px 12px; height: 34px; width: 275px; background:#fff; margin-left:30px; border-radius: 2px; line-height: 18px; font-size: 12px; border: 2px solid #999; box-shadow: inset 0px 3px 0px 0px #f1f1f1; color:#666; " required="">
        </div>
		 <div class="row" style="margin-top:2px;">
	  <small style="margin-left:30px;color:#444"><?php echo $lang['Rrefer']; ?></small><br>
          <input minlength="2" value="<?= $userref; ?>" maxlength="15" name="referrer" placeholder="<?php echo $lang['Rrefer2']; ?>" name="registrationBean_username" id="habbo-name" type="text" class="validate" style=" padding: 0px 12px; height: 34px; width: 275px; margin-left:30px; border-radius: 2px; line-height: 10px; font-size: 12px; border: 2px solid #999; box-shadow: inset 0px 3px 0px 0px #f1f1f1; background:#fff; color:#666; ">
		  </div>
<input type="submit" class="btn" value="<?php echo $lang['Rbutton']; ?>" name="register" style="background:#593147;border-bottom:2px solid rgba(0,0,0,.4);width:304px;margin-top: -25px;margin-left:17px;">      </form></div>
            
    
	<div style="margin-left:18px;"><?php echo $lang["Imsj"] ?></div>
  </div>


 </div>

<div class="grid_15" style="float:right;">
<div class="contentBox" style="float:left;background:#fff;padding:10px;border: 2px solid #f3f3f3;width:291px">

<div style="float:left;background:url(<?php echo H. $config['skin']; ?>/assets/images/pinatas_contents.png) no-repeat;width:80px;height:100px;background-position: -20px -210px;"></div>
<div style="float:right;margin-top:-110px;margin-left:85px"><h6><b><?php echo $lang["Rtitle1"] ?></b></h6>
<br><p style="margin-top:-20px"><?php echo $lang["Rtext1"] ?></p></div>
</div>

<div class="contentBox" style="float:left;background:#fff;padding:10px;border: 2px solid #f3f3f3;width:291px;margin-left:8px">

<div style="float:left;background:url(<?php echo H. $config['skin']; ?>/assets/images/pinatas_contents.png) no-repeat;width:80px;height:100px;background-position: -110px -210px;"></div>
<div style="float:right;margin-top:-110px;margin-left:85px"><h6><b><?php echo $lang["Rtitle2"] ?></b></h6>
<br><p style="margin-top:-20px"><?php echo $lang["Rtext2"] ?></p></div>
</div>

<div class="contentBox" style="float:left;background:#fff;padding:10px;border: 2px solid #f3f3f3;width:291px;">

<div style="float:left;background:url(<?php echo H. $config['skin']; ?>/assets/images/pinatas_contents.png) no-repeat;width:80px;height:100px;background-position: -190px -210px;"></div>
<div style="float:right;margin-top:-110px;margin-left:85px"><h6><b><?php echo $lang["Rtitle3"] ?></b></h6>
<br><p style="margin-top:-20px"><?php echo $lang["Rtext3"] ?></p></div>
</div>

<div class="contentBox" style="float:left;background:#fff;padding:10px;border: 2px solid #f3f3f3;width:291px;margin-left:8px">

<div style="float:left;background:url(<?php echo H. $config['skin']; ?>/assets/images/pinatas_contents.png) no-repeat;width:80px;height:100px;background-position: -378px -128px;"></div>
<div style="float:right;margin-top:-110px;margin-left:85px"><h6><b><?php echo $lang["Rtitle4"] ?></b></h6>
<br><p style="margin-top:-20px"><?php echo $lang["Rtext4"] ?></p></div>
</div>

<div class="grid_15" style="float:right;">
<div class="contentBox" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/headerhallowen.png) -1px -350px;padding:0;border: 2px solid #f3f3f3;">
  <div style="color:white;background:rgba(0,0,0,.4);padding:8px;">
  <center><h5>	<?php echo $lang["imgboxtitle"] ?></h5>
  </h5><?php echo $lang["imgboxsub"] ?></h5>
  <br/></center>
  <div style="margin-left:180px;">
  <i class="fa fa-check-circle"></i><?php echo $lang["imgboxsub1"] ?><br/>
  <i class="fa fa-check-circle"></i><?php echo $lang["imgboxsub2"] ?><br/>
  <i class="fa fa-check-circle"></i><?php echo $lang["imgboxsub3"] ?><br/>
  <i class="fa fa-check-circle"></i><?php echo $lang["imgboxsub4"] ?><br/>
  <i class="fa fa-check-circle"></i><?php echo $lang["imgboxsub5"] ?><br/>
</div>
<h4><center><?php echo $lang["imgboxsub6"] ?></center></h4>
  </div>
</div>

</div>

</div>


<div class="grid_15" style="float:right;width:960px;margin-top: 50px;">
  <div class="contentBox" style="padding:22px;">
  <div style="width:910px;">
  <a href="#"><?= $config['hotelName'] ?></a>
  <hr/>
  <center>
<?php echo $lang["ICopyright1"] ?><br/>
<small style="font-size:12px;"><?php echo $lang["ICopyright2"] ?></small>
</center>
  </div>
</div> 
</div></div>
