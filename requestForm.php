<!---- SAMPLE FORMS : PERMINTAAN / PERKONGSIAN ---->

<?php require 'server.php' ;
  $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
   $row = mysqli_fetch_assoc($q);
    $userID = $row['userID']; 
    $myname = $row['name'];
    $errors = array();

if(isset($_POST["submit"])){
    $itemName = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $kategori = $_POST["kategori"];
    $userID = $_POST["userID"];
    $expired_date = $_POST["expired_date"];

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
            $query = "INSERT INTO requestitem VALUES ('', '$itemName', '$deskripsi', '$kategori','$newImageName',CURRENT_TIMESTAMP,'$expired_date','$userID', 0)";
            mysqli_query($db, $query);
            echo
            "<script>
            alert('Successfully Added!');
            document.location.href = 'main.php';
            </script>";
        }
    }
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

   <!-- ======= Breadcrumbs ======= -->
   <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="main.php">Halaman Utama</a></li>
          <li>Borang Permintaan Barang</li>
        </ol>
        <h6>Hai, <?php echo $myname?> !
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
        <form action="requestForm.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <?php include('errors.php'); ?>
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                 <div class="row justify-content-between text-left">
                      <div class="form-group">
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
                  <!-- Select Item Type -->
                              <div class="form-group"><br>
                              <label for="kategori">Kategori Barang: </label>
                              <div >
                                  <select id="kategori" name="kategori" class="form-control">
                                  <option value="pilih">--- Pilih Kategori---</option>
                                  <option id="food" value="Makanan">Makanan</option>
                                  <option id="nonfood" value="Bukan Makanan">Bukan Makanan (Pakaian/Perabot/Alatan/Lain-lain)</option>
                                  </select>
                              </div>
                              </div>
                              <div class="form-group"> <br> 
                                      <label  for="date">Tempoh luput: <i>jika barang ini adalah makanan</i></label>
                                      <div>    
                                                      
                                          <input class="form-control" type="date" id="expired_date" name="expired_date" 
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
          </div>
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