<?php
session_start(); 
require '../vendor/autoload.php';
require 'config.php';


/*********************************************  C O N N E X I O N  *****************************************************/
if(isset($_POST['signIn'])){

    $mailconnect = htmlspecialchars($_POST['logEmail']);
    $mdpconnect = htmlspecialchars($_POST['logPassw']);

    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $connection->prepare('SELECT * FROM "user" WHERE mail = ? AND passwd = ?');
        $requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		
        if($userexist == 1)
        {
			$userinfo = $requser->fetch();

			if($userinfo['confirm'] == 1)
			{
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['mail'] = $userinfo['mail'];
				header("Location: profil.php?id=".$_SESSION['id']);
			}
			else if($userinfo['confirm'] == 2)
			{

				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['mail'] = $userinfo['mail'];
				header("Location: ProfilAdmin.php?id=".$_SESSION['id']);
			}

			else if($userinfo['confirm'] == 3)
			{
				$msgWarning="Votre compte a été bloqué par l'administrateur !";
			}
			else
			{
				$msgWarning="Votre compte n'a pas encore été validé par l'administrateur !";
			}
			/* Ajout */
			$_SESSION['firstname'] = $userinfo['firstname'];
			$_SESSION['lastname'] = $userinfo['lastname'];
		}
		
		else $msgWarning="Veuillez vérifier votre login ou password !";
	}
	else $msgWarning="Tous les champs doivent être complétés !";
}

/*****************************  F O R M U L A I R E   D ' I N S C R I P T I O N  ***************************************/
if(isset($_POST['signUp'])){

    // Pour empêcher les injections de code HTML !
    $firstName = htmlspecialchars($_POST['firstname']);
    $lastName = htmlspecialchars($_POST['lastname']);
    $mail = htmlspecialchars($_POST['email']);
    $passwd = htmlspecialchars($_POST['password']);
    $sexe = $_POST['sexe'];
	$Birth = $_POST['Birth'];

    if(!empty($firstName) AND !empty($lastName) AND !empty($mail) AND !empty($passwd) AND !empty($Birth) AND !empty($sexe) )
    {
        if(strlen($firstName) <= 30)
        {
            if(strlen($lastName) <= 30)
            {
                $req = $connection->prepare('SELECT * FROM "user" WHERE mail = ?');
                $req->execute(array($mail));
				$exist = $req->rowCount();
				
                if($exist == 0)
                {
                    $insertmbr = $connection->prepare('INSERT INTO "user" (firstname, lastname, mail,passwd, birthday, sexe, confirm) VALUES (?,?,?,?,?,?,?)');
                    $insertmbr->execute(array($firstName,$lastName,$mail,$passwd,$Birth,$sexe,0));
                    $error= "Votre compte a bien été créé !";
                    
				}
				
                else $error="Adresse e-mail déjà utilisée !";

			}
			
            else $error= "Votre nom ne doit pas dépasser 30 caractères !";

		}
		
        else $error="Votre prénom ne doit pas dépasser 30 caractères !";

	}
	
    else $error="Tous les champs doivent être complétés !";

}

/************************************  M O D I F I C A T I O N    D U   P R O F I L ************************************/
if(isset($_POST['save'])){

	//modification de la photo de profil
	if(isset ($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){

		//taille maximum d'un fichier qu'on peut importer
		$maxSize= 2097152;

		//les extentions valides des images
		$validExtensions=Array('png','jpg','gif','jpeg');

		if($_FILES['avatar']['size']<=$maxSize){

			//extraire l'extentrion du fichier importer par l'utilisateur et la transformer en miniscule
			$extensionUpload= strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));

			if(in_array($extensionUpload,$validExtensions)){
			
				$path="users/avatar/".$_SESSION['id'].".".$extensionUpload;
				$move=move_uploaded_file($_FILES['avatar']['tmp_name'],$path);

				if($move){
					$updateAvatar=$connection->prepare('UPDATE "user" SET avatar = :avatar WHERE id = :id');
					$updateAvatar->execute(array(
					    'avatar' => $_SESSION['id'].".".$extensionUpload,
					    'id' =>$_SESSION['id']	

					));

				}

				else echo "Erreur pendant l'importation de votre photo"	;			


			}

			else echo "votre photo doit ếtre au format jpg, jpeg,png ou gif";


		}

		else echo"votre photo ne doit pas dépasser 2 Mo";

	}

	if(isset ($_FILES['cover']) AND !empty($_FILES['cover']['name'])){

		//taille maximum d'un fichier qu'on peut importer
		$maxSize= 2097152;

		//les extentions valides des images
		$validExtensions=Array('png','jpg','gif','jpeg');

		if($_FILES['cover']['size']<=$maxSize){

			//extraire l'extentrion du fichier importer par l'utilisateur et la transformer en miniscule
			$extensionUpload= strtolower(substr(strrchr($_FILES['cover']['name'],'.'),1));

			if(in_array($extensionUpload,$validExtensions)){
			
				$path="users/cover/".$_SESSION['id'].".".$extensionUpload;
				$move=move_uploaded_file($_FILES['cover']['tmp_name'],$path);
				if($move){
					$updateCover=$connection->prepare('UPDATE "user" SET cover = :cover WHERE id = :id');
					$updateCover->execute(array(
												'cover' => $_SESSION['id'].".".$extensionUpload,
												'id' =>$_SESSION['id'])
										);

				}

				else echo "Erreur pendant l'importation de votre photo";

			}

			else echo "votre photo doit ếtre au format jpg, jpeg,png ou gif";


		}

		else echo "votre photo ne doit pas dépasser 2 Mo";
	}

	//modification des autes informations
	$newFirstName = htmlspecialchars($_POST['newFirstname']);
	$newLastName = htmlspecialchars($_POST['newLastname']);
	$newMail = htmlspecialchars($_POST['newMail']);
	$newpasswd = htmlspecialchars($_POST['newPassword']);
	$sexe = $_POST['newSexe'];
	$Birth = $_POST['newBirth'];
	$city = $_POST['city'];
	$description = $_POST['description'];		    	    	    

    if(!empty($newFirstName) ){
		
		if(strlen($newFirstName) <= 30){
			$insertmbr = $connection->prepare('UPDATE "user" SET firstname = ? WHERE id = ?');
		    $error=$insertmbr->execute(array($newFirstName,$_SESSION['id']));
		}
   }
   else {
       $insertmbr = $connection->prepare('UPDATE "user" SET firstname = ? WHERE id = ?');
       $error=$insertmbr->execute(array(NULL,$_SESSION['id']));

   }

	if(!empty($newLastName) ){

		if(strlen($newLastName) <= 30){
			$insertmbr = $connection->prepare('UPDATE "user" SET lastname = ? WHERE id = ?');
		    $error=$insertmbr->execute(array($newLastName,$_SESSION['id']));
		}
	}
   else {
       $insertmbr = $connection->prepare('UPDATE "user" SET city = ? WHERE id = ?');
       $error=$insertmbr->execute(array(NULL,$_SESSION['id']));

   }
    if(!empty($newMail) ){
		$insertmbr = $connection->prepare('UPDATE "user" SET mail = ? WHERE id = ?');
		$error=$insertmbr->execute(array($newMail,$_SESSION['id']));
			
	}
   else {
       $insertmbr = $connection->prepare('UPDATE "user" SET city = ? WHERE id = ?');
       $error=$insertmbr->execute(array(NULL,$_SESSION['id']));

   }

    if(!empty($sexe) ){
		$insertmbr = $connection->prepare('UPDATE "user" SET sexe = ? WHERE id = ?');
		$error=$insertmbr->execute(array($sexe,$_SESSION['id']));
			
	}

    if(!empty($Birth) ){
		$insertmbr = $connection->prepare('UPDATE "user" SET birthday = ? WHERE id = ?');
		$error=$insertmbr->execute(array($Birth,$_SESSION['id']));
			
	}

    if(!empty($city) ){
		$insertmbr = $connection->prepare('UPDATE "user" SET city = ? WHERE id = ?');
		$error=$insertmbr->execute(array($city,$_SESSION['id']));
			
	}
   else {
       $insertmbr = $connection->prepare('UPDATE "user" SET city = ? WHERE id = ?');
       $error=$insertmbr->execute(array(NULL,$_SESSION['id']));

   }

    if(!empty($description) ){
		$insertmbr = $connection->prepare('UPDATE "user" SET description = ? WHERE id = ?');
		$error=$insertmbr->execute(array($description,$_SESSION['id']));
			
	} 
   else {
       $insertmbr = $connection->prepare('UPDATE "user" SET city = ? WHERE id = ?');
       $error=$insertmbr->execute(array(NULL,$_SESSION['id']));

   }       

	if(!empty($newpasswd)){
		$insertmbr = $connection->prepare('UPDATE "user" SET passwd = ? WHERE id = ?');
		$insertmbr->execute(array($newpasswd,$_SESSION['id']));

	}
   else {
       $insertmbr = $connection->prepare('UPDATE "user" SET city = ? WHERE id = ?');
       $error=$insertmbr->execute(array(NULL,$_SESSION['id']));

   }

}


/************************ABONNEMENT*******************************************/

if(isset($_POST['follow'])){

	$getid=$_GET['id'];
	$req = $connection->prepare('SELECT * FROM "Abonnement" WHERE abonne = ? AND abonnement = ?');
        $req->execute(array($_SESSION['id'],$getid));
	$exist = $req->rowCount();
	if($exist ==0){

		$insertmbr = $connection->prepare('INSERT INTO "Abonnement" (abonne, abonnement) VALUES (?,?)');
                $insertmbr->execute(array($_SESSION['id'],$getid));
                $error= "Vous êtes bien abonné";

	}
	else{

		 $error= "Vous êtes déjà abonnée à ce compte";
	}


}

/************************UNFOLLOW*******************************************/


if(isset($_POST['unfollow'])){

	$getid=$_GET['id'];
	$req = $connection->prepare('SELECT * FROM "Abonnement" WHERE abonne = ? AND abonnement = ?');
        $req->execute(array($_SESSION['id'],$getid));
	$exist = $req->rowCount();
	if($exist !=0){

		$insertmbr = $connection->prepare('DELETE FROM "Abonnement" WHERE abonne = ? AND abonnement = ?');
                $insertmbr->execute(array($_SESSION['id'],$getid));
                $error= "Vous êtes bien désabonné";

	}
	else{

		 $error= "Vous n'êtes pas abonnée à ce compte";
	}


}


