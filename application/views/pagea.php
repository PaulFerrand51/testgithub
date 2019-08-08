<?php $url = site_url('/');?>

<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href=<?php echo $url."application/css/bootstrap.css"?> media="screen" />
		<link rel="stylesheet" type="text/css" href=<?php echo $url."application/css/pagea.css"?> media="screen" />
		<!--<script type="application/javascript" src="application/js/bootstrap.bundle.js"></script>-->
		<script type="application/javascript" src=<?php echo $url."application/js/jquery-3.4.1.js"?>></script>
		<script type="application/javascript" src=<?php echo $url."application/js/pagea.js"?>></script>
        
        <meta charset="utf-8" />
        <title>Page A</title>
    </head>

    <body>
        <h3>Bienvenue sur la page A</h3>
        <div><a href='<?php echo $url.'' ?>'>Page Principale</a></div>
        <div><a href='<?php echo $url.'Main_controller/pageb' ?>'>Page B</a></div>
        <div><a href='<?php echo $url.'Main_controller/pagec' ?>'>Page C</a></div>
        <div>
            <?php echo $this->session->flashdata('msg'); ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Age</th>
                    <th>Présentations</th>
                </tr>
                <?php
                $table = '';
                foreach($all_people as $people)
                {
                    $ligne = "<tr>";
                    
                        $ligne .= "<td>";
                        $ligne .= $people->surname;
                        $ligne .= "</td>";
                        $ligne .= "<td>";
                        $ligne .= $people->name;
                        $ligne .= "</td>";
                        $ligne .= "<td>";
                        $ligne .= $people->age;
                        $ligne .= "</td>";
                        $ligne .= "<td>";
                        $ligne .= $people->presentation();
                        $ligne .= "</td>";
                    
                    $ligne .= "</tr>";
                    $table .= $ligne;
                }
                
                echo $table;
                ?>
            </table>
        </div>
    </body>
</html>
