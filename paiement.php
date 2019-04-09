<?php
session_start();
if (!isset($_SESSION['pers_id'])){
  die(header('Location: index.php'));
}

try{
  $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
  }
catch(Exception $e){
  die("Erreur :" . $e->getMessage());
  }
$req = $bdd->query('SELECT mis_id, pers_nom, pers_prenom, mis_dateDeb, mis_dateFin, Vil_Nom, mis_valider, mis_rembourser
                    FROM personnel, mission, ville
                    WHERE mis_PersoId = pers_id AND mis_VilId = Vil_Id');

$reqMontant = $bdd ->query('SELECT ((DATEDIFF(mis_dateFin, mis_dateDeb) + 1) * pai_hebergement) as PrixJour,
                                   (ROUND(dist_km * pai_remboursement, 2)) as PrixKm, 
                                   (((DATEDIFF(mis_dateFin, mis_dateDeb) + 1) * pai_hebergement) + (ROUND(dist_km * pai_remboursement, 2))) as PrixTotal 
                            FROM mission, paiement, distance 
                            WHERE dist_Villefin = mis_VilId');

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
    <title>Site E4 | Paiement des frais</title>
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
  <h1>Paiement des missions</h1>
  <?php
    
echo '<center>';
echo '<table style="width: 50%">';
echo '<tr>';
echo '<th style= "background-color: black">Nom</th><th style= "background-color: black">Prenom</th><th style= "background-color: black">Debut mission</th><th style= "background-color: black">Fin mission</th><th style= "background-color: black">Lieu mission</th><th style= "background-color: black">Montant</th><th style= "background-color: black">Paiement</th>';
echo '</tr>';
$montants = array();
foreach ($reqMontant as $val){
    array_push($montants,$val['PrixTotal']);
}
$index =0;
while ($reponse = $req->fetch()) {

    echo '<tr>';

    echo '<td>'; echo $reponse['pers_nom'] ; echo '</td>';
    echo '<td>'; echo $reponse['pers_prenom'] ; echo '</td>';
    echo '<td>'; echo $reponse['mis_dateDeb'] ; echo '</td>';
    echo '<td>'; echo $reponse['mis_dateFin']; echo '</td>';
    echo '<td>'; echo $reponse['Vil_Nom'] ; echo '</td>';
    echo '<td>'; if($montants[$index] == 0){ echo '<td>parametrage vide</td>'; }else { echo ' <td>' . $montants[$index] . ' €' . '<td>'; }echo '</td>';
    echo '<td>'; if($reponse['mis_rembourser'] == 1){echo 'Remboursée';} else { echo '<a href="script_remboursement.php?id=' . $reponse['mis_id'] . '"><input type="button" value="Rembourser"> </a>';}echo '</td>';

    echo '</tr>';
    $index++;
}
echo '</table>';
echo '</center>';
?>
  <br>
<?php
  }
?>
</body>
</html>