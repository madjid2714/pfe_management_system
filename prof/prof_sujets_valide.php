<?php

require 'init.php';

if(empty($_SESSION['user']))
{

  header('Location: ../index.html');
  exit();
}

$select = mysqli_query($link, "SELECT id,nom FROM enseignant WHERE email = '".$_SESSION['user']."' ");

$result = mysqli_fetch_assoc($select) ;

$select = mysqli_query($link, "SELECT * FROM sujet WHERE enseignant_id = '".$_SESSION['id']."' AND etat = 'validé par prof'");


?>
<?php include 'head.php'; ?>

<body>
	<div class="container-fluid">
	<?php include 'prof_navbar.php'; ?>
<div class="container search">
 <div class="row justify-content-between row align-items-center">
 	<div class="col-sm-4 " style="padding-left: 70px;">
 		<h3>Liste des sujets </h3>
      </div>

	<div class="col-sm-4">
 		<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      </div>
	</div>

	</div>

  <div class="container">
   <div class="row">
 

<div class="col-md">

<!--<table class="table table-light">-->

   <table id="myTable"   class="table table-light"
  data-toggle="table"
  data-mobile-responsive="true"
  data-pagination="true"

     data-height="460"
  >
  <caption>List des sujets </caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titre</th>
      <th scope="col">Résumé</th>
      <th scope="col">Dpartement</th>
      <th scope="col">Mot-clé</th>
      <th scope="col">etat</th>
       <th scope="col">OPTIONS</th>

    </tr>
  </thead>
  <tbody>


        <tr>
        <?php
        while ($result1 = mysqli_fetch_assoc($select)){
          ?>
      <th scope="row"> <?php echo $result1['id'];?></th>
      <td> <?php echo $result1['titre']; ?></td>
      <td> <?php echo $result1['résumé'];?> </td>
       <td> <?php echo $result1['spécialité'];?> </td>
       <td> <?php echo $result1['mot_clé']; ?></td>
       <td> <h6 style="color:blue"><?php echo $result1['etat'];?> </h6></td>
    
      <td>
      
      <div class="row">
      <div class="col-sm-auto " style="padding:2px;">
        
        <button type="button" class="btn btn-warning btn-sm px-3">
          <a href="prof_valider_sujet.php?id=<?php echo $result1['id']; ?>"><img src="tick-mark.svg" title="valider le sujet" width="20" height="20"></a>
        </button>
       </div>
        <div class="col-sm-auto " style="padding:2px;">
      <button type="button" class="btn btn-warning btn-sm px-3">
      <a href="prof_sujet_edit.php?id=<?php echo $result1['id']; ?>"><img src="pencil-square.svg"  title="editer le sujet" width="20" height="20"></a>
        </button>
        </div>
        <div class="col-sm-auto " style="padding:2px;">
        
        <button type="button" class="btn btn-warning btn-sm px-3">
          <a href="prof_delete_sujet.php?id=<?php echo $result1['id']; ?>"><img src="trash.svg" title="supprimer le sujet" width="20" height="20"></a>
        </button>
       </div>
       </div>
      </td>
    </tr>

<?php
    }
    ?>

  </tbody>

</table>


  <nav aria-label="...">
  <div class="d-flex justify-content-end">
  <ul class="pagination justify-content-end border">

    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>

  </ul>
  </div >
</nav>


</div>

	</div>
</div>

<?php include 'footer.php'; ?>

		<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>
