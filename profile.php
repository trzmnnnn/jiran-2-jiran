
<?php require 'server.php' ?>

<?php



                            $qu = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
                            ?>
                            <?php $rowu = mysqli_fetch_assoc($qu);
                              $userID = $rowu['userID']; 
                              $name = $rowu['name'];
                              
                      
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
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
  <script src="https://kit.fontawesome.com/8c212c06b6.js" crossorigin="anonymous"></script>
</head>


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<?php include ('main-header.php'); ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="main.php">Halaman Utama</a></li>
          <li>Profil Saya</li>
        </ol>
        <h6>Hai, <?php echo $name?> !
        <a class="fa fa-bell" href="getNotification.php">
                                <?php
                                                 $q000 =   "SELECT * FROM notifications INNER JOIN useraccounts ON notifications.to_ID = useraccounts.userID
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

    <div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header mt-5">
					<div class="row">
						<div class="col">
            <h1 class="h3 mb-4 text-gray-800 text-center ">Profil Saya</h1><br>
						</div>
					</div>
				</div>
			
                <div class="tab-content profile-tab-cont">
							<div class="tab-pane fade show active" id="per_details_tab">
								<div class="row">
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title d-flex justify-content-between">
													
													
													</h5>
												<div class="row mt-5">
                         
												<img src="profile-picture.png">
                       
												 <!-- File Button --> 
                         
                      
									 </div>
                  
                      </div>
									</div>
								</div>
                <div class="col-lg-9">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title d-flex justify-content-between" style="text-center">
													<h5 style="font-weight: bold; text-align:center;">MAKLUMAT AKAUN SAYA</h5></h5>
                          <div class="row mt-5">    
                          <div class="row">
                          
												 <!-- Content Row -->
                         <div class="row px-lg-1  px-sm-2 px-3 mt-1 mb-0">
                      <!-- Popular user & total item -->
                      <div class="col-xl-6 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-35">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-primary  mb-1">
                                          Jumlah Permintaan Barang:</div>
                                          <div class="h6 mb-0 font-weight-bold text-gray-800">
                                          <?php
                          
                                          $qs = "SELECT * FROM requestitem INNER JOIN useraccounts 
                                          ON requestitem.userID = useraccounts.userID WHERE email='$_SESSION[email]';";
                                          $query_runs = mysqli_query($db, $qs);

                                          $rows = mysqli_num_rows($query_runs);

                                          echo '<h3 style="text-align:center"> '.$rows.'</h3>';
                                        
                                          ?>
                                          </div>
                                      </div>
                                  
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Popular User & Total Requested Item -->
                      <div class="col-xl-6 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-35">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success  mb-1">
                                          Jumlah Perkongsian Barang:</div>
                                          <div class="h6 mb-0 font-weight-bold text-gray-800">
                                          <?php
                                            $q = "SELECT * FROM shareitem INNER JOIN useraccounts 
                                            ON shareitem.userID = useraccounts.userID WHERE email='$_SESSION[email]';";
                                            $query_run = mysqli_query($db, $q);

                                            $row = mysqli_num_rows($query_run);

                                            echo '<h3 style="text-align:center"> '.$row.'</h3>';
                                                        
                                          ?>
                                          </div>
                                      </div>
                              
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
													</h5>
												<div class="row mt-5"> <hr>
                            
                          <p class="col-sm-3 text-sm-right mb-0 mb-sm-3"><strong>Nama:</strong></p>
													<p class="col-sm-9"><?php echo $rowu['name']?></p>
												</div>
											
												<div class="row">
													<p class="col-sm-3 text-sm-right mb-0 mb-sm-3"><strong>Emel:</strong></p>
													<p class="col-sm-9" ><?php echo $rowu['email']?></p>
												</div>
                                                <div class="row">
                                                     <p  class="col-sm-3 text-sm-right mb-0 mb-sm-3">
                                                         <strong>Alamat Lokasi: </strong><br>  
                                                         <p class="col-sm-9">

                                                         <iframe  src='https://www.google.com/maps?q=<?php echo $rowu["latitude"];?>, <?php
                                                                    echo $rowu["longitude"];?>&hl=es;z=14&output=embed' style="width: 300px;
                                                                    height: 250px"></iframe></br></p>
                                                </div>
                                                 
                                                   <div class="text-center float-right">
                                                                  <a href="edit-profile-user.php?GetID=<?php echo $userID?>" class="text-light">
                                                                      <button type="button" class="btn btn-md btn-primary btn-block px-5 border-0">Kemas Kini</buttton>
                                                                  </a>
                                                                </div> 
                            </div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/js/script.js"></script>

</body>

</html>