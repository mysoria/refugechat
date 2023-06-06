<?php
session_start();

?>
<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="inscription.css" media="screen" type="text/css" />
 </head>
 <body>
 <div class="main">
        <div class="box">
            <h2> Connexion </h2>
            <form method="POST" action="connexion_post.php" enctype="multipart/form-data">

                <div class="unInput">
                    <input type="email" name="mail" autocomplete="off" placeholder="Entrez votre adresse email"required>
                </div>

               
                <div class="unInput">
                    <input type="password" name="motdepasse" autocomplete="off" placeholder="Mot de passe"required>
                </div>
                
                <div class="unInput">
                    <button type="submit" name="connexion">Connexion</button>
                </div>
                <div class="unInput">
                    <a href="inscription.php">Vous n'avez pas encore de compte ? Cliquez ici !</a>
                </div>
                
                <div class="unInput">
                    <a href="index.php">retour</a>
                </div>
            </form>
        </div>
    </div>
            <?php
            if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        
 </form>
 </div>
 </body>
</html>