<?php
 session_start();
 $_SESSION['mail'] = null;
 $_SESSION['admin'] = null;
 $_SESSION['mdp'] = null;
session_destroy();

header('Location: index.php'); // utilisateur ou mot de passe incorrect

?>