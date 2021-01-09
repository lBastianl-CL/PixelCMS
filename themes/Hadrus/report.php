	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/shop.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>
<style>
.asd {
    background: #222;
    padding: 10px;
    color: #903434;
	font-size: 20px;
}
.asdsucces {
    background: #222;
    padding: 10px;
    color: #fff;
	font-size: 20px;
}
</style>
<div id="content">
<div id="support" style="display: block;">
   <div id="fermeture"></div>
   <div id="footer30">
 
   <form method="POST">
      <div id="footer23"><div id="support" style="display: block;">
   <a href="/ayuda"><div id="fermeture"></div></a>
   <div id="footer30">
      <div id="footer31"><?= $lang["sopporttitulo"] ?> - <?= User::userData('username') ?></div>
      <div id="footer23">
	   <?php
		if(isset($_POST["enviar"]))
		{
			if (!empty($_POST['mitema']))
			{
				if (!empty($_POST['comentario']))
				{
					if($_POST['category']=="1"){$category=$lang["Scategory1"];}else{
					if($_POST['category']=="2"){$category=$lang["Scategory2"];}}
					if($_POST['category']=="3"){$category=$lang["Scategory3"];}else{
					if($_POST['category']=="4"){$category=$lang["Scategory4"];}}
					if($_POST['category']=="5"){$category=$lang["Scategory5"];}else{
					if(($_POST['category']>="1") and ($_POST['category']<="5")){}else{$category=$lang["Scategory"];}}
					$addcanjear = $dbh->prepare("INSERT cms_report VALUES ('','".$_POST['mitema']."','".$category."','".$_POST['comentario']."','".User::userData('username')."')");
					$addcanjear->execute();
					echo'<div class="asdsucces">'.$lang["Supsuccs"].'</div>';
				}
				else
				{
				echo"<div class='asd'>".$lang["SupError1"]."</div>";
				}
			}
			else
			{
				echo"<div class='asd'>".$lang["SupError2"]."</div>";
			}
		}
		
   ?>
         <a style="font-size:100%;color:white;">*<b><?= $lang["sopportdec"] ?></b> <?= $lang["sopportdec2"] ?> </a>
         <br><br>
         <div id="supporterreur"></div>
         <input type="text" id="sujetTitle" name="mitema" placeholder="<?= $lang["supmitema"] ?>" class="indexinput" style="width:calc(100% - 25px);font-size: 20px;">
         <div id="indexformsepare"></div>
         <a style="font-size:130%;color:white;"><?= $lang["categoriaSup"] ?></a>
         <div id="indexformsepare"></div>
         <select id="category" name="category" class="indexinput" style="width:96%;font-size: 20px;">
            <option value="1"><?= $lang["Scategory1"]; ?></option>
            <option value="2"><?= $lang["Scategory2"]; ?></option>
            <option value="3"><?= $lang["Scategory3"] ?></option>
            <option value="4"><?= $lang["Scategory4"] ?></option>
            <option value="5"><?= $lang["Scategory5"] ?></option>
         </select>
         <div id="indexformsepare"></div>

         <div style="position:relative;height:18px;"></div>
         <textarea name="comentario"  id="editeur" style="width:calc(100% - 20px);left:0px;height:auto;min-height:90px;background:rgb(245,245,245);color:rgb(127,127,127);" contenteditable="" type="text"></textarea>
         <div id="indexformsepare"></div>
         <button id="indexsubmit" style="width:97%;" type="submit" name="enviar"><?= $lang["bottonSup"] ?></button>
		 </form>
      </div>
   </div>
</div></div>
   </div>
</div>


</div>


</body>
</html>