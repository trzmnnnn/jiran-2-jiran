<!---- SAMPLE FORMS : PERMINTAAN / PERKONGSIAN ---->

<?php require 'server.php' ;

if(isset($_POST["submitprofile"])){
    $itemName = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $kategori = $_POST["kategori"];
    $userID = $_POST["userID"];
    $expired_date = $_POST["expired_date"];

    if($_FILES["image"]["name"] === 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>";
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
            $query = "INSERT INTO profilepicture VALUES ('$userID','$newImageName')";
            mysqli_query($db, $query);
            echo
            "<script>
            alert('Successfully Added!');
            document.location.href = 'profile.php';
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
  <script src="https://kit.fontawesome.com/8c212c06b6.js" crossorigin="anonymous"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<?php include ('main-header.php'); ?>

  <main id="main">

 

    <style>
      .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }
    </style>
          

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="panel panel-primary">
        
             <img src="Woman thinking-pana.png" style="width: 300px; height: 350px;" class="center" alt="">
    <?php
     $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
    ?>
    <?php $row = mysqli_fetch_assoc($q);
      $userID = $row['userID']; ?>
        <form action="imagetest.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <?php include('errors.php'); ?>
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                 <div class="row justify-content-between text-left">
                      <div class="form-group">
                      
                    
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
                                      <button type="submit" name="submitprofile" class="btn btn-primary">Muat naik</button>
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
          </div>
        </div>
    </div>
  </div>
    </section>

  </main><!-- End #main -->

 

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