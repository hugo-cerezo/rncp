<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "rncp");
$request = "SELECT * FROM article ORDER BY date";
$query = mysqli_query($conn, $request);
$row = mysqli_fetch_all($query);
?>
<h1 class="titleindex">Nos articles phares</h1>
<section class="gridIndex">
    <article id="newEst" class="gridJeux">
        <div class="leftArea flex">
            <!-- Image du jeu -->
            <?php echo '<img class="indexImgJeux" src="images/' . $row[0][2] . '.jpg">' ?>
        </div>
        <div class="rightArea flexc">
            <!-- Descriptif du jeu -->
            <h2><?php echo $row[0][2]; ?></h2>
            <p><?php echo $row[0][3]; ?></p>
            <?php echo '<a href="article.php?id=' . $row[0][2] . ' ">voir plus</a>'; ?>
        </div>
    </article>








    <article id="bestRank" class="gridJeux">
        <div class="leftArea flex">
            <!-- Image du jeu -->
            <div class="indexImgJeux"></div>
        </div>
        <div class="rightArea flexc">
            <!-- Descriptif du jeu -->
            <p>Titre</p>
            <p>Note</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore praesentium ipsa nihil nulla. Saepe numquam vitae, sed beatae magnam laboriosam. Libero similique nulla culpa! Atque odio facilis optio rerum accusamus.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore praesentium ipsa nihil nulla. Saepe numquam vitae, sed beatae magnam laboriosam. Libero similique nulla culpa! Atque odio facilis optio rerum accusamus.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore praesentium ipsa nihil nulla. Saepe numquam vitae, sed beatae magnam laboriosam. Libero similique nulla culpa! Atque odio facilis optio rerum accusamus.</p>
        </div>
    </article>
</section>

<?php
//dernier article
// echo '<div class="articleindex">
//         <h2>Le plus recent</h2>
//         <h2>mieux noté</h2>
//         <h2>Le plus vendu</h2>
//         <div>
//         <h2>' . $row[0][2] . '</h2>
//         <img src="images/' . $row[0][2] . '.jpg"></br>
//         <a href="article.php?id=' . $row[0][2] . ' ">voir plus</a>  
//         </div>  
//     </div>';
//le mieux noter
//systeme de notation off

?>