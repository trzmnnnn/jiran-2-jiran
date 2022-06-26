<?php

require_once ("server.php");
$query = "SELECT * FROM useraccounts INNER JOIN requestitem ON useraccounts.userID=requestitem.userID";
$result = mysqli_query($db, $query);

$q = "SELECT * FROM adminaccounts";
$result1 = mysqli_query($db, $q);
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
<link href="sb-admin-2.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel=" stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  


</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminPanel.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-smile"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PANEL ADMIN <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="adminPanel.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        PENGURUSAN
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>PENGURUSAN</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Pengurusan</h6>
                <a class="collapse-item" href="viewItem.php">Pengurusan Barang</a>
                <a class="collapse-item" href="viewUser.php">Pengurusan Pengguna</a>
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
                <a class="collapse-item" href="editProfileAd.php">Kemas Kini Akaun</a>
                <a class="collapse-item" href="#">Lain-Lain</a>
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
                    <form action="searchItemAdmin.php" method="post"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                      
                           
                        </form>
                            <div class="input-group-append">
                               
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                  
                            
                        </li>

                        

                   

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                $q = mysqli_query($db, "SELECT * FROM adminaccounts WHERE email='$_SESSION[email]' ;");
                                
                                ?>
                                <?php $row = mysqli_fetch_assoc($q);
                                $adminID = $row['adminID']; ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
               

                    <!-- Content Row -->
                    <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Pengguna Berdaftar</div>
                                            <?php
                                            $q = "SELECT userID FROM useraccounts ORDER BY userID";
                                        $query_run = mysqli_query($db, $q);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h3> '.$row.'</h3>';
                                        ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Admin Berdaftar</div>
                                                <?php
                                                $q1 = "SELECT adminID FROM adminaccounts ORDER BY adminID";
                                                $query_run1 = mysqli_query($db, $q1);

                                                $row1 = mysqli_num_rows($query_run1);

                                                echo '<h3> '.$row1.'</h3>';
                                                ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Jumlah Permintaan Barang</div>
                                                <?php
                                                $q2 = "SELECT itemID FROM requestitem ORDER BY itemID";
                                                $query_run2 = mysqli_query($db, $q2);

                                                $row2 = mysqli_num_rows($query_run2);

                                                echo '<h3> '.$row2.'</h3>';
                                                ?>
                                                                            </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                                                Jumlah Perkongsian Barang</div>
                                                <?php
                                                $q3 = "SELECT s_itemID FROM shareitem ORDER BY s_itemID";
                                                $query_run3 = mysqli_query($db, $q3);

                                                $row3 = mysqli_num_rows($query_run3);

                                                echo '<h3> '.$row3.'</h3>';
                                                ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                          
                <!-- Begin Page Content -->
                <div class="container-fluid">

         
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Senarai Admin</h6>
                                </a>
                               
                                <div class="card">
         <table id="table" class="table table-striped table-bordered py-3" style="width:100%">
            <thead>
                <tr>
                <th>#</th>
                <th>Nama Admin</th>
                <th>Emel</th>
                <th>Kemas Kini</th>
                <th>Padam</th>
                
                </tr>
            </thead>
            <tbody>

            <?php
                        
            $counter = 0;
            ?>
           
            <?php
               while($r1=mysqli_fetch_assoc($result1))
            {
              
              $adminID = $r1['adminID'];
              $counter = $counter + 1;
         
              $name = $r1['name'];
              $email = $r1['email'];   
                ?>
                <tr>
                <td><?php echo $counter?></td>
               
                                                
                                                <td><?php echo $name?></td>
                                                <td><?php echo $email?></td>
                                                
                                                <td><a href="editAdmin.php?GetID=<?php echo $adminID?>"class="fas fa-edit "></a></td>
                                                <td><a href="delAdmin.php?Del=<?php echo $adminID?>"class="fas fa-trash"></a></td>
                </tr>
                <?php
            } 
            ?>
        </table>
          
    </div>
       
                                    </div>
                                    </div>
                                               <!-- Collapsable Card Example -->
                                               <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengguna & Barang Diminta</h6>
                                </a>
                                <div class="card">
         <table id="rtable" class="table table-striped table-bordered py-3" style="width:100%">
            <thead>
                <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Diminta Oleh</th>
                <th>Gambar Barang</th>
                <th>Kemas Kini</th>
                <th>Padam</th>
                
                
                </tr>
            </thead>
            <tbody>

            <?php
                        
            $counter = 0;
            ?>
           
            <?php
               while($row=mysqli_fetch_assoc($result))
            {
              
              $counter = $counter + 1;
                            $itemName = $row['itemName'];
                            $itemID = $row['itemID'];
                            $deskripsi = $row['itemDesc'];
                            $kategori = $row['itemCat'];
                            $name = $row['name'];
                            $image = $row['image'];
                ?>
                <tr>
                <td><?php echo $counter?></td>
                                <td><?php echo $itemName?></td>
                                <td><?php echo $deskripsi?></td>
                                <td><?php echo $kategori?></td>
                                <td><?php echo $name?></td>
                                <td>
                                <img  src="img/<?php echo $row['image']; ?>" alt="Image" width="200px" height="200px">
                                </td>
                                <td><a href="editReqItemP.php?GetID=<?php echo $itemID?>"class="fas fa-edit "></a></td>
                                <td><a href="delItemAd.php?Del=<?php echo $itemID?>"class="fas fa-trash"></a></td>
                </tr>
                <?php
            } 
            ?>
        </table>
          
    </div>
         
                </div>
                    
                <?php
                $query_s = "SELECT * FROM useraccounts INNER JOIN shareitem ON useraccounts.userID=shareitem.userID";
                $result_s = mysqli_query($db, $query_s);
                ?>
                       <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengguna & Barang Dikongsi</h6>
                                </a>
                                <div class="card">
         <table id="stable" class="table table-striped table-bordered py-3" style="width:100%">
            <thead>
                <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Diminta Oleh</th>
                <th>Gambar Barang</th>
                <th>Kemas Kini</th>
                <th>Padam</th>
                
                
                </tr>
            </thead>
            <tbody>

            <?php
                        
            $counter = 0;
            ?>
           
            <?php
               while($row_s=mysqli_fetch_assoc($result_s))
            {
              
              $counter = $counter + 1;
              $itemName = $row_s['s_itemName'];
              $itemID = $row_s['s_itemID'];
              $deskripsi = $row_s['s_itemDesc'];
              $kategori = $row_s['s_itemCat'];
              $name = $row_s['name'];
              $image = $row_s['image'];
                ?>
                <tr>
                <td><?php echo $counter?></td>
                                <td><?php echo $itemName?></td>
                                <td><?php echo $deskripsi?></td>
                                <td><?php echo $kategori?></td>
                                <td><?php echo $name?></td>
                                <td>
                                <img  src="img/<?php echo $row_s['image']; ?>" alt="Image" width="200px" height="200px">
                                </td>
                                <td><a href="editReqItemP.php?GetID=<?php echo $itemID?>"class="fas fa-edit "></a></td>
                                <td><a href="delItemAd.php?Del=<?php echo $itemID?>"class="fas fa-trash"></a></td>
                </tr>
                <?php
            } 
            ?>
        </table>
          
    </div>
                 <!-- Collapsable Card Example -->
                                               <div class="card shadow mb-4">
         
         
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

           <script>
        $(document).ready(function() {
            $("#table").DataTable();
        });
        </script>

        <script>
        $(document).ready(function() {
            $("#rtable").DataTable();
        });
        </script>
        
        <script>
        $(document).ready(function() {
            $("#stable").DataTable();
        });
        </script>

</body>

</html>