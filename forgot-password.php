<?php session_start() ?>
<?php error_reporting(0) ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Password oublie | Gestion Ecole</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="css/fonts.googleapis.roboto.css" rel="stylesheet" type="text/css">
    <link href="css/fonts.googleapis.icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Gestion<b>Ecole</b></a>
            <small>Mot de passe oublier </small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" action="gestion.php">
                    <input type="hidden" name="act" value="forgotten_password"/>

                    <div class="msg">
                        Entrez votre adresse email que vous avez utilisé pour vous inscrire. Nous vous enverrons un email avec votre nom d'utilisateur et un lien pour réinitialiser votre mot de passe.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" value="a.mareshal@gmail.com" required autofocus>
                        </div>
                    </div>

<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RÉINITIALISER MON MOT DE PASSE</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="log-in.php">Connexion!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/forgot-password.js"></script>
</body>

</html>