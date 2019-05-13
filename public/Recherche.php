<?php
require '../vendor/autoload.php';
require 'config.php';
include('models/ArtistModel.php');
if(isset($_GET['btn_search']) AND !empty($_GET['userRecherche'])) {
   		 $userRecherche = htmlspecialchars($_GET['userRecherche']);
		  
		 $name=explode(' ',$userRecherche);

		 if(sizeof($name)==1){
		 $requserR = $connection->prepare('SELECT * FROM "user" WHERE firstname= ? OR lastname= ? OR mail= ?');
		 $requserR->execute(array($userRecherche, $userRecherche,$userRecherche));
		}else{
		  $requserR = $connection->prepare('SELECT * FROM "user" WHERE firstname= ? OR lastname= ?  OR firstname= ? OR lastname= ?');
		 $requserR->execute(array($name[0],$name[1],$name[1],$name[0]));


		}
		 
	         //$possibleUsers = $requserR->fetch();

}?>
<!DOCTYPE html>
<html lang="fr">

<?php include("Parties/_head.php"); ?>

<body>
    


    <div id="userSearch">

		<ul>
			<?php while($u = $requserR->fetch()) { ?>
			     <li><?php 
				if(!empty($u['avatar']))
				{?>
				<img id="avatar" src="users/avatar/<?php echo$u['avatar']?>">
				<?php 
				} else {
				?>	
				<img id="avatar" src="images/avatar.png">
				<?php
				}
				?><a href="profil.php?id=<?php echo $u['id'] ?>"><? echo $u['firstname']." " . $u['lastname']; ?></li>
			 <?php } ?>
			      
			
		</ul>	

    </div>
    
    <?php include("Parties/_footer.php");?>
</body>
</html>
