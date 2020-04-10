<?php
$requestcom = "SELECT * FROM commentaire WHERE title = '" . $row[0][2] . "'";
$querycom = mysqli_query($conn, $requestcom);
$rowcom =  mysqli_fetch_all($querycom);
if ($rowcom == true) {
    $i = 0;
    while ($i < 3) {
        echo '<div class="commentaire"><p class="userName">';
        echo $rowcom[$i][2] . ' ';
        echo 'le ';
        echo $rowcom[$i][4];
        echo '</p><p class="userCom">';
        echo $rowcom[$i][3];
        echo '</p></div>';
        ++$i;
    }
?>
    <a class="articleVoir" href="commentaires.php?id='<?php echo $row[0][2]; ?>'">Voir plus...</a>
<?php
} else {
    echo '<p style="color: white;">Aucun avis</p>';
}
?>
<form method="POST" class="flexc com_article">
    <p style="color: white;"> laissez une note </p>
    <select id="rating" name="rating" class="select">
        <option value="0">Choisissez une note</option>
        <option value="1">1 étoile &nbsp&nbsp&nbsp&#11088</option>
        <option value="2">2 étoiles &#11088&#11088</option>
        <option value="3">3 étoiles &#11088&#11088&#11088</option>
        <option value="4">4 étoiles &#11088&#11088&#11088&#11088</option>
        <option value="5">5 étoiles &#11088&#11088&#11088&#11088&#11088</option>
    </select>
    <label for="com">
        <p style="color: white;">laisser un commentaire</p>
    </label>
    <textarea class="textarea" name="com"></textarea>
    <br>
    <input class="button" type="submit" value="Envoyer" name="comsub" />
</form>

<?php

if (isset($_POST['comsub'])) {
    if ($_POST["rating"] != 0) {
        $rating = $_POST["rating"];
        $ratingsql = "INSERT INTO rating_table VALUES (NULL,$_SESSION[id],'" . $row[0][2] . "', '" . $_POST['rating'] . "' )";
        $queryrating = mysqli_query($conn, $ratingsql);
        $request = "UPDATE rating_average SET moy=$note WHERE title ='" . $row[0][2] . "' ";
        $query = mysqli_query($conn, $request);
    }
    $requestinscom = "INSERT INTO commentaire VALUES (NULL,'" . $row[0][2] . "','" . $_SESSION['login'] . "', '" . $_POST['com'] . "', NOW())";
    $queryinscom = mysqli_query($conn, $requestinscom);
}
?>