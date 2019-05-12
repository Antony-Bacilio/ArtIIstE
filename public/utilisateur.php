<?php 
include("ArtistModel.php");
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

    $req = $connection->prepare('SELECT * FROM "user" WHERE id > 1');
    $req->execute();
    $usersinfo = $req->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ArtIIstE</title>
    <link rel="stylesheet" href="css/styleprofil.css">
</head>

<body>	
<div id="informations">
		<nav>
			<ul>
            <li><a href ="utilisateur.php" id="editProfil">Utilisateurs</a></li>
			</ul>
		</nav>
	</div>
    <table class="table table-bordered table-hover table-striped">
        <thead style="font-weight: bold">
            <td>#</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Password</td>
            <td>Age</td>
            <td>sexe</td>
            <td>Status</td>
            <td>Confirmer</td>
            <td>Bloquer</td>
            <td>Supprimer</td>
        </thead>
        <?php /** @var \User\User $user */
        foreach ($usersinfo as $user) : ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['firstname'] ?></td>
                <td><?php echo $user['lastname'] ?></td>
                <td><?php echo $user['mail'] ?></td>
                <td><?php echo $user['passwd'] ?></td>
                <td><?php echo $user['birthday'] ?></td>
                <td><?php echo $user['sexe'] ?></td>
                <td><?php echo $user['confirm'] ?></td>
                <td><?php if($user['confirm'] == 0 || $user['confirm'] == 3) { ?><a href="utilisateur.php?confirme=<?= $user['id'] ?>">Confirmer</a><? } ?></td>
                <td><?php if($user['confirm'] == 0 || $user['confirm'] == 1) { ?><a href="utilisateur.php?bloque=<?= $user['id'] ?>">Bloquer</a><? } ?></td>
                <td><?php if($user['confirm'] == 0 || $user['confirm'] == 1 || $user['confirm'] == 3) { ?><a href="utilisateur.php?supprime=<?= $user['id'] ?>">Supprimer</a><? } ?></td>
            </tr>
        <?php endforeach; ?>
</table>

</body>

</html>
