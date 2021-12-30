<?php

require 'init.php';
$id = $_GET['id'];

if(empty($_SESSION['user']))
{

  header('Location:index.html');
  exit();

}

// get id through query string

$select = mysqli_query($link,"select * from etudiant where id='$id'"); // select query

$data = mysqli_fetch_assoc($select);

if(isset($_POST['update'])) // when click on Update button
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $specialite  = $_POST['spécialité'];
    $classement  = $_POST['classement'];

	
    $edit = mysqli_query($link,"update etudiant set nom='$nom', prenom='$prenom', email='$email', classement='$classement', spécialité='$specialite' where id='$id'");
	
    if($edit)
    {
        mysqli_close($link); // Close connection
        header("Location:{$_SERVER['HTTP_REFERER']}"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($link);
    }    	 
}


?>
<?php include 'admin_header.php'; ?>
<body class="admin_body">
	
<?php include 'admin_navbar.php'; ?>

<div class="container search">
 <div class="row justify-content-between row align-items-center">
 	<div class="col-sm-4 " style="padding-left: 70px;">
 		<h3>profil </h3>
      </div>

	<div class="col-sm-4">
 		<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      </div>
	</div>

	</div>


    <div class="container admin_form">       

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="card" style="padding: 15px;">
                    <div class="card-header" >
                        <h4>
                          modifier paramettre
                        </h4>
                      </div> 
                   
                    <div class="card-body">
                      <form method="post">

              <div class="form-group">
            <label for="inputAddress">Nom</label>
              <input type="text" class="form-control" name="nom" value="<?php echo $data['nom'] ?>" placeholder="nom">
            </div>
            <div class="form-group">
              <label for="exampleInputclassement">prenom</label>
              <input type="text" class="form-control" name="prenom" value="<?php echo $data['prenom'] ?>" placeholder="Prenom">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" value="<?php echo $data['email'] ?>" placeholder="email">
            </div>

            <div class="form-group">
              <label for="exampleInputspecialite">spécialité</label>
              <input type="text" class="form-control" name="spécialité" value="<?php echo $data['spécialité'] ?>" placeholder="spécialité">
            </div>

            <div class="form-group">
              <label for="exampleInputclassement">classement</label>
              <input type="text" class="form-control" name="classement" value="<?php echo $data['classement'] ?>" placeholder="classement">
            </div>
          
              <div class="d-flex justify-content-end ">
            
             <button type="submit" name="update" value="Update" class="btn btn-primary m-4 "> <img src="person-plus.svg" alt="créer" width="32" height="25"> créer </button>
           </div>
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