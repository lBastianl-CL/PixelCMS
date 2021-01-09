<?php 
	$menu="hotel";
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	$_SESSION['title'] = '';
	$_SESSION['slogan'] = '';
	$_SESSION['news'] ='';
	admin::CheckRank(3);
?>
<script src="<?= $config['hotelUrl'];?>/adminpan/js/ckeditor/ckeditor.js"></script>

    <section class='member-data'>
      <h1 class='member-data__name'><?= $lang["HkDash"] ?></h1>
      <div class='mdl-tabs mdl-js-tabs mdl-js-ripple-effect'>
        <nav class='member-data__navigation mdl-tabs__tab-bar'>
          <a class='member-data__navigation__item mdl-tabs__tab mdl is-active' href='<?= $config['hotelUrl']; ?>/'><?= $lang["Ncommunity"]; ?></a>
          <a class='member-data__navigation__item mdl-tabs__tab mdl' href='<?= $config['hotelUrl']; ?>/logout'><?= $lang["HsignOut"]; ?></a>
          <a class='member-data__navigation__item mdl-tabs__tab mdl' href='<?= $config['hotelUrl']; ?>/client'><?= $lang["Menter"]; ?></a>
        </nav>
      </div>
      <div class='member-data-content' style=" overflow: scroll; height: 540px; ">
	  
				<div class="panel-body">
				<div class="form-group">
			<form method="POST">
									<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkBadgeshoptitulo"] ?></label>
									<div class="col-sm-10">
										<input type="text" value="" name="badge" class="form-control">
									</div>
								</div>
								<br><br>
								<button style="width: 140px;float: right;margin-right: 14px;" name="enviar" type="submit" class="btn btn-success"><?= $lang["HkBadgeshopboton"]?></button>
				</div>
			</form>
	  	   <?php
		if(isset($_POST["enviar"]))
		{
			if (!empty($_POST['badge']))
			{
				$addcanjear = $dbh->prepare("INSERT cms_badges VALUES ('','".$_POST['badge']."') ");
				$addcanjear->execute();
				echo'<div class="alert alert-block alert-success " ><strong>'.$lang["HkbadgeSucces"].'</strong></div>';
			}
			else
			{
				echo'<div class="alert alert-block alert-success "><strong>'.$lang["Hkbadgeerror1"].'</strong></div>';
			}
		}
		
   ?>
		<?php admin::DelectBadge(); ?>
							<table class="table table-striped table-bordered table-condensed">
								<b>	<strong><tr><td align="center"><b><?= $lang["HkBadgeshopid"] ?></b></td>
								<td align="center"><b><?= $lang["HkBadgeshopcod"] ?></b></td>
								<td align="center"> <b><?= $lang["HkBadgeshopbadge"] ?></b></td>
								<td align="center"><b><?= $lang["Hkreporttema5"] ?></b></td></tr></strong></b>
								<tbody>
								<?php
									$getArticles = $dbh->prepare("SELECT * FROM cms_badges ORDER BY id DESC");
									$getArticles->execute();
									while($news = $getArticles->fetch())
									{
										echo'';
										echo'<tr>
										<td align="center" style="width: 20%;padding: 40px;">'.$news["id"].'</td>
										<td align="center" style="width: 30%;padding: 40px;"">'.$news["badge_id"].'</td>
										<td align="center" style="width: 30%;padding: 40px;""><img style="transform: scale(2);image-rendering: pixelated;" draggable="false" oncontextmenu="return false" src="'.$config['badgeURL'].''.$news["badge_id"].'.gif"></td>

										';
										if (User::userData('rank') > '10')
										{
											echo'	
											<td align="center" style="padding: 40px;""><a href='.$config["hotelUrl"].'/adminpan/badges/delete/'.$news["id"].'><i style="padding-top: 4px; color:red;" class="fa fa-trash"></i></center></a></td>
											</tr>
											';
										}
									}			
								?>
  </main>
</div>

  

</body>
	<style>
	body {
  margin:0;
  padding:0;
  background: url(<?php echo H. $config['skin']; ?>/assets/images/Pin.png) no-repeat center #f1f1f1;
    opacity: 0.9;
}
</style>
</html>
