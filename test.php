<?php

else {

$target_dir = "./img/userPFP";
$avatar = $target_dir . $_POST["title"] . "_" . basename($_FILES["includedFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($avatar,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["includedFile"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
if($uploadOk == 1){
    move_uploaded_file($_FILES["includedFile"]["tmp_name"], $avatar);
}   

$insertUser=$bdd->prepare("INSERT INTO utilisateurs (pseudo, email, mdp, avatar, dateCreation) VALUES (?, ?, ?, ?, CURDATE())");
$insertUser->bindParam(1, $pseudo);
$insertUser->bindParam(2, $email);
$insertUser->bindParam(3, $mdp);
$insertUser->bindParam(4, $avatar);
$insertUser->execute();
header("location:./index.php");
}

}
?>

<p> Liste des annonces </p>


<!-- 
//  <?php foreach($annonce as $annonceEnCours): ?> 
//  <section> 
//         <article> 
//         <h1> Titre de l'annonce : <?php echo $annonceEnCours["titre"]?></h1>
//         <p> Prenom du chat :<?php echo $annonceEnCours["prenomchat"]?></p>
//         <p> Age: <?php echo $annonceEnCours["agechat"]?></p>
//         <p> Sexe: <?php echo $annonceEnCours["sexe"]?> </p>
//         <p>Description :<?php echo $annonceEnCours["description"] ?> </p>

//         <input class="favorite styled" type="button" value="Ajouter en favoris">

//         </article> 

//  <?php endforeach; ?> -->