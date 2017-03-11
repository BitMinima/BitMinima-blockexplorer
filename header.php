<?php
include('config.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
if (isset($_GET['lang'])){
setcookie("lang", $_GET['lang']);
$lang = $_GET['lang'];
}else{
if (isset($_COOKIE['lang'])) {
$lang = $_COOKIE['lang'];
}else{
setcookie("lang", en);
$lang = "en";
}
}
$langconst = parse_ini_file("lang/$lang.ini");
?>
<html lang="en">
		<script src="assets/js/jquery-3.1.0.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
<head>
<meta charset="charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $fullname ?> block explorer</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico"/>
<meta name="theme-color" content="#ffffff">
<script type="text/javascript">
function reloadPage()
{
window.location.reload()
}
</script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><?php echo $fullname ?> block explorer</a>
    </div>
    <ul class="nav navbar-nav">
    </ul>
	<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $langconst['lng'] ?><span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="?lang=en" onclick="reloadPage()" title="English"><img src="img/flags/US.png"> English</a></li>
<li><a href="?lang=ru" onclick="reloadPage()" title="Pусский"><img src="img/flags/RU.png"> Pусский</a></li>
<!-- <li><a href="?lang=tr" onclick="reloadPage()" title="Turkce"><img src="img/flags/TR.png"> Turkce</a></li>  //Please translate this language -->
</ul>
</li>
</ul>
  </div>
</nav>
</html>
