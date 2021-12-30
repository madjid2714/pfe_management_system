<?php
require 'init.php';

if(empty($_SESSION['user']))
{

  header('Location:index.html');
  exit();
}


$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

//$admin_id = 20;
if(!empty($_REQUEST['nom']) AND !empty($_REQUEST['prenom']) AND !empty($_REQUEST['email']) AND !empty($_REQUEST['password'])){
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
$select = mysqli_query($link, "SELECT * FROM enseignant WHERE email = '".$_REQUEST['email']."'");
if(mysqli_num_rows($select)) {
  exit('Cette enseignant existe deja');
}else{
  
// Prepare an insert statement
$sql = "INSERT INTO enseignant (nom,prenom,email,password) VALUES (?,?,?,?)";


if($stmt = mysqli_prepare($link, $sql)){
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "ssss", $nom,$prenom,$email,$password);

  // Set parameters

  // Attempt to execute the prepared statement
  if(mysqli_stmt_execute($stmt)){
    header("Location:{$_SERVER['HTTP_REFERER']}");
  } else{
      echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
  }
} else{
  echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}

mysqli_stmt_close($stmt);

}

}else{
    echo "Votre adresse mail n'est pas valide !";
}
}else{
    echo "Tous les champs doivent être complétés !";
}



// Close connection
mysqli_close($link);

?>