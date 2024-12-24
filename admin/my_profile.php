<?php
session_start();
include 'konfig.php';
include 'cek.php';

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data admin
$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);
$admin = mysqli_fetch_assoc($result);

// Jika admin tidak ditemukan
if (!$admin) {
    die("Data admin tidak ditemukan.");
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>My Profile | Kelompok 7</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.php"><img src="../assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo htmlspecialchars($admin['username']); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="my_profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="buku.php" class=""><i class="lnr lnr-book"></i> <span>Buku</span></a></li>
                        <li><a href="penerbit.php" class=""><i class="lnr lnr-apartment"></i> <span>Penerbit</span></a></li>
                        <li><a href="transaksi.php" class=""><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
                        <li><a href="laporan.php" class=""><i class="lnr lnr-file-empty"></i> <span>Laporan</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- LEFT COLUMN -->
                            <div class="profile-left">
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">
                                    <div class="overlay"></div>
                                    <div class="profile-main">
                                        <img src="../assets/img/user-medium.png" class="img-circle" alt="Avatar">
                                        <h3 class="name"><?php echo htmlspecialchars($admin['username']); ?></h3>
                                        <span class="online-status status-available">Available</span>
                                    </div>
                                </div>
                                <!-- END PROFILE HEADER -->
                                <!-- PROFILE DETAIL -->
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">Informasi Admin</h4>
                                        <ul class="list-unstyled list-justify">
                                            <li>Username <span><?php echo htmlspecialchars($admin['username']); ?></span></li>
                                            <li>Role <span>Administrator</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END PROFILE DETAIL -->
                            </div>
                            <!-- END LEFT COLUMN -->
                            <!-- RIGHT COLUMN -->
                            <div class="profile-right">
                                <h4 class="heading">Aktivitas Admin</h4>
                                <!-- AWARDS -->
                                <div class="awards">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="award-item">
                                                <div class="hexagon">
                                                    <span class="lnr lnr-sun award-icon"></span>
                                                </div>
                                                <span>Status</span>
                                                <span>Aktif</span>
                                            </div>
                                        </div>
                                        <!-- Tambahkan lebih banyak aktivitas atau pencapaian di sini jika diperlukan -->
                                    </div>
                                </div>
                                <!-- END AWARDS -->
                            </div>
                            <!-- END RIGHT COLUMN -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2024 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../assets/scripts/klorofil-common.js"></script>
</body>
</html>