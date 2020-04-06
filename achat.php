<?php
session_start();
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
    include 'header.php';
    ?>
    <form class="buy" action="achat.php" method="post">
                    <label for='nom'>nom</label>
                    <input type="text" name="nom">
                    <label for='prenom'>prenom</label>
                    <input type="text" name="prenom">
                    <label for='cb'>numero carte</label>
                    <input type="tel" name="cb"maxlength="19"placeholder="xxxx xxxx xxxx xxxx">
                    <label for='crypto'>crypto visuel</label>
                    <input type="text" name="crypto"maxlength="3" placeholder="xxx">
                    <input type="submit" name='paiment'>
    </form>
    <?php
    if (isset($_POST['paiment']))
    {
        $conn = mysqli_connect("localhost","root","","rncp");
        $request1="SELECT * FROM pannier_$_SESSION[login]";
        $query = mysqli_query($conn,$request1);
        $row =  mysqli_fetch_all($query);
        $i=0;
        $total=0;
        $tot=0;
        $description="";
        $request3="SELECT * FROM utilisateurs WHERE login= '$_SESSION[login]'";
        $query3 = mysqli_query($conn,$request3);
        $row3 =  mysqli_fetch_all($query3);
        var_dump($row3);
        while($i<count($row))
        {
            var_dump($description);
            $tot=($row[$i][3])*($row[$i][2]);
            $total = $total+$tot;
            $description= $description.(implode("|",$row[$i])).'</br>';
            $i=$i+1;
            
        }
        $utilisateur = $row3[0][0];
        $nom = $_POST['nom'];
        //insert into table:commande
        $request2 = "INSERT INTO commande VALUES (NULL,3,'$nom',$total,'$description',date)";
        $query2 = mysqli_query($conn,$request2);
        var_dump($request2);
        $destruction =" DROP TABLE pannier_$_SESSION[login] " ;
        $destructionquerry = mysqli_query($conn,$destruction);
        //header('Location:index.php');
    }
}

?>