	<title><?php echo $lang["Iingres"] ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/avatargenerate.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/fonts.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>


<header style=" height: 50px; min-height: 130px; ">

    <div class="container">

        <a href="." class="brand" style=" margin: 0; "></a>

        <div class="col-xs-12 col-md-8 pull-md-right login-form">

        
            <form method="POST" name="hubbaLoginForm">

                <div class="col-md-5">
                    <fieldset class="form-group">
                        <input type="text" class="form-control" name="username" value="" placeholder="<?php echo $lang["Iusername"] ?>" required>
                    </fieldset>
                </div>
                <div class="col-md-5">
                    <fieldset class="form-group">
                        <input class="form-control" name="password" type="password"name="password" type="password"  placeholder="<?php echo $lang["Ipassword"] ?>" required>
                        <a href="#forgot-password" data-slopt-forgot-password class="forgot-password"><?php echo $lang['forgot']; ?></a>
                    </fieldset>
                </div>
                <div class="col-md-2 login-col">
                    <button  type="submit" name="login" class="newbotton">
                        <span><?php echo $lang["Ibutton"]?></span>
                    </button>
					
                </div>

            </form>
        
        </div>
    </div>

</header>

       
<div id="content">

    
    <div class="container">

        <div class="col-xs-7 no-padding-left">

		   <div class="news-articles habbo-box">
				<?php
					$sql = $dbh->prepare("SELECT id,title,image,shortstory FROM cms_news ORDER BY id DESC LIMIT 1");
					$sql->execute();
					while ($news = $sql->fetch())
					{
						echo'
                <div class="article-main" style="background-image: url( '.filter($news["image"]).');">
					<h3>'.filter($news["title"]).'</h3>

                    <p>'.filter($news["shortstory"]).'</p>

                    <a href="/news/'.filter($news["id"]).'">'.$lang["Mreadmore"].'</a>

						</div>';
					}
				?>
                <div class="sub-articles">
<?php
						$getArticles = $dbh->prepare("SELECT id,date,title,shortstory FROM cms_news ORDER BY date DESC LIMIT 2");
						$getArticles->execute();
						$contararticles = $dbh->prepare("SELECT id,date,title,shortstory FROM cms_news");
						$contararticles->execute();
						$contar = $contararticles->fetch();
						if ($getArticles->RowCount() > 0)
						{
							while ($a = $getArticles->fetch())
							{
							echo '
							                        <div class="sub-article">

                            <p>
                                <a href="/news/' . filter($a['id']) . '">' . filter($a['title']) . '&nbsp;&raquo;</a>
                                <span>' . filter($a['shortstory']) . '&nbsp;&raquo;</span>
                            </p>

							</div>
							';
							}
					
						}
					if($contar['id']<=0)
					{
						echo'
                <div class="article-main" style="background-image: url('.$config['hotelUrl'].'/adminpan/img/newsimages/22.png);">
					<h3>'.$lang["Islogan1"].'</h3>

                    <p>'.$lang["Itext2"].'</p>


						</div>		
							  <div class="sub-article">
                            <p>
                                <a href="#">'.$lang["Islogan1"].'</a>
                                <span>'.$lang["Itext3header"].'&nbsp;&raquo;</span>
                            </p>

							</div>';
					}		
				?>
                    
                </div>
   </div>
   </div>
        <div class="col-xs-5">

            <div class="habbo-box content">
                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Rtitle1"] ?></h4>
                </div>
		  <?php User::Login(); ?>	

		<div style="padding: 20px;margin-top: -25px;">
		<h3 style=" font-size: 1.2rem; "><br><?= $lang["Rtitle2"] ?></h3>
		<?= $lang["Rtext2"] ?>
		<h3 style=" font-size: 1.2rem; "><br><?= $lang["Rtitle4"] ?></h3>
		<?= $lang["Rtext4"] ?>
        </div>
			   <a href="/register">

			   <button type="button" class="newbottonr" style=" width: 85%; margin-left: 30px; ">
                   <span>
                      <?php echo $lang["Ireg"]?> 
                   </span>
                </button> </a>

           
<br><br>




    </div>
</div>
</div></div>


    <div class="modal fade forgot-password" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span style="width: 70px;">Tu cuenta</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="hidden-xs-up">Close</span></button>
                </div>
                <div class="modal-title">
                    <h3>¿Olvidaste tu contraeña?</h3>
                </div>
                <div class="modal-body">


                        <div class="col-md-9 no-padding">
                            <fieldset class="form-group">
                                <input type="text" name="mail" class="form-control" placeholder="Escribe tu correo electronico">
                            </fieldset>
                        </div>

                        <div class="col-md-3 no-padding">

                            <button type="submit" class="newbotton" style=" padding: 10px 10px; background: #148227; border: 2px solid #42a053; ">
                                <span>Enviar</span>
                            </button>

                        </div>
                </div>
            </div>
        </div>
    </div>
	<script data-ad-client="ca-pub-1879008613782384" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php include_once("includes/footer.php"); ?>
</body>
</html>
<style>
.error{
    padding: 13px;
    margin-top: -24px;
    border-radius: 5px;
}

</style>