<?php

require 'init.php';


if(empty($_SESSION['user']))
{

  header('Location:index.html');
  exit();

}

// get id through query string

$select = mysqli_query($link,"select * from etudiant ORDER BY classement "); // select query

$data = mysqli_fetch_assoc($select);

$select1 = mysqli_query($link,"select * from choix "); // select query

$data1 = mysqli_fetch_assoc($select);

$classement=$data['classement'];




$select7 = mysqli_query($link,"select id from etudiant where classement='1' ");
$data7 = mysqli_fetch_assoc($select7);
$etudiant_id7=$data7['id'];

$select8 = mysqli_query($link,"select sujet_id from choix where etudiant_id=$etudiant_id7 and priorité='1'");
$data8 = mysqli_fetch_assoc($select8);
$sujet_id8=$data8['sujet_id'];



$update = mysqli_query($link,"update etudiant set sujet_id ='$sujet_id8' where classement='1' ");

for ($i=2;$i<=5;$i++) {



  $select2 = mysqli_query($link,"select id from etudiant where classement=$i ");
  $data2 = mysqli_fetch_assoc($select2);
  $etudiant_id2=$data2['id'];

  //$select3 = mysqli_query($link,"select * from choix where etudiant_id=$etudiant_id2 ORDER BY priorité");
  //$data3 = mysqli_fetch_assoc($select3);
  //$etudiant_id3=$data3['etudiant_id'];
  //$priorite3=$data3['priorité'];
  //$sujet_id3=$data3['sujet_id'];

  for($p=1;$p<=3;$p++) {
    for ($c=1;$c<$i;$c++) {
      $select4 = mysqli_query($link,"select id from etudiant where classement=$c");
      $data4 = mysqli_fetch_assoc($select4);
      $etudiant_id4=$data4['id'];

                $select5 = mysqli_query($link,"select sujet_id from choix where etudiant_id=$etudiant_id4");
                $data5 = mysqli_fetch_assoc($select5);
                $sujet_id5=$data5['sujet_id'];

                if($select5){
                  for($d=1;$d<=3;$d++) {

                    $select6 = mysqli_query($link,"select sujet_id from choix where etudiant_id=$etudiant_id4 AND priorité=$p");
                      if($select6){
                        $c=$c+1;
                        break 2;
                      }else{

                        break ;

                      }

                  }
                            
                }

    }

    $update = mysqli_query($link,"update etudiant set sujet_id ='$sujet_id5' where classement='$i' ");
    break;

  }



}

header("location:{$_SERVER['HTTP_REFERER']}");




?>
