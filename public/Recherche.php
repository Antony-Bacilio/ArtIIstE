<?php

require '../vendor/autoload.php';
require 'config.php';
include('models/ArtistModel.php');


if(isset($_GET['btn_search']) AND !empty($_GET['userRecherche'])) {

  	$userRecherche = htmlspecialchars($_GET['userRecherche']);	  
		$name = explode(' ', $userRecherche);

		if(sizeof($name)==1){

			$requserR = $connection->prepare('SELECT * FROM "user" WHERE firstname= ? OR lastname= ? OR mail= ?');
			$requserR->execute(array($userRecherche, $userRecherche,$userRecherche));

		}else{

			$requserR = $connection->prepare('SELECT * FROM "user" WHERE firstname= ? OR lastname= ?  OR firstname= ? OR lastname= ?');
		 	$requserR->execute(array($name[0],$name[1],$name[1],$name[0]));

		}
		 
	  //$possibleUsers = $requserR->fetch();
		
}
//else header("Location : profil.php?id=".$_SESSION['id']);


?>



<!DOCTYPE html>
<html lang="fr">

<?php include("Parties/_head.php"); ?>

<body>

	<?php
			$id=$_SESSION['id'];
			$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
			$requser->execute(array($id));
			$userinfo = $requser->fetch();

			$reqpub = $connection->prepare('SELECT * FROM "Publication" WHERE user_id = ? ORDER BY id DESC');
			$reqpub->execute(array($id));
		?>

	<?php include("Parties/_nav.php");?>

	<!-- Background image (Header)-->
	<?php 
	if(empty($userinfo['cover']))
	{?>
	<header style="background-image:url('images/cover.jpg');">
	<?php 
	}else{?>
	<header style="background-image:url('<?php echo 'users/cover/'.$userinfo['cover'] ; ?>');">
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
			<li><a href="profil.php?id=<?php echo $_SESSION['id'] ?>" role="button" class="btn">profil</a></li>
			<?php if($_SESSION['id']==$id) {?>
			<li><a href="editProfil.php?id=<?php echo $_SESSION['id'] ?>" id="editProfil">Modifier votre profile</a></li>
			<?php }?>
			<li><a href ="" id="followers">Abonnées</a></li>
			<li><a href="" id="following">Abonnements</a></li>
			</ul>
		</nav>

		<?php 
		if(!empty($userinfo['description']))
		{?>
		<h5 id="about-title">A propos de moi</h5>
		<p><?php echo $userinfo['description'];?>
		<?php }?>
	</div>

    <div id="userSearch" class="container mt-5">
			<h3>Artistes trouvés: </h3>
			<div class="">
				<?php while($u = $requserR->fetch()) { ?>
							<a href="profil.php?id=<?php echo $u['id'] ?>">
								<?php 
								if(!empty($u['avatar']))
								{?>
								<img id="avatar_user" src="users/avatar/<?php echo$u['avatar']?>">
								<?php 
								} else {
								?>	
								<img id="avatar_user" src="images/avatar.png">
								<?php
								}
								?>
							</a>
							<h5>
								<a href="profil.php?id=<?php echo $u['id'] ?>"><? echo $u['firstname']." " . $u['lastname']; ?>
							</h5>
						<?php } ?>
			</div>
    </div>
    
    <?php include("Parties/_footer.php");?>

</body>

</html>
