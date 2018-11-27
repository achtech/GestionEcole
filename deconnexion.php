<?php session_start() ?>
<?php error_reporting(0) ?>

<?php require_once('lang.php'); ?>
<?php require_once('fonctions.php'); ?>
<?php require_once('tabs.php'); ?>

<?php 
echo "<center><h2>"._REDIRECT."</h2></center>";
writeInLogs($_SESSION['employeId'],"Deconnexion :".getValeurChamp('nom','employes','id',$ligne['id_employes'])." ".getValeurChamp('prenom','employes','id',$ligne['id_employes']));
unset($_SESSION['employeId']);
unset($_SESSION['employe']);
redirect('log-in.php');
?>