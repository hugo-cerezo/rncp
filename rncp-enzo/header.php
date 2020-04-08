<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>

    <header class='header'>

        <img class=logo src="images/logo.png">
        <a href='index.php'>
            <div>
                <h2>Acceuil</h2>
            </div>
        </a>
        <a href='articles.php'>
            <div>
                <h2>Nos articles</h2>
            </div>
        </a>
        <?php
        if (isset($_SESSION['login'])) {
            echo '<a href="profil.php"><div><h2>Profil</h2></div></a>';
            echo '<a href="profil.php?exit=true"><div><h2>Déconnexion</h2></div></a>';
        } else {
            echo '<a href="inscription.php"><div><h2>Inscription</h2></div></a>';
            echo '<a href="connexion.php"><div><h2>connexion</h2></div></a>';
        }
        if (isset($_POST['query'])) {
            //barre recherche
        }
        if (isset($_GET["exit"])) {
            if ($_GET["exit"] == true) {
                session_destroy();
                header("location:index.php");
            }
        }
        ?>
        <form class="recherchebar" action="article.php" method="post">
            <input type="text" name="query" />
            <input type="submit" value="Search" />
        </form>
    </header>
    <div class="underline"></div>
</body>

</html>