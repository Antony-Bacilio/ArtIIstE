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
    

    <div class="container mt-3">
    <div class="media border p-3">
        <img src="images/avatar.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
        <div class="media-body">
        <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <div class="media p-3">
            <img src="images/avatar.png" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px;">
            <div class="media-body">
            <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>  
        </div>
    </div>
    </div>

	<?php include("Parties/_footer.php");?>
</body>
</html>