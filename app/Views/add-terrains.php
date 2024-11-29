<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Ajouter terrain</title>

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
								<a href="/logout"><img src="/assets/img/logout.svg" alt="sidebar_img"><span>Log
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
					<div class="col-xl-12 col-sm-12 col-12 ">
						<div class="breadcrumb-path mb-4">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="/Home">Home</a>
								</li>
								<li class="breadcrumb-item active"> Terrains</li>
							</ul>
							<h3>Ajouter Terrain</h3>
						</div>
					</div>
					<form action="/add-terrains" method="post">
						<div class="form-group">
							<label for="type_sport">Type de Sport:</label>
							<select name="type_sport" id="type_sport">
								<option value="Football">Football</option>
								<option value="Tennis">Tennis</option>
								<option value="Basketball">Basketball</option>
							</select>
						</div>

						<div class="form-group">
							<label for="localisation">Localisation:</label>
							<input type="text" name="localisation" id="localisation"
								placeholder="Localisation du terrain" required>
						</div>

						<div class="form-group">
							<label for="prix">Prix:</label>
							<input type="text" name="prix" id="prix" placeholder="Prix du terrain" required>
						</div>

						<div class="form-group">
							<label for="disponibilites">Disponibilité:</label>
							<select name="disponibilites" id="disponibilites">
								<option value="Disponible">Disponible</option>
								<option value="Non disponible">Non disponible</option>
							</select>
						</div>

						<button type="submit">Ajouter Terrain</button>
					</form>



</body>

</html>