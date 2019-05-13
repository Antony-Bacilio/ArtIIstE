<!DOCTYPE html>
<html>
<!--<head>
    <title>ArtIIstE</title>
    <link rel="stylesheet" href="css/styleprofil.css">
</head>-->
<?php include("Parties/_head.php"); ?>

<body>	
    <div id="informations" class="">
		<nav>
			<ul>
            <li><a href ="../AdminUsers.php" id="editProfil">Artistes :</a></li>
			</ul>
		</nav>
        <a href="../logOut.php" class="position-sticky">
            <button type="" name="logOut"><img src="images/logout.png" id="logOut"></button> 
        </a>
        
	</div>
    <table class="table table-bordered table-hover table-striped">
        <thead style="font-weight: bold" id="head-users">
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
            <tr class="">
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['firstname'] ?></td>
                <td><?php echo $user['lastname'] ?></td>
                <td><?php echo $user['mail'] ?></td>
                <td><?php echo $user['passwd'] ?></td>
                <td><?php echo $user['birthday'] ?></td>
                <td><?php echo $user['sexe'] ?></td>
                <td><?php echo $user['confirm'] ?></td>
                <td><?php if($user['confirm'] == 0 || $user['confirm'] == 3) { ?><a href="AdminUsers.php?confirme=<?= $user['id'] ?>">Confirmer</a><? } ?></td>
                <td><?php if($user['confirm'] == 0 || $user['confirm'] == 1) { ?><a href="AdminUsers.php?bloque=<?= $user['id'] ?>">Bloquer</a><? } ?></td>
                <td><?php if($user['confirm'] == 0 || $user['confirm'] == 1 || $user['confirm'] == 3) { ?><a href="AdminUsers.php?supprime=<?= $user['id'] ?>">Supprimer</a><? } ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>