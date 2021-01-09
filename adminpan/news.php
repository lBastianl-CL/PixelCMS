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

<section class="panel" >
					<header class="panel-heading" style=" font-size: 16px !important; ">
						<?= $lang["HkNewsEdit"] ?><br>
						<div class="panel-body">
							<?php admin::DeleteNews(); ?>
							<table class="table table-striped table-bordered table-condensed">
								<tbody>
									<?php
									
									
									
									$getArticles = $dbh->prepare("SELECT * FROM cms_news ORDER BY id DESC");
									$getArticles->execute();
										
										while($news = $getArticles->fetch())
										{
											echo'<tr>
											<td>'.$news["id"].'</td>
											<td>'.$news["title"].'</td>
											<td>'.$news["shortstory"].'</td>
											<td>'.$news["author"].'</td>
											<td>'. date('d-m-Y', $news['date']).'</td>
											<td><center><a href="'.$config['hotelUrl'].'/adminpan/news/edit/'.$news["id"].'"><i  style="padding-top: 5px; color:green;" class="fa fa-edit"></i></a></td>
											<td><a href='.$config['hotelUrl'].'/adminpan/news/delete/'.$news["id"].'><i style="padding-top: 4px; color:red;" class="fa fa-trash"></i></center></a></td>
											</tr>';
										}
									?>
									
									
									
									
								</tbody>
							</table>

				<section class="panel" style=" width: 110%; margin-left: -50px; margin-bottom: -50px; ">
					<header class="panel-heading">
						<?= $lang["HkNews"] ?><br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::PostNews(); ?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox"] ?></label>
								<div class="col-sm-10">
									<input type="text" value="<?php echo $_SESSION['title']; ?>" name="title"class="form-control">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox2"] ?></label>
								<div class="col-sm-10">
									<input type="text" value="<?php echo $_SESSION['slogan']; ?>" name="slogan"class="form-control">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox3"] ?></label>
								<div class="col-sm-10" style=" width: 90%; ">
									<?php
										echo '<select onChange="showimage()" class="form-control" name="topstory" style="    width: 100%;font-size: 14px;"';
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
									<div class="imagebox">
										<img style="border-radius: 6px;width: 580px;" src="<?= $config['hotelUrl'];?>/adminpan/img/newsimages/choose.gif" name="topstory" border=0>
									</div>
									<br><br>
								</div>
							</div>
							<br><br>
							<script src="<?= $config['hotelUrl'];?>/adminpan/js/ckeditor/ckeditor.js"></script>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label"><?= $lang["HkNewsbox4"] ?></label>
								<div class="col-sm-10" style=" width: 95%; ">
									<textarea id="editor1" name="news"  rows="15" cols="80"><?php echo $_SESSION['news']; ?></textarea>
								</div>
							</div><br><br><br>
							<button style="width: 130px;
							float: right;
							margin-right: 14px;" name="postnews" type="submit" class="btn btn-success" style="margin-top: 40px;"><?= $lang["HkNewsbox5"] ?></button>
						</div>
					</section>
				</div>
			</form>
		</header>

				</div>
			</div>
			<script>
				CKEDITOR.replace( 'editor1' );
			</script>
			<?php
				include_once "includes/script.php";
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
