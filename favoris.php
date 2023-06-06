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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


</head>

<body>
    <header>
        <nav>
            <row class="navbar">
            <a href="index.php" ><img src="image/logo.jpg"> </a>

                    <a href="consultation.php">Consulter</a>
                    <a href="#contact">Contact</a>
                    
                    <?php
                    
                    if(isset($_SESSION['id_utilisateur'])) {
                        echo '<a href="deco.php"> Se déconnecter</a>';
                    } else {
                        echo '<a href="connexion.php"> Se connecter</a>';
                    }
                    ?>
            </row>

        </nav>
    </header>
    <article>
        <?php 

        //echo('sdgsdfsd');
        // var_dump($_POST);

        if (isset($_POST['favoris_submit'])){
            //echo('SDFSDFSDGSDSDF');

            $annonce_id = $_POST['annonce_id'];
           $iduser = $_SESSION['id_utilisateur'];
            $requete = $db->prepare('INSERT INTO favoriser (idchat, id) VALUES (?, ?)');
            $requete->bind_param('ss', $annonce_id, $iduser);
        
            $result = $requete->execute();
         }
                  
                if(!empty($_SESSION['id_utilisateur'] )){
                   // echo $_SESSION['id_utilisateur'];

                        // $titre = $_POST['titre'];
                        // $prenomchat = $_POST['prenomchat'];
                        // $agechat = $_POST['agechat'];
                        // $sexe = $_POST['sexe'];
                        // $description = $_POST['description'];
                        // $image = $_POST['image'];

                    //INSERTION ID CHAT ET ID UTILISATEUR
                    // $annonce_id = $_POST['annonce_id'];
                    $iduser = $_SESSION['id_utilisateur'];

                    $requete = $db->prepare('INSERT INTO favoriser (idchat, id) VALUES (?, ?)');
                    $requete->bind_param('ss', $annonce_id, $iduser);
                    $result = $requete->execute();

                   // echo('PARFDAIIKE');

                    // $requeteidchat = $db->prepare('SELECT * FROM chat INNER JOIN favoriser ON chat.id_utilisateur = favoriser.id WHERE favoriser.id = ?');
                    // $requeteidchat->bind_param('i', $iduser);
                    // $requeteidchat->execute();
                    // $result_id_chat = $requeteidchat->get_result()->fetch_assoc();
                    // $_SESSION['idchat'] = $result_id_chat['idchat'];
                    $requeteidchat = $db->prepare('SELECT * FROM chat INNER JOIN favoriser ON chat.idchat = favoriser.idchat WHERE favoriser.id = ?'); 
                    $requeteidchat->bind_param('i', $iduser);
                    $requeteidchat->execute();
                    $result_id_chat = $requeteidchat->get_result();
                    $iduser = $_SESSION['id_utilisateur'];
                    ?>
                    <form method="post" action="suppression.php">
                     <div class="row">  
                   <?php while ($row = $result_id_chat->fetch_assoc()) {
                        ?>
                        <!-- Affichage de l'annonce -->
                        <div class="col-3" style="margin: 0 !important;">
                            <section>
                                <article>
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                               <?php echo '<input type="hidden" name="annonce_id" value="' . $row['idchat'] . '">'; ?>
                                            <h1 class='card-title'><?php echo $row["titre"] ?></h1>
                                            <p class="card-text"> Prenom du chat :<?php echo $row["prenomchat"] ?></p>
                                            <p class="card-text"> Age: <?php echo $row["agechat"] ?></p>
                                            <p class="card-tsext"> Sexe: <?php echo $row["sexe"] ?> </p>
                                            <p class="card-tsext"> Race: <?php echo $row["race"] ?> </p>

                                            <p class="card-text">Description :<?php echo $row["description"] ?> </p>
                                            <p class="card-img-top"><?php echo '<img class="img-fluid" src="' . $row["image"] . '" alt="Description de l\'image">'; ?> </p>
                                            <input type="submit" name="delete_favoris" class="btn btn-primary" value="Supprimer">



                                        </div>
                                    </div>
                                </article>
                            </section>
                        </div>
                   </form>
<?php                 }
                 } 
                 
                 if (isset($_POST['supprimer_submit'])) {
                    echo 'dfsfsdf';
                    $annonce_id = $_POST['annonce_id'];
                    $iduser = $_SESSION['id_utilisateur'];
                    
                    echo('CACASDFSDF');
                
                    // Effectuer la suppression dans la base de données
                    $requete = $db->prepare('DELETE FROM chat WHERE idchat = ? AND id_utilisateur = ?');
                    $requete->bind_param('ii', $annonce_id, $iduser); // 'ii' pour deux entiers en tant que paramètres

                    $result = $requete->execute();
                    echo('GABOUUUUU');

                
                
                    // Rediriger l'utilisateur vers la page de consultation ou afficher un message de confirmation
                    if ($result) {
                        header("Location: consultation.php");
                        exit();
                    } else {
                        echo "Une erreur s'est produite lors de la suppression.";
                    }
                }
                ?>
                
                 
                

   
</body>

</html>
