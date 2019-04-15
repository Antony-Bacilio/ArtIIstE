<?php


/**
 * Test : Appel le Modele_User
 */
require_once (dirname(__FILE__)."/../Modeles/Modele_User.php");

$objArtiste = new \Modeles\User();

//$matriceArtistes = $objArtiste->getArtistes(); 
//$matriceArtistes = $objArtiste->fetchAll();

/**
 * Appel la Vue_Connexion
 */
require_once (dirname(__FILE__)."/../Vues/Vue_Connexion.php");







?>