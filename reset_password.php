
<?php session_start() ?>
<?php error_reporting(0) ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Reset password | Gestion ecole </title>

    <?php require_once('lang.php'); ?>
    <?php require_once('fonctions.php'); ?>
    <?php require_once('tabs.php'); ?>

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

        <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Gestion<b>Ecole</b></a>
            <small>Authentification</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" id="sign_up">
                    <input type="hidden" name="act" value="resetPassword"/>
                    <input type="hidden" name="url" value="<?php echo $_REQUEST['url'] ?>"/>
                    <input type="hidden" name="page" value="log-in.php"/>

                    <div class="msg">Saisir un nouveau mot de pass</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input  type="password" class="form-control" name="confirm" required>
                        </div>
                        <label id="password_status" class="error" for="confirm"><?php if(isset($_REQUEST['passwordStatus'])) echo $_REQUEST['passwordStatus'] ?></label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" id="submit">SIGN UP</button>

                </form>
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
    <script src="js/pages/examples/sign-up.js"></script>

    <script src="js/pages/forms/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>