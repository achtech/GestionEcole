<?php session_start(); ?>
<?php error_reporting(0) ?>

<link href="style.css" rel="stylesheet" type="text/css" />

<?php require_once('lang.php'); ?>
<?php require_once('fonctions.php'); ?>

<?php 
echo "<center><h2>"._REDIRECT."</h2></center>";
//print_r($_REQUEST);
connect ();
//detection de la table et des champs concerné
$tab_table = split(',',$_REQUEST['table']);
$table=$tab_table[0];

$action = isset($_REQUEST['act']) && !empty($_REQUEST['act'])?$_REQUEST['act']:"";

$id_valeur = isset($_REQUEST['id_valeur']) && !empty($_REQUEST['id_valeur']) ? $_REQUEST['id_valeur'] :"";
$id_retour = isset($_REQUEST['id_retour']) && !empty($_REQUEST['id_retour']) ? $_REQUEST['id_retour'] :"";
$id_noms_retour = isset($_REQUEST['id_noms_retour']) && !empty($_REQUEST['id_noms_retour']) ? $_REQUEST['id_noms_retour']:"";
$id_valeurs_retour = isset($_REQUEST['id_valeurs_retour']) && !empty($_REQUEST['id_valeurs_retour']) ? $_REQUEST['id_valeurs_retour']:"";

$chaine_retour = formuler_retour($id_noms_retour,$id_valeurs_retour);

$page = isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page']: "";
$champ_modif=isset($_REQUEST['champ_modif']) && !empty($_REQUEST['champ_modif'])? $_REQUEST['champ_modif']: "";
$valeur_modif=isset($_REQUEST['valeur_modif']) && !empty($_REQUEST['valeur_modif']) ? $_REQUEST['valeur_modif'] : "";

//AJOUT
if ($action == "a"){	
	//Rendre les dates du format 11-30-2009 => 1235543267654
	$tab_dates = array(	"date",
					   "date_reglement",
					   "date_cheque",
					   "date_facture"
						);
	
	foreach($tab_dates as $v){
		if (isset($_REQUEST[$v])){
			
			$tab_d = explode("/",$_REQUEST[$v]);
			
			$jour = $tab_d[0];
			$mois = $tab_d[1];
			$annee = $tab_d[2];
			
			$hr = date("G");
			$mint = date("i");
			$sec = date("s");
			
			$_REQUEST[$v] = mktime($hr,$mint,$sec,$mois,$jour,$annee);
		}
	}
	
	 
	doQuery("BEGIN");
	 	
	for($i=0;$i<sizeof($tab_table);$i++){ 
	
		$var[$i]= Ajout($tab_table[$i],getNomChamps($tab_table[$i]),$_REQUEST);
		$identif=mysql_insert_id(); 
		$_REQUEST['id_'.$tab_table[$i]]=mysql_insert_id(); 
		writeInLogs($_SESSION['employeId'],"Ajouter l element ".$identif." de la table ".$tab_table[0]);
		
		if(isset($_FILES['photo']) and getChamp($tab_table[$i], "image")){
			$retour2 = upload_image($tab_table[$i],$_FILES['photo'],$identif);
			unset($_FILES);
			
			if($retour2){
				echo _UPLOAD_OK;
			}
			else
			{
				echo _UPLOAD_NOK;
			}
		}
		
	}
	
	for($i=0 ; $i<sizeof($var) ; $i++){ 
		if( !$var[$i] ){
			doQuery("ROLLBACK");
		$m=1;
		}	
	}
	
	if($m==1) $msg_err=_AJOUT_NOK;	
	else {
		$msg= _AJOUT_OK;
		
		
		
		doQuery("COMMIT");
	}	
		
	if(isset($_REQUEST['msg_retour'])){
		$msg = $_REQUEST['msg_retour'];
	}

	//if (isset($_REQUEST['parent'])) { $parent=$_REQUEST['parent']; }
	//redirect($page."?m=".$msg."&er=".$msg_err.$chaine_retour.$_REQUEST['ancre']);
}

if($action == "ajouter_paiements_eleves"){
	$montantInscription = getValeurChamp('montant','paiements_eleves','id_eleves,id_annees_scolaire,mois',$_REQUEST['id_eleves'].','.$_REQUEST['id_annees_scolaire'].',0');
	$fraisInscription = getValeurChamp('frais_inscription','inscriptions','id',getLastInscription($_REQUEST['id_eleves']));
	
	$frais = getValeurChamp('frais_mensuelle','inscriptions','id',getLastInscription($_REQUEST['id_eleves']));
	$dateInscription = getValeurChamp('date_inscription','inscriptions','id',getLastInscription($_REQUEST['id_eleves']));
	$sumMontant = getSum('paiements_eleves','montant','id_eleves,id_annees_scolaire',$_REQUEST['id_eleves'].",".$_REQUEST['id_annees_scolaire']);
	$month = date('m');
	$monthInscription = split("-",$dateInscription)[1];
	$montant = $_REQUEST['montant'];
	$montantInscription = empty($montantInscription) ? 0 : $montantInscription;
	if($montantInscription<$fraisInscription){
					if($montantInscription+$montant > $fraisInscription) {
						addPaiement($_REQUEST,0,$fraisInscription);
				 		 $montant = $montantInscription+$montant-$fraisInscription;
					}else{
						addPaiement($_REQUEST,0,$montant);
						$montant = 0;
					}
	}

 	if($monthInscription>=9){
		for ($i=$monthInscription; $i <= 12 ; $i++) { 
			
			if($montant>0){
				$p = getSum('paiements_eleves','montant','id_eleves,id_annees_scolaire,mois',$_REQUEST['id_eleves'].','.$_REQUEST['id_annees_scolaire'].','.$i);
				$p = empty($p)?0:$p;
				if($p<$frais){
					if($p+$montant > $frais) {
						addPaiement($_REQUEST,$i,$frais);
				 		 $montant = $p+$montant-$frais;
					}else{
						addPaiement($_REQUEST,$i,$montant);
						$montant = 0;
					}
				}
			}
		}
	}
	for ($i=$monthInscription<6?$monthInscription:1; $i <= 6 ; $i++) { 
		if($montant>0){
			$p = getSum('paiements_eleves','montant','id_eleves,id_annees_scolaire,mois',$_REQUEST['id_eleves'].','.$_REQUEST['id_annees_scolaire'].','.$i);
			if($p<$frais){
				if($p+$montant > $frais) {
					addPaiement($_REQUEST,$i,$frais);
					$montant = $p+$montant-$frais;
				}else{
					addPaiement($_REQUEST,$i,$montant);
					$montant = 0;
				}
			}
		}
	}
}

//AJOUT
if ($action == "ajouter_eleves"){	
	//Rendre les dates du format 11-30-2009 => 1235543267654
	$tab_dates = array(	"date",
					   "date_reglement",
					   "date_cheque",
					   "date_facture"
						);
	
	foreach($tab_dates as $v){
		if (isset($_REQUEST[$v])){
			
			$tab_d = explode("/",$_REQUEST[$v]);
			
			$jour = $tab_d[0];
			$mois = $tab_d[1];
			$annee = $tab_d[2];
			
			$hr = date("G");
			$mint = date("i");
			$sec = date("s");
			
			$_REQUEST[$v] = mktime($hr,$mint,$sec,$mois,$jour,$annee);
		}
	}
	

		 
	doQuery("BEGIN");
	 	
	for($i=0;$i<sizeof($tab_table);$i++){ 
	
		$var[$i]= Ajout($tab_table[$i],getNomChamps($tab_table[$i]),$_REQUEST);
		$identif=mysql_insert_id(); 
		$_REQUEST['id_'.$tab_table[$i]]=mysql_insert_id(); 
		doQuery("COMMIT");
		
		$sql2  ="insert into inscriptions(num_inscription,date_inscription,id_eleves,id_classes,frais_inscription,frais_mensuelle) values(".$_REQUEST['num_inscription'].",'".date('Y-m-d')."',".$identif.",".$_REQUEST['id_classes'].",".$_REQUEST['frais_inscription'].",".$_REQUEST['frais_mensuelle'].")";
		doQuery($sql2);
		doQuery("COMMIT");
		writeInLogs($_SESSION['employeId'],"Inscription du nouveau eleve ".$_REQUEST['nom']." ".$_REQUEST['prenom']);
		
		if(isset($_FILES['photo']) and getChamp($tab_table[$i], "image")){
			$retour2 = upload_image($tab_table[$i],$_FILES['photo'],$identif);
			unset($_FILES);
			
			if($retour2){
				echo _UPLOAD_OK;
			}
			else
			{
				echo _UPLOAD_NOK;
			}
		}
		
	}
	
	for($i=0 ; $i<sizeof($var) ; $i++){ 
		if( !$var[$i] ){
			doQuery("ROLLBACK");
		$m=1;
		}	
	}
	
	if($m==1) $msg_err=_AJOUT_NOK;	
	else {
		$msg= _AJOUT_OK;
		doQuery("COMMIT");
	}	
		
	if(isset($_REQUEST['msg_retour'])){
		$msg = $_REQUEST['msg_retour'];
	}

}

//MODIFICATION
if ($action == "m"){
	
	if(isset($_REQUEST['id_nom'])){
		$id_nom = $_REQUEST['id_nom'];
	}
	else 
	{
		$id_nom='id';
	}
	
	/*
	//Verifier l'existance d'une adresse email
	if (isset($_REQUEST['email'])){
			
		$tab_tables=array("utilisateurs","administration");
		
		$exception = $_REQUEST['exception'];
		foreach($tab_tables as $v){
			if (ExisteValeur($v,"email",$_REQUEST['email'],$exception)){
				
				$msg_err= _EMAIL_EXISTANT;
				$msg="";
				
				redirect($page."?id=".$id_retour."&m=".$msg."&er=".$msg_err.$chaine_retour);
				exit();
			}
		}
	}	
	*/
	
	//Rendre les dates du format 11-30-2009 => 1235543267654
	$tab_dates = array(	"date",
					   "date_cheque",
						"date_reglement",
					   "date_facture"
						);
	
	foreach($tab_dates as $v){
		if (isset($_REQUEST[$v])){
			
			$tab_d = explode("/",$_REQUEST[$v]);
			
			
			$jour = $tab_d[0];
			$mois = $tab_d[1];
			$annee = $tab_d[2];
			
			$hr = date("G");
			$mint = date("i");
			$sec = date("s");
			
			$_REQUEST[$v] = mktime($hr,$mint,$sec,$mois,$jour,$annee);
		}
	}
	
	doQuery("BEGIN");
	
	for($i=0;$i<sizeof($tab_table);$i++){ 
	 	$var[$i] = Modification($tab_table[$i],getNomChamps($tab_table[$i]),$_REQUEST,$id_nom,$id_valeur);
		
		writeInLogs($_SESSION['employeId'],"Modifier l element ".$_REQUEST['id']." de la table ".$tab_table[0]);

		if(isset($_FILES['photo'])){
			$retour2 = upload_image($tab_table[$i],$_FILES['photo'],$id_valeur);
			unset($_FILES);
			
			if($retour2)
			{
				echo _UPLOAD_OK;
			}
			else 
			{
				echo _UPLOAD_NOK;
			}
		}
		if(isset($_FILES['logo'])){

			$retour2 = upload_image($tab_table[$i],$_FILES['logo'],$id_valeur);
			unset($_FILES);
			
			if($retour2)
			{
				echo _UPLOAD_OK;
			}
			else 
			{
				echo _UPLOAD_NOK;
			}
		}
		
		$id_nom='id_'.$tab_table[$i];	 
	}
	
	if (isset($_REQUEST['table_modification'])){
		$table_modification=$_REQUEST['table_modification'];
		Ajout($table_modification,getNomChamps($table_modification),$_REQUEST);	
	}	
	
	for($i=0 ; $i<sizeof($var) ; $i++){ 
		 if( !$var[$i] ){
			doQuery("ROLLBACK");
			$m=1;
		}		
	}
		
	if($m==1) $msg_err=_MODIFICATION_NOK;	
	else 
	{
		$msg= _MODIFICATION_OK;
		
		
		
		doQuery("COMMIT");
	}
}

if ($action == "admin_password"){
$sql="select * from administration where password='".md5($_REQUEST['password0'])."'";
$res=DoQuery($sql);
$nbr=mysql_num_rows($res);
if($nbr==0){
	$msg_err = "Verifiez votre ancien mot de passe !";
}
else
{
	if($_REQUEST['password']==$_REQUEST['password2'])
	{
		$ligne=mysql_fetch_array($res);
		
		$_REQUEST['password']=md5($_REQUEST['password']);
		if(isset($_REQUEST['id_nom'])){
			$id_nom = $_REQUEST['id_nom'];
		}
		else 
		{
			$id_nom='id';
		}
		
		
		doQuery("BEGIN");
		
		for($i=0;$i<sizeof($tab_table);$i++){ 
			$var[$i] = Modification($tab_table[$i],getNomChamps($tab_table[$i]),$_REQUEST,$id_nom,$id_valeur);
			
			if(isset($_FILES['photo'])){
				$retour2 = upload_image($tab_table[$i],$_FILES['photo'],$id_valeur);
				unset($_FILES);
				
				if($retour2)
				{
					echo _UPLOAD_OK;
				}
				else 
				{
					echo _UPLOAD_NOK;
				}
			}
			
			$id_nom='id_'.$tab_table[$i];	 
		}
		
		if (isset($_REQUEST['table_modification'])){
			$table_modification=$_REQUEST['table_modification'];
			Ajout($table_modification,getNomChamps($table_modification),$_REQUEST);	
		}	
		
		for($i=0 ; $i<sizeof($var) ; $i++){ 
			 if( !$var[$i] ){
				doQuery("ROLLBACK");
				$m=1;
			}		
		}
			
		if($m==1) $msg_err=_MODIFICATION_NOK;	
		else 
		{
			$msg= _MODIFICATION_OK;
			
			
			
			doQuery("COMMIT");
		}
	}
	else
	{
		$msg_err="Verifiez Votre mot de passe !";	
	}
}
}

//SUPPRESSION
if ($action == "s"){
	//Pour la suppression physiques des fichiers
	if ($table == "mi_messages_pieces_jointes"){
		$fichier = 'files/'. getValeurChamp('fichier','mi_messages_pieces_jointes','id',$id_valeur);
	}
	
	$retour1=Suppression($table,$id_valeur);
	writeInLogs($_SESSION['employeId'],"Supprimer l element ".$id_valeur." de la table ".$table);

	
	if ($table == "mi_messages_pieces_jointes"){
		unlink($fichier);
	}
	
	if($retour1){
		$msg= _SUPPRESSION_OK;
	}
	else $msg_err=_SUPPRESSION_NOK;
}


//MODIFICATION PASSWORD
if ($action == "password"){

	if(isset($_REQUEST['id_nom'])) {
		$id_nom = $_REQUEST['id_nom'];
	}
	else 
	{
		$id_nom = 'id';
	}
	doQuery("BEGIN");
	
	if ($_REQUEST['password2'] == $_REQUEST['password']){
		
		for($i=0;$i<sizeof($tab_table);$i++){ 
			
			$var[$i] = Modification($tab_table[$i],getNomChamps($tab_table[$i]),$_REQUEST,$id_nom,$id_valeur);
			
			$id_nom = 'id';	 
		}
	
		for($i=0 ; $i<sizeof($var) ; $i++){ 
			if( !$var[$i] ){
				doQuery("ROLLBACK");
				$m=1;
			}		
		}
	}
	else
	{
		$m=1;
	}
	
	if($m==1) 
		$msg_err = _MODIFICATION_NOK;	
	else 
	{
		$msg = _MODIFICATION_OK;
		doQuery("COMMIT");
	}
	
}


if ($action == "messagerieeeeee"){
	
	doQuery("BEGIN");
	
	//Expéditeur
	$_REQUEST['utilisateurs'] = $_SESSION['utilisateurs'];
	$_REQUEST['type_utilisateurs'] = $_SESSION['type'];
	$_REQUEST['datea'] = time();
	
	
	$table = "mi_messages";
	$bool1 = Ajout($table,getNomChamps($table),$_REQUEST);
	
	if($bool1){
		$_REQUEST['id_messages'] = mysql_insert_id();
		
		//Destinataire
		$tab_id_user = explode(',',$_REQUEST['id_utilisateurs']);
		$_REQUEST['utilisateurs'] = $tab_id_user[0];
		$_REQUEST['type_utilisateurs'] = $tab_id_user[1];
		
		$table = "mi_messages_destinataires";
		$bool2 = Ajout($table,getNomChamps($table),$_REQUEST);
		
		if($bool2){
			doQuery("COMMIT");
			$page = "mi_ajouter_messages2.php";
		}
		else
		{
			doQuery("ROLLBACK");
			$page = "mi_messages.php";
			$msg_err = _AJOUT_NOK;
		}
		
	}//bool1
}

if ($action == "messagerie"){
	
	doQuery("BEGIN");
	
	//Expéditeur
	$_REQUEST['utilisateurs'] = $_SESSION['utilisateurs'];
	$_REQUEST['type_utilisateurs'] = $_SESSION['type'];
	$_REQUEST['datea'] = time();
	
	
	$table = "mi_messages";
	$bool1 = Ajout($table,getNomChamps($table),$_REQUEST);
		
	if($bool1){
		$chaine_retour = '&messages='.mysql_insert_id();
		$page = "mi_ajouter_messages2.php";
		
		doQuery("COMMIT");
	}
	else
	{
		doQuery("ROLLBACK");
		$page = "mi_messages.php";
		$msg_err = _AJOUT_NOK;
	}
	
}

if ($action == "destinataires"){
	
	doQuery("BEGIN");
	
	$selection = explode(',',$_REQUEST['selection']);
	
	$i = 0;
	$j = sizeof($selection);
	
	foreach($selection as $c){
	
		//Destinataire
		$tab_id_user = explode(';',$c);
		$_REQUEST['utilisateurs'] = $tab_id_user[0];
		$_REQUEST['type_utilisateurs'] = $tab_id_user[1];
		
		$table = "mi_messages_destinataires";
		$bool2 = Ajout($table,getNomChamps($table),$_REQUEST);
		
		if($bool2){
			$i++;
		}
	
	}//Fin foreach
	
	if($i == $j){
		doQuery("COMMIT");
	}
	else
	{
		doQuery("ROLLBACK");
	}
	
}

if ($action == "messagerie_reponses"){
	
	doQuery("BEGIN");
	
	//Expéditeur
	$_REQUEST['utilisateurs'] = $_SESSION['utilisateurs'];
	$_REQUEST['type_utilisateurs'] = $_SESSION['type'];
	$_REQUEST['datea'] = time();
	
	
	$table = "mi_messages_reponses";
	$bool1 = Ajout($table,getNomChamps($table),$_REQUEST);
		
	if($bool1){
		$chaine_retour ='&messages='.$_REQUEST['id_messages'].'&reponses='.mysql_insert_id();
		$page = "mi_ajouter_messages_reponses2.php";
		
		doQuery("COMMIT");
	}
	else
	{
		doQuery("ROLLBACK");
		$page = "mi_details_messages.php?messages=". $_REQUEST['id_messages'];
		$msg_err = _AJOUT_NOK;
	}
	
}


if ($action == 'conexion')
{
	$login=$_REQUEST['login'];
	$password=$_REQUEST['password'];
//	$sql="select * from administration where email='".$email."' and password='".md5($password)."'";
	$sql="select * from users where login='".$login."' and password='".$password."'";
	$res=doQuery($sql);
	$nbr=mysql_num_rows($res);
	$ligne=mysql_fetch_array($res);
	if($nbr==1)
	{
		 $_SESSION['employe']=$ligne;
		 $_SESSION['employeId']=$ligne['id_employes'];
		 writeInLogs($ligne['id_employes'],"Login :".getValeurChamp('nom','employes','id',$ligne['id_employes'])." ".getValeurChamp('prenom','employes','id',$ligne['id_employes']));
		redirect("index.php");
	}else{
		redirect("log-in.php?msg_retour=login or mot de passe erronee");
	}
}


if(isset($_REQUEST['msg_retour'])){
	$msg = $_REQUEST['msg_retour'];
}

redirect($page."?".$chaine_retour."&m=".$msg."&er=".$msg_err."#ancre");
?>