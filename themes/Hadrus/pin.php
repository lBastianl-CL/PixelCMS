<body>
	<html>
		<head>
					<title><?= $config['hotelName'] ?> </title>
		</head>
		<body >
  
<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,700,300' rel='stylesheet' type='text/css'>

<div id="map-locator">
  <div class="container clearfix">
    <div class="one_half">
				<div class="error"><?php staffPin(); ?></div>
		<form name='PINform' id='PINform' method="post">

      <h1><?= $lang["Pintitu1"]; ?></h1>
	  <p>
<input action="post" align="left" method="post" id="PINbox" type="password" name="PINbox" style="padding: 10px;border-color: #fff;width: 40%;background: rgba(141, 74, 109, 0);border: 0px;border-bottom: 2px solid #c3c3c3;color: #828282;">
      <p><?= $lang["Pintext1"]; ?></p>
	  </p>
      <button type="submit" name="loginPin"><?= $lang["Pintext2"]; ?></button>
    </div>
	</form>
  </div>
</div>
		</body>
	</html>			
	<style>
	body {
  margin:0;
  padding:0;
  background: url(<?php echo H. $config['skin']; ?>/assets/images/Pin.png) no-repeat center #f1f1f1;
    opacity: 0.9;
}
h1 {
  font-family:Raleway, sans-serif;
  font-weight:normal;
}
p {
  font-family:sans-serif;
  color:#777;
  font-size:14px;
}
.clearfix:after {
  content:'';
  clear: both;
  display:block;
}
.container {
  display: block;
  max-width:1000px;
  margin:0 auto;
}
#map-locator {
  width:100%;
  background:#fdfdfd;
  margin:60px 0;
}
#map-locator button:hover {
	background:#8d4a6d;
  cursor:pointer;
}
#map-locator button {
  background: #8d4a6d;
  color:#fff;
  border:0;
  border-radius: 0;
  text-transform: uppercase;
  font-size: 11px;
  letter-spacing: 1px;
  margin-bottom:20px;
  padding:18px 15px;
}
#map-locator h1 {
	color:#999;
	line-height:0.5;
	padding-top:25px;
}
.one_half {
  float:left;
  margin:0;
}
	</style>