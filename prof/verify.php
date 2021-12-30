<?php

$link = mysqli_connect("127.0.0.1", "root", "madjid", "univ");
$id=$_GET['id'];
$token=$_GET['token'];
$update = "UPDATE enseignant SET status = 'ACTIVE' WHERE id = '$id' AND token = '$token' ";
$result = mysqli_query($link, $update);

if ($result){


$result='<div class="alert alert-success">Felisitation , vous pouvez connecter </div>';

header("location: /prof/connect.php?result=".urlencode($result));


}
else{
echo " vérification n'a pas faite une erreur s'est produite";


}





