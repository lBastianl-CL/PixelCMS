	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>

<?php include_once("includes/header.php"); ?>

<?php include_once("includes/subheader-ayuda.php"); ?>

<div id="content">
<style>
.error {
    width: 100%;
    height: 27px;
    border-radius: 5px;
    min-height: 0px; 
    margin-top: -50px;
    position: relative;
    z-index: 1;
    text-align: center;
    font-family: 'Ubuntu', sans-serif;
    font-weight: 800;
    font-size: 16px;
    color: #FFF;
    background: #bb0707;
}
.staff-offline {
    text-indent: -9999px;
    width: 48px;
    height: 15px;
    position: absolute;
    margin-top: 3px;
    background: url(<?php echo H. $config['skin']; ?>/assets/images/icons/iconoffline.gif);
}
		
.staff-online {
    text-indent: -9999px;
    width: 48px;
    height: 15px;
    position: absolute;
    margin-top: 3px;
    background: url(<?php echo H. $config['skin']; ?>/assets/images/icons/icononline.png);
}
</style>
  <div id="content">

    
    <div class="container">

        <div class="col-xs-7 no-padding-left">
            <div class="habbo-box content">
            <div class="habbo-box-header">
                <h4><?= $lang["Ayquees"]; ?></h4></div>
					 <p><?= $lang["Ayqueres"]; ?></p>
				  </div>
            <div class="habbo-box content">
            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo1"]; ?></h4></div>
					 <p><?= $lang["Ayutext1"];?></p>
				 </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo2"]; ?></h4></div>
					 <p><?= $lang["Ayutext2"];?></p>
					 </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo3"]; ?></h4></div>
					 <p><?= $lang["Ayutext3"];?></p>
				 </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo4"]; ?></h4></div>
					 <p><?= $lang["Ayutext4"];?></p>
				</div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo5"]; ?></h4></div>
					 <p><?= $lang["Ayutext5"];?></p>
				  </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo6"]; ?></h4></div>
					 <p><?= $lang["Ayutext6"];?></p>
				  </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo7"]; ?></h4></div>
					 <p><?= $lang["Ayutext7"];?></p>
				  </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo8"]; ?></h4></div>
					 <p><?= $lang["Ayutext8"];?></p>
				  </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo9"]; ?></h4></div>
					 <p><?= $lang["Ayutext9"];?></p>
				</div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo10"]; ?></h4></div>
					 <p><?= $lang["Ayutext10"];?></p>
				  </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo11"]; ?></h4></div>
					 <p><?= $lang["Ayutext11"];?></p>
				  </div>
            <div class="habbo-box content">

            <div class="habbo-box-header">
                <h4><?= $lang["Ayutitulo12"]; ?></h4></div>
					 <p><?= $lang["Ayutext12"];?></p>
				  </div>
			  

        </div>
     <div class="col-xs-5">
		
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Muotw"] ?></h4>
                </div><div style="padding: 5px;"></div>
				<?= userOfTheWeek() ?><div style="padding: 15px;"></div>
			</div>
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Mnewinhabbo"] ?></h4>
                </div>
				<div style=" margin-left: 50px; ">
<?php
					$sqlGetUsersByRankDev = $dbh->prepare("SELECT username,look FROM users ORDER BY ID DESC LIMIT 2");
					$sqlGetUsersByRankDev->execute();
					while ($getUsersDev = $sqlGetUsersByRankDev->fetch())
					{
					?>
	<div class="userNewBox" style="border-radius: 20%;width: 130px;height: 100px;">
						<a href="/home/<?= filter($getUsersDev['username']) ?>" style="color: #fff;"><div class="userNew" style="background: url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($getUsersDev['look']) ?>&direction=4&head_direction=4&headonly=0&size=l);background-position: -5px -40px;width: 130px;float: left;background-repeat: no-repeat;height: 89px;"></div>
							<div class="userNewName" style="width: 129px;margin-top: -10px;background-color: #222;">
							<?= filter($getUsersDev['username']) ?></a>
						</div>
					</div>
					<?php
					}
				?>
            </div>
		</div>


    </div>

    </div>


</div>

<?php include_once("includes/footer.php"); ?>

</body>
</html>