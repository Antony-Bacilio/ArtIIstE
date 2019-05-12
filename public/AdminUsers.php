<?php 
include("models/ArtistModel.php");
require 'config.php';

	$id = intval($_SESSION['id']);
	$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
    $requser->execute(array($id));
    $userinfo = $requser->fetch();

    if(isset($_GET['confirme']) AND !empty($_GET['confirme']))
    {
        $confirme = (int) $_GET['confirme'];
        $req = $connection->prepare('UPDATE "user" SET confirm = 1 WHERE id = ?');
        $req->execute(array($confirme));
    }

    if(isset($_GET['bloque']) AND !empty($_GET['bloque']))
    {
        $bloque = (int) $_GET['bloque'];
        $req = $connection->prepare('UPDATE "user" SET confirm = 3 WHERE id = ?');
        $req->execute(array($bloque));
    }

    if(isset($_GET['supprime']) AND !empty($_GET['supprime']))
    {
        $supprime = (int) $_GET['supprime'];
        $req = $connection->prepare('DELETE FROM "user" WHERE id = ?');
        $req->execute(array($supprime));
    }

    $req = $connection->prepare('SELECT * FROM "user" WHERE id > 1 ORDER BY firstname');
    $req->execute();
    $usersinfo = $req->fetchAll();


    /* Partie Vue */
    include('views/AdminUsersView.php');
?>


