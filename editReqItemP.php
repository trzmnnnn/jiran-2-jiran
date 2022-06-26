<?php
require_once("server.php");

$itemID = $_GET['GetID'];
$query = " SELECT * FROM requestitem INNER JOIN useraccounts ON requestitem.userID=useraccounts.userID WHERE itemID = '".$itemID."'";
$result = mysqli_query($db, $query);

while($row=mysqli_fetch_assoc($result))
{
    $itemID = $row['itemID'];
    $itemName = $row['itemName'];
    $itemDesc = $row['itemDesc'];
    $itemCat = $row['itemCat'];
    $image = $row['image'];
    $date = $row['date'];
    $name = $row['name'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jiran2Jiran: Panel Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://code.jquery.com/jquery-3.5.1.js" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js" rel="stylesheet" type="text/css">

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
<h1 class="h3 mb-4 text-gray-800">Dashboard Pengguna</h1>

<div class="row">

    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Borang Ingin Membantu: Maklumat Diri Anda</h6>
            </div>
            <div>
           
            <div class="card-body">
                                            <form action="updateReqIteAd.php?itemID=<?php echo $itemID?>" method="POST">

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
                                                <a href="adminPanel.php">Kembali</a>
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
                <h6 class="m-0 font-weight-bold text-primary">Barang Pertolongan Daripada Anda</h6>
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


 
  

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>