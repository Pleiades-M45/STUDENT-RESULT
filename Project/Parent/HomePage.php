<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parent</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../Assets/Template/Admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../Assets/Template/Admin/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/vendors/jquery-bar-rating/fontawesome-stars-o.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/vendors/jquery-bar-rating/fontawesome-stars.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../Assets/Template/Admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../Assets/Template/Admin/images/favicon_new.png" />

    <link rel="stylesheet" href="../Assets/CSS/Font.css">

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="../index.php"><img src="../Assets/Template/Admin/images/logo_purple.png" alt="logo" style="min-width: 170px;min-height: 27px;" /></a>
                <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../Assets/Template/Admin/images/logo_mini_purple.png" alt="logo" style="min-width: 50px;min-height: 45px;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-flex mr-4 ">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                            <a class="dropdown-item preview-item" href="MyProfile.php">
                                <i class="icon-head"></i> Profile
                            </a>
                            <a class="dropdown-item preview-item" href="EditProfile.php">
                                <i class="icon-head"></i> Edit Profile
                            </a>
                            <a class="dropdown-item preview-item" href="ChangePassword.php">
                                <i class="icon-lock"></i> Change Password
                            </a>
                            <a class="dropdown-item preview-item" href="../Guest/Login.php">
                                <i class="icon-inbox"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div class="user-profile">
                    <div class="user-image">
                        <img src="../Assets/Files/<?php echo $_SESSION["parentpic"]; ?>">
                    </div>
                    <div class="user-name">
                        <h6 class="font-weight-bold"><?php echo $_SESSION["parentname"]; ?></h6>
                    </div>
                    <div class="user-designation">
                        Parent
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="HomePage.php">
                            <i class="icon-box menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Result.php">
                            <i class="icon-command menu-icon"></i>
                            <span class="menu-title">Result</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Complaint.php">
                            <i class="icon-pie-graph menu-icon"></i>
                            <span class="menu-title">Complaints</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12 mb-4 mb-xl-0">
                            <h4 class="font-weight-bold text-dark">Hi, welcome back <?php echo $_SESSION["parentname"]; ?>!</h4>
                            <p class="font-weight-normal mb-2 text-muted" id="current-date"></p>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2047 <a href="HomePage.php" target="_blank">&nbsp;OrcaLabs</a>.&nbsp;All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Algo results</span>
                    </div>
                </footer>

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="../Assets/Template/Admin/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../Assets/Template/Admin/js/off-canvas.js"></script>
    <script src="../Assets/Template/Admin/js/hoverable-collapse.js"></script>
    <script src="../Assets/Template/Admin/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../Assets/Template/Admin/vendors/chart.js/Chart.min.js"></script>
    <script src="../Assets/Template/Admin/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../Assets/Template/Admin/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script>
        let now = new Date().toLocaleDateString('en-us', {
            month: "long",
            day: "numeric",
            year: 'numeric'
        });
        document.getElementById("current-date").innerHTML = now;
    </script>
</body>

</html>