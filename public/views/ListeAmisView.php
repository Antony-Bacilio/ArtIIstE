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
        <!-- Profil image -->
        <?php 
        if(!empty($userinfo['avatar']))
        {?>
        <img id="avatar" src="../users/avatar/<?php echo$userinfo['avatar']?>">
        <?php 
        } else {
        ?>	
        <img id="avatar" src="../images/avatar.png">
        <?php
        }
        ?>
        <p id="name"><?php echo $userinfo['firstname']." ". $userinfo['lastname'];?></p>
	</div>
	</header>
	<div id="informations">
		<nav>
			<ul>
			<li><a href ="editProfil.php"id="../editProfil">Modifier</a></li>
			<li><a href ="" id="followers">Abonnées</a></li>
			<li><a href="" id="following">Abonnements</a></li>
			</ul>
		</nav>
    </div>
    <div class="container">
        <h3>Liste d'Amis</h3>
        <?php foreach ($usersinfo as $user) : ?>
            <div>
                <a href="profil.php?id=<?php echo$user['id']?>">
                    <?php
                    if(!empty($user['avatar']))
                    {?>
                    <img id="avatar_user"  src="../users/avatar/<?php echo$user['avatar']?>">
                    <?php 
                    } else {
                    ?>	
                    <img id="avatar_user" src="../images/avatar.png">
                    <?php
                    }
                    ?>
                </a>
                
                <h5><a href="profil.php?id=<?php echo$user['id']?>">
                    <?php echo $user['firstname'] ?> <?php echo $user['lastname'] ?></a>
                </h5>
                
            </div>  
        <?php endforeach; ?>

    </div>
    
    
    <?php include("Parties/_footer.php");?>
</body>
</html>