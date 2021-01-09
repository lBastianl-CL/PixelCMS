<?php 
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	$_SESSION['title'] = '';
	$_SESSION['slogan'] = '';
	$_SESSION['news'] ='';
	$activeedituser="1";
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
      <div class='member-data-content' style=" overflow: scroll; height: 540px; ">

				<?php
			if (User::userData('rank') > '6')
			{
			?>

									<?php
									
									
									
									$getArticles = $dbh->prepare("SELECT * FROM permissions WHERE id >= '2' ORDER BY id DESC");
									$getArticles->execute();
									
										
										while($news = $getArticles->fetch())
										{ ?>
						<div class="col-md-12">
					<header class="panel-heading">
						<?php echo $news['rank_name']; ?><br>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-condensed">
								<tbody>
									<tr>

<?php 
$Getusers = $dbh->prepare("SELECT * FROM users WHERE rank = '". $news['id'] ."'");
$Getusers->execute();
									
while($users = $Getusers->fetch())
		{ ?>
	<td><img src="<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?php echo $users['look']; ?>&direction=3&head_direction=3&gesture=sml&size=s&img_format=gif&headonly=1" style="float: left;" /><a href="/adminpan/gebrank/<?php echo $users['username']; ?>"><?php echo $users['username']; ?></a></td>					            

										<?php } ?>
								
									
									
									
									
								</tbody>
							</table>
						</div>									</div><?php } ?></div></div>
			

		</header>

				

						<?php
						}
						else{
						?>
						<?php
			} 
					?>
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
