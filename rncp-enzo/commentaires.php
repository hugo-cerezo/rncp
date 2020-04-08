<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "rncp");
$requestcom = "SELECT * FROM commentaire WHERE title = $_GET[id]";
$querycom = mysqli_query($conn, $requestcom);
$rowcom =  mysqli_fetch_all($querycom);
$i = 0;
while ($i < count($rowcom)) {
    echo '<div class="commentaire"><p>';
    echo $rowcom[$i][2] . ' ';
    echo 'le ';
    echo $rowcom[$i][4];
    echo '</p><p>';
    echo $rowcom[$i][3];
    echo '</p></div>';
    ++$i;
}
?>
<a href="">Voir plus...</a>
<form method="POST" class="flexc com_article">
    <p> laissez une note </p>
    <select name="rating">
        <option value="0">Choisissez une note</option>
        <option value="1">1 étoile &#11088</option>
        <option value="2">2 étoiles &#11088&#11088</option>
        <option value="3">3 étoiles &#11088&#11088&#11088</option>
        <option value="4">4 étoiles &#11088&#11088&#11088&#11088</option>
        <option value="5">5 étoiles &#11088&#11088&#11088&#11088&#11088</option>
    </select>
    <label for="com">laisser un commentaire</label>
    <textarea class="input" name="com"></textarea>
    <input class="button1" type="submit" value="Envoyer" name="comsub" />
</form>

<?php

if (isset($_POST['comsub'])) {
    if ($_POST["rating"] != 0) {
        $rating = $_POST["rating"];
        $ratingsql = "INSERT INTO rating_table VALUES (NULL,$_SESSION[id],'" . $row[0][2] . "', '" . $_POST['rating'] . "' )";
        $queryrating = mysqli_query($conn, $ratingsql);
    }
    $requestinscom = "INSERT INTO commentaire VALUES (NULL,'" . $row[0][2] . "','" . $_SESSION['login'] . "', '" . $_POST['com'] . "', NOW())";
    $queryinscom = mysqli_query($conn, $requestinscom);
}
?>