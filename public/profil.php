<?php

require 'config.php';
include("ArtistModel.php");
include('Filters/auth_filter.php');

if (isset($_GET['id']) && $_GET['id'] >0){

	$_SESSION['id'] = $_GET['id'];
	$id = intval($_GET['id']);
	$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
    $requser->execute(array($id));
    $userinfo = $requser->fetch();

}

/* Partie Vue */
include('Vues/Profil_vue.php');

?>


