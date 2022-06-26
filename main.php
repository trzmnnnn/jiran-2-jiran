<?php require 'server.php' ;
  $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
    $row_1 = mysqli_fetch_assoc($q);
    $userID_me = $row_1['userID']; 
    $myname = $row_1['name'];
 
    $q01 = mysqli_query($db, "SELECT useraccounts.name, requestitem.userID, count(requestitem.userID) as cnt FROM requestitem INNER JOIN useraccounts ON requestitem.userID=useraccounts.userID
    GROUP BY userID ORDER BY cnt DESC ;");                           
    $row = mysqli_fetch_assoc($q01);
    $userID = $row['userID']; 
    $name = $row['name']; 
    $results01 = array();
    
    $q02 = mysqli_query($db, "SELECT useraccounts.name, shareitem.userID, count(shareitem.userID) as cnt2 FROM shareitem 
    INNER JOIN useraccounts ON shareitem.userID=useraccounts.userID
    GROUP BY userID ORDER BY cnt2 DESC ;");
    $rows = mysqli_fetch_assoc($q02);
    $userID = $rows['userID']; 
    $name = $rows['name']; 
    $results02 = array();
  
    $q03 = mysqli_query($db, "SELECT itemCat, itemID, count(itemID) as cnt3 FROM requestitem GROUP BY itemCat ORDER BY cnt3 DESC;");
    $rowssz = mysqli_fetch_assoc($q03);
    $itemCat = $rowssz['itemCat']; 
    $itemID = $rowssz['itemID']; 
    $results03 = array();

    $q04 = mysqli_query($db, "SELECT s_itemCat, s_itemID, count(s_itemID) as cnt4 FROM shareitem GROUP BY s_itemCat ORDER BY cnt4 DESC;");
    $rowsss = mysqli_fetch_assoc($q04);
    $s_itemCat = $rowsss['s_itemCat']; 
    $s_itemID = $rowsss['s_itemID']; 
    $results04 = array();
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
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
  <link href="disclaimer-main.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/8c212c06b6.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


<body>
<?php include ('main-header.php'); ?>
<main id="main">   
<?php include ('top.php'); ?> 
<!-- Content Row -->
<div class="row px-lg-5 px-md-3 px-sm-3 px-3 mt-3 mb-0">
<!-- Popular user & total item -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Pengguna popular & Jumlah Perkongsian Mereka</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                    <?php
     
                    $results02[] = "<br>Pengguna: <strong>{$rows['name']}</strong>
                    <br><hr> Jumlah Barang: {$rows['cnt2']}";
                    // repeat for however many results you want
                  
                  echo "", implode(" &amp; ", $results02);
                  
                    ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-award fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popular User & Total Requested Item -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Pengguna popular & Jumlah Permintaan Mereka</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                    <?php
     
                    $results01[] = "<br>Pengguna:<strong> {$row['name']} </strong>
                    <br><hr> Jumlah Barang: {$row['cnt']}";
                    // repeat for however many results you want
                  
                  echo "", implode(" &amp; ", $results01);
                  
                    ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fire fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jenis Barang Perkongsian Yang Popular
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php
     
                            $results04[] = "<br>Jenis Barang: <strong> {$rowsss['s_itemCat']} </strong>
                            <br><hr> Jumlah Barang: {$rowsss['cnt4']}";
                            // repeat for however many results you want
                          
                          echo "", implode(" &amp; ", $results04);
                          
                            ?>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Jenis Barang Permintaan Yang Popular</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                    <?php
     
                    $results03[] = "<br>Jenis Barang: <strong> {$rowssz['itemCat']} </strong>
                    <br><hr> Jumlah Barang: {$rowssz['cnt3']}";
                    // repeat for however many results you want
                  
                  echo "", implode(" &amp; ", $results03);
                  
                    ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-highlighter fa-2x text-blue-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<hr>
    <section class="px-4 py-0 my-0">
    <div class="p-3">
       <h3 class="m-0 font-weight-bold text-center">Senarai Permintaan Barang</h3>
    </div>
   
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
                                              </form><br>
                                          </div>
                                        <?php
                                            }
                                        }?>
                                        
                                  </div>

                                </div>
                                <hr>
                                <div class="p-3">
                                <h3 class="m-0 font-weight-bold text-center">Senarai Perkongsian Barang</h3>
                              </div>
                                <div class="row mt-4">
                              <?php 
                               $query_s ="SELECT * FROM shareitem INNER JOIN useraccounts ON shareitem.userID=useraccounts.userID";
                              $result_s =  mysqli_query($db, $query_s);
                              if(mysqli_num_rows($result_s) > 0){
                                  
                                  while ($row_s = mysqli_fetch_array($result_s)){
                                    $s_itemID = $row_s['s_itemID'];
                                      ?>
                                          <div class ="col-lg-3 col-md-4 col-sm-6 col-6">
                                              <form method="post" action="contactForm-share.php?s_itemID=<?php echo $row_s["itemID"]?>">
                                              
                                                          <div class="card">
                                                              <div class="card-body">
                                                                <img class="p-0 m-0 mx-auto w-100" src="img/<?php echo $row_s['image']; ?>" style="height:250px">
                                                            
                                                                  <h5 class="card-title" style="text-align: center";><hr><strong><?php echo $row_s["s_itemName"];?></strong></hr></h5>
                                                                  <p class="card-text" style="text-align: center";><hr><strong>Deskripsi: </strong><br><?php echo $row_s["s_itemDesc"];?></br></hr></p>
                                                                  <p class="card-text"><strong>Kategori: </strong><br><?php echo $row_s["s_itemCat"];?></br></p>
                                                                  <p class="card-text"><strong>Diminta Oleh: </strong><br><?php echo $row_s["name"];?></br></p>
                                                                  <p class="card-text"><strong>Diminta Pada: </strong><br> <?php echo $row_s["s_date"];?></br></p>
                                                                 
                                                                  <div class="text-center">
                                                                  <a href="contactForm-share.php?GetID=<?php echo $s_itemID?>" class="text-light">
                                                                      <button type="button" class="btn btn-sm btn-primary btn-block px-5 border-0" style="background-color:#012970;">MAHU BARANG INI</buttton>
                                                                  </a>
                                                                </div> 

                                                              </div>
                                                        
                                                  </div>
                                              </form><br>
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