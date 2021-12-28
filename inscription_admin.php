<?php

$link = mysqli_connect("127.0.0.2", "univmost_madjid", "madjid", "univmost_madjid");


//require 'PHPMailer/class.phpmaileroauthgoogle.php';
require 'crediantial.php';
require 'PHPMailer/PHPMailerAutoload.php';

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$email1 = $_REQUEST['email1'];
$email2 = $_REQUEST['email2'];
$password1 = $_REQUEST['password1'];
$password2 = $_REQUEST['password2'];


$token=md5(rand('10000','99999'));
$status="Inactive";
$register = "INSERT";

if(!empty($_REQUEST['nom']) AND !empty($_REQUEST['prenom']) AND !empty($_REQUEST['email1']) AND !empty($_REQUEST['email2']) AND !empty($_REQUEST['password1']) AND !empty($_REQUEST['password2'])){

if($email1==$email2){
    if(filter_var($email1, FILTER_VALIDATE_EMAIL)) {
   
$select = mysqli_query($link, "SELECT * FROM admin WHERE email = '".$_REQUEST['email1']."'");
if(mysqli_num_rows($select)) {
    $result='<div class="alert alert-danger">Cette adresse email est déjà utilisé</div>';
/*     header("Refresh: 1; URL=http://localhost/inscription.php?result=".urlencode($result)); */
    header("location:".$_SERVER['SERVER_NAME']."/inscription.php?result=".urlencode($result));
   // exit('Cette adresse email est déjà utilisé');
}else{

if($password1==$password2){
  
// Prepare an insert statement
$sql = "INSERT INTO admin (nom,prenom,password,email,status,token) VALUES (?,?,?,?,?,?)";

if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $nom, $prenom,$password1,$email1,$status,$token);

    // Set parameters

            
   

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        $last_id = mysqli_insert_id($link);
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/verify.php?id='.$last_id.'&token='.$token;
    
        $output = '<div> Merci de votre inscription. svp cliquer sur ce lien pour terminer cette inscription
        <br>'.$url.'</div>';$last_id = mysqli_insert_id($link);

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
            $mail->addAddress($email1, $prenom);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);
            
            

                                      // Set email format to HTML

            $mail->Subject = 'Confirmation d\'inscription';
            $mail->Body    = $output;
           // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                $result='<div class="alert alert-danger">une erreur s\'est produit email n\'a pas été envoyé </div>';
               /*  header("Refresh: 1; URL=http://localhost/inscription.php?result=".urlencode($result)); */
                header("location: /inscription.php?result=".urlencode($result));

            } else {

                $result='<div class="alert alert-success">Felisitation , vous pouvez verifier votre mail pour terminer votre inscription </div>';
/*                 header("Refresh: 1; URL=http://localhost/connect.php?result=".urlencode($result)); */
                header("location: /connect.php?result=".urlencode($result));
            }



        //$result='<div class="alert alert-success">Un message de confirmation a été envoyé a votre adresse mail </div>';
       // header("Refresh: 1; URL=http://localhost/connect.php?result=".urlencode($result));
        //echo "Records inserted successfully.";


    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}

mysqli_stmt_close($stmt);

}else{
    $result='<div class="alert alert-danger">Vos mots de passes ne correspondent pas !</div>';
/*     header("Refresh: 1; URL=http://localhost/inscription.php?result=".urlencode($result)); */
    header("location: /inscription.php?result=".urlencode($result));
    //echo " Vos mots de passes ne correspondent pas !";
        }
    
    }
}else{
    $result='<div class="alert alert-danger">Votre adresse mail n\'est pas valide !</div>';
/*     header("Refresh: 1; URL=http://localhost/inscription.php?result=".urlencode($result)); */
    header("location: /inscription.php?result=".urlencode($result));
       // echo "Votre adresse mail n'est pas valide !";
    }
}else{
    $result='<div class="alert alert-danger">Vos mails ne correspondent pas !</div>';
/*     header("Refresh: 1; URL=http://localhost/inscription.php?result=".urlencode($result)); */
    header("location: /inscription.php?result=".urlencode($result));
   // echo " Vos mails ne correspondent pas !";
}

}else{
    $result='<div class="alert alert-danger">Tous les champs doivent être complétés !</div>';
/*     header("Refresh: 1; URL=http://localhost/inscription.php?result=".urlencode($result)); */
    header("location: /inscription.php?result=".urlencode($result));
   // echo "Tous les champs doivent être complétés !";
}

// Close connection
mysqli_close($link);

?>

