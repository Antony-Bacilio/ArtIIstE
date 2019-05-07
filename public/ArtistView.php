<!DOCTYPE html>
<html>
<head>
    <title>ArtIIstE</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
	<div id="logo"> ArtIIstE  <span> Share your colors...</span></div>

	<div id="signInbox">
		<form name="signIn" method="POST" id="signInform" ">
			<input type="email" placeholder="Email" name="logEmail">
			<input type="password" placeholder="Password" name="logPassw">
			<input type="submit" name="signIn" value="Sign In">
		</form>
			<?php if(isset($_POST['signIn'])) {echo "<p id=\"error_1\">".$error_1."</p>";}?>
	</div>
</header>

<div class="logbox">
	<p>Join Us</p>
		<form name="signIn" method="POST" id="logform"">
			 <p class="label">First Name</p>
			 <input type="text" placeholder="Enter First name" name="firstname"><br>
			 <p class="label">Last Name</p>
			 <input type="text" placeholder="Enter Last Name" name="lastname"><br>
			 <p class="label">email</p>
			 <input type="email" placeholder="Enter your Email" name="email"><br>
			 <p class="label">Password</p>
			 <input type="password" placeholder="Enter a good password" name="password"><br>
			 <p class="label">Birthday</p>
			 <input type="text" placeholder="DD-MM-YYYY" name="Birth"><br>
			 <p class="label">sexe</p>
			<input type="radio" name="sexe" value="male"> <span class="label">Male</span>
  			<input type="radio" name="sexe" value="female"><span class="label">Female</span><br>
  			<input type="submit" name="signUp" value="Sign Up"> 
		</form>
		<?php if(isset($_POST['signUp'])) {echo "<p id=\"error\">".$error."</p>";}?>

</div>

</body>
</html>
