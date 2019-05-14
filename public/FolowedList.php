<?php
session_start();
require '../vendor/autoload.php';
require 'config.php';

    $req = $connection->prepare("SELECT * FROM \"user\" INNER JOIN \"Abonnement\" ON \"user\".id=\"Abonnement\".abonnement WHERE \"Abonnement\".abonne = ? ");
	$test=$req->execute(array($_SESSION['id']));


	include('views/FolowedListView.php');
?>


<div>
	<ul>
	<?php
		while ($a = $req->fetch()) {?>

			<li><a href="profil.php?id=<?php echo $a['abonnement'];?>"> <?php echo $a['firstname']." ".$a['lastname'];?></a></li>

		<?php } ?>

	</ul>
</div>
