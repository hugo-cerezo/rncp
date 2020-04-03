<?php

$conn = mysqli_connect("localhost","root","","rncp");
$request = 'SELECT * FROM pannier_"'.$_SESSION['login'].'"';
while ($i<count($row))
{
    //affichage table
    //btn suprimer a chaque article
    //calcul de la somme totale
    $total = $total+($row[$i][/* prix */]*$qtt/* quantité */);
}
?>

<!-- btn valider pannier -->
<!-- send to achat.php -->

<!-- btn vider le pannier -->
<!-- drop table -->