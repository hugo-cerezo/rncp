<?php
session_start();
include 'header.php';
if (isset($_POST["envoie"])) {
	$conn = mysqli_connect("localhost", "root", "", "rncp");
	$request = "SELECT * FROM utilisateurs WHERE login ='" . htmlspecialchars($_POST["login"]) . "'";
	$sql = mysqli_query($conn, $request);
	$row = mysqli_fetch_assoc($sql);
	if ($sql == TRUE) {
		if (password_verify($_POST["mdp"], $row["password"])) {
			$_SESSION["id"] = $row["id"];
			$_SESSION["login"] = $row["login"];
			$_SESSION["rang"] = $row["rang"];
			$_SESSION["connected"] = true;
			header("location:index.php");
		} else {
			echo "Mauvais password";
		}
	} else {
		echo "login inconnu";
	}
}
?>
<div class="connexion">
	<img class=logo src="images/logo.png">
	<form class="form" action="" method="post">
		<label for="login">Votre pseudo</label></br>
		<input class="input" type="text" name="login" /></br>
		<label for="mdp">Votre mot de passe</label></br>
		<input class="input" type="password" name="mdp" /></br>
		<input class="button1" type="submit" value="Se connecter" name="envoie" />
	</form>
</div>