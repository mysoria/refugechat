<?php
     session_start();
     include "bdd.php";


     if (isset($_POST['connexion'])){
          $mail = htmlspecialchars($_POST['mail']);
     
          $requete = "SELECT motdepasse, id AS iduser FROM utilisateur WHERE mail = '" . $mail . "'";
          $exec_requete = mysqli_query($db, $requete);
          $reponse = mysqli_fetch_array($exec_requete);
          $hashedPassword = $reponse['motdepasse'];
          $id_utilisateur = $reponse['iduser'];
          $mdp = $_POST['motdepasse'];
          echo('exwxfwx');

          var_dump($hashedPassword);
          var_dump($mdp); 
          $mdpHache = md5($mdp . 'parogan');


          if($mdpHache === $hashedPassword) {
               $query = "SELECT utilisateur.id AS iduser, nom, prenom, pseudo, mail, motdepasse, datenaiss, avoir.idrole, avoir.id FROM utilisateur INNER JOIN avoir ON utilisateur.id = avoir.id WHERE mail ='" . $mail . "'";
               $requetePseudo = mysqli_query($db, $query);
               echo('TEEEST');
               echo "Requête : " . $query . "<br>";

               if (mysqli_num_rows($requetePseudo) > 0) {
                    $requete = mysqli_fetch_array($requetePseudo);
                    echo('YOUHOIUU');
          
                    $_SESSION['id_utilisateur'] = $requete['iduser'];
                    $_SESSION['idrole'] = $requete['idrole'];
                    $_SESSION['mail'] = $requete['mail'];
                    $_SESSION['motdepasse'] = $requete['motdepasse'];
          echo('reussi');
                    header('Location: index.php');
          } else {
               echo "Aucun utilisateur trouvé.";
          }
     
     }
}
         // header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide    
     
?>
