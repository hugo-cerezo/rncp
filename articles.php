<?php
session_start().
include 'header.php';
$conn = mysqli_connect("localhost","root","","RNCP");
$request = "SELECT COUNT(id) FROM article";
$sql = mysqli_query($conn,$request);
$row = mysqli_fetch_all($sql);

?>
<div class="selectioncategorie">
    <a href='articles.php?categorie=inde '><h2>indé 1</h2></a>
    <a href='articles.php?categorie=AAA '><h2>AAA</h2></a>
    <a href='articles.php?categorie=3 '><h2>categorie 3</h2></a>
    <a href='articles.php?categorie=4 '><h2>categorie 4</h2></a>
</div>
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
        <h2>"'.$row3[$i][2].'"</h2>
        <img src="images/'.$row3[$i][2].'.jpg"></br>
        <a href="article.php?id='.$row3[$i][2].'">voir plus</a>  
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
        <h2>"'.$row2[$i][2].'"</h2>
        <img src="images/'.$row2[$i][2].'.jpg"></br>
        <a href="article.php?id='.$row2[$i][2].'">voir plus</a>    
        </div>';
        $i=$i+1;
    }
}
?>
</div>
<style>
    img{
        width:400px;
        height:200px;
    }
    header{
        display :flex;

    }
</style>