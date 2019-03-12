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
    <link rel="stylesheet" href="index.css"/>
    <title>Site E4 | Accueil</title>
</head>

<body>
    <h1 class="titre">Epoka E4</h1>
    <br>
    <br>
    <br>
    <div class="container">
    <div class="py-5 text-center">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h1 class="mb-4">Connectez-vous</h1>

          <form name="connexion" action="connexion.php" method="POST">
            <div class="form-group"> <input type="text" class="form-control" name="pers_id" placeholder="Utilisateur" id="pers_id"> </div>
            <div class="form-group"> <input type="password" class="form-control" name="pers_mdp" placeholder="Mot de passe" id="pers_mdp"> 
            </div> 
            <button type="submit" class="btn btn-primary">Valider</button>
          </form>

        </div>
      </div>
    </div>
  </div>

</body>

</html>