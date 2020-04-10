<?php
session_start();
$sql = "CREATE TABLE pannier_$_SESSION[login](
    id INT(2) AUTO_INCREMENT PRIMARY KEY, 
    title varchar(255) NOT NULL,
    prix int(255) NOT NULL,
    qtt int(255) NOT NULL
    )";
$conn = mysqli_connect("localhost", "root", "", "rncp");
if ($conn->query($sql) === TRUE) {
    include 'header.php';
    echo "<div class='spacer'></div>";
    echo "<div class='flexc justcenter'>";
    echo "<h1 class='adminH2'>Votre Panier</h1>";
    echo "<p>Votre pannier est vide</p>";
    $request2 = " DROP TABLE pannier_$_SESSION[login] ";
    $query2 = mysqli_query($conn, $request2);
    echo "</div>";
} else {

    include 'header.php';
    echo "<div class='spacer'></div>";
    echo "<div class='flexc justcenter'>";
    echo "<h1 class='adminH2'>Votre Panier</h1>";
    $conn = mysqli_connect("localhost", "root", "", "rncp");
    $request = "SELECT * FROM pannier_$_SESSION[login]";
    $query = mysqli_query($conn, $request);
    $row =  mysqli_fetch_all($query);
    $i = 0;
    $total = 0;
?>
    <table class='pannier gameTile'>
        <tbody>
            <tr>
                <td></td>
                <td>
                    <h2 class="adminH2">Nom du produit</h2>
                </td>
                <td>
                    <h2 class="adminH2">Quantité</h2>
                </td>
                <td>
                    <h2 class="adminH2">Prix</h2>
                </td>
                <td>
                    <h2 class="adminH2">total</h2>
                </td>
            </tr>
            <?php
            while ($i < count($row)) {
                $tot = ($row[$i][3]) * ($row[$i][2]);
                echo '<tr>';
                echo '<td><p class="colorw">', $row[$i][0], '</p></td>';
                $total = $total + $tot;
                echo '<td><p class="colorw">', $row[$i][1], '</p></td>';
                echo '<td><p class="colorw">', $row[$i][3], '</p></td>';
                echo '<td><p class="colorw">', $tot, ' €</p></td>';
                echo '<td><p class="colorw">' . $total . '</p></td></tr>';
                $i = $i + 1;
            }
            echo '<tr><td></td><td></td><td></td><td></td><td>';
            echo '<p class="colorw">'.$total.' '; 
            echo '$</p></td></tr>'
            ?>
        </tbody>
    </table>
    <form action="pannier.php" method="post">
        <button class="button" type="submit" name="validation">passer a l'achat</button>
        <button class="button" type="submit" name="supression">vider le pannier</button>
    </form>
<?php

    if (isset($_POST['validation'])) {
        header("Location:achat.php");
    }
    if (isset($_POST['supression'])) {
        $request2 = " DROP TABLE pannier_$_SESSION[login] ";
        $query2 = mysqli_query($conn, $request2);
        var_dump($query2);
        header("Location:index.php");
    }
}

?>
</div>