<?php
session_start();
include 'header.php';

if (isset($_POST["envoie"])) {
	if ($_POST["mdp"] == $_POST['remdp']) {
		echo "test";
		$conn     = mysqli_connect("localhost", "root", "", "rncp");
		$request  = "SELECT login FROM utilisateurs";
		$query    = mysqli_query($conn, $request);
		$response = mysqli_fetch_all($query);

		$count = 0;
		while ($count < count($response)) {
			if ($response[$count][0] == $_POST["login"]) {
				$_SESSION["validator"] = false;
				header("location:inscription.php");
			}
			$count++;
		}

		if ($_SESSION["validation"]) {
			
$request2 = "INSERT INTO utilisateurs VALUES (NULL,'".$_POST["login"]."','".password_hash($_POST["mdp"],PASSWORD_BCRYPT)."','','');";
			$query2 = mysqli_query($conn, $request2);
			var_dump($request2);
			//header("location:connexion.php");
		}
	}
}

?>
<div class="inscription">
	<img class=logo src="images/logo.png">
	<form class="form" name="inscription" method="post" action="">
		<label for="login">Votre pseudo</label></br>
		<input class="input" type="text" name="login" /> <br />
		<label for="password">Votre mdp</label></br>
		<input class="input" type="password" name="mdp" /><br />
		<label for="remdp">Confirmez votre mot de passe</label></br>
		<input class="input" type="password" name="remdp" /><br />
		<input class="button1" type="submit" name="envoie" value="Se connecter" />
	</form>
</div>