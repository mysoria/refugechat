<?php
session_start();
include "bdd.php";

if (isset($_POST['delete_favoris'])) {
    echo 'dfsfsdf';
    $annonce_id = $_POST['annonce_id'];
    $iduser = $_SESSION['id_utilisateur'];
    

    // Effectuer la suppression dans la base de données
    $requete = $db->prepare('DELETE FROM favoriser WHERE idchat = ? AND id = ?');
    $requete->bind_param('ii', $annonce_id, $iduser);
    $result = $requete->execute();

    echo('dfgdfgdf');

    // Rediriger l'utilisateur vers la page de consultation ou afficher un message de confirmation
    if ($result) {
        header("Location: consultation.php");
        exit();
    } else {
        echo "Une erreur s'est produite lors de la suppression.";
    }
}
?>
