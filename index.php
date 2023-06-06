<?php
 session_start();
 include "bdd.php";
 
 ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refuge</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <header>

     <nav>
       <row class="navbar">
            <a href="index.php" ><img src="image/logo.jpg"> </a>
            <a href="consultation.php">Consulter</a>
            
            <?php

            // si mail mdp et admin non vide on affiche deco 
            
            if(isset($_SESSION['mail']) && isset($_SESSION['motdepasse'])) {
                echo '<a href="deco.php"> Se déconnecter</a>';
                echo '<a href="favoris.php"> Favoris</a>';

                // si c'est un admin, on affiche :
                if($_SESSION['idrole'] == "1"){
                    echo '<a href="admin.php"> ADMIN</a>';
                }
                else {
                    
                }

            // si mail mdp et admin vide on affiche conne 
            
             } else {

                echo '<a href="connexion.php"> Se connecter</a>';

            }
            ?>
            

        </row>

        </nav>
    </header>
    <article>
    <section class="masection">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="text-block">
                        <h2> Quel est l'intérêt du site adopteunchat ? </h2>
                        
                        <p>L'intérêt de ce site est de répertorier les chats qui ont été recueillis dans le refuge SOS Chat, situé à Marseille dans le 13ème arrondissement. Les chats mis en ligne sont à la recherche d'un ou d'une propriétaire. On peut y retrouver leur prénom, leur race, s'ils sont vaccinés ou non. Il y aura également une courte description de leur caractère.</p>
                        <p> Les chats sont recensés dans des annonces et vous pouvez les consulter ainsi que les mettre en favoris.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>



</body>

</html>
