<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Réinitialisation du mot de passe</h1>
                            <form action="<?= site_url('mettre_a_jour_mot_de_passe') ?>" method="POST">
                                <input type="hidden" name="token" value="<?= esc($token) ?>">
                                <div class="form-group">
                                    <label class="form-control-label">Nouveau mot de passe</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-lg btn-block btn-primary" type="submit">Mettre à jour</button>
                                </div>
                            </form>
                            <div class="text-center dont-have">
                                <a href="<?= site_url('/') ?>">Retour à la connexion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>

<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<script src="/assets/js/feather.min.js"></script>

<script src="/assets/js/script.js"></script>
</body>

</html>
