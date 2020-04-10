<?php
//condition achat
if (isset($_SESSION['login'])) {
    if ($row[0][5] == 0) {
        echo '<p>plus en stock revien plus tard</p>';
    } else {
?>
        <form action='article.php?id=<?php echo $row[0][2]; ?>' method='post'>
            <div class="flexr">
                <input class="nbrSelect" type='number' name='quantité'>
                <input class="ajtPanier" type='submit' value="Ajouter au panier">
            </div>
        </form>
<?php
        if (isset($_POST['quantité'])) {
            if ($_POST['quantité'] == 0) {
                $_POST['quantité'] = 1;
            }
            // table nom_table exist
            $title = $row[0][2];
            $prix = $row[0][4];
            $qtt = $_POST['quantité'];
            $request2 = "INSERT INTO pannier_$_SESSION[login] VALUES (NULL,'$title',$prix,$qtt)";
            $sql = "CREATE TABLE pannier_$_SESSION[login](
                    id INT(2) AUTO_INCREMENT PRIMARY KEY, 
                    title varchar(255) NOT NULL,
                    prix int(255) NOT NULL,
                    qtt int(255) NOT NULL
                    )";
            if ($conn->query($sql) === TRUE) {
                $query2 = mysqli_query($conn, $request2);
                header("Location:pannier.php");
            } else {
                $query2 = mysqli_query($conn, $request2);
                header("Location:pannier.php");
            }
        }
    }
} else {
    echo '<p>pour pouvoir acheter GET["connected"]';
}

?>