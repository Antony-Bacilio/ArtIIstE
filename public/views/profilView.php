<!DOCTYPE html>
<html>

<?php include("Parties/_head.php"); ?>

<body>

	<?php
		$id = $_SESSION['id'];
		$requser = $connection->prepare('SELECT * FROM "user" WHERE id = ? ');
		$requser->execute(array($id));
		$userinfo = $requser->fetch();

		$reqpub = $connection->prepare('SELECT * FROM "Publication" WHERE user_id = ? ORDER BY id DESC');
		$reqpub->execute(array($id));
	?>

	<!-- Barre de Navigation-->
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
				<img id="avatar" src="users/avatar/<?php echo$userinfo['avatar']?>">
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
					<li><a href="profil.php?id=<?php echo $_GET['id'] ?>">Profil</a></li>
					<?php if($_SESSION['id']==$id) {?>
						<li><a href="editProfil.php?id=<?php echo $_GET['id'] ?>" id="editProfil">Modifier votre profil</a></li>
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
			<div class="col-sm-9">
				<div class="">

					<div class="container-fluid">

						<!-- Ecriture Status Personel-->
						<?php if($_SESSION['id']==$id) {?>
										<form method="POST" enctype="multipart/form-data">
											<textarea class="form-control border-primary" type=text name="topic_description" placeholder="Quoi de neuf ?..."></textarea>
											<input type="file" name="photo" class="btn btn-light m-2" id="btn_parcourir" >
											<input type="submit" name="partager" value="Partager" class="btn btn-success">
										</form>
						<?php } ?>
						<!-- FIN - Ecriture Status Personel-->

						<!-- Ecriture Publication à quelqu'un -->
						<?php if($_SESSION['id']!=$id) {?>
										<form method="POST" enctype="multipart/form-data">
											<textarea class="form-control border-primary" type=text name="topic_description" placeholder="De visite ?.."></textarea>
											<input type="file" name="photo" class="btn btn-light m-2" id="btn_parcourir" >
											<input type="submit" name="partager" value="Partager" class="btn btn-success">
										</form>
						<?php } ?>
						<!-- FIN - Ecriture Publication à quelqu'un -->

					</div>
					

					<hr>
					
						
					<!-- Affichage Status -->
					<?php while ($p = $reqpub->fetch()){?>
					<div class="media m-5 p-3  bg-light" id="pub_profil">

							<!-- Test si Artiste a un avatar-->
							<?php	if(!empty($userinfo['avatar'])) {?>

									<!-- Entête Publication -->
									<a href="profil.php?id=<?php echo $_GET['id'] ?>">
										<img src="users/avatar/<?php echo$userinfo['avatar']?>" class="mr-3 mt-3 rounded-circle" style="width:60px;">
									</a>
									<div class="media-body">
											<h4>
												<a href="profil.php?id=<?php echo $_GET['id'] ?>">
													<?php echo $userinfo['firstname']." ". $userinfo['lastname'];?>
												</a> 
											<?php if(!empty($p['description'])){ ?>
													<small><i><?php echo "Posté le ".$p['date_pub'];?></i></small>
											</h4>
									<!-- FIN - Entête Publication -->

									<!-- Contenu Pub -->
											<p id=""><?php echo $p['description'];?></p>	
											<?php } ?>
											<?php if(!empty($p['photo'])) {?>
															<img  id="pub_photo" src="users/publication/<?php echo $p['photo'];?>">
											<?php } ?>
									</div>
									<!-- FIN - Contenu Pub -->

									<?php } else {?>

									<!-- Entête Publication -->
									<a href="profil.php?id=<?php echo $_GET['id'] ?>">
										<img src="images/avatar.png" class="mr-3 mt-3 rounded-circle" style="width:60px;">
									</a>
									<div class="media-body">
										<h4>
											<a href="profil.php?id=<?php echo $_GET['id'] ?>">
													<?php echo $userinfo['firstname']." ". $userinfo['lastname'];?>
											</a>
										<?php if(!empty($p['description'])){ ?>
											<small><i><?php echo "Posté le ".$p['date_pub'];?></i></small>
										</h4>	
									<!-- FIN - Entête Publication -->

									<!-- Contenu Pub -->
										<p id=""><?php echo $p['description'];?></p>	
										<?php } ?>
										<?php if(!empty($p['photo'])) {?>
														<img  id="pub_photo" src="users/publication/<?php echo $p['photo'];?>">
										<?php } ?>
									</div>
									<!-- FIN - Contenu Pub -->

							<?php }?>
							<!-- FIN - Test si Artiste a un avatar-->
							
					</div>
							<?php 
					}?>
					<!-- FIN - Affichage Status -->
					<hr>

				</div>
    	</div>
			<!-- FIN - Colonne publications -->

  	</div>
</div>
<!-- FIN - Contenu Profil -->


<!-- Contenu Footer -->
<!--<footer class="container-fluid pt-3 pb-1 mt-5" id="foot_profil">
  <div>
		<p class=""><strong>A r t I I s t E</strong>   &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; 2 0 1 9</p>
	</div>
</footer>-->

<?php include("Parties/_footer.php");?>
<!-- FIN - Contenu Footer -->				


</body>
</html>

