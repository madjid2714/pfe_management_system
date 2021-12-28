<?php

require 'init.php';

if(empty($_SESSION['user']))
{

  header('Location:index.html');
  exit();
}


?>
<?php include 'admin_header.php'; ?>
<body>
<?php include 'admin_navbar.php'; ?>
<div class="container search">
 <div class="row justify-content-between row align-items-center">
 	<div class="col-sm-4 " style="padding-left: 70px;">
 		<h3>Liste des etudiants</h3>
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
   <div class="row">
       

<div class="col-sm"> 

<!--<table class="table table-light">-->

   <table id="myTable"   class="table table-striped"   
  data-toggle="table"  
  data-mobile-responsive="true"
  data-pagination="true"
     data-height="460"
     style="font-size:15px"
  >
  <caption>List des etudiants </caption>
  <thead class="thead1">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">EMAIL</th>
      <th scope="col">CLASSMENT</th>
      <th scope="col">OPTIONS</th>
 <!--      <th scope="col">SUJET AFFECTé</th>
       <th scope="col">SPÉCIALITÉ</th>
       <th scope="col">ENSEIGNANT</th>
       <th scope="col">OPTIONS</th> -->
       
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
      $select = mysqli_query($link, "SELECT * FROM etudiant ");
        while ($result1 = mysqli_fetch_assoc($select)){

    
          ?>
      <th scope="row"><?php echo $result1['id'];?></th>
      <td><?php echo $result1['nom'];?></td>
      <td><?php echo $result1['prenom'];?></td>
      <td><?php echo $result1['email'];?></td>
      <td><?php echo $result1['classement'];?></td>
       
       <td>
      
      <div class="row">
    
        <div class="col-sm-auto " style="padding:2px;">
      <button type="button" class="btn btn-secondary btn-sm px-2">
      <a href="admin_etudiant_edit.php?id=<?php echo $result1['id']; ?>"><img src="pencil-square.svg"  title="editer l'tudiant" width="20" height="20"></a>
        </button>
        </div>
        <div class="col-sm-auto " style="padding:2px;">
        
        <button type="button" class="btn btn-danger btn-sm px-2">
          <a href="admin_etudiant_delete.php?id=<?php echo $result1['id']; ?>"><img src="trash.svg" title="supprimer le sujet" width="20" height="20"></a>
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


	</div>




  </div>
</div>
</div>
		<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
						
</body>
</html>