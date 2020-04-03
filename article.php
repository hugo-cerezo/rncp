<?php
session_start();
$conn = mysqli_connect("localhost","root","","rncp");
$quelarticle = $_GET['id'];
$request = "SELECT * FROM article WHERE title ='".$_GET['id']."' ";
$query = mysqli_query($conn,$request);
$row =  mysqli_fetch_all($query);
var_dump($row);
//affichage info article
echo $row[0][2];//title
echo '<img src="images/'.$row[0][2].'.jpg"></br>';//image produit
echo $row[0][3];//description
echo $row[0][4];//prix

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
        <form action='pannier.php' method='post'>
            <input type='number' name='quantité'>
            <input type='submit'> 
        </form>
        <?php
        if (isset($_POST['quantité']))
        {
            $requete = "SHOW TABLES LIKE 'pannier_'".$_SESSION['login']."' ' ";
            $result = mysqli_query($conn,$request);
            if(mysqli_num_rows($result) == 1)
            {
               // table nom_table exist
                $request2 = 'INSERT INTO pannier_"'.$_SESSION['login'].'" VALUES (NULL,"'.$row[0][2].'","'.$row[0][4].'","'.$_POST['quantité'].'")';
            }
            else
            {
               // existe pas
               $createTable = 'CREATE TABLE pannier_"'.$_SESSION['login'].'" (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title varchar(255) NOT NULL,
                prix int(255) NOT NULL,
                qtt int(255) NOT NULL,
                )' ;
                // inserer les données 
                $request2 = 'INSERT INTO pannier_"'.$_SESSION['login'].'" VALUES (NULL,"'.$row[0][2].'","'.$row[0][4].'","'.$_POST['quantité'].'")';
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