<?php
// $hote = 'localhost';
// $utilisateur = 'root';
// $mdp = '';
// $nombdd = 'refuge';
// $db = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);

 #connexion à la base de données
 $db_username = 'root';
 $db_password = '';
 $db_name = 'refuge';
 $db_host = 'localhost';
 $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
?>

