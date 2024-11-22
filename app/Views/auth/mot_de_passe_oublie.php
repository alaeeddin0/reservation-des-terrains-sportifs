<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Terrains sportifs</title>

  

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
                            <h1>mot de passe oublié?</h1>
                            <p class="account-subtitle">Entrer votre email pour recevoire un lien de récupération</p>

                            <form action="<?= site_url('recuperer') ?>" method="POST">
                                <div class="form-group">
                                    <label class="form-control-label">Email </label>
                                    <input class="form-control" type="text" name="email">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-lg btn-block btn-primary" type="submit">récupérer</button>
                                </div>
                            </form>

                            <div class="text-center dont-have">Rappelez-vous votre mot de passe? <a
                                    href="<?= site_url('/') ?>">Login</a></div>
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

    <script src="/assets/js/script.js"></script>
</body>

</html>