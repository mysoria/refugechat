<?php
session_start();
$hote = 'localhost';
$utilisateur = 'root';
$mdp = '';
$nombdd = 'refuge';
$db = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);

        
$target_dir = "./chatimages";
print_r($_FILES);

// concaténation avec le chemin de l'iamge + attribut photos et son nom
$direction = $target_dir . "/" . basename($_FILES["photos"]["name"]);
$uploadOk = 1;
$chemin = $_FILES["photos"]["tmp_name"];

if (move_uploaded_file($chemin, $direction)) {
    $idchat = 1;
    $requete = $db->prepare('UPDATE chat SET image = ? WHERE idchat = ?');
    $requete->bindValue(1, $direction);
    $requete->bindValue(2, $idchat);
    echo 'eqsqs';
    
    $requete->execute();
}

// requête pour récupérer l'image + l'id du chat

$requete = $db->prepare('SELECT image FROM chat WHERE idchat = ?');
$requete->bindValue(1, 1);
$requete->execute();
$resultat = $requete->fetch(PDO::FETCH_ASSOC);
$cheminImage = $resultat['image'];

echo '<img src="'. $cheminImage . '" alt="Description de l\'image">';


        // $target_dir = "./chatimages";
        
        // $direction=$target_dir ."/".basename($_FILES["photos"]["tmp_name"]);
        // $uploadOk=1;
        // $chemin=$_FILES["photos"]["tmp_name"];
        
        // if (move_uploaded_file($chemin, $direction)) {
        //     $idchat=1;
        //     $requete = $db->prepare('UPDATE chat SET image = ? WHERE idchat = ?');
        //     $requete->bind_param($direction,$idchat);
        //     echo 'eqsqs';

        //     $requete->execute();
        // }
        

                
//         $target_dir = "./img/userPFP";
//         $avatar = $target_dir . $_POST["title"] . "_" . basename($_FILES["includedFile"]["name"]);
//         $uploadOk = 1;
//         $imageFileType = strtolower(pathinfo($avatar,PATHINFO_EXTENSION));
//         // Check if image file is a actual image or fake image
//         if(isset($_POST["submit"])) {
//         $check = getimagesize($_FILES["includedFile"]["tmp_name"]);
//         if($check !== false) {
//             echo "File is an image - " . $check["mime"] . ".";
//         } else {
//             echo "File is not an image.";
//             $uploadOk = 0;
//         }
//         }
//         if($uploadOk == 1){
//             move_uploaded_file($_FILES["includedFile"]["tmp_name"], $avatar);
//         }   

//         $insertUser=$bdd->prepare("INSERT INTO utilisateurs (pseudo, email, mdp, avatar, dateCreation) VALUES (?, ?, ?, ?, CURDATE())");
//         $insertUser->bindParam(1, $pseudo);
//         $insertUser->bindParam(2, $email);
//         $insertUser->bindParam(3, $mdp);
//         $insertUser->bindParam(4, $avatar);
//         $insertUser->execute();
//         header("location:./index.php");
// }
//        // $nom=htmlspecialchars($_POST['nom']);

    

?>
<!DOCTYPE html>
<head>
</head>
<body>

</body>

