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


	<!-- HEADER -->

		<!-- Background image -->
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
		<!-- FIN - Background image -->

			<div id="user-informations">

			<!-- Profil image -->
				<?php 
				if(!empty($userinfo['avatar']))
				{?>
				<img id="avatar" src="users/avatar/<?php echo $userinfo['avatar']?>">
				<?php 
				} else {
				?>	
				<img id="avatar" src="images/avatar.png">
				<?php
				}
				?>
				<!-- FIN - Profil image -->

				<p id="name"><?php echo $userinfo['firstname']." ". $userinfo['lastname'];?></p>

			</div>
		</header>
	<!-- FIN - HEADER -->



	<!-- Liens -->
	<div class="row">
		
		<div class="col-md-10">
				<nav>
					<ul>
					<li><a href="profil.php?id=<?php echo $_SESSION['id'] ?>">Profil</a></li>
					<?php if($_SESSION['id']==$id) {?>
						<li><a href="editProfil.php?id=<?php echo $_SESSION['id'] ?>" id="editProfil">Modifier votre profil</a></li>
					<?php }?>
					<li><a href ="FolowersList.php" id="followers">Abonnées</a></li>
					<li><a href="FolowedList.php" id="following">Abonnements</a></li>
					</ul>
				</nav>

				<?php if(!empty($userinfo['description'])){?>
					<h5 id="about-title">A propos de moi</h5>
					<p><?php echo $userinfo['description'];?>
				<?php }?>
		</div>
		<div class="col-md-2">
				<?php if($_SESSION['id']!= $id){ ?>
				<form method = "POST">
					<input type="submit" value="s'abonner" name="follow" class="btn btn-success">
					<input type="submit" value="désabonner" name="unfollow" class="btn btn-outline-danger">
				</form>
				<?php } ?>
				<?php 
					if(isset($_POST['follow'])){ echo "<p id=\"error\">".$error."</p>";}
					if(isset($_POST['unfollow'])){ echo "<p id=\"error\">".$error."</p>";}
				?>
		</div>

	</div>
	<!-- FIN - Liens -->		


<!-- Contenu Profil -->
<div class="container-fluid p-4 ">
		<div class="row content">

			<!-- Colonne Autres -->
			<div class="col-sm-3 sidenav ">
				<br>
				<h4>Derniers Artistes Inscrits</h4>

				
				<div class="input-group">
					
				</div>
			</div>
			<!-- FIN - Colonne Autres -->


			<!-- Colonne publications -->
			<div class="col-sm-9 bg-light" id="pub_profil">

					<div class="container-fluid" >

						<div id="userSearch" class="container mt-5">
                            <h3>Artistes qui vous suivent : </h3>
							<div class="">
								<?php while($a = $req->fetch()) { ?>

										<!-- Avatar Artiste cherché-->
										<a href="profil.php?id=<?php echo $a['abonne'] ?>">
											<?php if(!empty($a['avatar'])){?>
												<img id="avatar_user" src="users/avatar/<?php echo $a['avatar']?>">
											<?php } else {?>	
												<img id="avatar_user" src="images/avatar.png">
											<?php	} ?>
										</a>
										<!-- FIN - Avatar Artiste cherché-->

										<!-- Nom Artiste cherché -->
										<h5>
											<a href="profil.php?id=<?php echo $a['abonne'] ?>"><? echo $a['firstname']." " . $a['lastname']; ?>
										</h5>
										<!-- FIN - Nom Artiste cherché -->

								<?php }?>
							</div>
						</div>

					</div>
					
					<hr>

    		</div>
			<!-- FIN - Colonne publications -->

  	</div>
</div>
<!-- FIN - Contenu Profil -->

<?php include("Parties/_footer.php");?>

</body>

</html>