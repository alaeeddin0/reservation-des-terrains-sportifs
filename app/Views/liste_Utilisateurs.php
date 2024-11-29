<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Liste des Clients</title>

<link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css'); ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<link rel="stylesheet" href="<?= base_url('public/assets/plugins/fontawesome/css/fontawesome.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/plugins/fontawesome/css/all.min.css'); ?>">

<link rel="stylesheet" href="<?= base_url('public/assets/css/style.css'); ?>">
</head>
<body>

<div class="main-wrapper">

<div class="header">

<div class="header-left">
<a href="/Home" class="logo">
<img src="assets/img/terrain-de-football.png" alt="Logo" width="40" height="40">
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
<img src="assets/img/profiles/avatar-18.jpg" alt="user avatar" class="rounded-circle" width="50">
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
	<a href="/Home"><img src="assets/img/home.svg" alt="sidebar_img"> <span>Dashboard</span></a>
	</li>
	<li>
	<a href="/Reservations"><img src="assets/img/employee.svg" alt="sidebar_img"><span> Reservations</span></a>
	</li>
	
	<li >
		<a href="/Utilisateurs_liste"><img src="assets/img/joueur-de-football.png" alt="sidebar_img"style="width: 30px; height: 30px; object-fit: cover;"><span>Joueurs</span></a>
	</li>

	<li>
	<a href="/Terrain"><img src="assets/img/tt.png" alt="sidebar_img"style="width: 30px; height: 30px; object-fit: cover;"> <span>Terrains</span></a>
	</li>
	
</ul>
	<ul class="logout">
	<li>
	<a href="/logout"><img src="assets/img/logout.svg" alt="sidebar_img"><span>Log out</span></a>
	</li>
	</ul>
</div>
</div>
</div>
</div>


<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="breadcrumb-path ">
	<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/Home"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Home</a>
	</li>
	<li class="breadcrumb-item active">Joueurs</li>
	</ul>
</div>
</div>

<div class="col-xl-12 col-sm-12 col-12 ">
<div class="card">
<div class="card-header">
</div>
<div class="table-responsive">
<table class="table  custom-table  no-footer">


<?php if (isset($Utilisateur) && !empty($Utilisateur)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($Utilisateur as $user): ?>
                        <tr class="client-row">
                            <td><?= esc($user['nom']); ?></td>
                            <td><?= esc($user['email']); ?></td>
                            <td><?= esc($user['role']); ?></td>
                            <td>
                                
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editModal<?= $user['id']; ?>"><i class="bi bi-pencil-square"></i></button>

               

                <form action="/Utilisateurs_liste/delete/<?= $user['id']; ?>" method="post" style="display:inline;">
                    <?= csrf_field(); ?> 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');"><i class="bi bi-trash3"></i></button>
                </form>
                        
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Modifier les informations</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
        

                                    <form action="/Utilisateurs_liste/update/<?= $user['id']; ?>" method="post">
    <?= csrf_field(); ?> 
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?= esc($user['nom']); ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= esc($user['email']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</tbody>

</table>

<?php endif; ?>


</table>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="customize_popup">
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header text-centers border-0">
<h5 class="modal-title text-center" id="staticBackdropLabels1">Are You Sure Want to Delete?</h5>
</div>
<div class="modal-footer text-centers">
<button type="button" class="btn btn-primary">Delete</button>
<button type="button" class="btn btn-danger btn-sm"><i class="bi bi-pencil-square"></i></button>
</div>
</div>
</div>
</div>
</div>
</div>


</body>
</html>