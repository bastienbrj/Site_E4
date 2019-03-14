<?php
session_start();

?> 
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="mission.css"/>
    <title>Site E4 | Mission</title>
</head>

<body>
    <header>    
    <nav class="navbar navbar-dark bg-white">
    <h1 class="mission"><a class="link" href="index.php">Epoka E4</h1>
      <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="cv.php">Validation des missions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cv.php">Paiement des frais</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="cv.php">Paramétrage</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php" onclick="alert('Vous êtes déconnecté')">Déconnexion</a>
      </li>
    </ul>
  </nav>   
</header> 
<br>
<br>
</body>
</html>