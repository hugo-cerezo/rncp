<?php
session_start();
$sql = "CREATE TABLE pannier_$_SESSION[login](
    id INT(2) AUTO_INCREMENT PRIMARY KEY, 
    title varchar(255) NOT NULL,
    prix int(255) NOT NULL,
    qtt int(255) NOT NULL
    )";
    $conn = mysqli_connect("localhost","root","","rncp");
if ($conn->query($sql) === TRUE) {
    $request2 = " DROP TABLE pannier_$_SESSION[login] " ;
    $query2 = mysqli_query($conn,$request2);
    header('Location:index.php');
} else {

    include 'header.php';
    $conn = mysqli_connect("localhost","root","","rncp");
    $request = "SELECT * FROM pannier_$_SESSION[login]";
    $query = mysqli_query($conn,$request);
    $row =  mysqli_fetch_all($query);
    $i=0;
    $total=0;
    ?>
    <table>
        <tbody>
            <tr>
                <td></td>
                <td>nom</td>
                <td>qtt</td>
                <td>prix</td>
                <td>total</td>
            </tr>
    <?php
    while ($i<count($row))
    {
        $tot=($row[$i][3])*($row[$i][2]);
        echo '<tr>';
        echo '<td>',$row[$i][0],'</td>';
        echo '<td>',$row[$i][1],'</td>';
        echo '<td>',$row[$i][3],'</td>';
        echo '<td>',$tot,'</td>';
        echo '<td></td></tr>';
        $total = $total+$tot;
        $i = $i+1;
    }
    echo '<tr><td></td><td></td><td></td><td></td><td>';
    echo $total;
    echo '</td></tr>'
    ?>
    </tbody>
    </table>
    <form action="pannier.php" method="post">
        <button type="submit" name="validation">passer a l'achat</button>
        <button type="submit" name="supression">vider le pannier</button>
    </form>
    <?php

    if (isset($_POST['validation']))
    {
        header("Location:achat.php");
    }
    if (isset($_POST['supression']))
    {
        $request2 = " DROP TABLE pannier_$_SESSION[login] " ;
        $query2 = mysqli_query($conn,$request2);
        var_dump($query2);
        header("Location:index.php");
    }
}

?>