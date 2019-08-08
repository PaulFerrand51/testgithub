<?php $url = site_url('/');?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href=<?php echo $url."application/css/bootstrap.css"?> media="screen" />
		<!--<script type="application/javascript" src="application/js/bootstrap.bundle.js"></script>-->
		<script type="application/javascript" src=<?php echo $url."application/js/jquery-3.4.1.js"?>></script>
		<script type="application/javascript" src=<?php echo $url."application/js/test.js"?>></script>
        
        <meta charset="utf-8" />
        <title>Page B</title>
    </head>

    <body>
        <h3>Bienvenue sur la page B</h3>
        <div><a href='<?php echo $url.'' ?>'>Page Principale</a></div>
        <div><a href='<?php echo $url.'Main_controller/pagea' ?>'>Page A</a></div>
        <div><a href='<?php echo $url.'Main_controller/pagec' ?>'>Page C</a></div>
        <div>
        </div>
    </body>
</html>
