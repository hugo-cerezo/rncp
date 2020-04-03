<form>
    <!-- formulaire de paiment fictif -->
</form>
<?php
$sql = "CREATE TABLE pannier_$_SESSION[login](
    id INT(2) AUTO_INCREMENT PRIMARY KEY, 
    title varchar(255) NOT NULL,
    prix int(255) NOT NULL,
    qtt int(255) NOT NULL
    )";
    $conn = mysqli_connect("localhost","root","","rncp");
if ($conn->query($sql) === TRUE) 
{
    $request2 = " DROP TABLE pannier_$_SESSION[login] " ;
    $query2 = mysqli_query($conn,$request2);
    header('Location:index.php');
}
else 
{
    if (isset($_POST['paiment']))
    {
        $conn = mysqli_connect("localhost","root","","rncp");
        $request1="SELECT * FROM pannier_$_SESSION[login]";
        $query = mysqli_query($conn,$request);
        $row =  mysqli_fetch_all($query);
        //insert into table:commande
        $request2 = "INSERT INTO commande VALUES ()";
        $query2 = mysqli_query($conn,$request2);
        header("Location:achat_bis.php");
    }
}

?>