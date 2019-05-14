<?php
include("models/ArtistModel.php");
require '../vendor/autoload.php';
require 'config.php';

     $req = $connection->prepare("SELECT * FROM \"user\" INNER JOIN \"Abonnement\" ON \"user\".id=\"Abonnement\".abonne WHERE  \"Abonnement\".abonnement = ?");
     $test=$req->execute(array($_GET['id']));
