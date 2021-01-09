	<title><?= User::userData('username') ?> <?php echo $lang["Iindex"]; ?></title>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/bootstrap.min.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/habbo-theme.css?<?= $config['css'] ?>" rel="stylesheet">
    <link href="<?php echo H. $config['skin']; ?>/assets/css/newhabbo.css?<?= $config['css'] ?>" rel="stylesheet">

</head>

<body>

<?php include_once("includes/header.php"); ?>

<?php include_once("includes/subheader-community.php"); ?>

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
</style>
    <div class="container">

        <div class="col-xs-7 no-padding-left" style=" width: 90%; ">
            <div class="habbo-box content">

                <div class="habbo-box-header title-blue">
                    <h4><?= $lang["Oonline3"] ?></h4>
                </div>
					<?php 
					$getOnline = $dbh->prepare("SELECT id,username,motto,online,look from users WHERE online = '1' ORDER BY RAND()");
					$getOnline->execute();
					if ($getOnline->RowCount() > 0)
				{
					while ($onlineRow = $getOnline->fetch())
					{
					?>
					<div style="pointer;float: left;border: 1px solid #e2e2e2;border-radius: 5px;padding-top: 20px;border-radius: 5px;width: 312px;margin-bottom: 10px;margin-left: 5px;margin-right: 5px;    line-height: 30px;">
										<div id="column" style="border: 2px dotted rgba(0, 0, 0, 0.2);margin-top: -10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;float: left;height:95px;width: 100px;border-radius: 555px;-moz-border-radius: 555px;-webkit-border-radius: 555px;background:url(<?= $config['HabboImg'] ?>/habbo-imaging/avatarimage?figure=<?= filter($onlineRow['look']) ?>&head_direction=2&amp;action=wav&size=l) no-repeat;background-position: 60% 27%;"></div>
					<b style="font-size: 16px; color: black;"><a href = "/home/<?= filter($onlineRow['username']) ?>" style=" color: #222; "><?= filter($onlineRow['username']) ?> </a></b><br><?= filter($onlineRow['motto']) ?></a>
				</div>		
				<?php
				}
				}
				else
				{
					echo ' <center><br>'.$lang["Oonline4"].'</center><br>';
				}
			?>
            </div>
				</div>


	</div>

<?php include_once("includes/footer.php"); ?>

</body>
</html>