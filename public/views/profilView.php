<!DOCTYPE html>
<html>

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


	<?php

		if (isset($_GET['id']) && $_GET['id'] >0){
			$id = $_GET['id'];
			$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
			$requser->execute(array($id));
			$userinfo = $requser->fetch();

			$reqpub = $connection->prepare('SELECT * FROM "Publication" WHERE user_id = ? ORDER BY id DESC');
			$reqpub->execute(array($id));

		}
	?>

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
			<li><a href="profil.php?id=<?php echo $_GET['id'] ?>" role="button" class="btn">profil</a></li>
			<?php if($_SESSION['id']==$id) {?>
			<li><a href="editProfil.php?id=<?php echo $_GET['id'] ?>" id="editProfil">Modifier votre profile</a></li>
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



	<div class="publications">
		<?php if($_SESSION['id']==$id) {?>
					<form method="POST" enctype="multipart/form-data">
					<textarea type=text name="topic_description" placeholder="écrire quelque chose..."></textarea>
					<input type="file" name="photo"  >
					<input type="submit" name="partager" value="Partager" >
					
				</form>
		<?php } ?>

		<?php 
		while ($p = $reqpub->fetch()){?>
	        <div id = "pub">
				<div id="infos-user">
				<?php		
				if(!empty($userinfo['avatar']))
				{?>
					<img id="avatar" src="users/avatar/<?php echo$userinfo['avatar']?>">
					<p id="name"><a href="profil.php?id=<?php echo $_GET['id'] ?>">
					<?php echo $userinfo['firstname']." ". $userinfo['lastname'];?></a></p>
				</div>
					<?php 
				} else {
					?>
					<img id="avatar" src="images/avatar.png">
					<p id="name"><a href="profil.php?id=<?php echo $_GET['id'] ?>">
					<?php echo $userinfo['firstname']." ". $userinfo['lastname'];?></a></p>
			</div>
				<?php
				}?>
			
		
		
		<div id="contenue">
			<?php
			if(!empty($p['description'])){		
			?>
			<p id="pub_description"><?php echo $p['description'];?></p>
			<p id="pub_date"><?php echo "posté le ".$p['date_pub'];?></p>
			<?php 
			}
			?>
			<?php
			if(!empty($p['photo']))
			{?>
				<img id="pub_photo" src="users/publication/<?php echo $p['photo'];?>">
		</div>
	</div>
		<?php 
		}}
		?>

	<?php include("Parties/_footer.php");?>

</body>
</html>

