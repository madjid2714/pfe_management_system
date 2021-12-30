<?php





$result = '';



require 'init.php';

if(empty($_SESSION['user']))
{

  header('Location:index.html');
  exit();
}


?>
<?php include 'admin_header.php'; ?>
<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>

<body>
<?php include 'admin_navbar.php'; ?>
<div class="container search">
 <div class="row justify-content-between row align-items-center">
 	<div class="col-sm-9 box" style="padding-left: 70px;">
   
   
 		<h3 style="margin-right: 25px;">classement</h3>
    
     
     
<a href="affectation_se.php"><button type="button" class="btn btn-success btn-md px-3" ><img src="pencil-square.svg"  title="editer l'tudiant" width="20" height="20" >   Lancer l'affectation
        </button></a>


         <script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 1500);
 
});
</script>

        <div class="col-6 mx-auto"  >
        <?php if (isset($_GET['result'])!=(null))  {
          $result=$_GET['result'];

          
          echo' <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding-top: 10px;padding-bottom: 10px; margin-top: 16px; background-color: #14bb1e63;
          border-color: #badbcc;">
          <strong>success</strong>  données affecté
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding-top: 10px;padding-bottom: 20px;"></button>
        </div>'; 



        
          
      

            }  ?>  
    

      </div>

      </div>
      
     
            
	<div class="col-sm-3">

 		<form class="d-flex justify-content-end">
       
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      </div>

	</div>

	</div>


  <div class="container-fluid body">


  <div class="row-justify-content-center">
    



<div class="col-sm-10"> 

 

<!--<table class="table table-light">-->
<form  action="ajouter_classement_se.php" method="POST" style="padding-left: 190px;">


   <table id="myTable"   class="table table-striped"    
  data-toggle="table"  
  data-mobile-responsive="true"
  data-pagination="true"
     data-height="460"
     style="font-size:15px"
  >

  <caption> 
    <button type="submit" name="update" id="update" value="Update" class="btn btn-primary m-4 "> valider tous les classements </button>
    
</caption>





  <thead class="thead1">




    <tr>

      <th scope="col">ID</th>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col" style="width:10%;">EMAIL</th>
      <th scope="col" style="width:10%;">CLASSMENT</th>
      <th scope="col" style="width:15%;">OPTIONS</th>
 <!--      <th scope="col">SUJET AFFECTé</th>
       <th scope="col">SPÉCIALITÉ</th>
       <th scope="col">ENSEIGNANT</th>
       <th scope="col">OPTIONS</th> -->
       
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
      $select = mysqli_query($link, "SELECT * FROM etudiant where spécialité ='se'");
        while ($result1 = mysqli_fetch_assoc($select)){
            $classement=$result1['classement'];
            $id=$result1['id'];

    
          ?>
      <th scope="row"><?php echo $result1['id'];?></th>
      <td><?php echo $result1['nom'];?></td>
      <td><?php echo $result1['prenom'];?></td>
      <td><?php echo $result1['email'];?></td>
      <td>

      <input class="form-control" name="classement[]"  value=<?php echo $classement; ?>  >
      <input type="hidden"  class="form-control" name="id[]" value=<?php echo $id;?> >


    
    </td>
       
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
</form>
 
 



</div>


	</div>



      </div>

  </div>
</div>
</div>
		<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
						
</body>
</html>