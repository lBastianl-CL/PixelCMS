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
      <div class='member-data-content'>
		<?php admin::DeleteBans(); ?>
							<table class="table table-striped table-bordered table-condensed">
								<b>	<strong><tr><td><b><?= $lang["HkBans1"]; ?></b></td><td><b><?= $lang["HkBans2"]; ?></b></td><td><b><?= $lang["HkBans3"]; ?></b></td><td><b><?= $lang["HkBans4"]; ?></b></td><td><b><?= $lang["HkBans5"]; ?></b></td><td><b><?= $lang["HkBans6"]; ?></b></td><td><b><?= $lang["HkBans7"]; ?></b></td></tr></strong></b>
								<tbody>
								<?php
									$getArticles = $dbh->prepare("SELECT * FROM bans ORDER BY id DESC");
									$getArticles->execute();
									while($news = $getArticles->fetch())
									{
										echo'';
										echo'<tr>
										<td>'.$news["id"].'</td>
										<td style="width: 13%;">'.$news["value"].'</td>
										<td style="width: 7%;">'.$news["bantype"].'</td>
										<td style="width: 25%;">'.htmlentities($news["reason"]).'</td>
										<td>'.$news["added_by"].'</td>
										<td>'. gmdate('d-m-Y H:i', $news["added_date"]).'</td>
										<td>'. gmdate('d-m-Y H:i', $news["expire"]).'</td>
										';
										if (User::userData('rank') > '5')
										{
											echo'	
											<td><a href='.$config["hotelUrl"].'/adminpan/bans/delete/'.$news["id"].'><i style="padding-top: 4px; color:red;" class="fa fa-trash"></i></center></a></td>
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
