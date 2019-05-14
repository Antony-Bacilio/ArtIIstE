<!DOCTYPE html>
<html>
<head>
    <title>ArtIIstE</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php //include("Parties/_head.php"); ?>

<body>
<header>
	<div id="logo"> <img src="images/logo_a.png"  width="60" height="60">ArtIIstE  <span> Share your colors...</span></div>

	<div id="signInbox">
		<form name="signIn" method="POST" id="signInform">
			<input type="email" placeholder="Email" name="logEmail" autocomplete="off">
			<input type="password" placeholder="Password" name="logPassw">
			<input type="submit" name="signIn" value="Sign In">
		</form>
			<?php if(isset($_POST['signIn'])) {echo "<p id=\"msgWarning\">".$msgWarning."</p>";}?>
	</div>
</header>

<div class="logbox">
	<p>Join Us</p>
		<form name="signIn" method="POST" id="logform"">
			 <p class="label">First Name</p>
			 <input type="text" placeholder="Enter First name" name="firstname" autocomplete="off"><br>
			 <p class="label">Last Name</p>
			 <input type="text" placeholder="Enter Last Name" name="lastname" autocomplete="off"><br>
			 <p class="label">email</p>
			 <input type="email" placeholder="Enter your Email" name="email" autocomplete="off"><br>
			 <p class="label">Password</p>
			 <input type="password" placeholder="Enter a good password" name="password"><br>
			 <p class="label">Birthday</p>
			 <input type="date" name="Birth"><br>
			 <p class="label">sexe</p>
			<input type="radio" name="sexe" value="Male"> <span class="label">Male</span>
  			<input type="radio" name="sexe" value="Female"><span class="label">Female</span><br>
  			<input type="submit" name="signUp" value="Sign Up"> 
		</form>
		<?php if(isset($_POST['signUp'])) {echo "<p id=\"error\">".$error."</p>";}?>

</div>
<footer>
	<a href="mailto:artiste.admin@gmail.com">Contactez l'administrateur</a>
</footer>
</body>
</html>
