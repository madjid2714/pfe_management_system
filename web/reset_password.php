<?php
$result = '';
require 'crediantial.php';
require 'PHPMailer/PHPMailerAutoload.php';
$link = mysqli_connect("127.0.0.1", "root", "madjid", "univ");
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

<?php


if(isset($_POST['forget'])){
$email = $_POST['email'];


if(!empty($_POST['email'])){

  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $select = mysqli_query($link, "SELECT * FROM admin WHERE email = '".$_POST['email']."' ");
    $data = mysqli_fetch_assoc($select) ;
    $iddata = $data['id'];
    $emaildata=$data['email'];
    $namedata=$data['prenom'];
    $passdata=$data['password'];

   
    $url = 'http://'.$_SERVER['SERVER_NAME'].'/make_new_password.php?id='.$iddata.'&email='.$emaildata;

    $output = "<div> <h3>Salam ,voici votre mot de passe: <h2>$passdata<h3> merci de vous entrer sur ce lien pour changer votre mot de pass <br>".$url;

    if(mysqli_num_rows($select)) {

                $mail = new PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = EMAIL;                            // SMTP username
                $mail->Password = PASS;                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;
                $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ]
                ];                                    // TCP port to connect to

                $mail->setFrom(EMAIL, 'localhost');
                $mail->addAddress($email, $namedata);     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                $mail->isHTML(true);
                
                

                                          // Set email format to HTML

                $mail->Subject = 'recuperer mot de pass';
                $mail->Body    = $output;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) {
                    $result='<div class="alert alert-danger">une erreur s\'est produit email n\'a pas été envoyé </div>';
                    /* header("Refresh: 0; URL=http://localhost/reset_password.php?result=".urlencode($result)); */
                } else {

                    $result='<div class="alert alert-success">Message envoyé, vous pouvez verifier votre mail pour recuper votre mot de pass </div>';
                    /* header("Refresh: 0; URL=http://localhost/reset_password.php?result=".urlencode($result)); */
                }





    }else{
                $result='<div class="alert alert-danger">adresse mail incorrect !</div>';
               /*  header("Refresh: 1; URL=http://localhost/.php?result=".urlencode($result)); */
            //echo "adresse mail incorrect !";
         }
        }else{
          $result='<div class="alert alert-danger">Votre adresse mail n\'est pas valide !</div>';
        }
      }else{
    $result='<div class="alert alert-danger">il faut remplir tous les champs !</div>';
    /* header("Refresh: 1; URL=http://localhost/connect.php?result=".urlencode($result)); */
    //echo"il faut remplir tous les champs !";
}


}
?>


<body class="form">
    


    
   
    <div class="container" style="margin-bottom: 24px;padding-bottom: 0px;padding-top: 0px;">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"style="margin-right: 0px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <img src="logo.png" class="bi me-2" alt="" width="50" height="45">
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
    <form action="reset_password.php" method="post">
  
    <div class="col-sm-12 col-sm-offset-4">
    
      <p>
        <?php  
         
          echo "$result";
          
          
          
  
              ?>  
            </p>
            <label style=" margin-left: 30px; color: #111c30;"><h4>Recuperer  mot de pass</h4></label>
        </div>

       
    <div class="imgcontainer">
       
    <img src="businessman.svg" alt="Avatar" class="avatar" width="80" height="80">
    </div>
    
    <div class="container">
        <label for="uname"><b>Enter votre adresse email</b></label>
        <input type="text" placeholder="Enter adresse mail" name="email" required>






        <button class="btn btn-primary nvla" type ="submit" name="forget" value="Submit">Envoyer</button>

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
              <li><a href="https://www.univ.dz">www.univ.dz</a></li>
              <li><a href="https://www.univ.dz">www.univ.dz</a></li>
              <li><a href="https://www.univ.dz">www.univ.dz</a></li>

            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            <h4>Nous contacter</h4>
            <ul class="list-unstyled">
              <li><a href="#"><i class="fas fa-map-marker-alt"></i>  chemin des crètes ex univ</a></li>
              <li><i class="fas fa-phone"></i>  Téléphone : +213 06 62 22 58 26</li>
              <li><a href="e.univ.univ@gmail.com"><i class="fas fa-envelope"></i> Courriel : e.univ.univ@gmail.com</a></li>
       
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            
            <img class="logo-footer" src="logo_footer.png" alt="logo-footer" data-at2x="assets/img/logo.png" style="width:120px;margin-left: 35px;margin-bottom: 35px;">
     
          </div>
        </div>
        <div class="col-md-3">
          <h4>Follow Us</h4>
              <ul class="social-network social-circle">
               <li><a href="https://www.facebook.com" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="https://twitter.com" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
               <li><a href="https://www.youtube.com" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
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