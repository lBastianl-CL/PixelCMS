<?php 
	$menu="hotel";
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
<?php
				if (User::userData('rank') > '5')
				{
				?>
				<div class="col-md-12">
			<section class="panel">
					<header class="panel-heading">
						<?= $lang["HkWeekUser"] ?> <?php echo admin::EditUserOfTheWeek("username"); ?>  <?= $config['hotelName'] ?> 
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::EditUserOfTheWeek("username"); 
								admin::UpdateUserOfTheWeek();
							?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkWeekUser"] ?> </label>
								<div class="col-sm-10">
									<?php echo admin::EditUserOfTheWeek("username"); ?>
									<input type="hidden"  value="<?php echo admin::EditUserOfTheWeek("username"); ?>" name="naam" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkWeekMotto"] ?> </label>
								<div class="col-sm-10">
								<?php echo admin::EditUserOfTheWeek("motto"); ?>
									<input type="hidden"  value="<?php echo admin::EditUserOfTheWeek("motto"); ?>" name="motto" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkWeekRazon"] ?> </label>
								<div class="col-sm-10">
									<input type="txt"  value="" name="uftwtext" class="form-control">
								</div>
							</div>
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success"><?= $lang["HkWeekUserButtonSave"]?></button></form>
						
					</div>
				</section>
					</div>
				</form>
				<?php
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
