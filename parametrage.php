<?php
session_start();
if (!isset($_SESSION['pers_id'])){
  die(header('Location: index.php'));
}
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
    <link rel="stylesheet" href="style1.css"/>
    <title>Site E4 | Paramétrage</title>
</head>

<body>
    <header>    
    <nav class="navbar navbar-dark bg-white">
    <h1 class="mission">Epoka E4</h1>
      <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Informations personnelles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="validation.php">Validation des missions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="paiement.php">Paiement des frais</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="parametrage.php">Paramétrage</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php" onclick="alert('Vous êtes déconnecté')">Déconnexion</a>
      </li>
      </ul>
    </nav>   
  </header> 
  <?php
  if(!isset($_SESSION['pers_responsable']) OR $_SESSION['pers_responsable'] == TRUE){
  ?> 
  <p class="refus">Accés refusé !</p>
  <?php
  }
  elseif(isset($_SESSION['pers_responsable']) OR $_SESSION['pers_responsable'] == FALSE){
  ?> 
  <br>
  <br>
  <h1>Paramétrage de l'application</h1>
  <br>
  <h1>Montant du remboursement au km</h1>
  <p>Remboursement au Km : <input type="text" name="km">
  <p>Indemnité d'hébergement : <input type="text" name="indemnite">
  <p><input type="submit"></p>
  <br>
  <hr>
  <h1>Distance entre villes</h1>
  <p>De : <input type="text" name="villedepart"> A : <input type="text" name="villefin"> Distance en Km : <input type="text" name="distance"> <input type="submit">
  <br>
  <h1>Distances entre villes déjà saisies</h1>
  <center><table border="3">
  <tr>
    <td>De</td>
    <td>A</td>
    <td>Km</td>
  </tr>
</table></center>
<?php
  }
?>
</body>
</html>