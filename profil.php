<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rncp");
include 'header.php';
var_dump($_SESSION['login']);
if (isset($_SESSION['login'])) {
    $request = 'SELECT * FROM utilisateurs WHERE login = "' . $_SESSION['login'] . '" ';
    $sql = mysqli_query($conn, $request);
    $row = mysqli_fetch_all($sql);
    var_dump($row);
    echo "votre login";
    echo '"' . $row[0][1] . '"</br>';
?>
    <h3>modifiez vos infos </h3>

    <form action="" method="post">
        <label> Login : </label>
        <input type="text" name="login" value=<?php echo $row[0][1]; ?> />
        <label> Password : </label></br>
        <input type="password" name="mdp" value= />
        <input type="submit" name="envoie" value="Modifier" />
    </form>
    <h3>Vos commandes</h3>
<?php
    $requestcommandes = 'SELECT * FROM commande WHERE id_utilisateur = "' . $row[0][0] . '"';
    $sql2 = mysqli_query($conn, $requestcommandes);
    $row2 = mysqli_fetch_all($sql2);
    //affichage des commandes
    $i = 0;
    while ($i < count($row2)) {
        echo $row2[$i][5]; //date
        echo '</br>';
        echo $row2[$i][4]; //desciptiopn commande
        echo 'total :';
        echo $row2[$i][3]; //total
        $i = $i + 1;
    }
    if (isset($_POST['modifier'])) {
        $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT, array('cost' => 12));
        //cryptage mdp//
        $update = "UPDATE utilisateurs SET login ='" . $_POST['login'] . "',password = '$mdp' WHERE id = '" . $row[0][0] . "'";
        $query2 = mysqli_query($connexion, $update);
    }
} else {

    echo "Vous n'etes pas connecté veuillez vous connecté pour accédé a votre profil";
    echo '</br><a href="connexion.php">connexion</a>';
}
?>

</body>

</html>