<?php

$conn = mysqli_connect("localhost","root","","RNCP");
$request = "SELECT COUNT(id) FROM article";
$sql = mysqli_query($conn,$request);
$row = mysqli_fetch_all($sql);

?>
<div class="selectioncategorie">
    <a href='articles.php?categorie=1 '><h2>categorie 1</h2></a>
    <a href='articles.php?categorie=2 '><h2>categorie 2</h2></a>
    <a href='articles.php?categorie=3 '><h2>categorie 3</h2></a>
    <a href='articles.php?categorie=4 '><h2>categorie 4</h2></a>
</div>
<?php
$i=0;
if (isset($_GET['categorie']))
{
    $request = "SELECT * FROM article WHERE categorie='".$_GET['article']."'";
    while ($i<$row)
    {
        echo '<div>
        <h2>"'.$row[$i][2].'"</h2>
        <img src="images/"'.$row[$i][2].'".png">
        <a href="article.php?id="'.$row[$i][2].'"">voir plus</a>    
        </div>';
        $i=$i+1;
    }
}
else
{
    $request = "SELECT * FROM article ";
    while ($i<$row)
    {
        echo '<div>
        <h2>"'.$row[$i][2].'"</h2>
        src="images/"'.$row[$i][2].'".png"
        <a href="article.php?id="'.$article.'"">voir plus</a>    
        </div>';
        $i=$i+1;
    }
}
?>