<?php
session_start();

require '../vendor/autoload.php';

//postgres
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');

$connection = new PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");

if(isset($_GET['id']) AND isset($_GET['id']) > 0)
{
    $getid = intval($_GET['id']);
    $requser = $connection->prepare('SELECT * FROM "user" WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ArtIIstE</title>
</head>
<body>
    Nom : <?php echo $userinfo['lastname']; ?>
    <br />
    Prénom : <?php echo $userinfo['firstname']; ?>
    <br />
    Adresse mail : <?php echo $userinfo['mail']; ?>
    <br />
    Art : <?php echo $userinfo['art']; ?>
    <br />
    <?php
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
    ?>
    <a href="#">Editer mon profil</a>
    <br />
    <a href="deconnection.php">Déconnection</a>
    <?php
    }
    ?> 
</body>
</html>
<?php
}
?>