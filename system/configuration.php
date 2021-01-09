<?php
	
	/* Conexion Base de datos */
	$db['host'] = 'localhost'; //Host de Mysql
	$db['port'] = '3306'; //Port
	$db['user'] = "root"; //Usuario
	$db['pass'] = ''; //Contraseña
	$db['db'] = "pixel"; //Base de datos
	
	/* Emulador Config */
	$config['hotelEmu'] = 'arcturus'; // plusemu
	
	/* Dueño del hotel */
	$config['Autor'] = 'Bastian'; // Genaro

	/* Client Configuracion */
	$hotel['emuHost'] = "127.0.0.1"; // Ip del servidor
	$hotel['emuPort'] = "3000";  // Port dell emulador
	$hotel['staffCheckClient'] = true; //Activar el pin de personal en el cliente (true) o deshabilitarlo (false)
	$hotel['staffCheckClientMinimumRank'] = "3"; //Nivel mínimo de personal para obtener el pin de personal en el cliente
	$hotel['homeRoom'] = '23'; //Establezca la habitación de inicio cuando llegue al hotel
	// $hotel['external_Variables'] = "http://127.0.0.1/ms-swf/gamedata/external_variables.txt";
	// $hotel['external_Variables_Override'] = "http://127.0.0.1/ms-swf/gamedata/override/external_override_variables.txt";
	// $hotel['external_Texts'] = "http://127.0.0.1/ms-swf/gamedata/external_flash_texts.txt";
	// $hotel['external_Texts_Override'] = "http://127.0.0.1/ms-swf/gamedata/override/external_flash_override_texts.txt";
	// $hotel['productdata'] = "http://127.0.0.1/ms-swf/gamedata/productdata.txt";
	// $hotel['furnidata'] = "http://127.0.0.1/ms-swf/gamedata/furnidata.xml";
	// $hotel['figuremap'] = "http://127.0.0.1/ms-swf/gamedata/figuremap.xml";
	// $hotel['figuredata'] = "http://127.0.0.1/ms-swf/gamedata/figuredata.xml";
	// $hotel['swfFolder'] = "http://127.0.0.1/ms-swf/gordon/PRODUCTION-201904011212-888653470";
	// $hotel['swfFolderSwf'] = "http://127.0.0.1/ms-swf/gordon/PRODUCTION-201904011212-888653470/Hadrus.swf";
	// $hotel['RadioClient'] = "http://162.210.196.145:22688/";
	$hotel['diamonds.enabled'] = true; // Enable diamonds in the hotel.
	
	/* Sitio Web Configuracion */
	$config['hotelUrl'] = "http://127.0.0.1";//Link del hotel sin el "/"
	$config['hotelUrlSin'] = "127.0.0.1";//Link del hotel sin el "/" y sin http:// o https://
	$config['precioloteria'] = "5"; //Aqui va el precio para jugar loteria, el premio va ser el doble de lo que pongas
	$config['preciovip'] = "100"; //Aqui va el precio para comprar el rango VIP
	$config['skin'] = "Hadrus"; //Tema del hotel
	$config['lang'] = "es"; //Lenguaje del sitio web /es/
	$config['hotelName'] = "Hadrus"; //Nombre del hotel
	$config['NameClient'] = "Hadrus esta cargando..."; 
	$config['linkfb'] = "http://www.facebook.com/Comunidad-Hadrus-100815724811423"; //Link de la pagina de facebook
	$config['staffCheckHk'] = true; //Activar el pin personal en el servicio de limpieza (true) o desactivar (false)
	$config['staffCheckHkMinimumRank'] = 9; //Rank minimo para pedir pin en hk
	$config['maintenance'] = false; //Habilitar el mantenimiento de su sitio web (true) o desactivar (false)
	$config['maintenancekMinimumRankLogin'] = 6; //Rank minimo para saltarse el mantenimiento
	$config['groupBadgeURL'] = "http://127.0.0.1/ms-swf/c_images/Badgeparts/generated/";
	$config['badgeURL'] = "http://127.0.0.1/ms-swf/c_images/album1584/"; 
	$config['userLikeEnable'] = true; // true = Dar likes a usuarios false = desactivarlo
	$config['newsCommandEnable'] = true; //true = Activar comentarios en noticias false = Desactivivar comentarios
	$config['build'] = "I"; //Build
	$config['css'] = "212"; //Actualizacion de css
	$config['newsCommandFilter'] = true; //Habilitar el filtro de palabras en los comandos de noticias (el filtro utiliza las tablas db, wordfilter y wordfilter_characters)
	$config['HabboImg'] = "http://habbo.com.br"; //Link para sacar looks
	$config['RankMin'] = "9"; //Autoridad para entrar a la hk
	$config['RankMax'] = "10"; //Todos los pluggin de la hk
	
	/* Registro Configuracion */
	$config['startMotto'] = "Bienvenid@ al hotel"; //Mision Inicial
	$config['credits']	= "100000"; //Cantidad de creditos al registrarse
	$config['diamondsRef']	= "1";
	$config['registerEnable'] = true;
	
	
	switch($config['hotelEmu'])
	{
		case "arcturus":
		$emuUse['user_wardrobe']  = 'users_wardrobe ';
		$emuUse['ip_last'] = 'ip_current';
		$emuUse['respect'] = 'respects_received';
		$emuUse['user_stats'] = 'users_settings';
		$emuUse['user_stats_user_id'] = 'user_id';
		$emuUse['OnlineTime'] = 'online_time';
		break;
		case "plusemu":
		$emuUse['user_wardrobe']  = 'user_wardrobe ';
		$emuUse['ip_last'] = 'ip_last';
		$emuUse['respect'] = 'Respect';
		$emuUse['user_stats'] = 'user_stats';
		$emuUse['user_stats_user_id'] = 'id';
		$emuUse['OnlineTime'] = 'OnlineTime';
		break;
		default:
		//Nothing
		break;
	}
?>