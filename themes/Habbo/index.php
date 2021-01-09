<title><?php echo $lang["Iingres"] ?></title>
<meta http-equiv="refresh" content="3;url=/login">
<body>
	  	  <div id="loader">
<div class="text">
<?php echo $lang["Loading"] ?>...
</div>

</div>
	</body>
<style>
body{
	margin: 0;
	padding: 0;
}
#loader {

    background: url(<?php echo H. $config['skin']; ?>/assets/images/bg_hotel.out_.png) #07547c no-repeat;
    width: 100%;
    height: 120%;
    position: fixed;
    z-index: 1;
}
#myDiv {
  display: none;
  text-align: center;
}
.text {
    float: right;
    font-size: 50px;
    margin-right: 20%;
    margin-top: 10%;
    color: #fff;
    font-family: sans-serif;
}
</style>
</body>