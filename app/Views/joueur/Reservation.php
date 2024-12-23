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

        #edit-reservation-overlay {
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
            margin-top: 10px;
        }

        #review-form .form-group {
            margin-bottom: 1.5rem;
        }

        table {
            margin-top: 5px;
            border-collapse: collapse;
            text-align: left;
            background-color: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-left: 10%;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            color: #333;
            vertical-align: middle;
            text-align: left;

        }

        .sidebar {
            width: 190px;
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

        .status-badge {
            display: inline-block;
            padding: 0.5em 1em;
            border-radius: 12px;
            font-size: 0.9em;
            font-weight: bold;
            text-align: center;
            color: #fff;
            /* Texte en blanc pour contraste */
        }

        .status-en-attente {
            background-color: #ffa500;
            /* Orange pour "en attente" */
        }

        .status-confirmee {
            background-color: #28a745;
            /* Vert pour "confirmée" */
        }

        .status-annulee {
            background-color: #dc3545;
            /* Rouge pour "annulée" */
        }

        .status-autre {
            background-color: #6c757d;
            /* Gris pour statuts non définis */
        }


        .btn-primary,
        .btn-danger {
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            background-color: #0056b3;
            color: white;
            transform: scale(1.05);
        }

        .btn-danger:hover {
            background-color: #c82333;
            color: white;
            transform: scale(1.05);
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
        

            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
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
                    <div class="page-name mb-4">
                        <h4 class="m-0"><img src="/assets/img/blank-profile-picture.webp" class="mr-1"
                                alt="profile" /> Bienvenue
                            <?= esc($nom) ?>
                        </h4>
                        <label><?= esc($dateActuelle) ?></label>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-sm-12 col-12 mb-4">
                            <div class="breadcrumb-path">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><img src="/assets/img/dash.png"
                                                class="mr-2">Home</a></li>
                                    <li class="breadcrumb-item active"> Réservations</li>
                                </ul>
                                <h3>Réservations</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-section">
                <button id="open-review-form" class="btn btn-primary btn-lg btn-rounded shadow-sm">
                    <i class="fas fa-calendar-check"></i> Réserver un terrain
                </button>

                <div id="review-overlay" class="review-overlay">
                    <div class="review-modal">
                        <h5 class="text-center mb-3">Réservez votre terrain</h5>
                        <form action="<?= site_url('/Reservation/create') ?>" method="post" id="review-form">
                            <?= csrf_field() ?>
                            <div class="form-group mb-3">
                                <label for="terrain_id">Sélectionner un terrain</label>
                                <select name="terrain_id" id="terrain_id" class="form-control" required>
                                    <?php foreach ($terrains as $terrain): ?>
                                        <option value="<?= esc($terrain['id']) ?>">
                                            <img src="<?= esc($terrain['img_url']) ?>" alt="Terrain Image"
                                                style="width: 50px; height: 50px; margin-right: 10px;">
                                            <?= esc($terrain['localisation']) ?> - <?= esc($terrain['type_sport']) ?> -
                                            <?= esc($terrain['prix']) ?> Dh
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="creneau_id">Sélectionner un créneau disponible</label>
                                <select name="creneau_id" id="creneau_id" class="form-control" required>
                                    <?php foreach ($creneauxDisponibles as $creneau): ?>
                                        <option value="<?= esc($creneau['id']) ?>">
                                            <?= esc($creneau['date']) ?> - <?= esc($creneau['heure_debut']) ?> à
                                            <?= esc($creneau['heure_fin']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Réserver</button>
                                <button type="button" id="cancel-review-form"
                                    class="btn btn-secondary btn-rounded shadow-sm">
                                    Annuler
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if (isset($reservations) && count($reservations) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Terrain</th>
                            <th>Créneau</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $index => $reservation): ?>
                            <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td class="text-center">
                                    <?php foreach ($terrains as $terrain): ?>
                                        <?php if ($terrain['id'] == $reservation['terrain_id']): ?>
                                            <?= esc($terrain['localisation']) ?>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td class="text-center">
                                    <?php foreach ($creneaux as $creneau): ?>
                                        <?php if (isset($reservation['creneau_id']) && $creneau['id'] == $reservation['creneau_id']): ?>
                                            <?= esc($creneau['date']) ?> - <?= esc($creneau['heure_debut']) ?> à
                                            <?= esc($creneau['heure_fin']) ?>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>


                                <td class="text-center">
                                    <?php
                                    foreach ($terrains as $terrain) {
                                        if ($terrain['id'] == $reservation['terrain_id']) {
                                            echo esc($terrain['prix']) . ' MAD';
                                            break;
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $statusClass = '';
                                    switch ($reservation['statut']) {
                                        case 'en attente':
                                            $statusClass = 'status-en-attente';
                                            break;
                                        case 'confirmée':
                                            $statusClass = 'status-confirmee';
                                            break;
                                        case 'annulée':
                                            $statusClass = 'status-annulee';
                                            break;
                                        default:
                                            $statusClass = 'status-autre';
                                    }
                                    ?>
                                    <span
                                        class="status-badge <?= esc($statusClass) ?>"><?= esc(ucfirst($reservation['statut'])) ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                        onclick="openEditReservation(<?= $reservation['id'] ?>, <?= esc($reservation['terrain_id']) ?>, <?= esc($reservation['creneau_id']) ?>)">
                                        <i class="fas fa-edit"></i> Éditer
                                    </a>




                                    <form action="<?= site_url('/reservation/delete/' . $reservation['id']) ?>" method="post"
                                        style="display:inline;">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Aucune réservation trouvée.</p>
            <?php endif; ?>
            <div id="edit-reservation-overlay" class="review-overlay">
                <div class="review-modal">
                    <h5 class="text-center mb-3">Modifier votre réservation</h5>
                    <form action="<?= site_url('/reservation/update/') ?>" method="POST" id="edit-reservation-form">
                        <?= csrf_field() ?>
                        <div class="form-group mb-3">
                            <label for="edit-terrain-id">Sélectionner un terrain</label>
                            <select name="terrain_id" id="edit-terrain-id" class="form-control" required>
                                <?php foreach ($terrains as $terrain): ?>
                                    <option value="<?= esc($terrain['id']) ?>">
                                        <?= esc($terrain['localisation']) ?> - <?= esc($terrain['type_sport']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit-creneau-id">Sélectionner un créneau disponible</label>
                            <select name="creneau_id" id="edit-creneau-id" class="form-control" required>
                                <?php foreach ($creneaux as $creneau): ?>
                                    <option value="<?= esc($creneau['id']) ?>">
                                        <?= esc($creneau['date']) ?> - <?= esc($creneau['heure_debut']) ?> à
                                        <?= esc($creneau['heure_fin']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Modifier</button>

                            <button type="button" id="cancel-edit-reservation"
                                class="btn btn-secondary btn-rounded shadow-sm">Annuler</button>
                        </div>
                    </form>
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
    <script>
        document.getElementById('open-review-form').addEventListener('click', function () {
            document.getElementById('review-overlay').style.display = 'flex';
        });
        document.getElementById('cancel-review-form').addEventListener('click', function () {
            document.getElementById('review-overlay').style.display = 'none';
        });
        document.getElementById('review-overlay').addEventListener('click', function (e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
        function openEditReservation(id, terrainId, creneauId) {

            document.getElementById('edit-terrain-id').value = terrainId;
            document.getElementById('edit-creneau-id').value = creneauId;


            let form = document.getElementById('edit-reservation-form');
            form.action = "<?= site_url('/reservation/update') ?>/" + id;


            document.getElementById('edit-reservation-overlay').style.display = 'flex';
        }


        document.getElementById('cancel-edit-reservation').addEventListener('click', function () {
            document.getElementById('edit-reservation-overlay').style.display = 'none';
        });


        document.getElementById('edit-reservation-overlay').addEventListener('click', function (e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    </script>

</body>

</html>