<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<?php

require 'init.php';


if(empty($_SESSION['user']))
{

  header('Location:index.html');
  exit();

}

$select7 = mysqli_query($link,"select id from etudiant where classement='1' and spécialité ='sc'  ");
$data7 = mysqli_fetch_assoc($select7);

$select9 = mysqli_query($link,"select * from etudiant where spécialité ='sc' ORDER BY classement");
$data9 = mysqli_fetch_assoc($select9);
$rowcount=mysqli_num_rows($select9);



$etudiant_id7=$data7['id'];

$select8 = mysqli_query($link,"select sujet_id from choix where etudiant_id=$etudiant_id7 and priorité='1'");
$data8 = mysqli_fetch_assoc($select8);
$sujet_id8=$data8['sujet_id'];



$update = mysqli_query($link,"update etudiant set sujet_id ='$sujet_id8' where classement='1' and spécialité ='sc' ");
$update3 = mysqli_query($link,"update sujet set etat ='affecté' where id ='$sujet_id8' ");

for ($i=2;$i<=$rowcount;$i++) {
  for($p=1;$p<=15;$p++) {

    $select = mysqli_query($link,"select id from etudiant where classement=$i and spécialité ='sc'");
    $data = mysqli_fetch_assoc($select);
    $etudiant_id=$data['id'];

    $select2 = mysqli_query($link,"select sujet_id from choix where etudiant_id=$etudiant_id and priorité=$p");
    $data2 = mysqli_fetch_assoc($select2);
    $sujet_id2=$data2['sujet_id'];

    for ($c=1;$c<$i;$c++) {

                     $select3 = mysqli_query($link,"select sujet_id from etudiant where classement=$c and spécialité ='sc'");
                     $data3 = mysqli_fetch_assoc($select3);
                     $sujet_id3=$data3['sujet_id'];

                        if($sujet_id2==$sujet_id3){

                            break ;
                        }
                      }
                      if($sujet_id2!=$sujet_id3){
                        $update2 = mysqli_query($link,"update etudiant set sujet_id ='$sujet_id2' where classement='$i' and spécialité ='sc' ");
                        $update3 = mysqli_query($link,"update sujet set etat ='affecté' where id ='$sujet_id2' ");

                      break ;
                      }
                            
                }

    }

    
  for ($j=2;$j<=$rowcount;$j++) {
    $select10 = mysqli_query($link,"select sujet_id from etudiant where classement='$j' and spécialité ='sc'");
    $data10 = mysqli_fetch_assoc($select10);
    $sujet_id10=$data10['sujet_id']; 
     if(is_null($sujet_id10)){

      $select11 = mysqli_query($link,"select id from sujet where etat='validé' and spécialité ='sc'");

      

      $data11 = mysqli_fetch_assoc($select11);
      
     /*  $row = mysqli_fetch_row($select11); */
      $sujet_id11=$data11['id'];
/*       $id = array_keys($data11['id']);
      $id = mysqli_real_escape_string($link,$data11['id'][$id]); */ 
      $update11 = mysqli_query($link,"update etudiant set sujet_id ='$sujet_id11' where classement='$j' and spécialité ='sc' ");
      $update11 = mysqli_query($link,"update sujet set etat ='affecté' where id ='$sujet_id11' ");

    
      

  }
  
  }

  // $result='<div class="alert alert-danger">il faut remplir tous les champs !</div>';
  $result="yes";
  
 


//   $result='<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
//   <div class="toast-header">
//     <img src="..." class="rounded mr-2" alt="...">
//     <strong class="mr-auto">Bootstrap</strong>
//     <small>11 mins ago</small>
//     <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//   </div>
//   <div class="toast-body">
//     Hello, world! This is a toast message.
//   </div>
// </div>';




  // header("Location: http://$_SERVER[REQUEST_URI]");

  header("location:".$_SERVER['HTTP_REFERER']."?result=".urlencode($result));

  


  // header('Location: '.$_SERVER['PHP_SELF']);
  // header("Location: " . "http://" . $_SERVER['REQUEST_URI']."?result=".$result);

  // "?id=".$_GET['id']
    // $message="affectation avec success";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    // echo "<script type='text/javascript'>document.location.href='{$_SERVER['HTTP_REFERER']}';</script>";

    // $result='<div class="alert alert-danger">il faut remplir tous les champs !</div>';
    // header("location?result=".urlencode($result));

    // $result='<div class="alert alert-danger">il faut remplir tous les champs !</div>';
    
    // echo date('H:i:s Y-m-d');
    // echo '<script type="text/JavaScript"> location.reload(); </script>';
  





?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>