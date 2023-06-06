<?php
session_start();
include "bdd.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css" />
    <title> Admin </title>
</head>

<body>
    
<header>


<nav>
  <div class="navbar">
     <!-- <a href="index.php" ><img src="image/logo.jpg"> </a>  -->
       <a href="consultation.php">Consulter</a>
       <a href="#contact">Contact</a>
       
       <?php
       // si mail mdp et admin non vide on affiche deco 
       
       if(isset($_SESSION['mail']) ){
        
           echo '<a href="deco.php"> Se déconnecter</a>';
           // si c'est un admin, on affiche :
           if($_SESSION['idrole'] == "1"){
               echo '<a href="admin.php"> ADMIN</a>';
           }
           else {
               echo '<a href="admin.php"> Favoris</a>';
               
           }

       // si mail mdp et admin vide on affiche conne 
       
        } else {

           echo '<a href="connexion.php"> Se connecter</a>';

       }
       ?>
       

   </div>

   </nav>
</header>
    <div class="main">
        <div class="box">
            <h2>Ajouter une annonce</h2>
            <form method="POST" action="consultation.php" enctype="multipart/form-data" >

                <div class="unInput">
                    <input type="text" name="titre" autocomplete="off" placeholder="Titre"required>
                </div>

                <div class="unInput">
                    <input type="text" name="prenomchat" autocomplete="off" placeholder="Prenom du Chat"required>
                </div>
                <div class="unInput">
                    <input type="text" name="agechat" autocomplete="off" placeholder="Age"required>
                  
                </div>
                <div class="unInput">
                    
                        <select name="sexe" required>
                            <option value="">Sexe</option>
                            <option value="0">Mâle</option>
                            <option value="1">Femelle</option>
                       </select>
                       
                  
                </div>
                            

                <div class="unInput">
                    <input type="text" name="race" autocomplete="off" placeholder="race" required>
                </div>
                
                <div class="unInput">
                    <input type="text" name="description" autocomplete="off" placeholder="Description" required>
                </div>
                <div class="unInput" required>
                <label for="vaccin" >Le chat est-il vacciné ? </label>
                <input type="radio" name="vaccin" value="1" required>oui 
                <input type="radio" name="vaccin" value="0">non

                </div>

                <!-- <div class="unInput"> -->
                <label for="chatphoto"><u>Sélectionnez l'image du chat<u></label>
                
                <input type="file" name="photos"
                accept=".jpg,.jpeg,.png" required> 

                <input type="submit" name="submit" value="Ajouter" >

            </form>
        </div>
    </div>
  
</body>

</html>

