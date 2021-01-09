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
      <div class='member-data-content'>

				<header class="panel-heading">
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body" style=" margin-top: -45px; ">
							<?php admin::EditUser("username"); 
								admin::LookSollie();
							?>
							<h2><?= $lang["HkRank"]?></h2><hr>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkRankUser"]?></label>
								<div class="col-sm-10">
									<?php echo admin::EditUser("username"); ?>
									<input type="hidden"  value="<?php echo admin::EditUser("username"); ?>" name="naam" class="form-control" disable>
								</div>
							</div>
							
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkRankRank"]?></label>
								<div class="col-sm-10">
								
								
			<select name="rank" class="form-control">
									<?php
									
									
									
									$GetRanks = $dbh->prepare("SELECT * FROM permissions WHERE id >=2 AND id <= 11 ORDER BY id ASC ");
									$GetRanks->execute();
										
										while($rank = $GetRanks->fetch())
										{
											echo'


<option value="'.$rank["id"].'">'.$rank["rank_name"].'</option>

											
			';
										}
									?>
									
									
	</select>	
								</div>
							</div>
							<br><br>
							<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkRankPin"]?></label>
								<div class="col-sm-10">

									<input type="text" maxlength="4" value="<?php echo admin::EditUser("pin"); ?>" name="pin" class="form-control" onkeypress="return valida(event)" required style=" height: 20px; width: 91%; ">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkRankver"] ?></label>
								<div class="col-sm-10">
								
								
<select name="hide_staff" class="form-control">
<option value="1"><?= $lang["HkRanknone"] ?></option>																
<option value="0"><?= $lang["HkRankhide"] ?></option>
	</select>	
								</div>
							</div>
							<br><br>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="updaterank" type="submit" class="btn btn-success"><?= $lang["HkRankButton"]?></button></form>
						<!--<?php
							if (User::userData('rank') > '7')
							{
								echo'<a href="gebruiker.php?user='. admin::EditUser("username") .'&delete='. admin::EditUser("id") .'">
								<button style="width: 160px;
								float: right;
								margin-right: 14px;" name="delete" type="submit" class="btn btn-danger">excluir o usuário</button>
								</a><form action="client.php" method="POST" target="_blank">
								<input type="hidden" name="sso" value='. admin::EditUser("username") .'>
								<button style="width: 140px;
								float: right;
								margin-right: 14px;" name="postsso" type="submit" class="btn btn-default">Hotel com'.admin::EditUser("username").'</button>
								</form>';
							}
							echo'';
						?>-->
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
