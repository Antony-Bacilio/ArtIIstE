<?php 

include("ArtistModel.php");
require 'config.php';
include('Filters/auth_filter.php');

	$id = intval($_SESSION['id']);
	$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
    $requser->execute(array($id));
	$userinfo = $requser->fetch();
	
/* Partie Vue */
include('Vues/EditProfil_vue.php');

?>




