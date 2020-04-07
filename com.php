<?php

$requestcom = "SELECT * FROM commentaire WHERE title = '".$row[0][2]."'";
$querycom = mysqli_query($conn, $requestcom);
$rowcom =  mysqli_fetch_all($query);
var_dump($rowcom);
$i = 0;
while ($i < count($rowcom)) {
    echo '<div class="commentaire"><p>';
    echo $rowcom[$i][2];
    echo 'le';
    echo $rowcom[$i][4];
    echo '</p><p>';
    echo $rowcom[$i][3];
    echo '</p></div>';
}
?>

<form method="POST" class="flexc">
    <label for="com">laisser un commentaire</label>
    <input class="input" type="text" name="com" />
    <input class="button1" type="submit" value="Se connecter" name="comsub" />
</form>

<?php

if (isset($_POST['comsub'])) {
    $requestinscom = "INSERT INTO commentaire VALUES ('NULL'," . $row[0][2] . "," . $_SESSION['login'] . ",$_POST[com],NOW)";
    echo $requestinscom;
    die;
    $queryinscom = mysqli_query($conn, $requestinscom);
}
?>