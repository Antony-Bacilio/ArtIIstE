<?php 
require 'config.php';
include("models/ArtistModel.php");
include("models/publicationModel.php");
include('Filters/auth_filter.php');

/* Partie vue */
include ("views/profilView.php");

?>
