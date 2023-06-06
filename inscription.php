<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="inscription.css" href="//fonts.googleapis.com/css?family=Dancing+Script" />
    <title> Inscription </title>
</head>

<body>
    <div class="main">
        <div class="box">
            <h2>Inscription</h2>
            <form method="POST" action="inscription_post.php" enctype="multipart/form-data">

                <div class="unInput">
                    <input type="text" name="nom" autocomplete="off" placeholder="Nom"required>
                </div>

                <div class="unInput">
                    <input type="text" name="prenom" autocomplete="off" placeholder="Prenom"required>
                </div>
                <div class="unInput">
                    <input type="text" name="pseudo" autocomplete="off" placeholder="Pseudo"required>
                  
                </div>

                <div class="unInput">
                    <input type="email" name="mail" autocomplete="off" placeholder="Mail" required>
                </div>

                <div class="unInput">
                    <input type="password" name="motdepasse" autocomplete="off" placeholder="Mot de passe"required>
                </div>
                <div class="unInput">
                    <input type="date" name="datenaiss">
                </div>
                <div class="unInput">
                    <button type="submit" name="inscription">Inscription</button>
                </div>
                <div class="unInput">
                    <a href="connexion.php">retour</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

