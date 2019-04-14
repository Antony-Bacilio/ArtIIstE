<?php
session_start();

require '../vendor/autoload.php';

//postgres
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');

$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
$userRepository = new \User\UserRepository($connection);
$users = $userRepository->fetchAll();



// Connnexion

if(isset($_POST['Connexion']))
{
    $mailconnect = htmlspecialchars($_POST['emailconnect']);
    $mdpconnect = htmlspecialchars($_POST['mdpconnect']);

    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $connection->prepare('SELECT * FROM "user" WHERE mail = ? AND mdp = ?');
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();

        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: profil.php?id=".$_SESSION['id']);
        }
    }
}



// Formulaire d'inscription
if(isset($_POST['forminscription']))
{
    // Pour emêcher les injections de code HTML !
    $prenom = htmlspecialchars($_POST['prénom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if(!empty($prenom) AND !empty($nom) AND !empty($mail) AND !empty($mdp) AND !empty($_POST['date']) AND !empty($_POST['sexe']) AND !empty($_POST['art']))
    {
        $sexe = $_POST['sexe'];
        $date = $_POST['date'];
        $art =  $_POST['art'];
        
        if(strlen($prenom) <= 30)
        {
            if(strlen($nom) <= 30)
            {
                $req = $connection->prepare('SELECT * FROM "user" WHERE mail = ?');
                $req->execute(array($mail));
                $exist = $req->rowCount();
                if($exist == 0)
                {
                    $insertmbr = $connection->prepare('INSERT INTO "user" (firstname, lastname, mail,mdp, birthday, sexe, art) VALUES (?,?,?,?,?,?,?)');
                    $insertmbr->execute(array($prenom,$nom,$mail,$mdp,$date,$sexe,$art));
                    $erreur = "Votre compte a bien été créé !";
                    
                }
                else
                {
                    $erreur = "Adresse e-mail déjà utilisée !";
                }
            }
            else
            {
                $erreur = "Votre nom ne doit pas dépasser 30 caractères !";
            }
        }
        else
        {
            $erreur = "Votre prénom ne doit pas dépasser 30 caractères !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ArtIIstE</title>
    <link rel="stylesheet" type="text/css" href="StyleIndex.css">
</head>
<body>
    <div id="header_wrapper">
        <div id="header">
        <li id="sitename"><a href="">ArtIIstE</a></li>
        <form method="POST" action="">
            <li>Adresse e-mail<br><input type="email" name="emailconnect" autocomplete="off"></li>
            <li>Mot de passe<br><input type="password" name="mdpconnect"/><br></li>
            <li><input type="submit" value="Connexion" name="Connexion"></li>
            <br>
        </form>
        </div>
    </div>
    
    <div id="wrapper">
        <div id="div1">
            <h1>Créer un compte</h1>
            <p>C’est gratuit (ça ne le restera pas toujours).</p>
            <form method="POST" action="">
            <li><input type="text" placeholder="Prénom" name="prénom" autocomplete="off"></li>
            <li><input type="text" placeholder="Nom" name="nom" autocomplete="off"></li>
            <li><input type="email" placeholder="Adresse e-mail" name="email" autocomplete="off"/></li>
            <li><input type="password" placeholder="Mot de passe" name="mdp"/></li>
            <p>Date de naissance</p>
            <li><input type="date" name="date"/></li>
            <li><input type="radio" name="sexe">Homme<input type="radio" name="sexe">Femme</li>
            <p>Votre passion :</p> 
            <li><select name="art"><option selected></option><option>Architecture</option><option>Sculpture</option>option>Peinture</option><option>Musique</option><option>Cinéma</option><option>Sport</option></select><br><br></li>      
            <li><input type="submit" value="Inscription" name="forminscription"></li>
            <?php 
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur.'</font>';
            }
            ?>
            </form>
        </div>
    </div>
    
    <div id="footer_wrapper">
        <table class="table table-bordered table-hover table-striped">
          <thead style="font-weight: bold">
               <td>#</td>
              <td>Firstname</td>
             <td>Lastname</td>
             <td>e-mail</td>
             <td>Mot de passe</td>
             <td>Date de naissance</td>
             <td>Sexe</td>
             <td>Art</td>
            </thead>


         <?php /** @var \User\User $user */
         foreach ($users as $user) : ?>
             <tr>
                <td><?php echo $user->getId() ?></td>
                <td><?php echo $user->getFirstname() ?></td>
                <td><?php echo $user->getLastname() ?></td>
                <td><?php echo $user->getEmail() ?></td>
                <td><?php echo $user->getMdp() ?></td>
                <td><?php echo $user->getBirthday() ?></td>
                <td><?php echo $user->getSex() ?></td>
                <td><?php echo $user->getArt() ?></td>
             </tr>
         <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
