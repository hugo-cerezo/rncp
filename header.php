<div class='header'>
<a href='index.php'><div><h2>Acceuil</h2></div></a>
<a href='articles.php'><div><h2>Nos articles</h2></div></a>
<?php
if(isset($_SESSION['login']))
{
    echo '<a href="profil.php"><div><h2>Profil</h2></div></a>';
}
else
{
    echo '<a href="inscription.php"><div><h2>Inscription</h2></div></a>';
    echo '<a href="connexion.php"><div><h2>connexion</h2></div></a>';
}
?>
<form action="search.php" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
</form>
</div>
