<?php 
require 'config.php';
include("ArtistModel.php");
if (isset($_GET['id']) && $_GET['id'] >0){

	$id = intval($_GET['id']);
	$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
        $requser->execute(array($id));
        $userinfo = $requser->fetch();

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ArtIIstE</title>
    <link rel="stylesheet" href="css/styleprofil.css">
</head>

<body>

<header>
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
		<li><a href ="editProfil.php"id="editProfil">Modifier</a></li>
		<li><a href ="" id="followers">Abonnées</a></li>
		<li><a href="" id="following">Abonnements</a></li>
	     </ul>
	</nav>
</div>
</body>
</html>

