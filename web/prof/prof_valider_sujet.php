<?php
require 'init.php';
$id = $_GET['id'];

if(empty($_SESSION['user']))
{

  header('Location: ../index.html');
  exit();
}


$select = mysqli_query($link, "UPDATE sujet SET etat = 'validé par prof' WHERE id = $id");
if($select) {
    
    header("Location:{$_SERVER['HTTP_REFERER']}");
    exit;

}else{

    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);  
}


// Close connection
mysqli_close($link);

?>