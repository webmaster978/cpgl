<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Data Tables - HRMS admin template</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<?php include 'partials/_header.php' ?>
			<?php include 'partials/_sidebar.php' ?>

            <?php 
if (isset($_POST['btn_submit'])) {
    extract($_POST);
    
    $nom_quartier = htmlspecialchars($_POST['nom_quartier']);
    

            $check_query = "SELECT * FROM quartier 
            WHERE nom_quartier=:nom_quartier
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':nom_quartier'   =>  $nom_quartier
                        
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 1)
             {
                echo "
                <script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'le quartier existe deja!',
                         footer: ''
                          })
                  </script>
                ";             
            }
        
          else
            {
            if ($statement->rowCount() == 0 ) {
  
 

  $reque=$db->prepare("INSERT INTO quartier (nom_quartier) VALUES (:nom_quartier) ");

  $result=$reque->execute(array(
    
    'nom_quartier'=> $nom_quartier
   
  ));
  if ($result) {
     echo "
     <script>
     Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'quartier modifier avec success',
      showConfirmButton: false,
      timer: 1500
    })
     </script>
     ";
  }else{
      echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'quartier non inserer !',
                         footer: ''
                          })
                  </script>";
  }
  }
  }
  }
}



 ?>


<?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $id_q = htmlspecialchars($_POST['id_q']);
    $nom_quartier = htmlspecialchars($_POST['nom_quartier']);
    

            $check_query = "SELECT * FROM quartier 
            WHERE nom_quartier=:nom_quartier
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':nom_quartier'   =>  $nom_quartier
                        
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 1)
             {
                echo "
                <script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'le quartier existe deja!',
                         footer: ''
                          })
                  </script>
                ";             
            }
        
          else
            {
            if ($statement->rowCount() == 0 ) {
  
 

  $req=$db->prepare("UPDATE quartier SET nom_quartier=:nom_quartier WHERE id_q=:id_q");

  $res=$req->execute(array(
    'id_q' => htmlspecialchars($_POST['id_q']),
    'nom_quartier'=> htmlspecialchars($_POST['nom_quartier'])
   
  ));
  if ($res) {
     echo "
     <script>
     Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'quartier modifier avec success',
      showConfirmButton: false,
      timer: 1500
    })
     </script>
     ";
  }else{
      echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'quartier non modifier !',
                         footer: ''
                          })
                  </script>";
  }
  }
  }
  }
}



 ?>
           
		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Liste des quartiers</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">quartiers</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-header">
									<h4 class="card-title mb-0">Liste des quartiers</h4>
									<p class="card-text">
									<div class="col" align="right">

									<button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i class="fa fa-plus"></i> Nouveau </button></li>
									</p>
								</div>
								<div class="card-body">

									<div class="table-responsive">
                                    <table id="res-config" class="table table-striped custom-table mb-0 datatable">
<thead>
<tr>
<th>Numero</th>
<th>Nom du quartier</th>
<th>Action</th>



</tr>
</thead>
<tbody>
<?php $requete=$db->query("SELECT * FROM quartier"); 
while ($g = $requete->fetch()) { 
?>
                         
                          




<div class="modal fade" id="large-Modal<?= $g['id_q']; ?>" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Modifier le quartier <?= $g['nom_quartier']; ?> </h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
   <form action="" method="post">
    <input type="hidden" name="id_q" value="<?= $g['id_q']; ?>">
 
  <div class="row">
     <div class="col-md-12">
        <input class="form-control form-control-round" name="nom_quartier" type="text" value="<?= $g['nom_quartier']; ?>"  placeholder="Titres de l'offre">
     </div>
    
    
  </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger waves-effect " data-dismiss="modal">Fermer</button>
<button type="submit" name="submit" class="btn btn-success waves-effect waves-light ">Modifier</button>
</div>
</form>
</div>
</div>
</div>
                           


<tr>
<td><?= $g['id_q']; ?></td>
<td><?= $g['nom_quartier']; ?></td>


<td>
<button type="button" class="btn btn-warning waves-effect" data-toggle="modal" data-target="#large-Modal<?= $g['id_q']; ?>">Modifier </button>
</td>



</tr>
<?php } ?>
</tbody>
</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Nouveau quartier</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
   <form action="" method="post">
 
  <div class="row">
     <div class="col-md-12">
        <input class="form-control form-control-round" name="nom_quartier" type="text" placeholder="Nom de l'quartier">
     </div>
     
     <br>
     <br>
     
    
  </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger waves-effect " data-dismiss="modal">Fermer</button>
<button type="submit" name="btn_submit" class="btn btn-success waves-effect waves-light ">Enregistrer</button>
</div>
</form>
</div>
</div>
</div>
		<!-- jQuery -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/app.js"></script>
		
    </body>
</html>