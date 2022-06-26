<?php

require_once ("server.php");


$q = "SELECT * FROM shareitem INNER JOIN useraccounts ON shareitem.userID = useraccounts.userID WHERE  email='$_SESSION[email]' ;";
$r = mysqli_query($db, $q);

$q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
 $row = mysqli_fetch_assoc($q);
  $userID = $row['userID']; 
  $names = $row['name'];

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
$resultss = mysqli_query($db, $query);
$row_request = mysqli_num_rows($resultss);
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
  <link rel=" stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
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

  
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="main.php">Halaman Utama</a></li>
          <li>Penyenaraian Saya</li>
        </ol>
        <h6>Hai, <?php echo $names?> !
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

      </div>
    </section><!-- End Breadcrumbs -->
<br>

    <section class="inner-page">
 
         <!-- Begin Page Content -->
         <div class="container-fluid">

         
      

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-center">Dashboard Pengguna: Penyenaraian Saya</h1>
    <span class="float-right">
      <form action="date.php" method="POST">
          <button type="submit" name="refresh" class="btn btn-success">Kemas Kini</button>
      </form>
    </span>
   
</div>
        
         <br>
<!-- Content Row -->
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">   
                <h6 class="m-0 font-weight-bold text-primary">Penyenaraian Saya: Permintaan Barang</h6>
                <hr>
                    <!-- Display My Listing based on user session -->
                    <div class="card p-3">
                      <?php
                      $query3 = "SELECT * FROM requestitem WHERE userID ='$userID';";
                      $result = mysqli_query($db, $query3);
                      ?>
                        <table id="table" class="table table-striped table-bordered p-3 text-center" style="width:100%">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Gambar Barang</th>
                                <th>Masa</th>
                                <th>Kemas Kini</th>
                                <th>Padam</th>
                                <th>Dibantu Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $counter = 0;
                            ?>
                            <?php
                              while($row=mysqli_fetch_assoc($result))
                            {  
                                $counter+=1;
                                $itemName = $row['itemName'];
                                $deskripsi = $row['itemDesc'];
                                $kategori = $row['itemCat'];
                                $image = $row['image'];
                                $date = $row['date'];
                                $itemID = $row['itemID'];
                                ?>
                                <tr>
                                    <td><?php echo $counter?></td>
                                    <td><?php echo $itemName?></td>
                                    <td><?php echo $deskripsi?></td>
                                    <td><?php echo $kategori?></td>
                                    <td>
                                    <img  src="img/<?php echo $row['image']; ?>" alt="Image" height="200px" width="200px">
                                    </td>
                                    <td><?php echo $date?></td>
                                    <td><a href="editReqItem.php?GetID=<?php echo $itemID?>"class="fas fa-edit "></a></td>
                                    <td><a href="delReqItemUser.php?Del=<?php echo $itemID?>"class="fas fa-trash "></a></td>
                                    <td>
                                    <?php
                                      $mysql5 = " SELECT * FROM `notifications` WHERE itemID = '$itemID' ORDER BY noti_date ASC LIMIT 1;";
                                      $result5 =  mysqli_query($db, $mysql5);
                                      if(mysqli_num_rows($result5) > 0){
                                        while ($row5 = mysqli_fetch_array($result5)){
                                        $giver = $row5['giver'];
                                        $rf_from_ID = $row5['from_ID'];
                                        if (isset($giver)){
                                            echo "<a href='user-account-profile.php?GetID=". $rf_from_ID . "'>". $giver. "</a>";
                                        } else 
                                        {
                                            echo "No giver yet.";
                                        }
                                        }}
                                      ?>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
    </div>

<!-- Page Heading -->
<br>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <span class="float-right">
      <form action="date-share.php" method="POST">
          <button type="submit" name="refreshshare" class="btn btn-success">Kemas Kini</button>
      </form>
    </span>
   
</div>
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Penyenaraian Saya: Perkongsian Barang</h6>
                <hr>
                <div class="card p-3">
         <table id="stable" class="table table-striped table-bordered p-3 text-center" style="width:100%">
            <thead>
                <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Gambar Barang</th>
                <th>Time Stamp</th>
                <th>Kemas Kini</th>
                <th>Padam</th>
                <th>Diterima oleh</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $counter = 0;
            ?>
           
            <?php
               while($roww=mysqli_fetch_assoc($r))
            {
              
                $counter+=1;
                $itemName = $roww['s_itemName'];
                $s_itemID = $roww['s_itemID'];
                $deskripsi = $roww['s_itemDesc'];
                $kategori = $roww['s_itemCat'];
                $image = $roww['image'];
                $date = $roww['s_date'];
                ?>
                <tr>
                    <td><?php echo $counter?></td>
                    <td><?php echo $itemName?></td>
                    <td><?php echo $deskripsi?></td>
                    <td><?php echo $kategori?></td>
                    <td>
                    <img  src="img/<?php echo $roww['image']; ?>" alt="Image" height="200px" width="200px">
                    </td>
                    <td><?php echo $date?></td>
                    <td><a href="editShareItem.php?GetID=<?php echo $itemID?>"class="fas fa-edit "></a></td>
                    <td><a href="delShareItemUser.php?Del=<?php echo $itemID?>"class="fas fa-trash "></a></td>
                    <td>
                    <?php 
                   $mysql5 = " SELECT * FROM `s_notifications` WHERE itemID = '$s_itemID' ORDER BY noti_date ASC LIMIT 1;";
                   $result5 =  mysqli_query($db, $mysql5);
                   if(mysqli_num_rows($result5) > 0){
                     while ($row5 = mysqli_fetch_array($result5)){
                     $s_giver = $row5['giver'];
                     $sf_from_ID = $row5['from_ID'];
                     if (isset($giver)){
                         echo "<a href='user-account-profile.php?GetID=". $sf_from_ID . "'>". $s_giver. "</a>";
                     } else 
                     {
                         echo "No giver yet.";
                     }
                     }}
                   ?>
                     </td>
                </tr>
                <?php
                      }
            
        
            ?>
        </table>
          

    

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

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    
        <script>
        $(document).ready(function() {
            $("#table").DataTable();
        });
        </script>
          <script>
        $(document).ready(function() {
            $("#stable").DataTable();
        });
        </script>
</body>

</html>