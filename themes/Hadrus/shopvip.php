	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/shop.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>
<style>
.errorshop {
    color: #fff;
    background: #c23028;
    font-size: 20px;
    padding: 10px;
    text-transform: uppercase;
	margin-top: -0px;
    margin-bottom: 20px;
}
.successhop {
    color: #fff;
    background: #222;
    font-size: 20px;
    padding: 10px;
    text-transform: uppercase;
	margin-top: -0px;
    margin-bottom: 20px;
}
</style>
<body>
<div id="appcontent">


<div id="boutiqueload" style="display: block;">
      
   
 <div style="background-image:linear-gradient(0deg,rgb(170,88,182) , rgb(49,102,238));opacity:1;" id="b74"></div>
<a href="/shop"><div style="top:75px;z-index:999;right:30px;" id="fermeture"></div></a>
<div id="b103" style=" height: auto; width: 70%; overflow: auto; ">
      
   
    				<?php
				if(User::userData('online') == "0")
				{
					if(isset($_POST["comprarvip"]))
					{
						if(User::userData('rank')<=1)
						{
							if(User::userData('vip_points')>=$config['preciovip'])
							{
								$addcanjear = $dbh->prepare("UPDATE users SET vip_points=vip_points-".$config['preciovip'].", rank=2, rank_vip=2 WHERE id=".User::userData('id'));
								$addcanjear->execute();
								echo"<div class='successhop'>".$lang["shopsucces"]."</div>";
							}
							else
							{
								echo"<div class='errorshop'>".$lang["shoperror1"]."</div>";
							}
						}
						else
						{
								echo"<div class='errorshop'>".$lang["shoperror2"]."</div>";
						}
					}
				}
				else
				{
					echo"<div class='errorshop'>".$lang["shoperror3"]."</div>";
				}
				?>
<div id="b48">
<?= $lang["Shopdesc"] ?></div>
<div id="b50">

<div id="b52"><?= $lang["Shoplasub"] ?></div>
<div id="b53">
<div style="background:url(<?php echo H. $config['skin']; ?>/assets/images/pageboutique1.png) -390px 0px;top:30px;left:-10px;" id="b16"></div>
<div id="b54"><?= $lang["Shopesc1"] ?></div>
</div>
	<form method="POST">
		<button style="left:calc(15% + 5px);" id="b62" type="submit" name="comprarvip">
		<div id="b63"></div>
		<?= $lang["Shoptim2"] ?>: <?= $config['preciovip'] ?>
		<div id="bdiamants"></div>
		</button>
	</form>
</div>
<div id="b55">
<div id="b56">
<div id="b57"></div>
<div id="b58"><?= $lang["ShopVipsub"] ?></div>
<div id="b58" style="top:60px;font-size:130%;"><?= $lang["ShopViptime"] ?></div>
<div style="top:87px;left:10px;" id="b10"></div>
<div class="hsnx47" id="b59">         <?php if(User::userData('rank')>1){echo $lang["eresvip"] ;} else{ echo $lang["noeresvip"] ; }?>
         </div>
<div id="b60"></div>
<div id="b61"></div>
</div>

</div>
   
      </div>

   
   </div>
<div id="b41" style="display: none;"></div>
<div id="b42" style="top: 75px; left: 15%; display: block; transform: scale(1); transition: 0.4s;"></div>
<div id="b43" style="display: block;"><?= $lang["ShopVip"] ?></div>
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