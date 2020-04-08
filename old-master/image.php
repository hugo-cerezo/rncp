<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="inputFile" accept="image/png, image/jpeg">
        <input type="submit" name="submit">
    </form>
</body>

</html>

<?php
$gameName = "testnomfichier";
if (isset($_POST["submit"])) {
    if (strlen($_FILES["inputFile"]["name"]) != 0) {
        $imgPath = "images/" . basename($_FILES["inputFile"]["name"]);
        $imgType = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));
        $newName = "images/" . $gameName . "." . $imgType;
        if (file_exists($newName)) {
            unlink($newName);
        }
        move_uploaded_file($_FILES["inputFile"]["tmp_name"], $imgPath);
        rename($imgPath, $newName);
    }
}
?>

<?php
// session_start();
// $_FILES["input_file"]["name"] = $_POST["inputFile"];
// $target_dir = "images/";
// $target_file = $target_dir . basename($_FILES["input_file"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if (isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["input_file"]["tmp_name"]);
//     if ($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// // Check if file already exists
// if (file_exists($target_file)) {
//     // echo "";
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if (
//     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     && $imageFileType != "gif"
// ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
//     // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["inputFile"]["tmp_name"], $target_file)) {
//         echo "The file " . basename($_FILES["input_file"]["name"]) . " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }
?>