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
           
		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Personnes enregistrer</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Liste de personnes</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-header">
									<h4 class="card-title mb-0">Liste des personnes</h4>
									<p class="card-text">
									

									
									</p>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped mb-0">
											<thead>
												<tr>
													<th>Nom complet</th>
													<th>Lieu naissance</th>
													<th>Date naissance</th>
													<th>Nationalite</th>
													<th>Contact</th>
													
													<th>Numero carte</th>
													<th>Adresse</th>
													<th>Photo</th>
												</tr>
											</thead>
											<tbody>
											<?php $requete=$db->query("SELECT * FROM personne INNER JOIN ville ON personne.ref_ville=ville.id_v INNER JOIN quartier ON personne.ref_quartier=quartier.id_q INNER JOIN commune ON personne.ref_commune=commune.id_com INNER JOIN avenue ON personne.ref_avenue=avenue.id_av"); ?>
                                    <?php while ($g = $requete->fetch()) {
                                                                               
                                        ?>
                                        <tr>
                                            
                                            
                                            <td><?= $g['nom_pers']; ?></td>
                                            <td><?= $g['lieu_naiss']; ?></td>
                                            <td><?= $g['date_naiss']; ?></td>
                                            <td><?= $g['nationalite']; ?></td>
                                            <td><?= $g['contact']; ?></td>
                                            <td><?= $g['num_carte']; ?></td>
											<td>
												Ville : <?= $g['nom_ville']; ?> <br>
												Commune : <?= $g['nom_com']; ?> <br>
												quartier : <?= $g['nom_quartier']; ?> <br>
												avenue : <?= $g['nom_avenue']; ?>
											</td>
											<td>
												<img width="100px;" src="../prof/<?= $g['photo']; ?>" alt="">
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