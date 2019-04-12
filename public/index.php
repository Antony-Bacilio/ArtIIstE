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
        else
        {
            $erreurconnect = "e-mail ou mot de passe incorrect !";
        }
    }
    else
    {
        $erreurconnect = "Tous les champs doivent être complétés !";
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
    $date = $_POST['date'];
    $sexe = $_POST['sexe'];
    $art =  $_POST['art'];

    if($sexe == "homme")
    {
        $sexe = "M";
    }
    else
    {
        $sexe = "F"; 
    }


    if(!empty($prenom) AND !empty($nom) AND !empty($mail) AND !empty($mdp) AND !empty($date) AND !empty($sexe) AND !empty($art))
    {
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
</head>
<body>
    <div align="left">
        <h2>Connexion</h2>
        <br/>
        <form method="POST" action="">
            <input type="email" placeholder="Adresse e-mail" name="emailconnect" autocomplete="off"/>
            <br/>
            <input type="password" placeholder="Mot de passe" name="mdpconnect"/>
            <br/>
            <input type="submit" value="Connexion" name="Connexion">
        </form>
        <?php 
        if(isset($erreurconnect))
        {
            echo '<font color="red">'.$erreurconnect.'</font>';
        }
        ?>
        <br/>
        <br/>
        <h2>Inscription</h2>
        <br/>
        <form method="POST" action="">
            <input type="text" placeholder="Nom" name="nom" autocomplete="off"/>
            <br/>
            <input type="text" placeholder="Prénom" name="prénom" autocomplete="off"/>
            <br/>
            <input type="email" placeholder="Adresse e-mail" name="email" autocomplete="off"/>
            <br/>
            <input type="password" placeholder="Mot de passe" name="mdp"/>
            <br/>
            <input type="date" name="date"/>
            <br/>
            <input type="radio" name= "sexe" value="homme" checked>Homme
            <input type="radio" name= "sexe" value="femme">Femme
            <br/>
            Art :
            <select name="art">
                <option value="empty" selected></option> 
                <option value="architecture">Architecture</option> 
                <option value="sculpture">Sculpture</option>
                <option value="peinture">Peinture</option>
                <option value="musique">Musique</option>
                <option value="cinéma">Cinéma</option>
            </select>
            <br/>
            <input type="submit" value="Inscription" name="forminscription">
        </form>
        <?php 
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur.'</font>';
        }
        ?>
    </div>
    <br/>
    <div class="container">
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
