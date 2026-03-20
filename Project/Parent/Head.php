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