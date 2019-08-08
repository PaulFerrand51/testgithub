<?php $url = site_url('/');?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href=<?php echo $url."application/css/bootstrap.css"?> media="screen" />
		<!--<script type="application/javascript" src="application/js/bootstrap.bundle.js"></script>-->
		<script type="application/javascript" src=<?php echo $url."application/js/jquery-3.4.1.js"?>></script>
        
        <meta charset="utf-8" />
        <title>Page C</title>
    </head>

    <body>
        <h3>Bienvenue sur la page C</h3>
        <div><a href='<?php echo $url.'' ?>'>Page Principale</a></div>
        <div><a href='<?php echo $url.'Main_controller/pagea' ?>'>Page A</a></div>
        <div><a href='<?php echo $url.'Main_controller/pageb' ?>'>Page B</a></div>
        <div>
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo $url.'Main_controller/contact'; ?>" method="post">
                <div class="form-group">
                    <input name="name" placeholder="Your name" type="text" value="<?php echo set_value('name'); ?>" class="form-control" />
                    <?php echo form_error('name', '<span class="text-danger">','</span>'); ?>
                </div>
                <div class="form-group">
                    <input name="email" placeholder="Your e-mail" type="text" value="<?php echo set_value('email'); ?>" class="form-control" />
                    <?php echo form_error('email', '<span class="text-danger">','</span>'); ?>
                </div>
                <div class="form-group">
                    <input name="subject" placeholder="Subject" type="text" value="<?php echo set_value('subject'); ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <textarea name="message" rows="4" class="form-control" placeholder="Your message"><?php echo set_value('message'); ?></textarea>
                    <?php echo form_error('message', '<span class="text-danger">','</span>'); ?>
                </div>
                <button name="submit" type="submit" class="btn btn-primary" />Send</button>
            </form>
        </div>
    </body>
</html>
