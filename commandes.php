<?php
require 'config/base.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/jobsco/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2023 21:52:41 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>JobBoard HTML-5 Template</title>
<meta name="description" content>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="site.html">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/slicknav.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/nice-select.css">
<link rel="stylesheet" href="assets/css/style.css">
<script nonce="6d41f527-2ecd-4636-a86a-7f2cc964e5a7">(function(w,d){!function(j,k,l,m){j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const w of Object.entries(Object.entries(dataLayer).reduce(((x,y)=>({...x[1],...y[1]})),{})))zaraz.set(w[0],w[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const z=j.zaraz.q.shift();j[l].q.push(z)}r.defer=!0;for(const A of[localStorage,sessionStorage])Object.keys(A||{}).filter((C=>C.startsWith("_zaraz_"))).forEach((B=>{try{j[l]["z_"+B.slice(7)]=JSON.parse(A.getItem(B))}catch{j[l]["z_"+B.slice(7)]=A.getItem(B)}}));r.referrerPolicy="origin";r.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>
<?php include 'partials/_menu.php' ?>

<?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $nom_pers = htmlspecialchars($_POST['nom_pers']);
	
	$lieu_naiss = htmlspecialchars($_POST['lieu_naiss']);
	$date_naiss = htmlspecialchars($_POST['date_naiss']);
    $nationalite = htmlspecialchars($_POST['nationalite']);
    $contact = htmlspecialchars($_POST['contact']);
    $num_carte = htmlspecialchars($_POST['num_carte']);
    $ref_ville = htmlspecialchars($_POST['ref_ville']);
    $ref_commune = htmlspecialchars($_POST['ref_commune']);
    $ref_quartier = htmlspecialchars($_POST['ref_quartier']);
    $ref_avenue = htmlspecialchars($_POST['ref_avenue']);
    $fileName = $_FILES['file']['name'];
     $fileTmpName = $_FILES['file']['tmp_name'];
       
       $path = "prof/".$fileName;

            $check_query = "SELECT * FROM personne 
            WHERE nom_pers=:nom_pers
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
           
             ':nom_pers'   =>  $nom_pers            
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
                      text: 'Cet personne existe deja!',
                         footer: ''
                          })
                  </script>
                ";             
            }
        
          else
            {
            if ($statement->rowCount() == 0 ) {

				
  
 

  $req=$db->prepare("INSERT INTO personne (nom_pers,lieu_naiss,date_naiss,nationalite,contact,photo,num_carte,ref_ville,ref_commune,ref_quartier,ref_avenue) VALUES (:nom_pers,:lieu_naiss,:date_naiss,:nationalite,:contact,:photo,:num_carte,:ref_ville,:ref_commune,:ref_quartier,:ref_avenue)");

  $res=$req->execute(array(
    'nom_pers' => $nom_pers,
    'lieu_naiss' => $lieu_naiss,
    'date_naiss' => $date_naiss,
    'nationalite' => $nationalite,
    'contact' => $contact,
    'num_carte' => $num_carte,
    'ref_ville' => $ref_ville,
    'ref_commune' => $ref_commune,
    'ref_quartier' => $ref_quartier,
    'ref_avenue' => $ref_avenue,
    'photo' => $fileName
    
	
    
    
  ));
  if ($res) {
	move_uploaded_file($fileTmpName,$path);
     echo "
     <script>
     Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'personne inserer avec success',
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
                      text: 'personne non inserer!',
                         footer: ''
                          })
                  </script>";
  }
  }
  }
  }
}



 ?>
<main>

<div class="login-form-area section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-7 col-md-10">
<div class="login-form">

<div class="login-heading">
<span>Commande</span>
<p>

</p>
</div>

<form action="" method="post" enctype="multipart/form-data">
<div class="input-box">
<div class="single-input-fields">

<input type="text" name="nom_pers" placeholder="nom complet">
<div class="row">
  <div class="col-md-6">
  <input type="text" name="lieu_naiss" placeholder="Lieu de naissance">
  <input type="text" name="nationalite" placeholder="nationalite">
  <input type="file" name="file" placeholder="">
  <?php $reque=$db->query("SELECT * FROM ville"); ?>
                               <select class="form-control" name="ref_ville" id="">
                               
                               <option value="">--Villes--</option>
                                    <?php while ($gg = $reque->fetch()) { ?>
                                <option value="<?= $gg['id_v'];?>"><?= $gg['nom_ville'];?> </option>
                                <?php } ?>
                               </select>
                               <br>
                               <br>
                               <br>

                               <div class="single-input-fields">
  <?php $rev=$db->query("SELECT * FROM quartier"); ?>
                               <select class="form-control" name="ref_quartier" id="">
                               
                               <option value="">--quartier--</option>
                                    <?php while ($gv = $rev->fetch()) { ?>
                                <option value="<?= $gv['id_q'];?>"><?= $gv['nom_quartier'];?> </option>
                                <?php } ?>
                               </select>
  </div>


  </div>
  <div class="col-md-6">
  <input type="date" name="date_naiss" placeholder="Date de naissance">
  <input type="number" name="contact" placeholder="contact">
  <input type="number" name="num_carte" placeholder="numero carte">
  <div class="single-input-fields">
  <?php $rec=$db->query("SELECT * FROM commune"); ?>
                               <select class="form-control" name="ref_commune" id="">
                               
                               <option value="">--Commune--</option>
                                    <?php while ($gc = $rec->fetch()) { ?>
                                <option value="<?= $gc['id_com'];?>"><?= $gc['nom_com'];?> </option>
                                <?php } ?>
                               </select>
  </div>
  <br>
  <br>


  <div class="single-input-fields">
  <?php $reqav=$db->query("SELECT * FROM avenue"); ?>
                               <select class="form-control" name="ref_avenue" id="">
                               
                               <option value="">--Avenue--</option>
                                    <?php while ($gav = $reqav->fetch()) { ?>
                                <option value="<?= $gav['id_av'];?>"><?= $gav['nom_avenue'];?> </option>
                                <?php } ?>
                               </select>
  </div>
  </div>
  
</div>


<br>
<div class="login-footer">

<button type="submit" name="submit" class="btn login-btn">Commander</button>
</div>
</div>
</form>

</div>
</div>
</div>
</div>

</main>
<?php include 'partials/_footer.php' ?>

<div id="back-top">
<a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>


<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/range.js"></script>

<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>

<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/mail-script.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
  </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7f8523cc59983859","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/jobsco/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2023 21:52:42 GMT -->
</html>