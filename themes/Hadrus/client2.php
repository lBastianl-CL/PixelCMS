<?php
	if($hotel['StaffCheckHkClient'] == true)
	{
		if(User::userData('rank') >= $hotel['StaffCheckHkClientMinRank'])
		{
			if(User::userData('slopt_pin') == 0)
			{
				header('Location: /newpin');
				exit;
			}
		}
	}
	if($config['hotelEmu']!="arcturus")
	{
		if(User::userData('slopt_hc') == 0)
		{
			$slopthc = $dbh->prepare("INSERT INTO user_subscriptions (user_id, subscription_id, timestamp_activated, timestamp_expire) VALUES (".User::userData('id').", 'habbo_vip', '1566416817', '3574452017')");
			$slopthc->execute();
			$slopthc1 = $dbh->prepare("UPDATE users SET slopt_hc=1 WHERE id=".User::userData('id'));
			$slopthc1->execute();
		}
	}
	staffCheck();
	Game::sso('client');	
	// Game::homeRoom();	

?>
<html>
</body>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?= $config['hotelName'] ?> - <?= $lang["ClientTitulo"]?></title>
	<script src="/themes/<?= $config['skin'] ?>/client/js/jquery-latest.js?<?=$hotel['cache'];?>" type="text/javascript"></script>
	<script src="/themes/<?= $config['skin'] ?>/client/js/jquery-ui.js?<?=$hotel['cache'];?>" type="text/javascript"></script>
	<script src="/themes/<?= $config['skin'] ?>/client/js/flashclient.js?<?=$hotel['cache'];?>"></script>
	<script src="/themes/<?= $config['skin'] ?>/client/js/flash_detect_min.js?<?=$hotel['cache'];?>"></script>
	<script src="/themes/<?= $config['skin'] ?>/client/js/client.js?<?=$hotel['cache'];?>" type="text/javascript"></script>
	<script src="/themes/<?= $config['skin'] ?>/client/js/error.js?<?=$hotel['cache'];?>" type="text/javascript"></script>
	<script src="/themes/<?= $config['skin'] ?>/client/js/fullscreen.js?<?=$hotel['cache'];?>" type="text/javascript"></script>
	<link rel="stylesheet" href="/themes/<?= $config['skin'] ?>/client/css/client.css?<?=$hotel['cache'];?>" type="text/css">
	<link rel="stylesheet" href="/themes/<?= $config['skin'] ?>/client/css/radio.css?<?=$hotel['cache'];?>" type="text/css">
	<link rel="stylesheet" href="/themes/<?= $config['skin'] ?>/client/css/tipped.css?<?=$hotel['cache'];?>" type="text/css">
	<link rel="stylesheet" href="/themes/<?= $config['skin'] ?>/client/css/reset.css?<?=$hotel['cache'];?>" type="text/css">
</head>
<body>
<div id="client-ui" onclick="resizeClient()" ngsf-toggle-fullscreen="">
			<div id="client" style='position:absolute; left:0; right:0; top:0; bottom:0; overflow:hidden; height:100%; width:100%;'></div>
		</div>
	<center>
		
<div id="area_player">
			<div id="player" class="draggable ui-widget-content" style="left: 45%;z-index: 10000;">
				<div class="player_min">
					<div class="guy"></div>
					<div class="txt"><?=$lang["ClientRdio2"];?></div>
					<div class="handle ui-draggable-handle"></div>
					<div class="open o-c tip"></div>
				</div>
				<div class="player">
					<div class="chair tip">
						
						
					</div>
					<div id="demo">
						<audio id="audio" src="<?=$hotel['RadioClient'];?>;" autoplay=""></audio>
					</div>
					<div class="btn" onclick="Player.toggleP();">
						<div class="play pause"></div>
					</div>
					<div class="separa"></div>
					<div class="info music"><?=$lang["ClientRdio1"];?></div>
					
					
					<div class="close o-c tip" title="<?=$lang["ClientRdio3"];?>"></div>
					<div class="handle ui-draggable-handle"></div>
				</div>
			</div>
		</div>
	<script src="/themes/<?= $config['skin'] ?>/client/js/tipped.js?<?=$hotel['cache'];?>" type="text/javascript"></script>
	<script src="/themes/<?= $config['skin'] ?>/client/js/player.js?<?=$hotel['cache'];?>" type="text/javascript"></script>		
		<script>
			var Client = new SWFObject("<?= $hotel['swfFolderSwf'] ?>", "client", "100%", "100%", "10.0.0");
			Client.addVariable("client.allow.cross.domain", "0"); 
			Client.addVariable("client.notify.cross.domain", "1");
			Client.addVariable("connection.info.host", "<?= $hotel['emuHost'] ?>");
			Client.addVariable("connection.info.port", "<?= $hotel['emuPort'] ?>");
			Client.addVariable("site.url", "<?= $config['hotelUrl'] ?>");
			Client.addVariable("url.prefix", "<?= $config['hotelUrl'] ?>"); 
			Client.addVariable("client.reload.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("client.fatal.error.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("client.connection.failed.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("external.override.texts.txt", "<?= $hotel['external_Texts_Override'] ?>"); 
			Client.addVariable("external.override.variables.txt", "<?= $hotel['external_Variables_Override'] ?>"); 	
			Client.addVariable("external.variables.txt", "<?= $hotel['external_Variables'] ?>");
			Client.addVariable("external.texts.txt", "<?= $hotel['external_Texts'] ?>"); 
			Client.addVariable("external.figurepartlist.txt", "<?= $hotel['figuredata'] ?>"); 
			Client.addVariable("flash.dynamic.avatar.download.configuration", "<?= $hotel['figuremap'] ?>");
			Client.addVariable("productdata.load.url", "<?= $hotel['productdata'] ?>"); 
			Client.addVariable("furnidata.load.url", "<?= $hotel['furnidata'] ?>");
			Client.addVariable("use.sso.ticket", "1"); 
			Client.addVariable("sso.ticket", "<?= User::userData('auth_ticket') ?>");
			Client.addVariable("processlog.enabled", "0");
			Client.addVariable("client.starting", "<?= $config['NameClient'] ?>");
			Client.addVariable("flash.client.url", "<?= $hotel['swfFolder'] ?>/"); 
			Client.addVariable("flash.client.origin", "popup");
			Client.addVariable("ads.domain", "");
			Client.addVariable("diamonds.enabled", '<?= $hotel['diamonds.enabled'] ?>');
			Client.addParam('base', '<?= $hotel['swfFolder'] ?>/');
			Client.addParam('allowScriptAccess', 'always');
			Client.addParam('wmode', "opaque");
			Client.write('client');
			FlashExternalInterface.signoutUrl = "<?= $config['hotelUrl'] ?>/logout";
		</script>
			
		
					<script type="text/javascript">
			$(document).ready(function() {
				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 20000);

				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 60000);
				
				setInterval(function(){
					$(".ads2").slideDown("slow2");
				}, 300000);
				
				$('#area_player').css('width', 'calc(100% - 500px)');
			});
	if(!FlashDetect.installed){
		window.location.href = "<?= $config['hotelUrl'] ?>/noflash"; 	
	}
			$(document).ready(function() {
				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 20000);

				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 60000);
				
				setInterval(function(){
					$(".ads2").slideDown("slow2");
				}, 300000);
				
				$('#area_player').css('width', 'calc(100% - 500px)');
			});
			
		$(".play").click(function(){
			$(".play").toggleClass("pause");
		});

		var Player = {
			toggleP:function(){
				if ($('#audio').hasClass('pause') === true){
					$("#demo").html();
					$("#demo").html('<audio id="audio" src="<?=$hotel['RadioClient'];?>;" autoplay></audio>');
					$("#audio").trigger('play');
				}else{
					$("#audio").trigger("pause");
					$("#audio").addClass('pause');
				}
			}
		}

		var audio = document.getElementById('audio');
		audio.volume = 0.5;
</script>
	</center>
	

</body>
</html>
</center>
</div>
</head>
<button onclick="fullScreenRequest()" ngsf-toggle-fullscreen="" style="background-color: #8000ff;border-color: #fff;     cursor: pointer;padding: 6px 8px;display: block;float: left;line-height: 1.2;color: #fff;font-size: 12px;border-style: solid;margin-bottom: 4px;text-transform: uppercase;text-align: center;left:12px;position:absolute;top:12px;z-index:630;border-radius: 20px;box-shadow:none;" class="client__fullscreen" onclick="resizeClient()">DESCONGELAR</i></button>
  <script type="text/javascript">

	function resizeClient(){
		var theClient = document.getElementById('client');
		var theWidth = theClient.clientWidth;
		theClient.style.width = "10px";
		theClient.style.width = theWidth + "px";
		console.log('Client descongelada!');
	}
	$(window).focus(function() {
		console.log('Client descongelada automaticamente.');
		resizeClient();
	});
	</script>