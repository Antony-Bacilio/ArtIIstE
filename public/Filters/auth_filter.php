<?php

/**
 * Permet de Vérifier si un User est connecté. 
 * Cas contraire il ne pourra pas accèder à autres fichiers en changant le URL du site.
 * S'il est pas connecté, il reviendra toujours à l'accueil (index).
 */

if(!isset($_SESSION['id']) || !isset($_SESSION['mail'])){ 
    header("Location: index.php");   
    exit();
}

?>

