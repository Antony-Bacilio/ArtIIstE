<?php

include('models/ArtistModel.php');


$userRecherche = $_POST['userRecherche'];

$requete = "SELECT * FROM \"user\" WHERE firstname='$userRecherche' OR lastname='$userRecherche'";
$reponse = $connection->prepare($requete);
$reponse->execute();
$ligneCourant = $reponse->fetch();

$idUser=$ligneCourant['id'];

if(!isset($idUser)){
    //echo "<script type=\"text/javascript\">alert(\"User pas enregistré !\")</script>";
    header("Location: profil.php?id=".$_SESSION['id']);

}
else header("Location: profil.php?id=".$idUser);


?>