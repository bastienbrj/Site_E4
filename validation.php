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
    <title>Site E4 | Validation des missions</title>
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
  if(!isset($_SESSION['pers_responsable']) OR $_SESSION['pers_responsable'] == FALSE){
  ?> 
  <p class="refus">Accès refusé !</p>
  <?php
  }
  elseif(isset($_SESSION['pers_responsable']) OR $_SESSION['pers_responsable'] == TRUE){
  ?> 

  <br>
  <br>
  
  <h1>Validations des missions de vos subordonnés</h1>
  <?php
    try{
      $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
      }
    catch(Exception $e){
      die("Erreur :" . $e->getMessage());
      }
   $req = $bdd->query('SELECT pers_nom, pers_prenom, mis_dateDeb, mis_dateFin, Vil_Nom, mis_valider, mis_rembourser 
                        FROM personnel, mission, ville 
                        WHERE mis_PersoId = pers_id AND mis_VilId = Vil_Id');
echo '<center>';
echo '<table style="width: 50%">';
echo '<tr>';
echo '<th style= "background-color: black">Nom</th><th style= "background-color: black">Prenom</th><th style= "background-color: black">Debut mission</th><th style= "background-color: black">Fin mission</th><th style= "background-color: black">Lieu mission</th><th colspan=2; style= "background-color: black">Validation</th>';
echo '</tr>';

while($reponse = $req->fetch()) {

    echo '<tr>';

    echo '<td>'; echo $reponse['pers_nom'] ; echo '</td>';
    echo '<td>'; echo $reponse['pers_prenom'] ; echo '</td>';
    echo '<td>'; echo $reponse['mis_dateDeb'] ; echo '</td>';
    echo '<td>'; echo $reponse['mis_dateFin']; echo '</td>';
    echo '<td>'; echo $reponse['Vil_Nom'] ; echo '</td>';
    echo '<td>'; if ($reponse['mis_valider'] == 1){echo 'Valider';}else{echo 'Non valider';}; echo '</td>';
    echo '<td>'; if ($reponse['mis_rembourser'] == 1){echo 'Rembourser';}else{echo 'Non rembourser';} ;echo '</td>';

    echo '</tr>';
}
echo '<table>';
echo'</center>';
?>
<br>

<?php
  }
?>
</body>
</html>
