<?php

require 'config.php';
include("ArtistModel.php");
include('Filters/auth_filter.php');

if (isset($_GET['id']) && $_GET['id'] >0){

	$id = intval($_GET['id']);
	$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
    $requser->execute(array($id));
    $userinfo = $requser->fetch();

}

?>
<!DOCTYPE html>
<html lang="fr">

<?php include("Parties/_head.php"); ?>

<body>

	<?php include("Parties/_nav.php"); ?>

	<!-- Background image (Header)-->
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
		<!-- Profil image -->
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
			<li><a href ="editProfil.php"id="editProfil">Modifier</a></li>
			<li><a href ="" id="followers">Abonnées</a></li>
			<li><a href="" id="following">Abonnements</a></li>
			</ul>
		</nav>
	</div>

	<?php include("Parties/_footer.php");?>
</body>
</html>

