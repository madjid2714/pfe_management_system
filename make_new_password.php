<?php
$link = mysqli_connect("127.0.0.2", "univmost_madjid", "madjid", "univmost_madjid");
$id = $_GET['id'];
$email = $_GET['email'];

$result = '';

if(isset($_POST['change'])){



  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $repass = $_POST['repass'];

  $select = mysqli_query($link, "SELECT * FROM admin WHERE id = '$id' AND email='$email' ");
  $data = mysqli_fetch_assoc($select) ;
  $password = $data['password'];
  if($oldpass == $password){
    if($newpass == $repass){

     
          $update = mysqli_query($link, "UPDATE admin SET password = '$newpass' WHERE id = '$id' AND email='$email' ");

          if($update){
            $result='<div class="alert alert-success">votre mot de passe a été changé avec sucssé vous pouvez connecter</div>';
            header("location: /connect.php?result=".urlencode($result));

          }else{

            $result='<div class="alert alert-danger">une erreur s\'est prduite ressayer de nouveau</div>';
          }
    }else{
      $result='<div class="alert alert-danger">votre nouveau mot de passe et le mot de passe de confimration sont pas les memes</div>';
      /* header("Refresh: 0; URL=http://localhost/reset_password.php?result=".urlencode($result)); */


    }

      

  }else{
    $result='<div class="alert alert-danger">votre ancien mot de passe incorrect</div>';
    /* header("Refresh: 0; URL=http://localhost/reset_password.php?result=".urlencode($result)); */
  }

}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="connect.css">
    <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="responsiveslides.css">
    <link rel="stylesheet" type="text/css" href="css1/bootstrap-utilities.css">
   
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
   
    
    <link rel="stylesheet" type="text/css" href="_nav.scss">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <script src="https://kit.fontawesome.com/0c03620f7c.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <meta charset="UTF-8">
    <title>recuperer password</title>
</head>
<body class="form">
    


    
   
    <div class="container" style="margin-bottom: 24px;padding-bottom: 0px;padding-top: 0px;">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"style="margin-right: 0px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <img src="fsei.png" class="bi me-2" alt="" width="50" height="40">
              <span class="fs-4">Systeme gestion des choix de PFE</span>
            </a>
        
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="#" class="nav-link active nvla">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link active nvla">Contact</a></li>
             
             
            </ul>
          </header>
</div>
          
<div class="b-example-divider">
          <div class="container form">

        <div class="row justify-content-center ">
            <div class="col-md-4 card">
    <form action="#" method="post">
    <div class="col-sm-12 col-sm-offset-4">
      <p>
        <?php 
          echo "$result";
          
          
          
  
             ?>  
            </p>
        </div>

        <label style="margin-left: 20px; color: #111c30;"><h4>Recuperer votre mot de pass</h4></label>
    <div class="imgcontainer">
       
    <img src="businessman.svg" alt="Avatar" class="avatar" width="80" height="80">
    </div>
    
    <div class="container">
    <label for="uname"><b>Enter votre ancien mot de pass</b></label>
        <input type="password" placeholder="Enter ancien mot de pass" name="oldpass" required>

        <label for="uname"><b>Enter votre nouveau mot de pass</b></label>
        <input type="password" placeholder="Enter nouveau mot de pass" name="newpass" required>

        <label for="uname"><b>Confirmer votre nouveau mot de pass</b></label>
        <input type="password" placeholder="Enter nouveau mot de pass" name="repass" required>






        <button class="btn btn-primary nvla" type ="submit" name="change" value="Submit">Valider</button>

        <div class="d-flex justify-content-between">
        
        <label>
           
        </label>
        

        <a class="btn btn-primary nvla1" href="connect.php" role="button" style="margin-top: 4px;">Login</a>


    
            </div>
         
            <a class="btn btn-primary nvla1" href="index.html" role="button" style="margin-top: 4px;">Quitter</a>
      
           
        
        
           
        


    </div>
    

  </form>
  



</div>
</div>
</div>











</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
 -->
 <div class="row justify-content-center grid2">
  <footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            <h4>INFO</h4>
            <ul class="list-unstyled">
              <li><a href="#"></a></li>
              <li><a href="https://www.univ-mosta.dz">www.univ-mosta.dz</a></li>
              <li><a href="https://www.univ-mosta.dz/fsei">www.univ-mosta.dz/fsei</a></li>
              <li><a href="https://www.mesrs.dz">www.mesrs.dz</a></li>

            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            <h4>Nous contacter</h4>
            <ul class="list-unstyled">
              <li><a href="#"><i class="fas fa-map-marker-alt"></i>  chemin des crètes ex INES Mostaganem</a></li>
              <li><i class="fas fa-phone"></i>  Téléphone : +213 45 36 64 72</li>
              <li><a href="e.fsei.univ@gmail.com"><i class="fas fa-envelope"></i> Courriel : e.fsei.univ@gmail.com</a></li>
       
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            
            <img class="logo-footer" src="logo_footer.png" alt="logo-footer" data-at2x="assets/img/logo.png" style="margin-left: 35px;">
     
          </div>
        </div>
        <div class="col-md-3">
          <h4>Follow Us</h4>
              <ul class="social-network social-circle">
               <li><a href="https://www.facebook.com/universite.mostaganem/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="https://twitter.com/UnivMosta" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
               <li><a href="https://www.youtube.com/channel/UCkMIeRRzbgy7MfstE_o1KHg" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
              </ul>				
      </div>
      </div>
    <div class="row">
      <div class="col-md-12 copy" style="margin-top: 10px;">
        <p class="text-center">&copy; 2021 - faculté des sciences exactes et de l'informatique. All Rights Reserved.</p>
      </div>
    </div>
  
  
    </div>
    </div>
  </footer>

  </div>
</body>
</html>