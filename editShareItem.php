<!---- SAMPLE FORMS : PERMINTAAN / PERKONGSIAN ---->
<?php
require_once("server.php");

$itemID = $_GET['GetID'];
$query = " SELECT * FROM shareitem INNER JOIN useraccounts ON shareitem.userID=useraccounts.userID WHERE s_itemID = '".$itemID."'";
$result = mysqli_query($db, $query);

while($row=mysqli_fetch_assoc($result))
{
    $itemID = $row['s_itemID'];
    $itemName = $row['s_itemName'];
    $itemDesc = $row['s_itemDesc'];
    $itemCat = $row['s_itemCat'];
    $image = $row['image'];
    $date = $row['s_date'];
    $name = $row['name'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jiran2Jiran: Friendly Neighbourhood Sharing</title>
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


</head>

<body>

<?php include ('main-header.php'); ?>

  <main id="main">
 <!-- ======= Breadcrumbs ======= -->
 <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="main.php">Halaman Utama</a></li>
          <li>Kemas Kini / Barang Perkongsian</li>
        </ol>
        <h6>Hai, <?php echo $name?> !
        <a class="fa fa-bell" href="getNotification.php">
                                <?php
                                                $q000 =  "SELECT * FROM notifications INNER JOIN useraccounts ON notifications.to_ID = useraccounts.userID
                                                 WHERE  email='$_SESSION[email]' ;";
                                                $query_run100 = mysqli_query($db, $q000);

                                                $row100 = mysqli_num_rows($query_run100);
                                                if($row100 > 0){
                                                    echo '<small class="badge bg-danger text-light rounded-circle" style="font-size:8px;"> '.$row100.'</small>';
                                                }
                          ?>
                          </a></h6>

      </div>
    </section><!-- End Breadcrumbs -->

                     
    <section class="inner-page">
  
    <div class="container">
  <div class="row">
    <div class="panel panel-primary">

    <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard Pengguna</h1>

<div class="row">

    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kemas Kini Barang Perkongsian Anda</h6>
            </div>
            <div>
           
            <div class="card-body">
                                            <form action="updateShareItem.php?itemID=<?php echo $itemID?>" method="POST">

                                            <div>
                                                <label class="col-md-4 control-label" for="itemCat">Nama Barang: </label>  
                                            </div>
                                            <div>
                                                  <input type="text" class="form-control mb-2" placeholder="Item Name" name="itemName"
                                                value="<?php echo $itemName?>">
                                            </div>
                                            <div>
                                                <label class="col-md-4 control-label" for="itemCat">Deskripsi Barang: </label>
                                            </div>

                                          
                                              
                                                
                                                <input type="text" class="form-control mb-2" placeholder="Item Description" name="itemDesc"
                                                value="<?php echo $itemDesc?>">
                                                <label class="col-md-4 control-label" for="itemCat">Kategori Barang: </label>
                                                <div class="col-md-4">
                                                    <select id="itemCat" name="itemCat" class="form-control">
                                                    <option value="<?php echo $itemCat?>">--- Pilih Kategori---</option>
                                                    <option value="Makanan">Makanan</option>
                                                    <option value="Bukan Makanan">Bukan Makanan</option>
                                                    </select>
                                                </div>
                                                </div>
                                                <br>
                                                <div>
                                                     <button class="btn btn-primary" name="update">Kemas Kini</button>
                                                <a href="myListing.php">Kembali</a>
                                                </div>
                                                <br><br>
                                               
                                            </form>
                                            </div>
           
        </div>

        <!-- Brand Buttons -->
        

    </div>

    <div class="col-lg-6">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Maklumat Barang</h6>
            </div>
             <div class="card" height="150px" width="150px">
                  <img class="card-img-top" src="img/<?php echo $image;?>" width="40px" height="260px" class="img-responsive">
             </div>   
           
            <div class="card-body">
                <h5 class="card-title" style="text-align: center";><hr><?php echo $itemName?></hr></h5>
                <p class="card-text"><hr><strong>Deskripsi: </strong><?php echo $itemDesc?></p>
                <p class="card-text"><strong>Kategori: </strong><?php echo $itemCat?></p>
                <p class="card-text"><strong>Diminta Oleh: </strong><?php echo $name?></p>
                <p class="card-text"><strong>Diminta Pada: </strong><?php echo $date?></p>
        
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

           <script>
        $(document).ready(function() {
            $("#table").DataTable();
        });
        </script>

</body>

</html>