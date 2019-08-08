<?php $url = site_url('/');?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href=<?php echo $url."application/css/bootstrap.css"?> media="screen" />
		<!--<script type="application/javascript" src="application/js/bootstrap.bundle.js"></script>-->
		<script type="application/javascript" src=<?php echo $url."application/js/jquery-3.4.1.js"?>></script>
        
        <meta charset="utf-8" />
        <title>Objectpage</title>
    </head>

    <body>
        <h3>Bienvenue sur la page du test</h3>
        <div><a href='<?php echo $url.'' ?>'>Page Principale</a></div>
        <!--
        <div><a href='<?php echo $url.'Main_controller/pagea' ?>'>Page A</a></div>
        <div><a href='<?php echo $url.'Main_controller/pageb' ?>'>Page B</a></div>
        <div><a href='<?php echo $url.'Main_controller/pagec' ?>'>Page C</a></div>
        -->
        <div>
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo $url.'Main_controller/formpagedb'; ?>" method="post">
                <div class="form-group">
                    <input name="id" placeholder="id"  value="" class="form-control" type="hidden"/>
                </div>
                <div class="form-group">
                    <input name="name" placeholder="Your name" type="text" value="" class="form-control" />
                    <?php echo form_error('name', '<span class="text-danger">','</span>'); ?>
                </div>
                <div class="form-group">
                    <input name="email" placeholder="Your e-mail" type="text" value="" class="form-control" />
                    <?php echo form_error('email', '<span class="text-danger">','</span>'); ?>
                </div>
                <div class="form-group">
                    <select name='depar'>
                    <?php
                    $select = '';
                    foreach($all_depar as $depar)
                    {
                        $select .='<option value='.$depar->getName().'>'.$depar->getName().'</option>';
                    }
                    echo $select;
                    ?>
                    </select>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </body>
</html>
