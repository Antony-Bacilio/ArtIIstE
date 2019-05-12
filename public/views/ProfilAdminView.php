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
			<li><a href ="AdminUsers.php" id="editProfil">Utilisateurs</a></li>
			</ul>
		</nav>
	</div>
</body>
</html>