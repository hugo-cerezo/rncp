<?php
session_start().
include 'header.php';
$conn = mysqli_connect("localhost","root","","RNCP");
$request = "SELECT COUNT(id) FROM article";
$sql = mysqli_query($conn,$request);
$row = mysqli_fetch_all($sql);

?>
<div class="selectioncategorie">
    <a href='articles.php?categorie=inde '><h2>Indé </h2></a>
    <a href='articles.php?categorie=AAA '><h2>AAA</h2></a>
    <a href='articles.php?categorie=playwth '><h2>Play With Friends</h2></a>
    <a href='articles.php?categorie=retro '><h2>Retro</h2></a>
</div>
<div class="underline2"></div>
<div class="allarticles">
<?php
$i=0;
if (isset($_GET['categorie']))
{
    $request4 = "SELECT * FROM article WHERE categorie='".$_GET['categorie']."' ";
    $sql3 = mysqli_query($conn,$request4);
    $row3 = mysqli_fetch_all($sql3);
    while ($i<count($row3))
    {
        echo '<div class="articles">
        <a href="article.php?id='.$row3[$i][2].'">
        <img class="imgarticles" src="images/'.$row3[$i][2].'.jpg"></a>
           
        </div>';
        $i=$i+1;
    }
}
else
{
    $request3 = "SELECT * FROM article ";
    $sql2 = mysqli_query($conn,$request3);
    $row2 = mysqli_fetch_all($sql2);
    while ($i<count($row2))
    {
        echo '<div class="articles">
        <a href="article.php?id='.$row2[$i][2].'">
        <img class="imgarticles" src="images/'.$row2[$i][2].'.jpg"></a>
           
        </div>';
        $i=$i+1;
    }
}
?>
</div>
<style>
    
</style>