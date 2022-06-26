<?php require 'server.php' 

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jiran2Jiran</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  


</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="mainPage.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-smile"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PANEL PENGGUNA <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="mainPage.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Layari</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        AKTIVITI
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>JENIS PENYENARAIAN</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tambah Penyenaraian </h6>
                <a class="collapse-item" href="shareForm.php">Perkongsian Barang</a>
                <a class="collapse-item" href="requestForm.php">Permintaan Barang</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>AKAUN SAYA</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Akaun</h6>
                <a class="collapse-item" href="editProfile.php">Kemas Kini Akaun</a>
                <a class="collapse-item" href="myListing.php">Penyenaraian Saya</a>
                <a class="collapse-item" href="myHelp.php">Kemas Kini Status Barang</a>
            </span></a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lain-Lain
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
  

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Log Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

   

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="search.php" method="post"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                        <div id="gradient"></div>
                      <form  action="search.php" method="post">
                          <input class="searchbar" type="searchbar" name="searchbar" placeholder="Carian" />
                          <input type="submit" value="search"/>
                      </form>
                         
                            <div class="input-group-append">
                               
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                      
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                        <a href="getNotification.php"><i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                 <a href="getNotification.php" ></a>
                                <?php
                                                $q1 =  "SELECT * FROM notifications INNER JOIN useraccounts ON notifications.to_ID = useraccounts.userID
                                                 WHERE  email='$_SESSION[email]' ;";
                                                $query_run1 = mysqli_query($db, $q1);

                                                $row1 = mysqli_num_rows($query_run1);
                                                if($row1 > 0){
                                                    echo '<h5> '.$row1.'</h5>';
                                                }
                                                ?>
                                
                                </span>
                            </a>
                           
                        </li>
                           
              
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                $q = mysqli_query($db, "SELECT * FROM useraccounts WHERE email='$_SESSION[email]' ;");
                                
                                ?>
                                <?php $row = mysqli_fetch_assoc($q);
                                $adminID = $row['userID']; ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="editProfile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Saya
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Pengguna</h1>
                       
                    </div>

                    <!-- Content Row -->
              


                            <!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                
                            <!-- Modal : SO FORM NI ADALAH FROM_ID -->
                        <div class="modal fade" id="studentaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Borang Maklumat Anda</h5> <br />
                                <p>Nota Penting: Anda perlu mengisikan maklumat anda bagi memudahkan jiran anda mengambil barang.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </div>
                            <form action="insertcode.php" method="POST">
                            <div class="modal-body">
                            
                            
                                    <div class="form-group">
                                    <label>Nama:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label>Emel:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>No. Telefon:</label>
                                    <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
                                </div>
                                <div class="form-group">
                                    <label>Nota Tambahan:</label>
                                    <input type="text" class="form-control" id="notes" name="notes" placeholder="Include any notes...">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="userID" name="userID" value="<?php echo $row['userID']?>">
                                </div>

  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Hantar</button>
            </div>
             </form>
            </div>
        </div>
        </div>
                          <div class="container py-5">
                            <div class="row mt-4">
                              <?php 
                               $query ="SELECT * FROM requestitem INNER JOIN useraccounts ON requestitem.userID=useraccounts.userID";
                              $result =  mysqli_query($db, $query);
                              if(mysqli_num_rows($result) > 0){
                                  
                                  while ($row = mysqli_fetch_array($result)){
                                $itemID = $row['itemID'];
                                      ?>
                                          <div class ="col-md-3">
                                  

                                              <form method="post" action="contactForm.php?itemID=<?php echo $row["itemID"]?>">

                                              <div class="container">
                                                      <div class="col-md-4">
                                                          <div class="card" style="width: 18rem;" >
                                                              <img class="card-img-top" src="img/<?php echo $row['image']; ?>" width="200px" height="300px" class="img-responsive">
                                                              <div class="card-body">
                                                                  <h5 class="card-title" style="text-align: center";><hr><?php echo $row["itemName"];?></hr></h5>
                                                                  <p class="card-text" style="text-align: center";><hr><strong>Deskripsi: </strong><br><?php echo $row["itemDesc"];?></br></hr></p>
                                                                  <p class="card-text"><strong>Kategori: </strong><br><?php echo $row["itemCat"];?></br></p>
                                                                  <p class="card-text"><strong>Diminta Oleh: </strong><br><?php echo $row["name"];?></br></p>
                                                                  <p class="card-text"><strong>Diminta Pada: </strong><br> <?php echo $row["date"];?></br></p>
                                                                  <p class="card-text"><strong>Lokasi: </strong><br>  <iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"];?>, <?php
                                                                    echo $row["longitude"];?>&hl=es;z=14&output=embed' style="width: 100%;
                                                                    height: 100%"></iframe></br></p>
                                                                  <td><button><a href="contactForm.php?GetID=<?php echo $itemID?>"class="fas fa-hand-pointer "></a></button></td>
                                                              </div>
                                                          </div>
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

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 
  

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>

<!--- CONNECTION FILES: SERVER.PHP, INSERTCODE.PHP ----->