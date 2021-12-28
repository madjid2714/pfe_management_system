<?php





$result = '';
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
    <title>connect</title>
</head>
<body class="form">
    


    
   
    <div class="container" style="margin-bottom: 24px;padding-bottom: 0px;padding-top: 0px;">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"style="margin-right: 0px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <img src="logo.png" class="bi me-2" alt="" width="50" height="45" style="margin-right:10px;">
              <span class="fs-4">Systeme gestion des choix de PFE</span>
            </a>
        
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="index.html" class="nav-link active nvla">Home</a></li>
              <li class="nav-item"><a href="contact.php" class="nav-link active nvla">Contact</a></li>
       
             
            </ul>
          </header>
</div>
          
<div class="b-example-divider">
          <div class="container form">

        <div class="row justify-content-center ">
            <div class="col-md-4 card">
    <form action="connect_admin.php" method="post">
    <div class="col-sm-12 col-sm-offset-4">
      <p>
        <?php if (isset($_GET['result'])!=(null))  {
          $result=$_GET['result'];
          echo "$result";
          
          
          
  
            }  ?>  
            </p>
        </div>


    <div class="imgcontainer">
       
    <img src="businessman.svg" alt="Avatar" class="avatar" width="80" height="80">
    </div>

    <div class="container">
        <label for="uname"><b>email</b></label>
        <input type="text" placeholder="Enter adresse mail" name="email" required>

        <label for="psw"><b>mot de passe</b></label>
        <input type="password" placeholder="Enter mot de passe" name="password" required>





        <button class="btn btn-primary nvla" type="submit">Login</button>

        <div class="d-flex justify-content-between">
        
        <label>
           
        </label>
        

        


    
            </div>
         
            <a class="btn btn-primary nvla1" href="index.html" role="button" style="margin-top: 4px;">Quitter</a>
      

        
        
            <span class="psw">Forgot <a href="reset_password.php">password?</a></span>
        


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
              <li><a href="https://www.univ-oran.dz">www.univ.dz</a></li>
              <li><a href="https://www.univ-oran.dz">www.univ.dz</a></li>
              <li><a href="https://www.univ.dz">www.univ.dz</a></li>

            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            <h4>Nous contacter</h4>
            <ul class="list-unstyled">
              <li><a href="#"><i class="fas fa-map-marker-alt"></i>  univ </a></li>
              <li><i class="fas fa-phone"></i>  Téléphone : +213 00 00 00 00</li>
              <li><a href="e.univ.univ@gmail.com"><i class="fas fa-envelope"></i> Courriel : e.univ.univ@gmail.com</a></li>
       
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            
            <img class="logo-footer" src="https://www.nicepng.com/png/full/372-3727585_cornell-university-cornell-university-logo-white.png" alt="logo-footer" data-at2x="assets/img/logo.png" style="margin-bottom: 45px; margin-left:35px; width:120px;">
     
          </div>
        </div>
        <div class="col-md-3">
          <h4>Follow Us</h4>
              <ul class="social-network social-circle">
               <li><a href="https://www.facebook.com" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="https://twitter.com" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
               <li><a href="https://www.youtube.com/" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
              </ul>				
      </div>
      </div>
    <div class="row">
      <div class="col-md-12 copy" style="margin-top: 10px;">
        <p class="text-center">&copy; 2021 - faculté des sciences economique et de gestion. All Rights Reserved.</p>
      </div>
    </div>
  
  
    </div>
    </div>
  </footer>

  </div>
</body>
</html>