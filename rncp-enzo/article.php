<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "rncp");
$quelarticle = $_GET['id'];
$request = "SELECT * FROM article WHERE title ='" . $_GET['id'] . "' ";
$query = mysqli_query($conn, $request);
$row =  mysqli_fetch_all($query);
$ratesql = "SELECT AVG(rating) FROM rating_table WHERE game_title= '" . $row[0][2] . "'";
$queryrate = mysqli_query($conn, $ratesql);
$fetchrate = mysqli_fetch_all($queryrate);
$note = $fetchrate[0][0];
$requestcom = "SELECT * FROM commentaire WHERE title = '" . $row[0][2] . "'";
$querycom = mysqli_query($conn, $requestcom);
$fetchcom = mysqli_fetch_all($querycom);
?>
<div id="wrapperArticle">
    <div class="bg flexc">
        <?php echo '<img class="imgArticle" src="images/' . $row[0][2] . '.jpg">'; ?>
    </div>
    <div class="content">
        <section class="gridArticle">
            <div id="leftSide" class="flexc">
                <?php echo '<img class="imgIcon" src="images/' . $row[0][2] . '.jpg">'; ?>
                <!-- Affichage prix -->
                <div id="gridPrice">
                    <p class="gameTitle">Acheter <?php echo $row[0][2]; ?></p>
                    <div id="alPri" class="flexr justsb">
                        <?php echo '<p class="price">' . $row[0][4] . ' € </p>'; ?>
                        <?php include("formbuy.php"); ?>
                    </div>
                </div>

            </div>
            <div id="rightSide" class="flexc">
                <div class="flexr justsb">
                    <h2><?php echo $row[0][2]; ?></h2>
                    <h2><?php echo $note . " sur 5 &#11088"; ?></h2>
                </div>
                <h2>Description</h2>
                <p class="description"><?php echo $row[0][3]; ?></p>
                <h2>Avis utilisateurs</h2>
                <?php include 'com.php'; ?>
            </div>
        </section>
    </div>
</div>