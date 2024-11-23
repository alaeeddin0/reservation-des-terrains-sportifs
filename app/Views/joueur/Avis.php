<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Terrains sportifs </title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo logo-small">
                </a>
                <a href="javascript:void(0);" id="toggle_btn">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
            </div>




            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>


            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img src="/assets/img/profiles/blank-profile-picture.webp" alt="">
                            <span class="status online"></span>
                        </span>
                        <span> <?= esc($nom) ?></h4></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html"><i data-feather="user" class="mr-1"></i>
                            Profile</a>
                        <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="mr-1"></i>
                            Settings</a>
                        <a class="dropdown-item" href="<?= site_url('logout') ?>"><i data-feather="log-out"
                                class="mr-1"></i>
                            Logout</a>
                    </div>
                </li>

            </ul>
        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-contents">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <div class="mobile-show">
                            <div class="offcanvas-menu">
                                <div class="user-info align-center bg-theme text-center">
                                    <span class="lnr lnr-cross  text-white" id="mobile_btn_close">X</span>
                                    <a href="javascript:void(0)" class="d-block menu-style text-white">
                                        <div class="user-avatar d-inline-block mr-3">
                                            <img src="/assets/img/profiles/avatar-18.jpg" alt="user avatar"
                                                class="rounded-circle" width="50">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="sidebar-input">
                                <div class="top-nav-search">
                                    <form>
                                        <input type="text" class="form-control" placeholder="Search here">
                                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul>
                            <li class="active">
                                <a href="<?= site_url('/joueur/JoueurHome') ?>"><img src="/assets/img/home.svg" alt="sidebar_img">
                                    <span>Accueil</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Reservation') ?>"><img src="/assets/img/employee.svg" alt="sidebar_img"><span>
                                Réservations</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Terrains') ?>"><img src="/assets/img/calendar.svg" alt="sidebar_img">
                                    <span>Terrains</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Avis') ?>"><img src="/assets/img/review.svg"
                                        alt="sidebar_img"><span>Avis</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Profile') ?>"><img src="/assets/img/profile.svg" alt="sidebar_img">
                                    <span>Profile</span></a>
                            </li>
                        </ul>
                        <ul class="logout">
                            <li>
                                <a href="<?= site_url('logout') ?>"><img src="/assets/img/logout.svg"
                                        alt="sidebar_img"><span>Log
                                        out</span></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-name 	mb-4">
                    <h4 class="m-0"><img src="/assets/img/profiles/blank-profile-picture.webp" class="mr-1"
                            alt="profile" /> Bienvenue
                        <?= esc($nom) ?>
                    </h4>
                    <label><?= esc($dateActuelle) ?></label>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 col-12  mb-4">
                        <div class="breadcrumb-path">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><img src="/assets/img/dash.png"
                                            class="mr-2">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> Avis</li>
                            </ul>
                            <h3>Avis</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/feather.min.js"></script>
    <script src="/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="/assets/plugins/apexchart/chart-data.js"></script>
    <script src="/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="/assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>
    <script src="/assets/js/script.js"></script>
</body>
</html>