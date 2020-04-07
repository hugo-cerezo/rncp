<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost","root","","rncp");
$quelarticle = $_GET['id'];
$request = "SELECT * FROM article WHERE title ='".$_GET['id']."' ";
$query = mysqli_query($conn,$request);
$row =  mysqli_fetch_all($query);

//affichage info article

echo '<div class="article">
        <h1>'.$row[0][2].'</h1>
        <img src="images/'.$row[0][2].'.jpg"></br>
        <p>descrition:</p>
        <p>'.$row[0][3].'</p>
        <p> prix : '.$row[0][4].' </p>   
        ';

//condition achat
if (isset($_SESSION['login']))
{
    if ($row[0][5]==0)
    {
        echo '<p>plus en stock revien plus tard</p>';
    }
    else
    {
        ?>
        <form action='article.php?id=<?php echo $row[0][2]; ?>' method='post'>
            <input type='number' name='quantité'>
            <input type='submit'> 
        </form>
    </div>
        <?php
        if (isset($_POST['quantité']))
        {
               // table nom_table exist
               $title =$row[0][2];
               $prix =$row[0][4];
               $qtt = $_POST['quantité'];
                $request2 = "INSERT INTO pannier_$_SESSION[login] VALUES (NULL,'$title',$prix,$qtt)";  
                $sql = "CREATE TABLE pannier_$_SESSION[login](
                    id INT(2) AUTO_INCREMENT PRIMARY KEY, 
                    title varchar(255) NOT NULL,
                    prix int(255) NOT NULL,
                    qtt int(255) NOT NULL
                    )";
                if ($conn->query($sql) === TRUE) {
                    $query2 = mysqli_query($conn,$request2);
                    header("Location:pannier.php");
                } else {
                    $query2 = mysqli_query($conn,$request2);
                    header("Location:pannier.php");
                }
        }
    }
}
else
{
       echo '<p>pour pouvoir acheter GET["connected"]';
}

?>
 <style>
     img{
         width:400px;
         height:200px;
     }
 </style>

 <?php include 'com.php'; ?>