<?php
	
	session_start();
	include_once('bd.php');

// controler que les bonnes valeurs sont la
if( count($_POST) == 9 
	&& !empty($_POST["lastname"])
	&& !empty($_POST["firstname"])
	&& !empty($_POST["codepostal"])
	&& !empty($_POST["email"])
	&& !empty($_POST["country"])
	&& !empty($_POST["pwd"])
	&& !empty($_POST["pwdConfirm"])
	&& !empty($_POST["city"])
	&& !empty($_POST["cgu"]) ) {
	// fait appel au modèle pour inscrire
	// fait appel a la vue pour afficher un message inscription réussite
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>S'inscrire</title>
	<meta name="description" content="Page d'inscription">
</head>
<body>

	<h1>S'inscrire</h1>
	<!-- Création d'un formulaire 

		- Nom
		- Prénom
		- email
		- Pays
		- Mot de passe
		- Ville
		- Code postal
		- CGU

	-->	

	<form action="register.php" method="POST">

		
		<input type="text" name="lastname" placeholder="Votre nom" required="required"><br>

		<input type="text" name="firstname" placeholder="Votre prénom" required="required"><br>

		<input type="email" name="email" placeholder="Votre email" required="required"><br>

		<select name="country">
			<option value="pl">Pologne</option>
			<option value="fr" selected="selected">France</option>
			<option value="dz">Algérie</option>
			<option value="tg">Togo</option>
		</select><br>


		<input type="password" name="pwd" placeholder="Votre mot de passe" required="required"><br>

		<input type="password" name="pwdConfirm" placeholder="Confirmation" required="required"><br>


		<input type="text" name="city" placeholder="Votre ville" required="required"><br>

		<input type="text" name="codepostal" placeholder="Votre code postal" required="required"><br>


		<label>J'accepte les CGUs : <input type="checkbox" name="cgu" required="required"></label><br>

		<input type="submit" value="S'inscrire">

	</form>




</body>
</html>



