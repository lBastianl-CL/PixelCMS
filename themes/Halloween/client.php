<?php
	staffCheck();
	Game::sso('client');	
	Game::homeRoom();	
?>
<html>
</body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=  User::userData('username')?>  <?= $config['hotelName'] ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo H. $config['skin']; ?>/favicon.png"/>
<script src="<?php echo H. $config['skin']; ?>/assets/client/jquery-latest.js" type="text/javascript"></script>
<script src="<?php echo H. $config['skin']; ?>/assets/client/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo H. $config['skin']; ?>/assets/client/flashclient.js"></script>
<script src="<?php echo H. $config['skin']; ?>/assets/client/flash_detect_min.js"></script>
<script src="<?php echo H. $config['skin']; ?>/assets/client/client.js" type="text/javascript"></script>
</head>
<body>

<div class="client__buttons" style="left: 50px;">
<button ngsf-toggle-fullscreen="" class="client__fullscreen" onclick="resizeClient()"><b><i class="fa fa-snowflake-o " aria-hidden="true"></i> Descongelar</b></button>
</div>
<div class="client__buttons">
<button ngsf-toggle-fullscreen="" class="client__fullscreen" onclick="toggleFullScreen()" style=" height: 30px;width: 33px;"><i show-if-fullscreen="false" class="client__fullscreen__icon icon icon--fullscreen"></i> <i show-if-fullscreen="" class="client__fullscreen__icon icon icon--fullscreen-back ng-hide"></i></button>
</div>
<div class="client__buttons" style="left: 165px;">
<button ngsf-toggle-fullscreen="" class="client__fullscreen" onclick="location.href='/'"><b><i class="fa fa-home" aria-hidden="true"></i> Menu</b></button>
</div>

	
		<div id="client-ui" onclick="resizeClient()" ngsf-toggle-fullscreen="">
			<div id="client" style='position:absolute; left:0; right:0; top:0; bottom:0; overflow:hidden; height:100%; width:100%;'></div>
		</div>
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
Client.addVariable("client.starting", "<?= $hotel['swftitle'] ?>");
Client.addVariable("flash.client.url", "<?= $hotel['swfFolder'] ?>/"); 
Client.addVariable("flash.client.origin", "popup");
Client.addVariable("nux.lobbies.enabled", "true");
Client.addVariable("country_code", "NL");
Client.addParam('base', '<?= $hotel['swfFolder'] ?>/');
Client.addParam('allowScriptAccess', 'always');
Client.addParam('menu', false);
Client.addParam('wmode', "opaque");
Client.write('client');

			
FlashExternalInterface.signoutUrl = "<?= $config['hotelUrl'] ?>/logout";
		</script>
	
<script>
	//Usuário sem Adobe Flash Player
	if(!FlashDetect.installed){
		window.location.href = "<?= $config['hotelUrl'] ?>/noflash"; 	
	}
</script>
</head>
<script type="text/javascript">
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
</script>
<script type="text/javascript">
   function resizeClient(){
    var theClient = document.getElementById('client');
    var theWidth = theClient.clientWidth;
    theClient.style.width = "10px";
    theClient.style.width = theWidth + "px";
   }
  </script>
  <style>
  
  .client__buttons button:hover{background-color:#ffd400;border-color:#fffd70;}.client__buttons{left:12px;position:absolute;top:12px;z-index:630;border-radius:5px;}.client__buttons button:active{-webkit-animation-name:shakeit;-webkit-animation-duration:1s;-webkit-animation-timing-function:linear;-webkit-animation-iteration-count:infinite;animation-name:shakeit;animation-duration:1s;animation-timing-function:linear;animation-iteration-count:infinite;}@-webkit-keyframes shakeit{0%{-webkit-transform:rotate(0deg) translate(2px,1px);}10%{-webkit-transform:rotate(10deg) translate(1px,2px);}20%{-webkit-transform:rotate(-10deg) translate(3px,0px);}30%{-webkit-transform:rotate(0deg) translate(0px,-2px);}40%{-webkit-transform:rotate(-10deg) translate(-1px,1px);}50%{-webkit-transform:rotate(10deg) translate(1px,-2px);}60%{-webkit-transform:rotate(0deg) translate(3px,-1px);}70%{-webkit-transform:rotate(10deg) translate(-2px,-1px);}80%{-webkit-transform:rotate(-10deg) translate(1px,1px);}90%{-webkit-transform:rotate(0deg) translate(-2px,-2px);}100%{-webkit-transform:rotate(10deg) translate(-1px,2px);}}@keyframes shakeit{0%{transform:rotate(0deg) translate(2px,1px);}10%{transform:rotate(10deg) translate(1px,2px);}20%{transform:rotate(-10deg) translate(3px,0px);}30%{transform:rotate(0deg) translate(0px,-2px);}40%{transform:rotate(-10deg) translate(-1px,1px);}50%{transform:rotate(10deg) translate(1px,-2px);}60%{transform:rotate(0deg) translate(3px,-1px);}70%{transform:rotate(10deg) translate(-2px,-1px);}80%{transform:rotate(-10deg) translate(1px,1px);}90%{transform:rotate(0deg) translate(-2px,-2px);}100%{transform:rotate(10deg) translate(-1px,2px);}}.client__buttons .client__fullscreen{padding-left:6px;padding-right:6px;}.client__buttons button{box-shadow:0 3px 0 1px rgba(0,0,0,.3);background-color:#ffb900;border-color:#ffea00;padding:6px 12px;display:block;border-radius:5px;float:left;}.client__buttons .client__close,.client__buttons button{line-height:1.2;color:#000;font-size:12px;border-style:solid;margin-bottom:4px;text-transform:uppercase;text-align:center;}.client__fullscreen__icon{display:block;}.icon--fullscreen{background-image:url(<?php echo H. $config['skin']; ?>/assets/client/sprite.f837d0af.png);background-position:-511px -58px;width:15px;height:14px;}.icon{display:inline-block;font-style:normal;}button{display:block;outline:none;}
  </style>





