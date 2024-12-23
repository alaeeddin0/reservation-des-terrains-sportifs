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
    <style>
        #open-review-form {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
            margin-left: 900px;
        }

        #review-form input,
        #review-form textarea,
        #review-form select {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
        }

        #open-review-form:hover {
            background-color: #0056b3;
            color: #fff;
            transform: scale(1.05);
        }

        .page-wrapper-custom {
            margin-left: 240px;
            padding-top: 70px;
            position: relative;
            transition: all 0.4s ease;
        }

        #review-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1050;
        }

        .review-modal {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        #review-form .form-label {
            font-weight: bold;
            color: #333;
        }

        #review-form .form-control,
        #review-form .form-select {
            border-radius: 5px;
        }

        #review-form button {
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
        }

        #review-form button:hover {
            transform: scale(1.05);
        }

        .review-section {
            text-align: center;
            margin-top: 30px;
        }

        #review-form .form-group {
            margin-bottom: 1.5rem;
        }

        table {

            border-collapse: collapse;
            text-align: left;
            background-color: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-left: 15%;
            max-width: 200px;
            margin-bottom: 50px;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            color: #333;
            vertical-align: middle;
            text-align: left;

        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 12px 15px;
            border: none;
        }

        h1,
        .header-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: left;

        }

        tbody tr:hover {
            background-color: #f4f4f4;
            cursor: pointer;
        }


        tbody tr:last-child td {
            border-bottom: none;
        }


        td:first-child,
        th:first-child {
            text-align: center;

        }

        td:nth-child(4),
        th:nth-child(4) {
            text-align: center;

        }

        .btn-style {
            background-color: #007BFF;

            color: #fff;

            border: none;

            padding: 10px 20px;

            font-size: 16px;

            border-radius: 5px;

            cursor: pointer;

            transition: background-color 0.3s ease, transform 0.2s ease;

        }

        .btn-style:hover {
            background-color: #0056b3;

            transform: scale(1.05);

        }

        .btn-style:active {
            background-color: #004085;

            transform: scale(0.95);

        }
    </style>

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
            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img src="/assets/img/blank-profile-picture.webp" alt="">
                            <span class="status online"></span>
                        </span>
                        <span> <?= esc($nom) ?></h4></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('/Profile') ?>"><i data-feather="user"
                                class="mr-1"></i>
                            Profile</a>
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
                                <a href="<?= site_url('/joueur/JoueurHome') ?>"><img src="/assets/img/home.svg"
                                        alt="sidebar_img">
                                    <span>Accueil</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Reservation') ?>"><img src="/assets/img/employee.svg"
                                        alt="sidebar_img"><span>
                                        Réservations</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Terrains') ?>"><img src="/assets/img/calendar.svg"
                                        alt="sidebar_img">
                                    <span>Terrains</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Avis') ?>"><img src="/assets/img/review.svg"
                                        alt="sidebar_img"><span>Avis</span></a>
                            </li>
                            <li>
                                <a href="<?= site_url('/Profile') ?>"><img src="/assets/img/profile.svg"
                                        alt="sidebar_img">
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
        <div class="container">
            <div class="page-wrapper-custom">
                <div class="content container-fluid">
                    <div class="page-name 	mb-4">
                        <h4 class="m-0"><img src="/assets/img/blank-profile-picture.webp" class="mr-1"
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
                                    <li class="breadcrumb-item active"> Terrains</li>
                                </ul>
                                <h3>Terrains</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($terrains) && count($terrains) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>localisation</th>
                            <th>prix</th>
                            <th>type sport</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($terrains as $index => $terrain): ?>
                            <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td><?= esc($terrain['localisation']) ?></td>
                                <td><?= esc($terrain['prix']) ?></td>
                                <td class="text-center"><?= esc($terrain['type_sport']) ?> </td>
                                <td class="text-center">
                                    <form action="<?= site_url('/Reservation') ?>" method="get" style="display:inline;">
                                        <button type="submit" class="btn-style">Réserver</button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php else: ?>

            <?php endif; ?>
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