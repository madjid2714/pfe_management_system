<?php
require 'init.php';

if(empty($_SESSION['user']))
{

  header('Location: ../index.html');
  exit();
}

$select = mysqli_query($link, "SELECT nom,id FROM enseignant WHERE email = '".$_SESSION['user']."' ");
$result = mysqli_fetch_assoc($select) ;

$enseignant = $result['nom'];
$enseignant_id = $result['id'];
$titre = $_REQUEST['titre'];
$resume = $_REQUEST['resume'];
$mot_cle = $_REQUEST['mot_cle'];
$specialite = $_REQUEST['specialite'];
//$admin_id = 20;


$select = mysqli_query($link, "SELECT * FROM sujet WHERE titre = '".$_REQUEST['titre']."'");
if(mysqli_num_rows($select)) {
  exit('Ce titre est déjà utilisé');
}else{
  

// Prepare an insert statement
$sql = "INSERT INTO sujet (titre,résumé,spécialité,mot_clé,enseignant_id) VALUES (?,?,?,?,?)";


if($stmt = mysqli_prepare($link, $sql)){
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "ssssi", $titre, $resume,$specialite,$mot_cle,$enseignant_id);

  // Set parameters

  // Attempt to execute the prepared statement
  if(mysqli_stmt_execute($stmt)){
    header("location:".$_SERVER['HTTP_REFERER']."?result=".urlencode($result));


  } else{
      echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
  }
} else{
  echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}

mysqli_stmt_close($stmt);

}


// Close connection
mysqli_close($link);

?>