<?php

require_once ("server.php");
$q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
?>
<?php $row = mysqli_fetch_assoc($q);
  $userID = $row['userID']; 
  $name = $row['name'];
  
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
  <link href="Jiran2Jiran.png" rel="icon">
  <link href="Jiran2Jiran.png" rel="apple-touch-icon">

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
          <li>Notifikasi Saya</li>
        </ol>
        <h6>Hai, <?php echo $name?> !
        <a class="fa fa-bell" href="getNotification.php">
                                <?php
                                                $q000 =  "SELECT * FROM notifications INNER JOIN useraccounts ON notifications.to_ID = useraccounts.userID
                                                 WHERE  email='$_SESSION[email]' GROUP BY notifications.itemID ORDER BY notifications.noti_date;";
                                                $query_run100 = mysqli_query($db, $q000);

                                                $row100 = mysqli_num_rows($query_run100);
                                                if($row100 > 0){
                                                    echo '<small class="badge bg-danger text-light rounded-circle" style="font-size:8px;"> '.$total_noti.'</small>';
                                                     
                                                }
                          ?>
                          </a></h6>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
 <!-- Begin Page Content -->
         <div class="container-fluid"><h1 class="h3 mb-0 text-gray-800 text-center px-3">Notifikasi Saya</h1>
         <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample"> 
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    
   
   
</div>
  
    <div class="card p-3">
         <table id="table" class="table table-striped table-bordered  p-3 text-center" style="width:100%">
            <thead>
                <tr>
                <th>#</th>
                <th>Gambar Barang</th>
                <th>Nama Barang</th>
                <th>Nama Pemberi</th>
                <th>Emel</th>
                <th>No.tel</th>
                <th>Nota Penting</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $counter = 0;
            ?>
           
            <?php
               while($row=mysqli_fetch_assoc($result))
            {
              
              $counter +=1;
              $notiID = $row['notiID'];
              $name = $row['giver'];
              $email = $row['giver_email'];
              $phoneNumber = $row['phoneNumber'];
              $notes = $row['notes'];
              $itemName = $row['itemName'];
              $itemID = $row['itemID'];
              $image = $row['image'];
              $to_ID = $row['to_ID'];
              $from_ID = $row['from_ID'];

                ?>
                <tr>
                <td><?php echo $counter?></td>
                                <td><img  src="img/<?php echo $row['image']; ?>" alt="Image" width="200px" height="200px"></td>
                               
                                <td><?php echo $itemName?></td>
                                <td><a href="user-account-profile.php?GetID=<?php echo $from_ID?>" ><?php echo $name?></td>
                                <td><?php echo $email?></td>
                                <td><?php echo $phoneNumber?></td>
                                <td><?php echo $notes?></td>
                                <td><a href="delNotification.php?DelID=<?php echo $notiID?>"class="fas fa-trash"></a></td>
                </tr>
                <?php
            } 
            ?>
        </table>
          
    </div>
<br><br>
<div class="card p-3">
         <table id="stable" class="table table-striped table-bordered p-3 text-center" style="width:100%">
            <thead>
                <tr>
                <th>#</th>
                <th>Gambar Barang</th>
                <th>Nama Barang</th> <!--- Ni ambik dari useraccounts --->
                <th>Nama Penerima</th>
                <th>Emel</th>
                <th>No.tel</th>
                <th>Nota Penting</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $counter = 0;
            ?>
           
            <?php
               while($rows=mysqli_fetch_assoc($results))
            {
              
              $counter +=1;
              $notiID = $rows['notiID'];
              $name = $rows['giver'];
              $email = $rows['giver_email'];
              $phoneNumber = $rows['phoneNumber'];
              $notes = $rows['notes'];
              $itemName = $rows['s_itemName'];
              $itemID = $rows['s_itemID'];
              $image = $rows['image'];
              $from_ID = $rows['from_ID'];

                ?>
                <tr>
                <td><?php echo $counter?></td>
                                <td><img  src="img/<?php echo $rows['image']; ?>" alt="Image" width="200px" height="200px"></td>
                               
                                <td><?php echo $itemName?></td>
                                <td><a href="user-account-profile.php?GetID=<?php echo $from_ID?>" ><?php echo $name?></td>
                                <td><?php echo $email?></td>
                                <td><?php echo $phoneNumber?></td>
                                <td><?php echo $notes?></td>
                                <td><a href="delNotification-share.php?DelID=<?php echo $notiID?>"class="fas fa-trash"></a></td>
                </tr>
                <?php
            } 
            ?>
        </table>
          
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