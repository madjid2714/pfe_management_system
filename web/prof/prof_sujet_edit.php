<?php

require 'init.php';
$id = $_GET['id'];

if(empty($_SESSION['user']))
{

  header('Location: ../index.html');
  exit();

}

// get id through query string

$select = mysqli_query($link,"select * from sujet where id='$id'"); // select query

$data = mysqli_fetch_assoc($select);

if(isset($_POST['update'])) // when click on Update button
{
    $titre = $_POST['titre'];
    $resume = $_POST['résumé'];
    $mot_cle = $_POST['mot_clé'];
    $specialite  = $_POST['spécialité'];
 

	
    $edit = mysqli_query($link,"update sujet set titre='$titre', résumé='$resume', mot_clé='$mot_cle', spécialité='$specialite' where id='$id'");
	
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
<?php include 'head.php'; ?>
<body class="admin_body">
	
<?php include 'prof_navbar.php'; ?>

<div class="container search">
 <div class="row justify-content-between row align-items-center">




	</div>


    <div class="container admin_form">       

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="card" style="padding: 15px;">
                    <div class="card-header" >
                        <h4>
                          modifier paramettre sujet
                        </h4>
                      </div> 
                   
                    <div class="card-body">
                      <form method="post">

              <div class="form-group">
            <label for="inputAddress">Titre</label>
              <input type="text" class="form-control" name="titre" value="<?php echo $data['titre'] ?>" placeholder="titre">
            </div>
            <div class="form-group">
              <label for="exampleInputclassement">Résumé</label>
              <textarea class="form-control" name="résumé" rows="7" placeholder="resume"> <?php echo $data['résumé'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Spécialité</label>
              <input type="text" class="form-control" name="spécialité" value="<?php echo $data['spécialité'] ?>" placeholder="specialite">
            </div>

            <div class="form-group">
              <label for="exampleInputspecialite">Mot-Clé</label>
              <input type="text" class="form-control" name="mot_clé" value="<?php echo $data['mot_clé'] ?>" placeholder="mot-cle">
            </div>


          
              <div class="d-flex justify-content-end ">
            
             <button type="submit" name="update" value="Update" class="btn btn-primary m-4 "> <i class="fas fa-lg fa-plus"></i>   Editer </button>
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