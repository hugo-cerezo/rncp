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
    <div class="bg">
        <?php echo '<img class="imgArticle" src="images/' . $row[0][2] . '.jpg">'; ?>
    </div>
    <div class="content">
        <section class="gridArticle">
            <div id="leftSide">
                <?php echo '<img class="imgIcon" src="images/' . $row[0][2] . '.jpg">'; ?>
                <?php echo '<p>' . $row[0][4] . ' €</p>'; ?>
                <p>Ajouter au panier</p>
                <div>
                    <?php include("formbuy.php"); ?>
                </div>
            </div>
            <div id="rightSide">
                <div class="flexr justsb">
                    <h2>Description</h2>
                    <h2><?php echo $note . " sur 5 &#11088"; ?></h2>
                </div>
                <p>
                    <?php echo $row[0][3]; ?>
                </p>
                <h2>Avis utilisateurs</h2>
                <p>
                    <?php include 'com.php'; ?>
                </p>
            </div>
        </section>
    </div>
</div>