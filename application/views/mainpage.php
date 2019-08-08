<?php $url = site_url('/');?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href=<?php echo $url."application/css/bootstrap.css"?> media="screen" />
		<!--<script type="application/javascript" src="application/js/bootstrap.bundle.js"></script>-->
		<script type="application/javascript" src=<?php echo $url."application/js/jquery-3.4.1.js"?>></script>
        
        <meta charset="utf-8" />
        <title>Mainpage</title>
    </head>

    <body>
        <h3>Bienvenue sur la page Principale</h3>
        <!--<div><a href='<?php echo $url.'Main_controller/pagea' ?>'>Page A</a></div>
        <div><a href='<?php echo $url.'Main_controller/pageb' ?>'>Page B</a></div>
        <div><a href='<?php echo $url.'Main_controller/pagec' ?>'>Page C</a></div></div>-->
        <div><a href='<?php echo $url.'Main_controller/userlist' ?>'>Page User</a>
    </body>
</html>
