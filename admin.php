<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rncp");
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
    foreach ($row6 as $key => $value) {
        echo $value[2];
    ?>
        <form action="profil.php" method="POST">
            <label for='prix'>prix</label>
            <input type="number" name="prix" value='<?php echo $value[4] ?>'>
            <label for='qtt'>quantité stock</label>
            <input type="number" name="qtt" value='<?php echo $value[5] ?>'>
            <input type="submit" name='<?php echo $value[0] ?>'>
        </form>
    <?php
        if (isset($_POST[$value[0]])) {
            $modifarticle = "UPDATE article SET price='$_POST[prix]', qtt='$_POST[qtt]' WHERE id = $value[0]";
            $modifquery = mysqli_query($conn, $modifarticle);
        }
    }

    echo "<h2>Creation et modification d'article</h2></br>";
    ?>

    <p>modifier un article</p>
    <form action="" method="POST">
        <div class="flexr">
            <select name='option'>
                <option value='0'>Choissisez un jeu</option>
                <?php
                foreach ($row6 as $key => $value) {
                    echo '<option name="' . $value[2] . '" value="' . $value[2] . '">' . $value[2] . '</option>';
                }
                ?>
            </select>
            <input type="submit" name='select_value'>
        </div>
    </form>

    <?php
    if (isset($_POST["select_value"])) {
        $dataquery = "SELECT * FROM article WHERE title = '$_POST[option]'";
        $execdataquery = mysqli_query($conn, $dataquery);
        $fetchquery = mysqli_fetch_assoc($execdataquery);
    ?>

        <form action="" method="post" class="flexc form_admin" enctype="multipart/form-data">
            <label for='titre'>titre</label>
            <input type="text" name="up_titre" value='<?php echo $fetchquery['title'] ?>'>
            <label for='categorie'>categorie</label>
            <input type="text" name="up_categorie" value='<?php echo $fetchquery['categorie'] ?>'>
            <label for='prix'>prix</label>
            <input type="number" name="up_prix" value='<?php echo $fetchquery['price'] ?>'>
            <label for='qtt'>quantité stock</label>
            <input type="number" name="up_qtt" value='<?php echo $fetchquery['qtt'] ?>'>
            <textarea name="up_textarea"><?php echo $fetchquery['description'] ?></textarea>
            <label for="upInputFile">image</label>
            <input type="file" name="upInputFile" accept="image/png, image/jpeg">
            <input type="submit" name='up_art'>
        </form>

    <?php
    } // fin affichage form
    if (isset($_POST["up_art"])) {
        $upGameName = $_POST["up_titre"];
        if (strlen($_FILES["upInputFile"]["name"]) != 0) {
            $imgPath = "images/" . basename($_FILES["upInputFile"]["name"]);
            $imgType = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));
            $newName = "images/" . $upGameName . "." . $imgType;
            $_SESSION["uploadOk"] = 1;
            if ($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg") {
                echo "Désoler, seulement les fichier JPG, JPEG, PNG accepter.";
                $_SESSION["uploadOk"] = 0;
            }
            if ($_SESSION["uploadOk"] == 1) {
                if (file_exists($newName)) {
                    unlink($newName);
                    echo "image remplacée";
                }
                move_uploaded_file($_FILES["upInputFile"]["tmp_name"], $imgPath);
                rename($imgPath, $newName);
                unset($_SESSION["uploadOk"]);
            } else {
                echo "Image non insérer";
                unset($_SESSION["uploadOk"]);
            }
        }
        $updatequery = "UPDATE article SET categorie = '$_POST[up_categorie]', title = '$_POST[up_titre]', description = '$_POST[up_textarea]', price = '$_POST[up_prix]', qtt = '$_POST[up_qtt]' WHERE title = '$_POST[up_titre]'";
        $execupdatequery = mysqli_query($conn, $updatequery);
    }
    ?>
    <p>cree nouvel article</p>
    <form action="" method="POST" class="flexc form_admin">
        <label for='new_titre'>titre</label>
        <input type="text" name="new_titre">
        <label for='new_categorie'>categorie</label>
        <input type="text" name="new_categorie">
        <label for='new_prix'>prix</label>
        <input type="number" name="new_prix">
        <label for='new_qtt'>quantité stock</label>
        <input type="number" name="new_qtt">
        <textarea name="new_textarea">description</textarea>
        <label for="new_inputFile">image</label>
        <input type="file" name="new_inputFile" accept="image/png, image/jpeg">
        <input type="submit" name='new_art'>
    </form>
<?php
    if (isset($_POST['new_art'])) {
        $newGameName = $_POST["new_titre"];
        if (strlen($_FILES["new_inputFile"]["name"]) != 0) {
            $imgPath = "images/" . basename($_FILES["new_inputFile"]["name"]);
            $imgType = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));
            $newName = "images/" . $newGameName . "." . $imgType;
            $_SESSION["uploadOk"] = 1;
            if ($imgType != "jpg") {
                echo "Désoler, seulement les fichier JPG accepter.";
                $_SESSION["uploadOk"] = 0;
            }
            if ($_SESSION["uploadOk"] == 1) {
                if (file_exists($newName)) {
                    unlink($newName);
                }
                move_uploaded_file($_FILES["new_inputFile"]["tmp_name"], $imgPath);
                rename($imgPath, $newName);
                unset($_SESSION["uploadOk"]);
            } else {
                echo "Image non insérer";
                unset($_SESSION["uploadOk"]);
            }
        }
        $newarticle = "INSERT INTO article VALUES (NULL,'$_POST[new_categorie]','$_POST[new_titre]','$_POST[new_textarea]',$_POST[new_prix],$_POST[new_qtt],date)";
        $sqlad5 = mysqli_query($conn, $newarticle);
    }
}
