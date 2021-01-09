  <header style="background: url(<?php echo H. $config['skin']; ?>/assets/images/headerhallowen.png);background-position: -20px;">

<nav class="clear">
  <div class="container">
    <div class="nav--left"> 
      <ul class="list--reset list--inline"> 
        <li><a href="/" class="mobileHide"><?= User::userData('username') ?></a></li>
        <li><a href="/community" class="mobileHide"><?= $lang["Ncommunity"] ?></a></li>
        <li><a href="/rewards" class="mobileHide"><?= $lang["Nrewards"] ?></a></li>
      </ul>
    </div>
    <p>
	<div></div>
	<img src="<?php echo H. $config['skin']; ?>/assets/images/icono.png" class="menu--logo"></p>
    <div class="nav--right">
      <ul class="list--reset list--inline">
        <li><a href="client" class="mobileHide"><?= $lang["Menter"] ?></a></li>    
        <li><a href="logout" class="tooltip-bottom mobileHide" data-tooltip="<?= $lang["NsignOut"] ?>"><img src="<?php echo H. $config['skin']; ?>/assets/images/user.png" style="margin-top: 20px !important" style="height: 23px; width: 23px;"></a></li>     
      </ul>
    </div>
  </div>  
</nav> 


<nav style="margin-top: 55px;padding: 0px 70px;width: auto;height: auto !important;background: rgb(255, 255, 255);margin-left: 190px;border-radius: 5px;border-bottom: 2px solid #212121;">

      <ul class="list--reset list--inline" style="margin-left: -60px;"> 
        <li><a href="/" class="mobileHide" style=" color: #222; "><?= $lang["Ninicio"] ?></a></li>
        <li><a href="/home/<?= User::userData('username') ?>" class="mobileHide" style=" color: #222; "><?= $lang["Nmyprofile"] ?></a></li>
        <li><a href="/settingshotel" class="mobileHide" style=" color: #222; "><?= $lang["Naccountsettings"] ?></a></li>
      </ul>

</nav>

 <br><br><br> <div class="container" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-top: 3px;"></div>

					<?php
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'	
							<a href="/adminpan/dash"><button type="submit" maxlength="200" style="border-width: 0 1px 5px 1px;background-color: #299256;border-color: #3a905f;width: 200px;border-radius: 10px;height: 51px;color: #fff;margin-left: 700px;font-size: 15px;font-weight: bold;margin-top: 0px;margin-bottom: 5px;outline: 0;text-decoration: none;">
													Housekeeping
												</button></a>
							';
						}
					?>
<br><br>
    <div class="in" style="margin-top: -30px;">
      <h1> <?= $config['hotelName'] ?> Hotel</h1>
      <p><?= $lang["Oonline"] ?>  <b><?= Game::usersOnline() ?></b> <?= $lang["Oonline2"] ?></p>
	  

    </div>
  </div>
  
  
  
</div>
</header>
