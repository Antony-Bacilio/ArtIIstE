<?php
//déconnexion
if(isset($_POST['logOut'])){
	$_SESSION = array();
	session_destroy();
        header("Location: index.php");

}
