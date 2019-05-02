<?php 
include("ArtistModel.php");
require 'config.php';
	$id = intval($_SESSION['id']);
	$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
        $requser->execute(array($id));
        $userinfo = $requser->fetch();

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
		<li><a href ="" id="followers">Abonnées</a></li>
		<li><a href="" id="following">Abonnements</a></li>
	     </ul>
	</nav>
</div>

<form method="POST" name="modify" enctype="multipart/form-data">
			 <p class="label">Changer la photo de profil</p>
			 <input type="file" name="avatar"  >
			<p class="label">First Name</p>
			 <input type="text" value="<?php echo $userinfo['firstname'];?>" name="newFirstname"><br>
			 <p class="label">Last Name</p>
			 <input type="text" value="<?php echo $userinfo['lastname'];?>" name="newLastname"><br>
			 <p class="label">Password</p>
			 <input type="password" placeholder="nouveau mot de passe" name="newPassword"><br>
			 <p class="label">email</p>
			 <input type="email" value="<?php echo $userinfo['mail'];?>" name="newMail"><br>
			 <p class="label">Birthday</p>
			 <input type="text" value="<?php echo $userinfo['birthday'];?>" name="newBirth"><br>
			 <p class="label">sexe</p>
			 <input type="text" value="<?php echo $userinfo['sexe'];?>" name="newSexe"><br>
			 <p class="label">Ville</p>
			 <input type="text" value="<?php echo $userinfo['city'];?>" name="city"><br>
			 <p class="label">description</p>
			 <textarea  name="description" rows="7" cols="50"><?php echo $userinfo['description'];?></textArea><br>
  			<input type="submit" name="save" value="Enregistrer" onClick="alert('êtes-vous sûr ?')"> 
</form>








</body>
</html>

