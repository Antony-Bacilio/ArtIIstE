<?php 
require 'config.php';
include("models/ArtistModel.php");

if (isset($_GET['id']) && $_GET['id'] > 0){

	$id = intval($_GET['id']);
	$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
    $requser->execute(array($id));
    $userinfo = $requser->fetch();

}

if(isset($_SESSION['change']))
{
	echo $_SESSION['change'];
}

$checkusers = $connection->prepare('SELECT * FROM "user" WHERE id > 1 ');
$checkusers->execute();

if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
	$confirme = (int) $_GET['confirme'];
	$req = $connectiondd->prepare('UPDATE "user" SET confirm = 1 WHERE id = ?');
	$req->execute(array($confirme));
 }
 if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
	$supprime = (int) $_GET['supprime'];
	$req = $connection->prepare('DELETE FROM "user" WHERE id = ?');
	$req->execute(array($supprime));
 }


  /* Partie Vue */
include('views/ProfilAdminView.php');
?>


