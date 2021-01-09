	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/shop.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>
<div id="appcontent">
<style>
.errorshop {
    color: #7d3632;
    font-size: 20px;
    text-transform: uppercase;
}
.successhop {
    color: #848484;
    font-size: 20px;
    text-transform: uppercase;
}
</style>

<div id="boutiqueload" style="display: block;">
      
   
 <div style="background-image:linear-gradient(0deg,rgb(48,29,58) , rgb(24,51,119));opacity:1;" id="b74"></div>
<a href="/shop"><div style="top:75px;z-index:999;right:30px;" id="fermeture"></div></a>
<div id="b97">
<div id="b98">
<div id="b99">
<div id="b100"></div>
</div>
<input id="b101" placeholder="Buscar...">
<a href="/shopvip"><div id="hgsmobis" class="b102">
<?= $lang["Shopnav1"] ?>
</div></a>
<a href="/shoploteria"><div id="hgshistorique"class="b102">
<?= $lang["Shopnav3"] ?>
</div></a>
<a href="/shopbadges"><div id="hgshistorique"class="b102">
<?= $lang["Nbadge"] ?>
</div></a>
</div>
</div>
<div id="b103">
      
<div id="b48">

<div style="position:relative;" id="settings45">
	<form method="POST">

<input type="text" placeholder="Numero para apostar 1-10" name="num1" class="indexinput" style="width:calc(100% - 25px);" autocomplete="off"><br><br>
<input type="text" placeholder="Numero para apostar 1-10" name="num2" class="indexinput" style="width:calc(50% - 25px);" autocomplete="off">
<div id="indexformsepare"></div>
		<button style="left: calc(49% + 5px);font-size: 32px;bottom: 0px;" id="b62" type="submit" name="comprarloteria">
		<div id="b63"></div>
		<?= $lang["loteriabotton"] ?> : <?= $config['precioloteria'] ?>
		<div id="bdiamants"></div>
		</button>
</form>
</div>

</div>
      				<?php
					$premioloteria=$config['precioloteria']*2;
				if(User::userData('online') == "0")
				{
					if(isset($_POST["comprarloteria"]))
					{
						if (!empty($_POST['num1']))
						{	
							if (!empty($_POST['num2']))
							{
									if(User::userData('vip_points')>=$config['precioloteria'])
									{
										$num1=$_POST['num1'];
										$num2=$_POST['num2'];
										$aletorio1=rand(1,10);
										$aletorio2=rand(1,10);
										echo"<div class='successhop' style=' color: #fff; '>".$lang["tusnumerosloteria"]." ".$num1. " y ". $num2."</div>";
										if(($num1==$aletorio1  and $num2==$aletorio2) or ($num1==$aletorio2 and $num2==$aletorio1))
										{
											$addloteria = $dbh->prepare("UPDATE users SET vip_points=vip_points+".$premioloteria." WHERE id=".User::userData('id'));
											$addloteria->execute();
											echo"<div class='successhop'>".$lang["Loteriasucces"]." ".$aletorio1. " y ". $aletorio2."</div>";//Aqui es el codigo de que gano los 2 numeros
										}
										else
										{
											if(($num1==$aletorio1) or ($num1==$aletorio2))
											{
												echo "<div class='successhop'>".$lang["Loterianumsolo"]." ".$aletorio1. " y ". $aletorio2."</div>";
											}
											else
											{
												if(($num2==$aletorio2) or ($num2==$aletorio1))
												{
													echo "<div class='successhop'>".$lang["Loterianumsolo"]." ".$aletorio1. " y ". $aletorio2."</div>";
												}
												else
												{
													$addloteria = $dbh->prepare("UPDATE users SET vip_points=vip_points-".$config['precioloteria']." WHERE id=".User::userData('id'));
													$addloteria->execute();
													echo"<div class='errorshop'>". $lang["Loterianogano"]." ".$aletorio1. " y ". $aletorio2."</div>"; //Aqui el codigo si no gano nada
												}
											}
										}
									}
									else
									{
										echo"<div class='errorshop' style=' background: #c23028; color: #fff; padding: 10px; margin-top: 10px; '>".$lang["shoperror1"]."</div>";
									}
							}
							else
							{
									echo"<div class='errorshop' style=' background: #c23028; color: #fff; padding: 10px; margin-top: 10px; '>".$lang["invalidnum2"]."</div>";	
							}
						}
						else
						{
									echo"<div class='errorshop' style=' background: #c23028; color: #fff; padding: 10px; margin-top: 10px; '>".$lang["invalidnum1"]."</div>";	
						}
					}
				}
				else
				{
					echo"<div class='errorshop' style=' background: #c23028; color: #fff; padding: 10px; margin-top: 10px; '>".$lang["shoperror3"]."</div>";
				}
				
				?>
   <div style="background: url(<?php echo H. $config['skin']; ?>/assets/images/background/hotel-view.png);margin-left: -50px; margin-top: 50px; height: 360px; width: 800px; opacity: 0.9;"> 
   <div id="b35">
      <div id="b36"></div>
      <div id="b37">
         <h2 style="font-size:160%;"><?= $lang["Shoploteriatitulo1"]  ?></h2>
         <p><strong style="font-size:110%;"><?= $lang["Shoploteriadesc"] ?>
            </strong>
         </p>
      </div>
   </div>
   
      </div>

   
   </div>
<div id="b41" style="display: none;"></div>
<div id="b42" style="top: 75px; left: 15%; display: block; transform: scale(1); transition: 0.4s;"></div>
<div id="b43" style="display: block;"><?= $lang["loteriabotton"] ?></div>
<div id="b64">
   <div id="b65" style="top: 10px;">
      <div id="b66">
         <div class="bduckets" id="bduckets" style=" background: url(<?php echo H. $config['skin']; ?>/assets/images/pageme.png) -760px -91px; "></div>
         <x id="duckets"><?= User::userData('credits') ?> </x>
      </div>
      <div id="b66">
         <div class="bdiamants" id="bdiamants"></div>
         <x id="diamants"><?= User::userData('vip_points') ?></x>
      </div>
      <div id="b66">
         <div id="bvip"></div>
         <div id="btxtvip">
                        <p><?php if(User::userData('rank')>1){echo $lang["eresvip"] ;} else{ echo $lang["noeresvip"] ; }?></p>
                     </div>
      </div>
      <a target="blank">
         <div id="bplus"></div>
      </a>
   </div>
</div>
</div>
</body>
</html>