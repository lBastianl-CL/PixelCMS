<?php 
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	$_SESSION['title'] = '';
	$_SESSION['slogan'] = '';
	$_SESSION['news'] ='';
?>

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

				<div class="col-md-12">
					<form name="mygallery" action="" method="POST">
						<div class="panel-body">
							<?php admin::EditUser("username"); 
								admin::UpdateUser();
							?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkEditUser"] ?></label>
								<div class="col-sm-10">
									<?php echo admin::EditUser("username"); ?>
									<input type="hidden"  value="<?php echo admin::EditUser("username"); ?>" name="naam" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkMail"] ?></label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("mail"); ?>" name="mail" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkMotto"] ?></label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("motto"); ?>" name="motto" class="form-control">
								</div>
							</div>

							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkCredits"] ?></label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("credits"); ?>" name="credits" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkDuckets"] ?></label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("activity_points"); ?>" name="activity_points" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkDiamonds"] ?></label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditUser("vip_points"); ?>" name="vip_points" class="form-control">
								</div>
							</div>
							<br><br>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success"><?= $lang["HkUserButton"] ?></button></form>
					</div>
				</section>
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
