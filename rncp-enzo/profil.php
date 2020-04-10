
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "rncp");
    include 'header.php';
    echo "<h1 id='bjr' class='adminH2'>Bonjour ".$_SESSION["login"].'</h1>';
    if (isset($_SESSION['login'])) {
        echo '<div class="flexc justcenter"><section class="adminBox">';
        $request = 'SELECT * FROM utilisateurs WHERE login = "' . $_SESSION['login'] . '" ';
        $sql = mysqli_query($conn, $request);
        $row = mysqli_fetch_all($sql);
        echo "<p class='colorw'>votre login :</p>";
        echo '<p class="colorw">' . $row[0][1] . '</p>';
        echo "<p class='colorw'>votre adresse :</p>";
        echo '<p class="colorw">' . $row[0][3] . '</p>';
        echo "<p class='colorw'> votre mail :</p>";
        echo '<p class="colorw">' . $row[0][4] . '</p>';
        echo '</section>';
    ?>
        <section class="adminBox">
            <h2 class="adminH2">modifiez vos infos </h2>

            <form action="" method="post" class="flexc">
                <label> Login : </label>
                <input class="input" type="text" name="login" value=<?php echo $row[0][1]; ?> />
                <label> Password : </label></br>
                <input class="input" type="password" name="mdp" value= />
                <label for="adresse">adresse</label></br>
                <input class="input" type="text" name="adresse" /><br />
                <label for="mail">email</label></br>
                <input class="input" type="email" name="mail" /><br />
                <input class="button" type="submit" name="envoie" value="Modifier" />
            </form>
        </section>
        <section class="adminBox">
            <h2 class="adminH2">Vos commandes</h2>
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
        echo "</section>";
        if (isset($_POST['envoie'])) {
            $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
            //cryptage mdp//
            $update = "UPDATE utilisateurs SET email ='" . $_POST['email'] . "', SET  adresse ='" . $_POST['adresse'] . "', SET login ='" . $_POST['login'] . "',password = '$mdp' WHERE id = '" . $row[0][0] . "'";
            $query2 = mysqli_query($connexion, $update);
        }
    } else {

        echo "Vous n'etes pas connecté veuillez vous connecté pour accédé a votre profil";
        echo '</br><a href="connexion.php">connexion</a>';
    }
        ?>
</div>
</body>

</html>