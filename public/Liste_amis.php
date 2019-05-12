<?php 

require 'config.php';
include("ArtistModel.php");
include('Filters/auth_filter.php');

$id = intval($_SESSION['id']);

$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
$requser->execute(array($id));
$userinfo = $requser->fetch();

$req = $connection->prepare('SELECT * FROM "user" WHERE id > 1 ORDER BY "firstname"');
$req->execute();
$usersinfo = $req->fetchAll();

/* Partie Vue */
include('Vues/Liste_amis_vue.php');

?>	

