<?php
session_start();
include "bdd.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title> Admin </title>
</head>

<body>


    </br>
    </br>
    </br>

    </br>
<div class="row">
    <div class= "col-5"> </div>
    <div class="col-2"> 
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    
    </div>
    </div>
    <div class= "col-5"> </div>

</div>


                <form method="POST" action="form_post.php" enctype="multipart/form-data">
        </div>

                    <!-- <div class="unInput"> -->
                    <label for="chatphoto"><u>Sélectionnez l'image du chat<u></label>
                    <input type="file" name="photos"
            accept=".jpg,.jpeg,.png"> 

                    <input type="submit" name="formulaire" value="Ajouter" >

                </form>
            </div>

  
</body>

</html>

