
<?php
require_once("server.php");
$userID = $_GET['GetID'];
$query = " SELECT * FROM useraccounts where userID = '".$userID."'";
$result = mysqli_query($db, $query);

while($row=mysqli_fetch_assoc($result))
{
    $userID = $row['userID'];
    $name = $row['name'];
    $email = $row['email'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
}

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
          <li>Halaman Utama</li>
        </ol>
        <h6>Hai, <?php echo $name?> !
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

  
			<div class="content container-fluid">
				<div class="page-header mt-5">
					<div class="row">
						<div class="col">
							<h3 class="page-title"><strong>Profil Saya</strong></h3>
						
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
												<img src="profile-picture.png" >
												</div>
											
												
                                                    
                                            </div>
										</div>
									</div>
		
									<div class="col-lg-9">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title d-flex justify-content-between">
													<span>Maklumat Akaun</span>
												
													</h5>	<br><hr>
                                                    <form action="updateF.php?ID=<?php echo $userID?>" method="POST">
                                          
                                                    <div class="input-group">
                                                        <label class="col-sm-3 text-sm-right mb-0 mb-sm-3">Nama:</label>
                                                        <input class="col-sm-3 text-sm-right mb-0 mb-sm-3" type="text" name="name" value="<?php echo $name?>">
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <label class="col-sm-3  mb-0 mb-sm-3">Emel</label>
                                                        <input class="col-sm-3  mb-0 mb-sm-3" type="text" name="email" value="<?php echo $email?>">
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-primary" name="update">Kemas Kini</button>
                                                    <a href="profile.php">Batal</a>
                                                    </div>
                                      </form>
                                                   
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