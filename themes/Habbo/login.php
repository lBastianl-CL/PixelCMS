      <link type="text/css" rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="<?php echo H. $config['skin']; ?>/assets/css/index.css?3442"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">	  
	  <title><?php echo $lang["Iingres"] ?></title>
	  
	  <body >



<nav class="nav-extended" style="background-color: rgba(167, 217, 242, 0.6);">
    <div class="nav-wrapper" style=" height: 250px !important; background: url(<?php echo H. $config['skin']; ?>/assets/images/header.png?2); border-bottom: 2px solid #eee;margin-top: -8px; ">
	<div class="onlineBox" style="top:60px;margin-left: -60px;margin-top: 38px;"><div class="arrow"></div>
	
	<font color="white"> ...<a href="/register"><div class="btn" style="margin-left:6px;background:#077c2c;border-bottom:2px solid rgba(0,0,0,.4);margin-top:-4px;margin-right:-17px;font-family: sans-serif;"><b><?php echo $lang["Iregister"]?></b></div></font>
			</div>
      <a><div class="logo">
	  
	
	<div style="width: 170px;background-color: #fff;border-radius: 10px;height: 35px;padding: 7px;color: #222;line-height: 20px;margin-left: 10px;margin-top: 80px;">

	<center><?= $lang["Oonline"] ?>  <b><?= Game::usersOnline() ?></b> <?= $lang["Oonline2"] ?></center>
</div><b>
	  </div></a>

   </div>
	
<nav style="margin-top:-66px;line-height:30px;">
  <div class="nav-wrapper" style="line-height:30px;">
	  </div>
</nav>

  </nav>

<div class="container">
	<div class="grid_9" style="float:left;">

  <?php User::Login(); ?>	
	  
	
	<div class="contentBox" style="padding-right:17px;">
<div class="contentTitle"><i class="material-icons right">account_circle</i><?php echo $lang["Iingres"] ?></div>
 <div class="row">
    <form class="col s12" method="POST">
      <div class="row" style="margin-top:15px;">
	  <small style="margin-left:30px"><?php echo $lang["Iusername"] ?></small>
          <input placeholder="<?php echo $lang["Iusername"] ?>" name="username" id="username" type="text" class="validate" style="padding: 0px 12px;height: 34px;width: 270px;margin-left:30px;border-radius: 2px;line-height: 18px;font-size: 12px;border: 1px solid #999;box-shadow: inset 0px 3px 0px 0px #f1f1f1;color:#666;" required>
		  </div>
        <div class="row" style="margin-top:-30px;margin-bottom:-10px;float:left;">
		<small style="margin-left:30px"><?php echo $lang["Ipassword"] ?><br/></small>
          <input placeholder="<?php echo $lang["Ipassword"] ?>" id="username" name="password" type="password" class="validate" style="padding: 0px 12px; height: 34px; width: 145px; margin-left:30px; border-radius: 2px; line-height: 18px; font-size: 12px; border: 1px solid #999; box-shadow: inset 0px 3px 0px 0px #f1f1f1; color:#666; " required>
        </div>
		
		<input type="submit" name="login" class="btn" value="<?php echo $lang["Ibutton"]?>" style="float:right;background:#07547c;border-bottom:2px solid rgba(0,0,0,.4);width:auto;margin-top:-11px;margin-right:12px;"></input>
	  </div>
          <p style="margin-left:17px;margin-top:-24px;border-bottom:1px solid #E3E3E3;margin-bottom:5px;">
      <input type="checkbox" id="_login_remember_me" name="_login_remember_me" value="true"/>
      <label for="_login_remember_me"><?php echo $lang["Ion"] ?></label>
    </p>
    </form>
	<div style="margin-left:18px;">	<?php echo $lang["Imsj"] ?></div>
  </div>
  <div class="contentBox">
<div class="contentTitle"><i class="material-icons right">info</i><?php echo $lang["titlebox"] ?></div>
 <div class="row" style="margin-left:5px;margin-top:5px;font-size:11px;margin-bottom:15px;padding-right:7px;">
<?php echo $lang["Imsj2"] ?>
     </div>
  </div>

 
  
 </div>

<div class="grid_15" style="float:right;">
<div class="contentBox" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/index.png?3) 0px;padding:0;border: 2px solid #f3f3f3;padding-bottom:7px;">
<h5 style="color:white;padding:8px;"><?php echo $lang["Iregister2"]?></h5>
<a href="/register"><div class="btn" style="background:#222222;border-bottom:2px solid rgba(0,0,0,.4);width:250px;margin-left:14px;"><?php echo $lang["Iregister3"]?></div></a>


</div>
</div>

<div class="grid_15" style="float:right;">
<div class="contentBox" style="background:url(<?php echo H. $config['skin']; ?>/assets/images/boxtitle.png?3) -1px -350px;padding:0;border: 2px solid #f3f3f3;">
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
<div class="grid_15" style="float:right;width:960px;">
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
</body>