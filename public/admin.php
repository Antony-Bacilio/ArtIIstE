<?php 
require 'config.php';
include("ArtistModel.php");
include('Filters/auth_filter.php');

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

?>
<!DOCTYPE html>
<html>
<head>
    <title>ArtIIstE</title>
    <link rel="stylesheet" href="css/styleprofil.css">
</head>

<body>

	<?php 
	if(empty($userinfo['cover']))
	{?>
	<header style="background-image:url('../images/cover.jpg');">
	<?php 
	}else{?>
	<header style="background-image:url('<?php echo '../users/cover/'.$userinfo['cover'] ; ?>');">
	<?php
	}
	?>
		<div id="user-informations">
	<form method="POST">

			<button type="submit" name="logOut">
				<img src="images/logout.png" id="logOut">
			</button> 
	</form>
		<?php 
		if(!empty($userinfo['avatar']))
		{?>
		<img id="avatar" src="users/avatar/<?php echo$userinfo['avatar']?>">
		<?php 
		} else {
		?>	
		<img id="avatar" src="images/avatar.png">
		<?php
		}
		?>
		<p id="name"><?php echo $userinfo['firstname']." ". $userinfo['lastname'];?></p>
		</div>
	</header>
	<div id="informations">
		<nav>
			<ul>
			<li><a href ="utilisateur.php" id="editProfil">Utilisateurs</a></li>
			</ul>
		</nav>
	</div>
</body>
</html>

