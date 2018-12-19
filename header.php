<?php session_start() ?>
<?php //error_reporting(0) ?>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--////////////////////////////////// Include PHP //////////////////////////////////-->
    <?php require_once('lang.php'); ?>
    <?php require_once('fonctions.php'); ?>
    <?php require_once('tabs.php'); ?>
    <!--////////////////////////////////// Include PHP //////////////////////////////////-->
    <?php 
    
    if(!isset($_SESSION['employe']) || empty($_SESSION['employe']))
    {
        redirect('log-in.php');
    }
    
    ?>
<!--////////////////////////////////// Include JS //////////////////////////////////-->
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/form.js"></script>

<!-- Calendrier JS -->
<script type="text/javascript" src="js/epoch_classes.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
/*You can also place this code in a separate file and link to it like epoch_classes.js*/
    var bas_cal,dp_cal,ms_cal;      
window.onload = function () {
    dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('cal_required'));
    dp_cal2  = new Epoch('epoch_popup','popup',document.getElementById('cal2_required'));
};
/*]]>*/
</script>
    <title>Gestion d'ecole</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="css/Roboto.css" rel="stylesheet" type="text/css">
    <link href="css/materialIcons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />


    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

</head>

<body class="theme-red">

<!-- Page Loader -->
   
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Gestion d'ecole</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?php $tab = paiementsNonPaye(getCurrentAnneesScolaires());echo count($tab); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Paiements non effectue</li>
                            <li class="body">
                                <ul class="menu">
                                    <?php for ($i=0; $i < count($tab); $i++) { ?> 
                                        
                                    <li>
                                        <a href="ajouter_paiements_eleves.php?annees_scolaire=<?php echo getCurrentAnneesScolaires() ?>&eleves=<?php echo $tab[$i][0] ?>">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><?php echo $tab[$i][1]; ?></h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> <?php echo $tab[$i][2]; ?>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                 <?php } ?>

                                </ul>
                            </li>
                            <li class="footer">
                                <a href="paiements_eleves.php">voir tout les notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <?php $tabTasks = getAllTasksNotComplete(); ?>
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count"><?php echo count($tabTasks) ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <?php 
                                        for($i=0;$i<count($tabTasks);$i++){
                                     ?>
                                    <li>
                                        <a href="details_tasks.php?tasks=<?php echo $tabTasks[$i][2] ?>">
                                            <h4>
                                                <?php echo $tabTasks[$i][0] ?>
                                                <small><?php echo $tabTasks[$i][1] ?></small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $tabTasks[$i][1] ?>%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="tasks.php">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->