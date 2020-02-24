<?php 
  
  if ($_SESSION['status'] != 'login' && $_SESSION['role'] !== '1') {
    header('Location: '.BASEURL.'/auth/login');
  }elseif ($_SESSION['role'] !== '1') {
    header('Location: '.BASEURL.'');
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="<?= BASEURL  ?>/css/sb-admin-2.css" rel="stylesheet">
     <link href="<?= BASEURL  ?>/css/style.css" rel="stylesheet">
    <!-- Custom styles for this page -->
  	<link href="<?= BASEURL ?>/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  	  <!-- Custom fonts for this template -->
    <link href="<?= BASEURL ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>Laporan | User</title>
  </head>
  <body>




<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">

        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header">
            <h3 ><span>R</span><span>e</span><span>p</span><span>o</span><span>r</span><span>t</span> Laporan </h3>
        </div>

        <ul class="list-unstyled components">
                <li class="active">
                    <a href="<?= BASEURL ?>/user/index" class="home" >
                        <i class="fas fa-list"></i> &nbsp;List Projek
                    </a>
                </li>
                <li class="active my-4">
                    <a href="<?= BASEURL ?>/user/laporan">
                        <i class="fas fa-download"></i> &nbsp;Laporan Harian
                    </a>
                </li>
        </ul>

       
    </nav>

    <!-- Page Content -->

     

         <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                     <!-- Topbar Navbar -->
                     <ul class="navbar-nav ">
                          <li class="nav-item dropdown no-arrow">
                            <div class="nav-link d-projek">
                                
                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="fas fa-bars"></i>
                </button>&nbsp;&nbsp;
                                <h4><span>R</span><span>e</span><span>p</span><span>o</span><span>r</span><span>t</span> Harian </h4>    
                            </div>
                        </li>
                     </ul>
                    <ul class="navbar-nav ml-auto">
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow ">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'];?></span> &nbsp;&nbsp;
                                <img  class="img-profile " src="https://img.icons8.com/officel/80/000000/user-male-circle.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>


                </nav>
                <!-- End of Topbar -->
    <!-- Dark Overlay element -->
    <div class="overlay"></div>
</div>