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
                            <h1>Register</h1>


                            <form action="<?= site_url('/register/store') ?>" method="post">
                                <?= csrf_field() ?>

                             
                                <?php if (session('errors')): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php foreach (session('errors') as $error): ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label class="form-control-label">Nom</label>
                                    <input class="form-control" type="text" name="name" value="<?= old('name') ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input class="form-control" type="email" name="email" value="<?= old('email') ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Mot de passe</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Confirmer le mot de passe</label>
                                    <input class="form-control" type="password" name="confirm_password" required>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="btn btn-lg btn-block btn-primary" type="submit">S'inscrire</button>
                                </div>
                            </form>



                            <div class="text-center dont-have">T'as déja un compte? <a
                                    href="<?= site_url('/') ?>">Login</a>
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