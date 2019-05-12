<?php
require '../vendor/autoload.php';
require 'config.php';
/********************************AJOUT DES PUBLICATIONS*****************************************************/
if(isset($_POST['partager'])){

    // Pour empêcher les injections de code HTML !
    $description = htmlspecialchars($_POST['topic_description']);
    $id = $_GET['id'];
if(isset ($_FILES['photo']) AND !empty($_FILES['photo']['name'])){

		//taille maximum d'un fichier qu'on peut importer
		$maxSize= 2097152;

		//les extentions valides des images
		$validExtensions=Array('png','jpg','gif','jpeg');

		if($_FILES['photo']['size']<=$maxSize){

			//extraire l'extentrion du fichier importer par l'utilisateur et la transformer en miniscule
			$extensionUpload= strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));

			if(in_array($extensionUpload,$validExtensions)){
			
				$path="users/publication/".$id.date("H:i:s").".".$extensionUpload;
				$name=$id.date("H:i:s").".".$extensionUpload;
				$move=move_uploaded_file($_FILES['photo']['tmp_name'],$path);

				if($move){
					$publication=$connection->prepare('INSERT INTO "Publication" (user_id,description,photo,date_pub) VALUES (?,?,?,NOW())');
					$test=$publication->execute(array($id,$description,$name));		

	
				}

				else echo "Erreur pendant l'importation de votre photo"	;			


			}

			else echo "votre photo doit ếtre au format jpg, jpeg,png ou gif";


		}

		else echo"votre photo ne doit pas dépasser 2 Mo";

	}
}
/**********************************************LES LIKES*********************************************************/

if(isset($_POST['like'])){

	$aimer=$connection->prepare('Update "Publication" Set aime=aime+1');	
	$aimer->execute();



}









































