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
        <h3>Liste utilisateurs</h3>
        <div><a href='<?php echo $url.'' ?>'>Page Principale</a></div>
        <button onclick="location.href='<?php echo $url?>Main_controller/formpage'">Ajouter un utilisateur</button>
        <div>
            <?php echo $this->session->flashdata('msg'); ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Département</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                $table = '';
                foreach($all_user as $user)
                {
                    $ligne = "<tr>";
                    
                        $ligne .= "<td>";
                        $ligne .= $user->getName();
                        $ligne .= "</td>";
                        $ligne .= "<td>";
                        $ligne .= $user->getEmail();
                        $ligne .= "</td>";
                        $ligne .= "<td>";
                        $ligne .= $user->getDepar();
                        $ligne .= "</td>";
                        $ligne .= "<td>";
                        $ligne .= "<button>Editer</button>";
                        $ligne .= "</td>";
                        $ligne .= "<td>";
                        $ligne .= "<button>Supprimer</button>";
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
