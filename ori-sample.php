<!---- SAMPLE FORMS : PERMINTAAN / PERKONGSIAN ---->


<?php require 'server.php' ;
  $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            

   $row = mysqli_fetch_assoc($q);
    $userID = $row['userID']; 
    $name = $row['name'];



$errors = array();

if(isset($_POST["submit"])){
    $itemName = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $kategori = $_POST["kategori"];
    $userID = $_POST["userID"];
    $masa = $_POST["masa"];
    
    
    
    


    if($_FILES["image"]["name"] === 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    }
    if(empty($itemName != "Pistol" && $itemName != "Dadah"  && $itemName != "Merkuri" && $itemName !="Shabu" 
    && $itemName !="Heroin" && $itemName !="Senapang")){
      array_push($errors, "AMARAN: Anda tidak boleh meminta barang terlarang!"); // add error to errors array
  }
    else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension =strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo
            "<script> alert('Invalid Image Extension'); </script>";
        }
        else if($fileSize > 1000000){
            echo
            "<script> alert('Image Size Is Too Large!); </script>";
        }
        else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'img/'. $newImageName);
            $query = "INSERT INTO shareitem VALUES ('', '$itemName', '$deskripsi', '$kategori','$masa','$newImageName','$userID', 0)";
            mysqli_query($db, $query);
            echo
            "<script>
            alert('Successfully Added!');
            document.location.href = 'main.php';
            </script>";
        }
    }
}

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
          <li>Tambah Penyenaraian</li>
        </ol>
        <h6>Hai, <?php echo $name?> ! </h6>

      </div>
    </section><!-- End Breadcrumbs -->

                     
    <section class="inner-page">
  
    <div class="container">
  <div class="row">
    <div class="panel panel-primary">

      <?php
     
     $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
    
    ?>
    <?php $row = mysqli_fetch_assoc($q);
      $userID = $row['userID']; ?>

            <form action="requestForm.php" method="post" autocomplete="off" enctype="multipart/form-data">

 <?php include('errors.php'); ?>
           
 <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
    <div class="row justify-content-between text-left">
            <div class="form-group"><br>
            <label  for="nama">Nama Barang: </label>  
            <div>
            <input id="nama" name="nama" placeholder="Nama barang" class="form-control input-md" required="" type="text">  
          </div>
        </div>
            <!-- Textarea -->
            <div class="form-group"><br>
            <label  for="deskripsi">Deskripsi Barang: </label>
            <div >                     
                <textarea class="form-control" id="deskripsi" name="deskripsi" 
                placeholder="Masukkan deskripsi barang anda (Contoh: Sepasang kasut bersaiz 40cm)"></textarea>
            </div>
            </div>
          <!-- Select Basic -->
                      <div class="form-group"><br>
                      <label for="kategori">Kategori Barang: </label>
                      <div >
                          <select id="kategori" name="kategori" class="form-control">
                          <option value="pilih">--- Pilih Kategori---</option>
                          <option value="Makanan">Makanan</option>
                          <option value="Bukan Makanan">Bukan Makanan</option>
                          </select>
                      </div>
                      </div>

            <!-- Textarea -->
            <div class="form-group"> <br> 
            <label  for="deskripsi">Masa Pengambilan: </label>
            <div>    
                             
                <input class="form-control" type="datetime-local" id="masa" name="masa" 
                placeholder=""></input>
            </div>
            </div>

      
           

            <!-- File Button --> 
            <div class="form-group">   <br>
            <label  for="image">Gambar Barang: </label>
              <p><i>(Hanya format'.jpg', '.png', '.jpeg' diterima)</i></p>
            <div >
           
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
            </div>
            </div>

            <div class="input-group">
            <input type="hidden" name="userID" id="userID" value="<?php echo $row['userID']?>">
            </div>

            <br>
            <!-- Button -->
            <div class="form-group">
            <label  for="singlebutton"></label>
            <div >
                <button type="submit" name="submit" class="btn btn-primary">Hantar</button>
                <br><br><br>
            </div>
            </div>
      </div>

</fieldset>
</form>

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

</body>

</html>