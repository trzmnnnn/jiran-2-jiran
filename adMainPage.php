<!---- TAK PAKAI: GANTI DENGAN ADMINPANEL.PHP---->
<?php

require_once ("server.php");
$query = "SELECT * FROM useraccounts INNER JOIN requestitem ON useraccounts.userID=requestitem.userID";
$result = mysqli_query($db, $query);



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
   <!-- <link href="assets/img/favicon.png" rel="icon"> --->
  <!--   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="searchStyle.css">
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="mainPage.php" class="logo d-flex align-items-center">
        <img src="assets/img" alt="">
        <span>Jiran2Jiran</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>Manage</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="viewUser.php">Manage Users</a></li>  
              <li><a href="viewItem.php">Manage Items</a></li>
             
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Akaun Saya</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Profil Saya</a></li>  
              <li><a href="logout.php">Log Keluar</a></li>
             
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



<div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">ADMIN DASHBOARD</h4>
        <p>Generate Report</p>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-user-following primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                <?php
                $q = "SELECT userID FROM useraccounts ORDER BY userID";
              $query_run = mysqli_query($db, $q);

              $row = mysqli_num_rows($query_run);

              echo '<h3> '.$row.'</h3>';
              ?>
                  <span>Jumlah Pengguna Berdaftar</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-users warning font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <?php
                $q1 = "SELECT adminID FROM adminaccount ORDER BY adminID";
              $query_run1 = mysqli_query($db, $q1);

              $row1 = mysqli_num_rows($query_run1);

              echo '<h3> '.$row1.'</h3>';
              ?>
                  <span>Jumlah Admin</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-magnifier success font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                <?php
                $q2 = "SELECT itemID FROM requestitem ORDER BY itemID";
              $query_run2 = mysqli_query($db, $q2);

              $row2 = mysqli_num_rows($query_run2);

              echo '<h3> '.$row2.'</h3>';
              ?>
                  <span>Jumlah Permintaan Barang</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-paper-plane danger font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>0</h3>
                  <span>Jumlah Perkongsian Barang</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  </section>
  <section>
<h2 style="text-align: center; ">Dashboard: Pengguna & Senarai Barang</h2>
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <td>User ID</td>
                            <td>Item ID</td>
                            <td>Nama Barang</td>
                            <td>Deskripsi</td>
                            <td>Kategori</td>
                            <td>Gambar Barang</td>
                        </tr>

                        <?php

                        while($row=mysqli_fetch_assoc($result))
                        {
                            $userID = $row['userID'];
                            $itemID = $row['itemID'];
                            $itemName = $row['itemName'];
                            $deskripsi = $row['itemDesc'];
                            $kategori = $row['itemCat'];
                            $image = $row['image'];
                            ?>
                            <tr>
                                <td><?php echo $userID?></td>
                                <td><?php echo $itemID?></td>
                                <td><?php echo $itemName?></td>
                                <td><?php echo $deskripsi?></td>
                                <td><?php echo $kategori?></td>
                                <td>
                                <img  src="img/<?php echo $row['image']; ?>" alt="Image" width="200px" height="200px">
                                </td>
                                <td><a href="editUser.php?GetID=<?php echo $userID?>">Edit</a></td>
                                <td><a href="deleteUser.php?Del=<?php echo $userID?>">Delete</a></td>
                            </tr>
                            <?php
                        }

                        ?>
                    </table>

                </div>
            </div>
        </div>

    </div>
</section>
</div>