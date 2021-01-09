	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/shop.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>

<div id="appcontent">


<div id="boutiqueload" style="display: block;">
      
   
 <div style="background-image:linear-gradient(0deg,rgb(48,29,58) , rgb(24,51,119));opacity:1;" id="b74"></div>
<a href="/"><div style="top:75px;z-index:999;right:30px;" id="fermeture"></div></a>
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
<?= $lang["shopdescinicio"] ?></div>
  
   <div style="background: url(<?php echo H. $config['skin']; ?>/assets/images/background/hotel-view.png);margin-left: -50px; margin-top: 5px; height: 360px; width: 800px; opacity: 0.9;"> 
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
<div id="b43" style="display: block;"><?= $lang["Shoptitutlo"] ?></div>
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