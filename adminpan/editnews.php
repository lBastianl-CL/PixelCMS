<?php 
	$menu="hotel";
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	$_SESSION['title'] = '';
	$_SESSION['slogan'] = '';
	$_SESSION['news'] ='';
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
			<section class="panel">
					<header class="panel-heading">
					<?= $lang["HkNewsbox6"] ?> <b><?php echo admin::EditNews("title"); ?></b>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::EditNews("id"); 
							admin::UpdateNews();?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox7"] ?></label>
								<div class="col-sm-10">
									<?php echo admin::EditNews("id"); ?>
									<input type="hidden" name="id" value="<?php echo admin::EditNews("id"); ?>">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox"] ?></label>
								<div class="col-sm-10" style=" width: 90%; ">
									<input type="text"  value="<?php echo admin::EditNews("title"); ?>" name="title" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox2"] ?></label>
								<div class="col-sm-10" style=" width: 90%; ">
									<input type="text"  value="<?php echo admin::EditNews("shortstory"); ?>" name="shortstory" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox3"] ?></label>
								<div class="col-sm-10" style=" width: 98%; ">
									<?php
										echo '<select onChange="showimage()" class="form-control" name="topstory" style="    width: 100%;font-size: 14px;"
										<option name="topstory" data-image="' . admin::EditNews("image") . '" value="' . admin::EditNews("image") . '"><option name="topstory" data-image="' . admin::EditNews("image") . '" value="' . admin::EditNews("image") . '">' . admin::EditNews("image") . '</option>
										';
										if ($handle = opendir(''.$_SERVER['DOCUMENT_ROOT'].'/adminpan/img/newsimages'))
										{	
											while (false !== ($file = readdir($handle)))
											{
												echo'';
												if ($file == '.' || $file == '..')
												{
													continue;
												}	
												echo '<option name="topstory" data-image="'.$config['hotelUrl'].'/adminpan/img/newsimages/' . $file . '" value="'.$config['hotelUrl'].'/adminpan/img/newsimages/' . $file . '"';
												if (isset($_POST['topstory']) && $_POST['topstory'] == $file)
												{
													echo ' selected';
												}
												echo '>' . $file . '</option>';
											}
										}
										echo '</select>';
									?>
									<br>
									<div class="imagebox">
										<p style="    margin: 0px;"href="javascript:linkrotate(document.mygallery.topstory.selectedIndex)" ><img style="border-radius: 6px;width: 580px;" src="<?php echo admin::EditNews("image"); ?>" name="topstory" border=0>
										</div></p>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox4"] ?></label>
								<div class="col-sm-10" style=" width: 95%; ">
								<textarea id="editor1" name="longstory"  rows="15" cols="80"><?php echo admin::EditNews("longstory"); ?></textarea></div>
							</div>
							<br><br>
							<button style="    margin-top: 10px;width: 140px;float: right;margin-right: 14px;" name="update" type="submit" class="btn btn-success"><?= $lang["HkNewsbox6"] ?></button>
						</div>
					</section>
				</div>
			</form>
		</div>
			<script>
				CKEDITOR.replace( 'editor1' );
			</script>
			<?php
				include_once "/includes/script.php";
			?>										
		<style>
			.imagebox {
			width: auto;
			background-repeat: repeat-y;
			border-radius: 6px;
			float: left;
			margin-right: 0.72pc;
			margin-bottom: 10px;
			webkit-box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
			-moz-box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
			box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
			}
		</style>	
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
