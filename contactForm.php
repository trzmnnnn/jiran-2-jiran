<!---- SAMPLE FORMS : PERMINTAAN / PERKONGSIAN ---->
<!---- TEMPLATE UNTUK CONTACT FORM ----->

<?php

require_once ("server.php");



$itemID = $_GET['GetID'];
$query = " SELECT * FROM requestitem INNER JOIN useraccounts ON requestitem.userID=useraccounts.userID WHERE itemID = '".$itemID."'";
$result = mysqli_query($db, $query);


while($row=mysqli_fetch_assoc($result))
{
    $itemID = $row['itemID'];
    $itemName = $row['itemName'];
    $itemDesc = $row['itemDesc'];
    $itemCat = $row['itemCat'];
    $userID = $row['userID'];
    $image = $row['image'];
    $date = $row['date'];
    $name = $row['name'];
    $latitude = $row["latitude"];
    $longitude = $row["longitude"];
    
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
  <link rel=" stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
  <script src="https://kit.fontawesome.com/8c212c06b6.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<?php include('main-header.php');?>

  <main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
      <div class="container">
        <?php
      $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                            
                            $row_1 = mysqli_fetch_assoc($q);
                            $userID_me = $row_1['userID']; 
                            $myname = $row_1['name']; ?>
        <ol>
          <li><a href="main.php">Halaman Utama</a></li>
          <li>Halaman Utama</li>
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
      </h6>

      </div>
    </section><!-- End Breadcrumbs -->


                     
    <section class="inner-page">
  
    <div class="container">
  <div class="row">
    <div class="panel panel-primary">

    <h1 class="h3 mb-4 text-gray-800 ">Borang Bantu</h1><br>

<div class="row">

    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Borang Ingin Membantu: Maklumat Diri Anda</h6>
            </div>
            <div>
           
            <div class="card-body">
            
              
                <p>Nota: Ini adalah borang maklumat tentang anda yang ingin membantu jiran anda bagi mendapatkan barang.
                </p>
            </a>
            <form action="sendContact.php?updateC=<?php echo $itemID?>" method="POST">
        <div class="modal-body">
        
        
                <div class="form-group">
                <label>Nama:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
            </div>
            <div class="form-group">
                <label>Emel:</label>
                <input type="email" class="form-control" id="email" name="email" onkeyup="return validation()" placeholder="Masukkan emel:contoh@gmail.com">
                <small id="email_valid" style="font-style: italic">Email is valid</small>
              </div>
            <div class="form-group">
                <label>No. Telefon:</label>
                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Masukkan no. tel" >
            </div>
            <div class="form-group">
                <label>Nota Tambahan:</label>
                <input type="text" class="form-control" id="notes" name="notes" placeholder="Masukkan nota tambahan: lokasi/ maklumat diri anda/ maklumat barang">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="from_ID" name="from_ID" value="<?php echo $userID_me?>">
            </div>
            
            <div>
            <input type="hidden" class="form-control mb-2" placeholder="userID" name="to_ID"
            value="<?php echo $userID?>">
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" id="itemID" name="itemID" value="<?php echo $itemID?>">
            </div>
        
    </div>

    <button class="btn btn-primary" name="updateC">Hantar</button>
    <a href="main.php">Batal</a>
    <br><br>
</form>



            </div>

            </div>
           
        </div>

        <!-- Brand Buttons -->
        

    </div>

    <div class="col-lg-6">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Barang Pertolongan Daripada Anda</h6>
            </div>
            <div class="card">
            <div class="card-body">
            <img class="p-0 m-0 mx-auto w-70 rounded d-block" src="img/<?php echo $image; ?>" style="height:250px">
           
          
                <h5 class="card-title" style="text-align: center";><hr><?php echo $itemName?></hr></h5>
                <p class="card-text"><hr><strong>Deskripsi: </strong><?php echo $itemDesc?></p>
                <p class="card-text"><strong>Kategori: </strong><?php echo $itemCat?></p>
               
                <p class="card-text"><strong>Diminta Oleh: </strong>
                <a href="user-account-profile.php?GetID=<?php echo $userID?>" ><?php echo $name?></p></a>
                <p class="card-text"><strong>Diminta Pada: </strong><?php echo $date?></p>
                <p class="card-text"><strong>Lokasi: </strong><br>  <iframe src='https://www.google.com/maps?q=<?php echo $latitude;?>, <?php
                                                                    echo $longitude;?>&hl=es;z=14&output=embed' style="width: 200px;
                                                                    height: 150px"></iframe></br></p>
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

<script>
function validation()
{
	var email=document.getElementById("email").value;
	var email_valid = document.getElementById('email_valid');
	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
	
if(email.match(pattern))
{
		email_valid.style.color = 'green';
	}
	else
	{
		email_valid.style.color='red';
	}
}
</script>
</body>

</html>