<?php
session_start();
require '../vendor/autoload.php';
require 'config.php';

    $req = $connection->prepare("SELECT * FROM \"user\" INNER JOIN \"Abonnement\" ON \"user\".id=\"Abonnement\".abonne WHERE  \"Abonnement\".abonnement = ?");
	$test=$req->execute(array($_SESSION['id']));


	include('views/FolowersListView.php');

?>

