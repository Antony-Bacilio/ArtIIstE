<?php
    session_start();
    if(!empty($_GET['page']) && is_file('../src/Controleurs/Controleur_'.$_GET['page'].'.php')) {
        //require_once ('../src/Controleurs/Controleur_Connexion.php');
        include '../src/Controleurs/Controleur_' . $_GET['page'] . '.php';
    }
    else{
        //Sinon on apelle une page d'accueil
        include '../src/Controleurs/Controleur_Accueil.php';
    }
?>