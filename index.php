<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facebook</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<a href="index.php" id="logo">facebook</a>
			<form action="php/process.php" method="POST" id="logform">
				<div class="form-group">
					<label for="">Adresse e-mail</label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Mot de passe</label>
					<input type="text" name="password" class="form-control">
				</div>
				<input type="submit" name="login" id="login" value="Connexion">
				<a href="#" id="fgp">Informations de compte oubliées ?</a>
				<p class="error-message"><?php if(isset($_SESSION['logerror'])){echo $_SESSION['logerror'];unset($_SESSION['logerror']);}?></p>
			</form>
		</div>
	</header>
	<div class="sign">
		<div class="image">
			<img src="img/recto.png" alt="people">
		</div>
		<div class="signup">
			<p class="error-message"><?php if(isset($_SESSION['signerror'])){echo $_SESSION['signerror'];unset($_SESSION['signerror']);}?></p>
			<h1>Créer un compte</h1>
			<p>C'est rapide et facile.</p>
			<form action="php/process.php" id="signform" method="POST">
				<div class="form-group">
					<input style="width: 49.5%;" type="text" name="firstname" class="form-control" placeholder="Prénom">
					<input type="text" style="width: 49.5%;" name="lastname" class="form-control" placeholder="Nom de famille">
				</div>
				<div class="form-group">
					<input type="text" name="email" class="form-control" placeholder="Numéro de mobile ou e-mail">
				</div>
				<div class="form-group"><input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe"></div>
				<div class="form-group">
					<label for="birth">Date de naissance</label>
					<input type="date" name="birth" class="form-control">
				</div>
				<div class="form-group">
					<label for="gender">Genre</label>
					<input type="radio" class="form-control" name="gender" value="Female">Femme
					<input type="radio" class="form-control" checked name="gender" value="Male">Homme
					<input type="radio" class="form-control" name="gender" value="Other">Personnalisé
				</div>
				<p class="cgu">
					lorem ipsum domlor sit amet elasde constitute unim veniam adipisicing.
					lorem ipsum domlor sit amet elasde constitute unim veniam adipisicing.
					lorem ipsum domlor sit amet elasde constitute unim veniam adipisicing.lorem ipsum domlor sit amet elasde constitute unim veniam adipisicing.
					lorem ipsum domlor sit amet elasde constitute unim veniam adipisicing.
				</p>
				<input type="submit" name="signup" value="S'inscrire" id="signup">
			</form>
		</div>
	</div>
</body>
</html>