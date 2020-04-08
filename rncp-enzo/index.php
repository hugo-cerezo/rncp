<?php
session_start()
?>
<?php
include 'header.php';
$conn = mysqli_connect("localhost","root","","rncp");
$request="SELECT * FROM article ORDER BY date";
$query = mysqli_query($conn,$request);
$row =  mysqli_fetch_all($query);
?>
<h1 class="titleindex">Nos articles phares</h1>
<?php
//dernier article
echo '<div class="articleindex">
        <h2>Le plus recent</h2>
        <h2>mieux noté</h2>
        <h2>Le plus vendu</h2>
        <div>
        <h2>'.$row[0][2].'</h2>
        <img src="images/'.$row[0][2].'.jpg"></br>
        <a href="article.php?id='.$row[0][2].' ">voir plus</a>  
        </div>  
    </div>';
//le mieux noter
//systeme de notation off


?>
<style>
    img{
        width:400px;
        height:200px;
    }
</style>