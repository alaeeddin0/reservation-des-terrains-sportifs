<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Gestion des reservations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('/assets/plugins/fontawesome/css/fontawesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/plugins/fontawesome/css/all.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('/assets/css/xxx.css'); ?>">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="/Home" class="logo">
                    <img src="/assets/img/terrain-de-football.png" alt="Logo" width="40" height="40">
                </a>

                <a href="javascript:void(0);" id="toggle_btn">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
            </div>
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
                            <li>
                                <a href="/Home"><img src="/assets/img/home.svg" alt="sidebar_img">
                                    <span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="/Reservations"><img src="/assets/img/employee.svg" alt="sidebar_img"><span>
                                        Reservations</span></a>
                            </li>

                            <li>
                                <a href="/Utilisateurs_liste"><img src="/assets/img/joueur-de-football.png"
                                        alt="sidebar_img"
                                        style="width: 30px; height: 30px; object-fit: cover;"><span>Joueurs</span></a>
                            </li>
                            <li>
                                <a href="/Terrain"><img src="/assets/img/tt.png" alt="sidebar_img"
                                        style="width: 30px; height: 30px; object-fit: cover;"> <span>Terrains</span></a>
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
                <div class="row">
                    <div class="col-xl-12 col-sm-12 col-12">
                        <div class="breadcrumb-path mb-4">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Home"><img src="/assets/img/dash.png" class="mr-2"
                                            alt="breadcrumb" />Home</a>
                                </li>
                                <li class="breadcrumb-item active"> Reservation</li>
                            </ul>
                            <h3 class="employee_count"><?= $reservationCounts['total'] ?> Reservation</h3>
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 col-12 mb-4">
                        <div class="card">
                            <div class="table-heading">
                                <h2>All Reservations</h2>
                            </div>
                            <div class="table-responsive">
                                <table class="table  custom-table no-footer">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type de Sport</th>
                                            <th>localisation</th>
                                            <th>Date</th>
                                            <th>Debut</th>
                                            <th>Fin</th>
                                            <TH>Statu</TH>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($reservations as $reservation): ?>
                                            <tr>
                                                <td><?= $reservation['joueur_name'] ?></td>
                                                <td><?= $reservation['terrains_type'] ?></td>
                                                <td><?= $reservation['terrains_localisation'] ?></td>
                                                <td><?= $reservation['date'] ?></td>
                                                <td><?= $reservation['heure_debut'] ?></td>
                                                <td><?= $reservation['heure_fin'] ?></td>
                                                <td>
                                                    <form action="/Reservations/updateStatut/<?= $reservation['id'] ?>"
                                                        method="post">
                                                        <?= csrf_field(); ?>
                                                        <select name="statut" class="form-control form-control-sm" required>
                                                            <option value="en attente" <?= $reservation['statut'] === 'en attente' ? 'selected' : '' ?>>En attente</option>
                                                            <option value="confirmée"
                                                                <?= $reservation['statut'] === 'confirmée' ? 'selected' : '' ?>>Confirmée</option>
                                                            <option value="annulée" <?= $reservation['statut'] === 'annulée' ? 'selected' : '' ?>>Annulée</option>
                                                        </select>

                                                   
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="bi bi-pencil-square"></i></button>

                                                </td>
                                                </form>
                                            </tr>
                                        <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>