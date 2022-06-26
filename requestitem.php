<?php require 'server.php' ;
  $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
  ?>
  <?php $row = mysqli_fetch_assoc($q);
    $userID = $row['userID']; 
    $myname = $row['name'];
    
    $querys = "SELECT shareitem.s_itemID, shareitem.image, shareitem.s_itemName, s_notifications.giver, s_notifications.giver_email, 
s_notifications.phoneNumber, s_notifications.notes, s_notifications.notiID, s_notifications.to_ID, s_notifications.from_ID 
FROM s_notifications 
INNER JOIN shareitem 
ON s_notifications.itemID=shareitem.s_itemID 
INNER JOIN useraccounts 
ON s_notifications.to_ID = useraccounts.userID 
WHERE email='$_SESSION[email]' 
GROUP BY shareitem.s_itemID 
ORDER BY s_notifications.noti_date;";

$results = mysqli_query($db, $querys);
$row_share = mysqli_num_rows($results);

$query = "SELECT requestitem.itemID, requestitem.image, requestitem.itemName, notifications.giver, notifications.giver_email, notifications.phoneNumber, notifications.notes, notifications.notiID, notifications.to_ID, notifications.from_ID 
FROM notifications 
INNER JOIN requestitem 
ON notifications.itemID=requestitem.itemID 
INNER JOIN useraccounts 
ON notifications.to_ID = useraccounts.userID 
WHERE email='$_SESSION[email]' 
GROUP BY requestitem.itemID 
ORDER BY notifications.noti_date;";
$result = mysqli_query($db, $query);
$row_request = mysqli_num_rows($result);
$total_noti = $row_request + $row_share;
    
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jiran2Jiran</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/8c212c06b6.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  
<?php include ('main-header.php'); ?>
<main id="main">   

<section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="main.php">Halaman Utama</a></li>
          <li>Barang Permintaan</li>
        </ol>

        <h6>Hai, <?php echo $myname?> 
                        <a class="fa fa-bell" href="getNotification.php">
                                <?php
                                                $q000 =  "SELECT * FROM notifications INNER JOIN useraccounts ON notifications.to_ID = useraccounts.userID
                                                 WHERE  email='$_SESSION[email]' ;";
                                                $query_run100 = mysqli_query($db, $q000);

                                                $row100 = mysqli_num_rows($query_run100);
                                                if($row100 > 0){
                                                    echo '<small class="badge bg-danger text-light rounded-circle" style="font-size:8px;"> '.$total_noti.'</small>';
                                                }
                          ?>
                          </a></h6>

                                           
                        <form  action="search.php" method="post">
                          <p class="text-center"> 
                          <input class="pl-2" type="searchbar" name="searchbar" placeholder="Carian" />
                          
                          <button type="submit" class="rounded"><i class="fa fa-search" aria-hidden="true" class="text-light"></i></button>
                        </p>
                      </form>
                      
                       
                        <p class="text-center">
                        <label class="text-light">Lihat sebagai:</label>
                        </p>
                        
                        <p class="text-center">
                        <a href="category-food.php" class="btn btn-primary btn-sm mx-1"> Makanan</a>
                        <a href="category-nonfood.php" class="btn btn-primary btn-sm mx-1">Bukan Makanan</a>
                        <a href="shareitem.php" class="btn btn-primary btn-sm mx-1">Perkongsian Barang</a>
                        <a href="requestitem.php" class="btn btn-primary btn-sm mx-1">Permintaan Barang</a>

                      </p>
                      
                      
                      
                      
      </h6>
  
    </section>
<br>
    <div id="gradient">
                  
    <style>
    .card {
          margin: 0 auto; /* Added */
          float: none; /* Added */
          margin-bottom: 10px; /* Added */
    }
    </style>
</div>
<div>
  <br>
  
                    </div>
                    <section class="px-4 py-0 my-0">
 
 <div class="row mt-4">
   <?php 
    $query ="SELECT * FROM requestitem INNER JOIN useraccounts ON requestitem.userID=useraccounts.userID";
   $result =  mysqli_query($db, $query);
   if(mysqli_num_rows($result) > 0){
       
       while ($row = mysqli_fetch_array($result)){
         $itemID = $row['itemID'];
           ?>
               <div class ="col-lg-3 col-md-4 col-sm-6 col-6">
                   <form method="post" action="contactForm.php?itemID=<?php echo $row["itemID"]?>">
                   
                               <div class="card">
                                   <div class="card-body">
                                     <img class="p-0 m-0 mx-auto w-100" src="img/<?php echo $row['image']; ?>" style="height:250px">
                                 
                                       <h5 class="card-title" style="text-align: center";><hr><strong><?php echo $row["itemName"];?></strong></hr></h5>
                                       <p class="card-text" style="text-align: center";><hr><strong>Deskripsi: </strong><br><?php echo $row["itemDesc"];?></br></hr></p>
                                       <p class="card-text"><strong>Kategori: </strong><br><?php echo $row["itemCat"];?></br></p>
                                       <p class="card-text"><strong>Diminta Oleh: </strong><br><?php echo $row["name"];?></br></p>
                                       <p class="card-text"><strong>Diminta Pada: </strong><br> <?php echo $row["date"];?></br></p>
                                      
                                       <div class="text-center">
                                       <a href="contactForm.php?GetID=<?php echo $itemID?>" class="text-light">
                                           <button type="button" class="btn btn-sm btn-primary btn-block px-2 border-0" style="background-color:#749cc7;">BANTU SEKARANG</buttton>
                                       </a>
                                     </div> 

                                   </div>
                             
                       </div>
                   </form>
               </div>
             <?php
                 }
             }?>
       </div>
                                </div>
                                    </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">



   

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Jiran2Jiran</span></strong>. All Rights Reserved
      </div>
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>