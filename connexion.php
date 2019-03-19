<?php
session_start();
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4', 'root', '');
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}
    $num = $_GET['pers_id'];
    $mdp = $_GET['pers_mdp'];

    if(!empty($num) AND !empty($mdp)){
        $req = $bdd->prepare("SELECT * FROM personnel WHERE pers_id = ? AND pers_mdp = ?");
        $req->execute(array($num, $mdp));
        $persexist = $req->rowCount();

        if($persexist == 1){
            $persinfo= $req->fetch();
            $_SESSION['pers_id'] = $persinfo[0];
            $_SESSION['pers_mdp'] = $persinfo[3];
            $_SESSION['pers_nom'] = $persinfo[1];
            $_SESSION['pers_prenom'] = $persinfo[2];
            $_SESSION['pers_responsable'] = $persinfo[4];
            header ('Location: http://localhost/Site_E4/dashboard.php?pers_id='.$_SESSION['pers_id']);
        } 
        else 
        {
            echo "<script>alert('Identifiant ou mot de passe invalide !')</script>";         
        }
    }
    else 
    {
        echo "<script>alert('Tous les champs doivent être complétés !')</script>";
    }
?>
