<?php
namespace Modeles;

//session_start();

require '../vendor/autoload.php';

class Connexion{

    //private $objPdo;

    function __construct(){
        try {
            //postgres
            $dbName = getenv('DB_NAME');
            $dbUser = getenv('DB_USER');
            $dbPassword = getenv('DB_PASSWORD');
            
            $objPdo = new \PDO("pgsql:host=postgres user=$dbUser dbname=$dbName password=$dbPassword");
            echo "<b><i>Connexion au serveur Réussie!!...</i></b> <br/><br/>";
            printf("Information sur le serveur: &nbsp;" . $objPdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION));
            
            /*$userRepository = new \User\UserRepository($connection);
            $users = $userRepository->fetchAll();*/

        }
        catch (Exception $exception){
            echo "Echec de connexion au serveur!!!";
            printf("Info d'erreur: ". $exception->getMessage());
        }
        return $objPdo;
    }
}