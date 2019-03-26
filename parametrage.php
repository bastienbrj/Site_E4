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
  <p class="refus">Accès refusé !</p>
  <?php
  }
  elseif(isset($_SESSION['pers_responsable']) OR $_SESSION['pers_responsable'] == FALSE){
  ?> 
  <br>
  <br>
  <h1>Paramétrage de l'application</h1>
  <?php
  try{
      $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
      }
    catch(Exception $e){
      die("Erreur :" . $e->getMessage());
      }
   $req = $bdd->query('SELECT Vil_Id, Vil_CP, Vil_Nom FROM ville') 
  ?>
  <br>
  <h1>Montant du remboursement au km</h1>
  <form method="post" action="script_remboursement.php">
  <p>Remboursement au Km : <input type="text" name="km">
  <p>Indemnité d'hébergement : <input type="text" name="indemnite">
  <p><input type="submit"></p>
  </form>
  <br>
  <hr>
  <h1>Distance entre villes</h1>
  <form method="post" action="script_para.php">
  <p>De : <select name="distance1" id="distance1">
            <?php
            while($res = $req->fetch()) {
              echo '<option value="Vil_Id">';
              echo $res['Vil_Nom'];
              echo '</option>';
            }
            ?>
          </select> 
  <?php
  try{
      $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
      }
    catch(Exception $e){
      die("Erreur :" . $e->getMessage());
      }
   $req = $bdd->query('SELECT Vil_Id, Vil_CP, Vil_Nom FROM ville') 
  ?>
      À : <select name="distance2" id="distance2">
            <?php
            while($reponse = $req->fetch()) {
              echo '<option value="Vil_Id">';
              echo $reponse['Vil_Nom'];
              echo '</option>';
            }
            ?>
          </select> 
      Distance en Km : <input type="text" name="distKm"> 
      <input type="submit">
      </form>
  <br>
  <br>
  <h1>Distances entre villes déjà saisies</h1>
  <center><table style="width: 15%">
  <tr>
    <th style= "background-color: black">De</th>
    <th style= "background-color: black">À</th>
    <th style= "background-color: black">Km</th>
  </tr>
  <tr>
    <td>De</td>
    <td>À</td>
    <td>Km</td>
  </tr>

</table></center>
<?php
  }
?>
</body>
</html>