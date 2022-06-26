<?php

require_once ("server.php");


$q = "SELECT * FROM shareitem INNER JOIN useraccounts ON shareitem.userID = useraccounts.userID WHERE  email='$_SESSION[email]' ;";
$r = mysqli_query($db, $q);

$q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
 $row = mysqli_fetch_assoc($q);
  $userID = $row['userID']; 
  $names = $row['name'];



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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="main.php" class="logo d-flex align-items-center">
        <img src="Jiran2Jiran.png" alt="">
        <span>Jiran2Jiran</span>
      </a>           

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="main.php">Halaman Utama</a></li>
          <li class="dropdown"><a href="#"><span>Jenis Penyenaraian</span> <i class="bi bi-chevron-down"></i></a>
            <ul>  
              <li><a href="myListing.php">Penyenaraian Saya</a></li>
              <li><a href="myHelp.php">Kemas Kini Status Barang</a></li>
              <li class="dropdown"><a href="#"><span>Tambah Penyenaraian</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="shareForm.php">Perkongsian Barang</a></li>
                  <li><a href="requestForm.php">Permintaan Barang</a></li>
                
                </ul>
              </li>
             
             
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Akaun</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="profile.php">Kemas Kini Profil</a></li>
                  <li><a href="logout.php">Log Keluar</a></li>
                </ul>
              </li>
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="main.php">Halaman Utama</a></li>
          <li>Penyenaraian Saya</li>
        </ol>
        <h6>Hai, <?php echo $names?> !
        <a class="fa fa-bell" href="getNotification.php"></a></h6>
      </div>
      </h6>

      </div>
    </section><!-- End Breadcrumbs -->
<br>

    <section class="inner-page">
 
         <!-- Begin Page Content -->
         <div class="container-fluid">

         
      

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Pengguna: Penyenaraian Saya</h1>
   
</div>
<form action="date.php" method="POST">
          <button type="submit" name="refresh" class="btn btn-success">Refresh</button>
         </form>
         <br>
<!-- Content Row -->




        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">

                
                <h6 class="m-0 font-weight-bold text-primary">Penyenaraian Saya: Permintaan Barang</h6>
                <hr>
          
            <!-- Card Content - Collapse -->
            <div class="card">
              <?php

              $query3 = "SELECT * FROM requestitem WHERE userID ='$userID';";
              $result = mysqli_query($db, $query3);
              ?>
         <table id="table" class="table table-striped table-bordered" style="width:100%">
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

                      $mysql5 = " SELECT * FROM `notifications` WHERE itemID = '$itemID';";

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



          
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">

                
                <h6 class="m-0 font-weight-bold text-primary">Penyenaraian Saya: Perkongsian Barang</h6>
                <hr>
                <div class="card">
         <table id="stable" class="table table-striped table-bordered" style="width:100%">
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
                $itemID = $roww['s_itemID'];
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
                    $mysql_2 = "SELECT s_notifications.to_ID, s_notifications.giver, s_notifications.noti_date, s_notifications.from_ID, useraccounts.name, useraccounts.userID, 
                    shareitem.image, shareitem.s_itemID, shareitem.s_itemName,shareitem.s_itemDesc
                    FROM s_notifications INNER JOIN shareitem ON s_notifications.itemID=shareitem.s_itemID 
                    INNER JOIN useraccounts ON s_notifications.to_ID = useraccounts.userID WHERE 
                    email='$_SESSION[email]' ORDER BY s_notifications.noti_date ASC LIMIT 1 ;";
                    $result_2 =  mysqli_query($db, $mysql_2);
                    if(mysqli_num_rows($result_2) > 0){
                      
                      while ($row_2 = mysqli_fetch_array($result_2)){
                    $s_itemID = $row_2['s_itemID'];
                    $s_itemName = $row_2['s_itemName'];
                    $s_itemImage = $row_2['image'];
                    $s_itemDesc = $row_2['s_itemDesc'];
                    $s_date = $row_2['noti_date'];
                    $s_receipient = $row_2['name'];
                    $s_to_ID = $row_2['to_ID'];
                    $s_from_ID = $row_2['from_ID'];
                    $s_giver_name = $row_2['giver'];
                          ?>
                     <a href="user-account-profile.php?GetID=<?php echo $from_ID?>" ><?php echo $s_giver_name?></a></p>
                    </td>
                </tr>
                <?php
                      }
            } 
          }
            ?>
        </table>
          
    </div>
    

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

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