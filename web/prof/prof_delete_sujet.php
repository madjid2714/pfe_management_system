<?php
require 'init.php';
$id = $_GET['id'];

if(empty($_SESSION['user']))
{

  header('Location: ../index.html');
  exit();
}


$select = mysqli_query($link, "DELETE FROM sujet WHERE id = $id");
if($select) {
    
    header("Location:{$_SERVER['HTTP_REFERER']}");
    exit;

}else{

    exit('operation impossibles');  
}


// Close connection
mysqli_close($link);

?>