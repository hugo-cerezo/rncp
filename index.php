<?php
session_start()
?>
<?php
include 'header.php';
$conn = mysqli_connect("localhost","root","","rncp");
$request="SELECT * FROM article ORDER BY date";
$query = mysqli_query($conn,$request);
$row =  mysqli_fetch_all($query);

//dernier article
echo '<div>
        <div>
            <h1>Le plus recent</h1>
        </div>
        <h2>"'.$row[0][2].'"</h2>
        <img src="images/'.$row[0][2].'.jpg"></br>
        <a href="article.php?id='.$row[0][2].' ">voir plus</a>    
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