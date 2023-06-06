<?php
session_start();
$hote = 'localhost';
$utilisateur = 'root';
$mdp = '';
$nombdd = 'refuge';
$db = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);

    if (isset($_POST['inscription'])){
        
        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $pseudo=htmlspecialchars($_POST['pseudo']);
        $mail=htmlspecialchars($_POST['mail']);
        $mdp=htmlspecialchars($_POST['motdepasse']);
        $dateNaiss=htmlspecialchars($_POST['datenaiss']);
        $mail= filter_var($mail, FILTER_VALIDATE_EMAIL);
        
        if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($dateNaiss)) {

            $requetemail = $db->prepare('SELECT COUNT(*) FROM utilisateur WHERE mail = ?');
            $requetemail->bindparam(1, $mail);
            $requetemail->execute();
            $count = $requetemail->fetchColumn();

            if ($count > 0) {
                // L'e-mail existe déjà, affichez un message d'erreur approprié
                echo "Cet e-mail est déjà utilisé.";
            } else {
                // Effectuez l'insertion dans la table
                // $sel = "parognanfsd";
                // $motdepasse_sel=$mdp . $sel;
                // $hashedPassword = password_hash($motdepasse_sel, PASSWORD_DEFAULT);


                $requete = $db ->prepare('INSERT INTO utilisateur (nom, prenom, pseudo, mail, motdepasse,datenaiss) VALUES (?,?,?,?,?,?)');
                $requete->bindparam(1, $nom);
                $requete->bindparam(2, $prenom);
                $requete->bindparam(3, $pseudo);
                $requete->bindparam(4, $mail);
                $requete->bindparam(5, $mdp);
                $requete->bindparam(6, $dateNaiss);
                $result = $requete->execute();

            if($result){
                $id_utilisateur=$db->lastInsertId();
                $id_role = 2; // ID du rôle utilisateur
                // lorsqu'un utilisateur se co il est obligatoirement un utilisateur (iD=2)
                $requeteAvoir = $db->prepare('INSERT INTO avoir (idrole, id) VALUES (?, ?)');
                $requeteAvoir->bindParam(1, $id_role);
                $requeteAvoir->bindParam(2, $id_utilisateur);
                $resultAvoir = $requeteAvoir->execute();
                if ($resultAvoir) {
                    header('Location: connexion.php');
                    exit();
                } else {
                    echo "Un problème est survenu lors de l'enregistrement du rôle utilisateur !";
                }
                } else {
                    echo "Un problème est survenu lors de l'enregistrement de l'utilisateur !";
                }
            }
        }
               
    }

?>
