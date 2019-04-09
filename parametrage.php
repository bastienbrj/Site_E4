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
$requtf8 = $bdd->query("SET NAMES 'utf8'");
$req = $bdd->query('SELECT Vil_Nom, Vil_Id FROM ville ORDER BY Vil_Nom');
$reqRemb = $bdd->query('SELECT * FROM paiement');
$reqVille=$bdd->query('SELECT v1.Vil_Nom AS villeA, v2.Vil_Nom AS villeB, dist_km FROM distance INNER JOIN ville AS v1 ON dist_Villedeb = v1.Vil_Id INNER JOIN ville AS v2 ON dist_Villefin = v2.Vil_Id ');
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
  <form name="montantRemboursementKm" method="post" action="script_montant.php">
    <label>Remboursement au Km : <input type="text" name="rembKm" id="rembKm"></label><br>
    <label>Indemnité d'hébergement : <input type="text" name="indHeb" id="indheb"></label><br>
    <input type="submit" placeholder="Valider">
</form>
<br>
<br>
<hr>
<h2>Distance entre les villes</h2>
<form name="distanceVille" method="post" action="script_para.php">
    <?php
    $list ='';
    foreach($req as $row){
        $list.= '<option value="'.$row[1].'">' .$row[0].'</option>';
    }
    ?>
    De : <select name="distance1"><?= $list;?> </select>
    À  : <select name="distance2"><?=$list; ?></select> 
    Distance en Km : <input type="text" name="distKm">
    <input type="submit" placeholder="Valider">
    
</form>
<br>
<br>
<h2>Distance entre villes déjà saisies</h2>
<?php
echo '<table style="width: 50%">';
echo '<tr>';
echo '<th style= "background-color: black">De</th><th style= "background-color: black">À</th><th style= "background-color: black">Km</th>';
echo '</tr>';
while ($row = $reqVille->fetch()){
    echo '<tr>
<td>'.$row['villeA'].'</td>
<td>'.$row['villeB'].'</td>
<td>'.$row['dist_km'].'</td>
</tr>';
}
echo '<table>'
?></center>
<?php
  }
?>
</body>
</html>