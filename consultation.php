<?php
$hote = 'localhost';
$utilisateur = 'root';
$mdp = '';
$nombdd = 'refuge';
$db = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);
 
 session_start();
 ?>
 

<!DOCTYPE html>

<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refuge</title>
    <link href="consultation.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <header>

     
       <row class="navbar">
            <a href="index.php" ><img src="image/logo.jpg"> </a>
            <a href="favoris.php"> Favoris</a>
   
</row>

    
    </header>
<?php

if (isset($_POST['submit'])){
    
    $titre=htmlspecialchars($_POST['titre']);
    $prenomchat=htmlspecialchars($_POST['prenomchat']);
    $agechat=htmlspecialchars($_POST['agechat']);
    $sexe=htmlspecialchars($_POST['sexe']);
    $race=htmlspecialchars($_POST['race']);
    $description=htmlspecialchars($_POST['description']);
    $vaccin=htmlspecialchars($_POST['vaccin']??0);

    //$querychat="SELECT titre,prenomchat,agechat,sexe,race,description,image,estVacciner,id_utilisateur FROM chat";

   //echo ($_SESSION['idrole']);
    if (isset($_SESSION['idrole']) && $_SESSION['idrole'] == 1 ) {
       //echo 'sdfsdf';
        $target_dir = "./chatimages";
        
        // concaténation avec le chemin de l'image + attribut photos et son nom
        $direction = $target_dir . "/" . basename($_FILES["photos"]["name"]);
        $uploadOk = 1;
        $chemin = $_FILES["photos"]["tmp_name"];

       // if (!empty($titre) && !empty($prenomchat) && !empty($agechat) && !empty($sexe) && !empty($race) && !empty($description)  && !empty($vaccin)) {
       // echo 'YOUHOUUU';
    if(move_uploaded_file($chemin, $direction)){
            $requete = $db ->prepare('INSERT INTO chat (titre,prenomchat,agechat,sexe,race,description,image,estVacciner,id_utilisateur) VALUES (?,?,?,?,?,?,?,?,?)');
            $requete->bindparam(1, $titre);
            $requete->bindparam(2, $prenomchat);
            $requete->bindparam(3, $agechat);
            $requete->bindparam(4, $sexe);
            $requete->bindparam(5, $race);
            $requete->bindparam(6, $description);
            $requete->bindparam(7, $direction);            
            $requete->bindparam(8, $vaccin);
            $requete->bindparam(9, $_SESSION['id_utilisateur']);
            $result = $requete->execute();
            
            echo 'GABOUUU';  
        }    
    } 
}          
             // requete idchat  FROM CHAT
                $requeteidchat = $db->prepare('SELECT idchat FROM chat');                    
                $requeteidchat->execute();
                $result_id_chat = $requeteidchat->fetch(PDO::FETCH_ASSOC);
                $_SESSION['idchat'] = $result_id_chat['idchat'];                       
                //requête * FROM CHAT
                $main_requete=$db->prepare('SELECT * FROM chat');
                $main_requete->execute();
?>
        <!-- boucle pour afficher les annonces -->
            <div class="row" >  
<?php 

foreach($main_requete as $elementEnCours): ?>
    <div class="col-3" style="margin-down:20px;">
    
  <section> 
    <article> 
        <div class="card" style="width: 18rem;">
        <div class="card-body">
        <form method="POST" action="favoris.php" enctype="multipart/form-data" >
            
            <h1 class='card-title'>  <?php echo $elementEnCours["titre"]?></h1>
            <p class="card-text"> Prenom du chat : <?php echo $elementEnCours["prenomchat"]?></p>
            <p class="card-text"> Age: <?php echo $elementEnCours["agechat"]?></p>
            <p class="card-text"> Sexe: <?php echo $elementEnCours["sexe"]?> </p>
            <p class="card-text"> Race: <?php echo $elementEnCours["race"]?> </p>

            <p class="card-text">Description : <?php echo $elementEnCours["description"] ?> </p>

            <p class="card-img-top"><?php echo '<img class="img-fluid" src="'. $elementEnCours["image"] . '" alt="Description de l\'image">';?> </p>
            <?php if (empty($_SESSION['id_utilisateur'])) {
                                echo '<input type="button" class="btn btn-primary" onclick="window.location.href = \'connexion.php\';" value="Mettre en favoris">';
                                echo '<input type="button" class="btn btn-primary" onclick="window.location.href = \'connexion.php\';" value="Adopter">';
                            }  else if ($_SESSION['idrole'] == 1) {
                            
                        
                                echo '<input type="hidden" name="annonce_id" value="' . $elementEnCours['idchat'] . '">';
                                echo '<input type="hidden" name="titre" value="' . $elementEnCours['titre'] . '">';
                                echo '<input type="hidden" name="prenomchat" value="' . $elementEnCours['prenomchat'] . '">';
                                echo '<input type="hidden" name="agechat" value="' . $elementEnCours['agechat'] . '">';
                                echo '<input type="hidden" name="sexe" value="' . $elementEnCours['sexe'] . '">';
                                echo '<input type="hidden" name="race" value="' . $elementEnCours['race'] . '">';
                                echo '<input type="hidden" name="description" value="' . $elementEnCours['description'] . '">';
                                echo '<input type="hidden" name="image" value="' . $elementEnCours['image'] . '">';

                                echo '<input type="submit" name="favoris_submit" class="btn btn-primary" value="Mettre en favoris">';
                                echo '<input type="submit" name="adopter_submit" class="btn btn-primary" value="Adopter">';
                                echo '<input type="submit" name="supprimer_submit" class="btn btn-primary" value="Supprimer">';
                               
                            }else if ($_SESSION['idrole'] == 2) {
                                echo '<input type="hidden" name="annonce_id" value="' . $elementEnCours['idchat'] . '">';   
                                echo '<input type="hidden" name="titre" value="' . $elementEnCours['titre'] . '">';
                                echo '<input type="hidden" name="prenomchat" value="' . $elementEnCours['prenomchat'] . '">';
                                echo '<input type="hidden" name="agechat" value="' . $elementEnCours['agechat'] . '">';
                                echo '<input type="hidden" name="sexe" value="' . $elementEnCours['sexe'] . '">';
                                echo '<input type="hidden" name="race" value="' . $elementEnCours['race'] . '">';

                                echo '<input type="hidden" name="description" value="' . $elementEnCours['description'] . '">';
                                echo '<input type="hidden" name="image" value="' . $elementEnCours['image'] . '">';

                                echo '<input type="submit" name="favoris_submit" class="btn btn-primary" value="Mettre en favoris">';
                                echo '<input type="submit" name="adopter_submit" class="btn btn-primary" value="Adopter">';
                            }
                    
              ?>
                        </form>
        </div>
        </div>
        </article> 
        </form>
</section>

</div>
  
<?php endforeach; 
  
     ?>
 </div>  

</body>
</html>
