<?php

require 'init.php';

if(empty($_SESSION['user']))
{

  header('Location:index.html');
  exit();
}



$select = mysqli_query($link, "SELECT * FROM sujet ");



?>

<?php include 'admin_header.php'; ?>
<body>
	
  <?php include 'admin_navbar.php'; ?>

<div class="container search">
 <div class="row justify-content-between row align-items-center">
 	<div class="col-sm align-center">
 		<h3>Liste des pfe</h3>
      </div>

	<div class="col-sm-4">
 		<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        
      </form>
      </div>
	</div>

	</div>



  <div class="container-fluid body">
 
<table class="table table-striped"  style="font-size:14px">
  <caption>List of users</caption>
  <thead class="thead1">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITRE</th>
      <th scope="col"style="width:40%;">RÉSUMÉ</th>
      <th scope="col">DÉPARTEMENT</th>
      <th scope="col">MOT-CLE</th>
      <th scope="col"style="width:8%;">ETAT</th>
       <th scope="col">ENSEIGNANT</th>
       <th scope="col" style="width:10%;">OPTIONS</th>
       
    </tr>
  </thead>
 
  <tbody class="tbody1">


        <tr>
        <?php
        while ($result1 = mysqli_fetch_assoc($select)){
          $select1 = mysqli_query($link, "SELECT id,nom FROM enseignant WHERE id = '".$result1['enseignant_id']."'");

            $result = mysqli_fetch_assoc($select1) ;

          ?>
      <th scope="row"> <?php echo $result1['id'];?></th>
      <td> <b><?php echo $result1['titre']; ?></b></td>
      <td> <?php echo $result1['résumé'];?></td>
       <td> <?php echo $result1['spécialité'];?> </td>
       <td> <?php echo $result1['mot_clé']; ?></td>
       <td> <p style="color:blue"><?php echo $result1['etat'];?> </p></td>
    
       <td> <?php echo $result['nom']; ?></td>
    
      <td>
      
      <div class="row">
      <div class="col-sm-auto " style="padding:2px;">
        
        <button type="button" class="btn btn-success btn-sm px-2">
          <a href="admin_sujet_valider.php?id=<?php echo $result1['id']; ?>"><img src="tick-mark.svg" title="valider le sujet" width="20" height="20"></a>
        </button>
       </div>
        <div class="col-sm-auto " style="padding:2px;">
      <button type="button" class="btn btn-secondary btn-sm px-2">
      <a href="admin_sujet_edit.php?id=<?php echo $result1['id']; ?>"><img src="pencil-square.svg"  title="editer le sujet" width="20" height="20"></a>
        </button>
        </div>
        <div class="col-sm-auto " style="padding:2px;">
        
        <button type="button" class="btn btn-danger btn-sm px-2">
          <a href="admin_sujet_delete.php?id=<?php echo $result1['id']; ?>"><img src="trash.svg" title="supprimer le sujet" width="20" height="20"></a>
        </button>
       </div>
       </div>
      </td>
    </tr>

<?php
    }
    ?>


</table>

 
  </div>






		<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
						
</body>
</html>