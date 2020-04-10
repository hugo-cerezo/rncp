<?php
$conn = mysqli_connect("localhost", "root", "", "rncp");
session_start();
include 'header.php';
if ($_SESSION['rang'] == 'admin') {
    echo '<h2>welcomme admin</h2></br>';


    echo '<h2>liste des utilisateurs</h2></br>';
    $requestadmin = 'SELECT * FROM utilisateurs';
    $sqlad = mysqli_query($conn, $requestadmin);
    $row4 = mysqli_fetch_all($sqlad);
    $i = 0;
    while ($i < count($row4)) {
        echo $row4[$i][1]; //login
        echo $row4[$i][4]; //email
        echo $row4[$i][3]; //adresse
?>
        <form action="" method="post">
            <button type="submit" name="<?php echo $row4[$i][1]; ?>">suprimer utilisateur</button>
        </form>
    <?php
        $i = $i + 1;
    }


    echo '<h2>liste des commandes</h2></br>';
    $comandesadmin = 'SELECT * FROM commande ';
    $sqlad2 = mysqli_query($conn, $comandesadmin);
    $row5 = mysqli_fetch_all($sqlad2);
    var_dump($row5);
    //affichage des commandes
    $i = 0;
    while ($i < count($row5)) {
        echo '</br><p>';
        echo $row5[$i][2]; //nom
        echo '</p></br><p>';
        echo $row5[$i][5]; //date
        echo '</p></br><p>';
        echo $row5[$i][4]; //desciptiopn commande
        echo '</p><p>total :';
        echo $row5[$i][3]; //total
        echo '</p></br>';
        $i = $i + 1;
    }

    echo '<h2>gestion des stock et des prix</h2></br>';
    $requestadmin3 = 'SELECT * FROM article';
    $sqlad3 = mysqli_query($conn, $requestadmin3);
    $row6 = mysqli_fetch_all($sqlad3);
    $i = 0;;
    while ($i < count($row6)) {
        echo $row6[$i][2]; //title
    ?>
        <form action="" method="post">
            <label for='prix'>prix</label>
            <input type="number" name="prix" value='<?php echo $row6[$i][4]; ?>'>
            <label for='qtt'>quantité stock</label>
            <input type="number" name="qtt" value='<?php echo $row6[$i][5]; ?>'>
            <input type="submit" name='updateart'>
        </form>
    <?php
        $i = $i + 1;
    }

    //

    echo "<h2>Creation et modification d'article</h2></br>";
    ?>
    <form action="" method="post">
        <p>modifier un article</p>
        <select>
            <?php
            $i = 0;
            while ($i < count($row6)) {
                echo '<option value="' . $row6[$i][2] . '">' . $row6[$i][2] . '</option>';
                $i = $i + 1;
            }
            ?>
        </select>
        <p>cree nouvel article</p>
        <label for='titre'>titre</label>
        <input type="text" name="titre">
        <label for='categorie'>categorie</label>
        <input type="text" name="categorie">
        <label for='prix'>prix</label>
        <input type="number" name="prix">
        <label for='qtt'>quantité stock</label>
        <input type="number" name="qtt">
        <textarea name="textarea">description</textarea>
        <!-- <input type='file' name='image'> -->
        <input type="submit" name='newart'>
    </form>
<?php
    if (isset($_POST['newart'])) {
        $newarticle = "INSERT INTO article VALUES (NULL,'$_POST[categorie]','$_POST[titre]','$_POST[textarea]',$_POST[prix],$_POST[qtt],date) ";
        var_dump($newarticle);
        $sqlad5 = mysqli_query($conn, $newarticle);
    }

    $requestaverage = "INSERT INTO rating_average VALUES (NULL,'$_POST[newart]',0)";
    $sqlad6 = mysqli_query($conn, $requestaverage);
}
