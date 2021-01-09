	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/shop.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>
<style>
.errorshop {
    color: #fff;
    background: #c23028;
    font-size: 20px;
    padding: 10px;
    text-transform: uppercase;
    margin-bottom: 20px;
    position: fixed;
    margin-top: -70px;
    margin-left: 60px;
    z-index: 9999999999;
}
.successhop {
    color: #fff;
    background: #222;
    font-size: 20px;
    padding: 10px;
    text-transform: uppercase;
    margin-bottom: 20px;
    position: fixed;
    margin-top: -70px;
    margin-left: 60px;
    z-index: 9999999999;
}
</style>
<div id="appcontent">


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
<?php
$getBadges = $dbh->prepare("SELECT * FROM cms_badges ORDER BY id DESC");
$getBadges->execute();
while($badges = $getBadges->fetch())
{
$contarbadge = $dbh->prepare("SELECT * FROM user_badges WHERE (user_id=".User::userData('id').") AND (badge_id='".$badges["badge_id"]."')");
$contarbadge->execute();
$contar = $contarbadge->fetch();
if($contar==0)
{
?>
<form method="POST">
<div class="ysnz29299" id="b104" style="width: 378px;">
<img style="transform:scale(2);" draggable="false" oncontextmenu="return false" src="<?= $config['badgeURL'] ?><?= $badges["badge_id"] ?>.gif">
<button id="b62" type="submit" name="comprarbadge<?= $badges["badge_id"] ?>" style="left: calc(24% + 5px);top: 7px;height:  65px;font-size: 27px;">
		<div id="b63"></div>
		<?= $lang["comprarplacap"] ?> 5 <div id="bdiamants"></div>
		</button>
</div>
</form>

<?php 
		if(isset($_POST["comprarbadge".$badges["badge_id"]]))
		{
			if(User::userData('online') == "0")
			{
					$contarbadge = $dbh->prepare("SELECT * FROM user_badges WHERE (user_id=".User::userData('id').") AND (badge_id='".$badges["badge_id"]."')");
					$contarbadge->execute();
					$contar = $contarbadge->fetch();
				if($contar==0)
				{
					if(User::userData('vip_points')>='5')
					{
						$quitardiamonds = $dbh->prepare("UPDATE users SET vip_points=vip_points-5 WHERE id=".User::userData('id'));
						$quitardiamonds->execute();
						$ponerplaca = $dbh->prepare("INSERT INTO user_badges (user_id, badge_id) VALUES (".User::userData('id').", '".$badges["badge_id"]."')");
						$ponerplaca->execute();
						echo "<div class='successhop'>".$lang["comprarbadge"]."".$badges["badge_id"]."</div><meta http-equiv='refresh' content='2;URL=/shopbadges' />";//Mensaje de no tienes suficientes diamantes

					}
					else
					{
						echo "<div class='errorshop'>".$lang["shoperror1"]."</div>";//Mensaje de no tienes suficientes diamantes
					}
				}
				else
				{
					echo "<div class='errorshop'>".$lang["errorplacadoble"]."</div>";
				}
			}
			else
			{
				echo "<div class='errorshop'>".$lang["shoperror3"]."</div>";//mensaje de que debe estas desconectado
			}
		}

}
else
{
?>
<form method="POST">
<div class="ysnz29299" id="b104" style="width: 378px;">
<img style="transform:scale(2);" draggable="false" oncontextmenu="return false" src="<?= $config['badgeURL'] ?><?= $badges["badge_id"] ?>.gif">
<button id="b62" type="submit" name="comprarbadge<?= $badges["badge_id"] ?>" style="left: calc(24% + 5px);top: 7px;height: 65px;font-size: 27px;background: rgb(189, 27, 27);border-bottom: 4px solid rgb(82, 40, 40);">
		<div id="b63"></div>
		<?= $lang["inventariobadge"] ?>
		</button>
</div>
</form>
<?php
}
}
?>
   </div>
<div id="b41" style="display: none;"></div>
<div id="b42" style="top: 75px; left: 15%; display: block; transform: scale(1); transition: 0.4s;"></div>
<div id="b43" style="display: block;"><?= $lang["tiendadeplacas"] ?></div>
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