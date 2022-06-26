<!---- SAMPLE FORMS : PERMINTAAN / PERKONGSIAN ---->


<?php

require_once ("server.php");


$q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
?>
<?php $row = mysqli_fetch_assoc($q);
  $userID = $row['userID']; 
  $myname = $row['name'];
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
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/feathericon.min.css">

<link rel="stylesheet" href="assets/plugins/morris/morris.css">

<link rel="stylesheet" href="assets/css/style.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
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
                  <li><a href="editProfile.php">Kemas Kini Profil</a></li>
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
          <li>Cari best user</li>
        </ol>
        <h6>Hai, <?php echo $myname?> !
        <a class="fa fa-bell" href="getNotification.php"></a></h6>
      </div>
    </section><!-- End Breadcrumbs -->

                     
    <section class="inner-page">
  
    <div class="container">
  <div class="row">
    <div class="panel panel-primary">

    <?php 



$mysql_2 = "SELECT s_notifications.to_ID, s_notifications.noti_date, s_notifications.from_ID, useraccounts.name, useraccounts.userID, 
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
      ?>
          <div class ="col-md-3">

              <div class="container">
                      <div class="col-md-4">
                          <div class="card" style="width: 20rem; border-radius:30px;" >
                             
                              <div class="card-body">
                              <img class="card-img-top" src="img/<?php echo $s_itemImage;?>" width="40px" height="260px" class="img-responsive">
                                  <h5 class="card-title" style="text-align: center";><hr><strong>Barang yang akan dibantu: </strong></hr></h5>
                                  <p style="text-align: center";><?php echo $s_itemName?></p>
                                  <p style="text-align: center";>
                                  <br>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <?php
                        echo $s_from_ID;
                        ?>
                                  <a href="user-account-profile.php?GetID=<?php echo $s_from_ID?>" >Hubungi Sekarang -></a></p>
            
                                  <div class="text-center text-lg-start">
                                </a>
  </div>
                                
                                 
                              </div>
                          </div> <br>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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


</body>


</html>


