<?php
try
{
    $bdd= new PDO ('mysql:host=localhost;dbname=epoka_e4;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    if(!isset($_GET['dateDeb']) || !isset($_GET['dateFin'])  || !isset($_GET['ville']) || !isset($_GET['idEm']))
    {
        throw new Exception('Paramètres manquants');
    }
    $req =$bdd->prepare('INSERT INTO mission (mis_dateDeb, mis_dateFin, mis_valider, mis_rembourser, mis_PersoId, mis_VilId) VALUES (:dateDeb,:dateFin,0,0,:idEm,:idVi)');
    $req->bindParam(':dateDeb',$_GET['dateDeb'],PDO::PARAM_STR);
    $req->bindParam(':dateFin',$_GET['dateFin'],PDO::PARAM_STR);
    $req->bindParam(':idEm',$_GET['idEm'],PDO::PARAM_INT);
    $req->bindParam(':idVi',$_GET['ville'],PDO::PARAM_INT);
    if($req->execute())
    {
        echo 'La mission a été enregistré avec succès';
    }
}
catch(Exception $expt)
{
    echo 'Erreur : '.$expt->getMessage();
}
?>