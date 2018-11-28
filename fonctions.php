<?php require('params.php'); ?>
<?php 
//Fonctions
function connect () {

	$host = _BD_HOST;
	$user = _BD_USER;
	$pass = _BD_PASS;
	
	mysql_connect($host, $user, $pass) or die("Erreur de connexion au serveur (fonction.php)");
				
	selectDb ();
}	
	
function selectDb () {	

	$bd = _DB;
		
	mysql_select_db($bd) or die("Erreur de connexion a la base de donnees (fonction.php)");
}
				
function doQuery ($querystring) {	
		
	connect ();
	selectDb ();
	
	$query=$querystring ;
				
	$result = mysql_query ($query) or die(mysql_errno()) ;
	
		if(!$result) {
		
			$m = "Erreur Exe. SQL";
		
			return $msg;
		}
	
	return $result ;
					
}

function redirect($url){
?>
	<script language="javascript" type="text/javascript">
			document.location.href = "<?php echo $url ?>";
	</script>
<?php
}



function begin(){
	doQuery("BEGIN");
}

function commit(){
	doQuery("COMMIT");
}

function rollback(){
	doQuery("ROLLBACK");
}



function ifExist($table,$login){
	
	$sql = "
			select count(*) as nb 
			
			from ". $table ."
			
			where login = '". $login ."' 		
				
			";
				
	$res = doQuery($sql);
	$ligne = mysql_fetch_array($res) or die(mysql_error());
	
	$nb = $ligne['nb'];
	
	if ($nb == 0) return 0;
	if ($nb != 0) return 1;

}

function makeDateConn($id,$type,$date){
	
	if ($type == "sadmin") $type = "admin";
	
	$sql = "update ". $type ." set date_connexion = '". $date ."' where id = '". $id ."'";
	
	//echo $sql;
	$res = doQuery($sql);
}

function limiter_texte($texte,$limite){
	return substr($texte,0,$limite);
}


function genererRef($id){

//Generer une ref de type : 
//initial Type + initial Cat - Id Commercial - id Produit (Ex. LR-123-15)

//initial Type et initial Cat
$sql = "select * 
		
		from 
		
		categorie as c 
		join bien as b 
		on c.id = b.id_cat
		
		where b.id = '". $id ."'
		";

//echo $sql;

$res = doQuery($sql);
$ligne = mysql_fetch_array($res) or die(mysql_error());

if ($ligne['type'] == 1) $initial_type = "V";
if ($ligne['type'] == 2) $initial_type = "L";

$initial_cat = $ligne['initial'];

$id_commercial = $ligne['id_com'];

$id_produit = $id;

$ref = $initial_type . $initial_cat . "-" . $id_commercial . "-" . $id_produit;

return strtoupper($ref);

}

function dateVersBd($d){

	$date = explode("-",$d);
		
	return $date[2]."-".$date[0]."-".$date[1]; 
}

function dateVersSite($d){

	$date = explode("-",$d);
		
	return $date[1]."-".$date[2]."-".$date[0]; 
}

function lire_csv( $filename, $separateur){

	if ($FILE=fopen($filename,"r")){
	
		while ($ARRAY[]=fgetcsv($FILE,1024,$separateur));
		
			fclose($FILE) ;
			array_pop($ARRAY);
		
		return $ARRAY;
		
	}
}

//fonction de gestion
//cette fonction permet de supprimer un ou plusieurs enregistrement dans une table
function Suppression($table,$valeur){
	
	$sql = "delete from ".$table." where id = '". $valeur ."'";
	 
	$bool = doQuery($sql);
	 
	 //supression de l'image principale de l'element
	if ($bool){
		$tab_valeur=split(',',$valeur);
		
		foreach($tab_valeur as $val){
			$nom_image = $val."_".$table;
			foreach (glob("galerie/".$nom_image.".*") as $filename) {
				 unlink($filename);
				 
			}
		}	
		
	}	
	
	return $bool;
}

function formuler_retour($noms,$valeurs){
	$chaine = "";
	if (($noms != "") and ($valeurs != "")){
		$tab_noms = explode(',',$noms);
		$tab_valeurs = explode(',',$valeurs);
		
		$chaine = "&";
		
		for($i=0;$i<sizeof($tab_noms);$i++){
			$chaine .= $tab_noms[$i] ."=". $tab_valeurs[$i] ."&";
		}
		
		$chaine = substr($chaine,0,strlen($chaine)-1);
	}
	else
	{
		$chaine;
	}
	
	return $chaine;
}

function formuler_where($champs,$valeurs){

	if (($champs != "") and ($valeurs != "")){
	
		$tab_champs = explode(',',$champs);
		$tab_valeurs = explode(',',$valeurs);
		
		$chaine = "";
		
		for($i=0;$i<sizeof($tab_champs);$i++){
			$chaine .= $tab_champs[$i] ."='". $tab_valeurs[$i] ."' and ";
		}
		
		$chaine = substr($chaine,0,strlen($chaine)-1);
	}
	else
	{
		$chaine;
	}
	
	return $chaine;
}

/*def:pour recuperer la valeur d'un champ a partie de l'identifiant de la table 
input: la table 
		l identifiant de l enregistrement
		et le champs 
output: la valeur du champs	*/	
function getValeurChamp3($table,$id,$champ){
	$sql="select ".$champ."  
			from ".$table."
			where id=".$id."
			";
	$res= doQuery($sql); 
	if (mysql_num_rows($res) == 0){
		return "";
	}
	else
	{
		$ligne = mysql_fetch_array($res) or die(mysql_error());
		return $ligne[$champ];
	}
}
function getValeurChamp2($table,$id,$id_val,$champ){
	 $sql="select ".$champ."  
			from ".$table."
			where ".$id."=".$id_val."
			";
	$res= doQuery($sql); 
	$ligne = mysql_fetch_array($res) or die(mysql_error());
		
	return $ligne[$champ];
			
}
function getValeurChamp($champ1,$table,$champ2,$valeur){
	
	$where = formuler_where($champ2,$valeur);	
	  
	$sql="select ". $champ1."  
			from ". $table."
			where ". $where ." 1=1";
	$res= doQuery($sql); 
	
	if(mysql_num_rows($res) != 0){
		$ligne = mysql_fetch_array($res) or die(mysql_error());
		return $ligne[$champ1];
	}
	else
		return "";
			
}
//pour ajouter un enregistement a une table
//input: la table concerné
		//les champs de la table concerné par l ajout 
		//les valeurs de ces champs envoyer par le formulaire ($_REQUEST)
//output: un message de confirmation ou d'erreur		 
			
function Ajout($table,$tab_champs,$tab_requetes){

	$champs="";
	$valeurs="";
	
	foreach($tab_champs as $col){
	//print_r($tab_requetes);
	//$col= str_replace('_required','',$colonne);
		if(isset($tab_requetes[$col])){

			if ($champs==""){
				$champs=$col;
				$valeurs="'".addslashes($tab_requetes[$col])."'";
			}
			else
			{	
				$champs=$champs.','.$col;
				$valeurs=$valeurs.",'".addslashes($tab_requetes[$col])."'";	
			}
		}		
	}	
				
		$sql = "
				insert into 
				".$table."(".$champs.") 
				values(".$valeurs.")
			";
		
		$bool = doQuery($sql) or die("ERREUR AJOUT : ".mysql_error());
		
		/*if ($bool){
			//ajouter une ligne dans la table Historique_Connexion
			$table_modification = "historique_action";
			$_REQUEST['type_utilisateurs'] = $_SESSION['type'];
			$_REQUEST['id_utilisateurs'] = $_SESSION['utilisateurs'];
			$_REQUEST['date'] = time();
			Ajout($table_modification,getNomChamps($table_modification),$_REQUEST);
		}*/
		
	return $bool;
}

//pour modifier un enregistrement dans une table
//input: la table concerné
		//les champs de la table concerné par la modification
		//les valeurs de ces champs envoyer par le formulaire ($_REQUEST)
//output: un message de confirmation ou d'erreur	
function Modification($table,$tab_champs,$tab_requetes,$id_nom,$id_valeur){
	$champs_val="";
	foreach($tab_champs as $col){
		if(isset($tab_requetes[$col])){
			if ($champs_val==""){
				//$champs_val=$col."='".addslashes($tab_requetes[$col])."',";
				
				$v = $tab_requetes[$col];
				
				if ($col != "id"){
					if ($col == "password") 
						$champs_val=$col."='".addslashes(md5($v))."',";
					else
						$champs_val=$col."='".addslashes($v)."',";
				}
				
			}
			else{
				
				$champs_val=$champs_val.$col."='".addslashes($tab_requetes[$col])."',";	
			}
		}		
	}
	//pour eleminer la ',' à la fin de la chaine de caractere
	$champs_mod = substr($champs_val,0, -1);
	
	//préparation de la clause where
	$tab_id_nom = split(',',$id_nom);
	$tab_id_valeur = split(',',$id_valeur);
	$where = "";
	for($i=0;$i<sizeof($tab_id_valeur);$i++){
		if ($where==""){
			$where=$tab_id_nom[$i]."='".addslashes($tab_id_valeur[$i])."'";
		}
		else{
			$where=$where." and ".$tab_id_nom[$i]."='".addslashes($tab_id_valeur[$i])."'";	
		}
	}	
		
	if($champs_mod!=''){
		$sql="update ".$table." set ".$champs_mod." where ".$where." ";
	}	
	return $bool = doQuery($sql) or die("ERREUR MODIFICATION CAT : ".mysql_error());
}

//cette fonction permet testé si une valeur existe ou non dans une table
function ExisteValeur($table,$champ,$valeur,$exep){
	//recuperé les valeurs existantes
	 $query = "select * from ".$table." where ".$champ."='".$valeur."' and ". $champ ." <> '". $exep ."' ";
	 $result = doQuery($query);
	 
	 //traitement de l'existance d'un enregistrement
	//echo mysql_num_rows($result);
	
	if (mysql_num_rows($result)!=0){
		return true;
	}
	else 
		return false;	
}

//cette fonction permet de récuperer le nom d'un seul champd'un table
function getChamp($table, $champ){
	//recuperer lesnom du cham d'une table
	 $query = "SHOW COLUMNS FROM " . $table ." LIKE '".$champ."'";
	 $result = doQuery($query);
	 
	 //traitement de l'existance d'un enregistrement
	if (mysql_num_rows($result)!=0){
		return true;
		}
	else return false;	
		
}
//cette fonction permet de récuperer les nom des champs d'un table
//input: une table sql
//output: un tableau avec les nom des champs

function getNomChamps($table){
	//recuperer tous les nom des champs d'une table
	 $query = 'SHOW COLUMNS FROM ' . $table ;
	 $result = doQuery($query);
	 
	 //mettre les nom des champs sous form de tableau
	 for($i=0;$i<mysql_num_rows($result);$i++)
		  {
			$cols[] = mysql_result($result, $i);
			
		  }
	return $cols;
}

function datediff($debut,$fin){
	$diff = $debut - $fin;
	
	return round($diff/(60*60*24));
}


/*fonction permet de modifier pour un ou plusieurs enregistrement la valeurs d un champs
	input: table
			le mon du champs que nous voulons modifier
			la nouvelle valeur
			le ou les enregistrements concernées
	output: un message de confirmation ou d'erreur		
*/
function ModifValChamps($table,$champ,$valeur,$ids){
	$sql = "update ".$table." set 
				  
			  ".$champ."='".$valeur."'			  
			  where id in ('".$ids."')";
	
	//echo $sql;
			  
	return $bool = doQuery($sql) or die("ERREUR MODIFICATION ETAT : ".mysql_error());
	
}
/*fonction pour uploader une image dans une table
	input : table
			valeur: le fichier envoyé souqs forme array
			id: l'identifiant de l'enregistrement conserné
	output : message de confirmation ou d'erreur		
*/ 

function upload_image($table,$valeur,$id){
	if ($valeur['tmp_name']!=''){
		$image_tmp=$valeur['tmp_name'];
		$extention=get_image_extention($image_tmp);
		$nom_image=$valeur['name'];
		move_uploaded_file($image_tmp,'images/'.$nom_image);
		return ModifValChamps($table,'image',$nom_image,$id);
	}	
	
}
/*
function qui permet de recuperer l'extention d'un fuchier image
	input :nom image
	output: extention de l'image
*/
function get_image_extention($image){
	list($largeur, $hauteur, $type, $attr)=getimagesize($image);
	if($type==1){$extention=".gif";}
	if($type==2){$extention=".jpg";}
	if($type==3){$extention=".png";}
	return $extention;
}

/*fonction d'affichage de liste simple

*/
function get_list_simple($tableau,$nom_champs){
?>
	<select name="<?php echo $nom_champs ?>" id="<?php echo $nom_champs ?>">
	<option value="">_______</option>
		<?php  foreach($tableau as $val){ ?>
		<option value="<?php echo $val ?>"><?php echo formater_texte($val) ?></option>
		<?php  } ?>
	</select>
<?php 
}	
/*foncion de liste
input table concerné
		champ qu"on veux listé
		condition la condition where ou cas ou nous voulons selectionner les enregistrement
*/
function get_list($table,$id_modif,$champ,$condition,$action){ 
	if ($action=='selection'){
		$act="onChange='frm.submit()'";
		$option_vide='<option value=""> _____ </option>';
	}else 
		$act='';
	if($condition!=''){
		$cond=" where ".$condition;
	}
	else {
		$cond="";
	}
	
	$sql = "select * from ".$table.$cond. " order by ".$champ;
	$res = doQuery($sql);
	
	?>
	<select name="id_<?php echo $table ?>" id="id_<?php echo $table ?>" <?php echo $act ?> >
		<?php echo $option_vide ?>
     <?php   
		$s = "";
			while($ligne = mysql_fetch_array($res)){
				if(isset($id_modif)){
					if ($id_modif== $ligne['id']){
						//return $ligne['id'];
						$s = 'selected="selected"';
					}
				}	
		?>	
		
		<option value="<?php echo $ligne['id']?>" <?php echo  $s ?>> 
			<?php echo formater_texte($ligne[$champ]) ?> 
		</option>
		
		<?php
		$s="";
		}
		?>
		</select>
        <?php 
		return mysql_num_rows($res);
}

//fonction test
function get_table_valeur($table,$champs,$criteres){
	if ($criteres!=''){
		$crit="where ".$criteres;
	}
	else
		$crit="where 1=1";

	 $sql = "select * from ".$table." ". $crit;

	$res = doQuery($sql);
	$i=0;
	while($ligne = mysql_fetch_array($res)){
	
				foreach($champs as $champ){
					$valeurs[$i][$champ]=$ligne[$champ];
				}
		$i++;
	}
	return $valeurs;
}

//fonction d'affichage du th d'un tableau
function affichage_th($champs){
	
	?>
	<th class="case"> <input type="checkbox" name="all" onClick="cocherTout()" /> </th>
				<?php 
				for($i=0;$i<sizeof($champs);$i++){
				//foreach($champs as $champ){
				?>
					<th><?php echo $champs[$i] ?></th>
	             <?php   
				}
				?>
					<th> <?php echo _OP ?></th>
	<?php 
}

//fonction affichage valeurs sous forme de tableau
function affiche_table($champs,$valeurs,$table,$page){
	if( count($valeurs)==0){
	?>
		<tr>
        	<td colspan="20">
			<?php echo _TAB_VIDE;?>
            </td>
         <tr>   
     <?php       
	}
	else{
		foreach($valeurs as $valeur){
			//coloration des lignes
			if ($j%2 == 0) $c = "c1";
				else $c = "c2";	
			$j++;
			$id_val=$valeur['id'];
		?>	
			<tr class=<?php echo $c?>>	
				<td> <input type="checkbox" name="checkbox" value="<?php echo $id_val?>" /> </td>
				  <!--<td><a href="<?php// echo substr($table, 0, -1);?>.php?id=<?php//echo $valeur['id'] ?>" ><?php//  echo $valeur[next($champs)] ?></a></td>-->
                  <td>
                  		<a href="<?php echo _CHEMIN_ADMIN_WEB.$page ?>?id=<?php echo $id_val ?>" >
				  			<?php  echo $valeur[next($champs)] ?>
                        </a>
                  </td>
					<?php 
					
					for($i=1;$i<sizeof($valeur)-1;$i++){
						$champ=next($champs);
						if ($champ=='date_contrat'){
							if($valeur[$champ]=="0000-00-00"){
							?>
								<td> 
									<span><img src="../img/0.gif"/></span>
								</td>
                                
                             <?php 
							 }
							 else{
							   ?>
								<td> 
									<span><img src="../img/1.gif"/></span>
								</td>
                                
                             <?php 
							 }
						}else if ( $champ=='etat'){
							if($table =='produits'){$page_retour='sec/produits.php';}
							if($table =='categories'){$page_retour='manager/categories.php';}
							if($table =='caracteristiques'){$page_retour='manager/caracteristiques.php';}
							if( $valeur[$champ]==0){
							?>
								<td> 
									<span><a href="<?php echo _CHEMIN_ADMIN_WEB ?>gestion.php?table=<?php echo $table ?>&page=<?php echo $page_retour ?>&act=etat&champ_modif=etat&id=<?php echo $id_val?>"><img src="../img/0.gif"/></a></span>
								</td>
                                
                             <?php 
							 }
							 else{
							   ?>
								<td> 
									<span><a href="<?php echo _CHEMIN_ADMIN_WEB ?>gestion.php?table=<?php echo $table ?>&page=<?php echo $page_retour ?>&act=etat&champ_modif=etat&id=<?php echo $id_val?>"><img src="../img/1.gif"/></a></span>
								</td>
                                
                             <?php 
							 }
						}
						else {
					?>
						<td> 
							<span><?php echo $valeur[$champ] ?></span>
						</td>
				<?php 	
					}
					}
					
						reset($champs);
						$tab=split('/',$page);
						$racine=$tab['0'];
						
					
				?>
				<td>
                    <a href="<?php echo _CHEMIN_ADMIN_WEB.$racine ?>/modifier_<?php echo $table?>.php?id=<?php echo $valeur['id'] ?>" title="'._MODIFIER.'">
                        <img src="../img/_nav_dashboard.gif"/>
                    </a>
                    <!--<a href="#" title="'._ADDFAVORIS.'">
                        <img src="../img/icon_addtofav.gif"/>
                    </a>-->
                    <a href="#" 
                 onclick="javascript:supprimer('<?php echo $table;?>','<?php echo $valeur['id'];?>','<?php echo $table.".php";?>')">
                        <img src="../img/btn_remove-selected_bg.gif" />
                    </a>
							
				</td>
			   </tr>
			   <?php 
		}
	}	 			
}

/*affichage des titres titre
input: l url de l icone 
		le texte du titre*/
		
function affichage_titre($url,$libelle){
	if ($url==''){
		$url='image_default.jpg';
	}
	?>
	<p id="titre">
    	<img src="<?php echo $url; ?> " />
         &nbsp; 
		 <?php echo $libelle; ?>
    </p>
    <?php
}
/*affichage des operations
input: le lien lien ver le quel dirige cette operation
		l action javascript onclick executer par l'operation
		l'url de l'icone de l'operation
		le libelle de l'operation
*/
function affichage_operation($lien,$action,$url,$libelle){
	if($lien==''){
		$lien='#';
	}
	if ($url==''){
		$url='image_default.jpg';
	}
	?>
	 <a href="<?php echo $lien; ?>" onclick="<?php echo $action;?>">
          <img src="<?php echo $url ?>" />
           &nbsp;
          <?php echo $libelle ?>
        </a>
     <?php 
}
//function verification de compte
function verification_compte($comptes){

	$tab_comptes = split(',',$comptes);
	
	$i=0;
	foreach($tab_comptes as $compte){
		if($_SESSION['type']==$compte){ 
			$i++;
		}	
	}
	
	if($i==0){
		if($_SESSION['type']=='partenaire'){ 
			redirect(_CHEMIN_ADMIN_WEB."partenaire/produit.php");
		}
		
		if($_SESSION['type']=='secretaire'){ 
			redirect(_CHEMIN_ADMIN_WEB."sec/produits.php");
		}
		
		if($_SESSION['type']=='admin'){ 
			redirect(_CHEMIN_ADMIN_WEB."manager/categories.php");
		}
		else 
		{ 
			redirect(_CHEMIN_ADMIN_WEB."index.php");
		}
	}
	
} 



//fonction galerie
function affichage_galerie($table,$id_nom,$id_valeur,$page,$noms_retour,$valeurs_retour){
?>
	          
	<form name="frm" method="post" enctype="multipart/form-data" action="gestion.php" onsubmit="return checkForm(document.frm)"> 
		
		<input type="hidden" name="act" value="a">
        
        <input type="hidden" name="id_noms_retour" value="id,parent">
        <input type="hidden" name="id_valeurs_retour" value="<?php echo $id_valeur ?>,<?php echo $_REQUEST['parent'] ?>">
		
		<input type="hidden" name="<?php echo $id_nom ?>" value=<?php echo $id_valeur ?>>
		<input type="hidden" name="table" value="<?php echo $table ?>">
		<input type="hidden" name="page" value="<?php echo $page ?>">
        
        <input type="hidden" name="id_noms_retour" value="<?php echo $noms_retour ?>">
        <input type="hidden" name="id_valeurs_retour" value="<?php echo $valeurs_retour ?>">
		
		<table>
			<tr>
				<td>
					<input type="file"  id="photo_required" name="photo" />
					<input type="submit" class="button"  value="<?php echo _AJOUTER ?>"/>
					
				</td>
			</tr>
		</table>
		
		<table>
			<tr>
			<td>
			<table border="0">
			    <tr>
			  	<?php 
				$sql= "select * from ".$table." where ".$id_nom."='". $id_valeur ."'";
			  	$res = doQuery($sql);
			  	$i=1;
				while ($ligne = mysql_fetch_array($res)){	
			 	?>
					<td width="210">
                           <?php $fichier = "galerie/".$ligne['image'] ?>
                           <?php echo resize_picture($fichier,200,150," class='cadre' ") ?>
					
						&nbsp;
                        
						<a href="#" 
                        onclick="javascript:supprimer(
                        							'<?php echo $table ?>',
                                                    '<?php echo $ligne['id'];?>',
                                                    '<?php echo $page ?>',
                                                    '<?php echo $noms_retour ?>',
                                                    '<?php echo $valeurs_retour ?>'
                                                    )" 
                        class="supprimer2" >
							&nbsp;
						</a>
					
					</td>
			<?php if ($i%3==0) 
				{
			?>
				</tr><tr>	 
			<?php } 
			$i++;
			}?>
												
			
			  </tr>
		</table>
	</td>
	</tr>
	</table>
	</form>
<?php

}

function getNb($table,$champ,$id){
	
	//Formuler champ=valeur and ....
	$tab_champs = explode(',',$champ);
	$tab_valeurs = explode(',',$id);
	
	$chaine = "";
	
	for($i=0;$i<sizeof($tab_champs);$i++){
		$chaine .= $tab_champs[$i] ."='".  $tab_valeurs[$i] ."' and ";
	}
	$chaine = substr($chaine,0,strlen($chaine)-5);
	
	//
	$sql_get = "
			select count(*) as nb 
			
			from ". $table ."
			
			where ". $chaine;
			
	$res_get = doQuery($sql_get);
	$ligne_get = mysql_fetch_array($res_get) or die(mysql_error());
	
	return $nb = $ligne_get['nb'];
}

function getSum($table,$colonne,$champ,$id){
	
	//Formuler champ=valeur and ....
	$tab_champs = explode(',',$champ);
	$tab_valeurs = explode(',',$id);
	
	$chaine = "";
	
	for($i=0;$i<sizeof($tab_champs);$i++){
		$chaine .= $tab_champs[$i] ."='".  $tab_valeurs[$i] ."' and ";
	}
	$chaine = substr($chaine,0,strlen($chaine)-5);
	
	//
	//echo "______<br>";
	$sql_get = "
			select sum(". $colonne .") as total 
			
			from ". $table ."
			
			where ". $chaine;
	//echo "<br>______<br><br>";
			
	$res_get = doQuery($sql_get);
	$ligne_get = mysql_fetch_array($res_get) or die(mysql_error());
	
	if ($ligne_get['total'] == "") return "0";
	return $ligne_get['total'];
}

function getSumByJours($table,$colonne,$champ,$id,$champ2,$debut,$fin){
	
	//Formuler champ=valeur and ....
	$tab_champs = explode(',',$champ);
	$tab_valeurs = explode(',',$id);
	
	$chaine = "";
	
	for($i=0;$i<sizeof($tab_champs);$i++){
		$chaine .= $tab_champs[$i] ."='".  $tab_valeurs[$i] ."' and ";
	}
	$chaine = substr($chaine,0,strlen($chaine)-5);
	
	//
	//echo "______<br>";
	$sql_get = "
			select sum(". $colonne .") as total 
			
			from ". $table ."
			
			where ". $chaine ." 
			and ".$champ2." between ". $debut." and ". $fin;
	//echo "<br>______<br><br>";
			
	$res_get = doQuery($sql_get);
	$ligne_get = mysql_fetch_array($res_get) or die(mysql_error());
	
	if ($ligne_get['total'] == "") return "0";
	return $ligne_get['total'];
}



function getTimeByDate($date,$sep){
	
	$tab = explode($sep,$date);
			
	$annee = $tab[2];
	$mois = $tab[0];
	$jour = $tab[1];
	
	return mktime(0,0,0,$mois,$jour,$annee);
}


//fonction de pagination
//recuperer le nombre de page en fonction du nombre de message que nous avons défini
/*
function getNbrPages($requete,$messagesParPage){
		connect ();
		selectDb ();
		$retour_total=doQuery($requete) or die("ERREUR : ".mysql_error()); 
		//Nous récupérons le contenu de la requête dans $retour_total
		$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
		$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
		//Nous allons maintenant compter le nombre de pages.
		$nombreDePages=ceil($total/$messagesParPage);
		return $nombreDePages;
}

*/
//recuperer le numero de la page actuelle
function getPageActuelle($nombreDePages){
		if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
		{
			 $pageActuelle=intval($_GET['page']);
			 
			 if($pageActuelle>$nombreDePages) 
			 // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
			 {
				  $pageActuelle=$nombreDePages;
			 }
		}
		else // Sinon
		{
			 $pageActuelle=1; // La page actuelle est la n°1    
		}
		return 	$pageActuelle;
}


//affichage du systeme de navigation
function AffichagePagination($page,$pageActuelle,$nombreDePages){
	echo '<p align="center">'; //Pour l'affichage, on centre la liste des pages
	//precedent
		if($pageActuelle>1) //Si il s'agit de la page actuelle...
				 {
					 $j=$pageActuelle-1;
					 echo ' <a href="'.$page.'page='.$j.'"><< '. formater_texte("Page Précédente") .'</a> ';
					 //echo ' <a href="'.$page.','.$j.'.html"><< '. formater_texte("Page Précédente") .'</a> ';
				 }	

		 
	//fin precedent	 
	 if ($nombreDePages!=1){
		for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
		{
			 //On va faire notre condition
			 if($i==$pageActuelle) //Si il s'agit de la page actuelle...
				 {
					 echo ' [ '.$i.' ] '; 
				 }	
			 else //Sinon...
				 {
					  echo ' <a href="'.$page.'page='.$i.'">'.$i.'</a> ';
					  //echo ' <a href="'.$page.','.$i.'.html">'.$i.'</a> ';
				 }		 
		}
	}	
	//suivant
		if($pageActuelle<$nombreDePages) //Si il s'agit de la page actuelle...
				 {
					 $j=$pageActuelle+1;
					 echo ' <a href="'.$page.'page='.$j.'">'. formater_texte("Page Suivante") .' >></a> ';
					 //echo ' <a href="'.$page.','.$j.'.html">'. formater_texte("Page Suivante") .' >></a> ';
				 }	
		 
	//fin suivant	 
echo '</p>';
}

//fin fonction de pagination


//fonction pour inseré des image pour le nbr d'etoiles
function image_etoile($etoile){
	if ($etoile=="1") return "1.png";
	if ($etoile=="2") return "2.png";
	if ($etoile=="3") return "3.png";
	if ($etoile=="4") return "4.png";
	if ($etoile=="5") return "5.png";
	if ($etoile=="6") return "5.png";
	if ($etoile=="7") return "0.png";
}
//pour generer un mot de pass aliatoire
function newChaine( $chrs = "") {
		if( $chrs == "" ) $chrs = 8;
		$chaine = ""; 
		$list = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		mt_srand((double)microtime()*1000000);
		$newstring="";
		while( strlen( $newstring )< $chrs ) {
			$newstring .= $list[mt_rand(0, strlen($list)-1)];
		}
		return $newstring;
	}
	
//cette fonction permet de récuperer la date du jour suivant (yyyy/mm/jj) à une date donné	
function date_jour_suivant($date_a){
	$tab=split("/",$date_a);
	 $annee=intval($tab[0]);
	 $mois=intval($tab[1]);
	 $jour=intval($tab[2]);
	//recupererle nbr de jour du mois en cours
	if($mois==4 || $mois==6 || $mois==9 || $mois==11 ){
		$nbr_jour=30;
	} 
	else if( $mois==02 ){
			if($annee%4==0){
				$nbr_jour=29;
			}
			else {
				$nbr_jour=28;
			}	
	}
	else {
		$nbr_jour=31;
	}
	//echo $nbr_jour;
	$annee=sprintf("%02d", $annee);
	$mois=sprintf("%02d", $mois);
	if($jour<$nbr_jour){
		
		$jour_suivant=sprintf("%02d", $jour+1);
		$date_suivante=$annee."/".$mois."/".$jour_suivant;
	}
	else if($jour==$nbr_jour and $mois==12){
		$annee_suivante=sprintf("%02d", $annee+1);
		$date_suivante=$annee_suivante."/01/01";	
	}	 
	else{
		$mois_suivant=sprintf("%02d", $mois+1);
		$date_suivante=$annee."/".$mois_suivant."/01";
	}
	return $date_suivante;	
}

function formater_texte($t){
	//return htmlentities(stripslashes($t));
	return htmlentities(stripslashes($t));
}

function formater_texte2($t){
	return html_entity_decode(stripslashes($t));
}

function envoi_mail($dest,$url){
	
//envoyer un msg de confirmation par mail
$headers ='From: "Ecole Maternelle"<achraf_fssm@hotmail.com>'."\n";
$headers .='Reply-To: a.mareshal@gmail.com'."\n"; 
$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
$headers .='Content-Transfer-Encoding: 8bit';
$sujet = "Mot de passe oublier";
$message = '<html><head><title>'.$sujet.'</title></head><body>Clickez sur cette lien pour renitialiser votre mot de passe <a href="'.$url.'">Cliquez-ici</a></body></html>';

if (mail($dest, $sujet, $message, $headers)){
	$msg = _ENVOI_OK;
}
else
{
	$msg_err = _ENVOI_NOK;
}
redirect($url);
//redirect("forgot-password?msg=".$msg."&err=".$msg_err);
}

function random($car) {
	$string = "";
	$chaine = "abcdefghijklmnpqrstuvwxy0123456789";
	srand((double)microtime()*1000000);
	for($i=0; $i<$car; $i++) {
		$string .= $chaine[rand()%strlen($chaine)];
	}
	return $string;
}
function getTabList($tab,$nom,$valeur,$change,$libelle){
?>

<select class="form-control show-tick" data-live-search="true" name = "<?php echo $nom ?>" <?php echo $change ?> id="<?php echo $libelle ?>_required">	
	
    <option value="">____</option>
	
	<?php
    foreach($tab as $c => $v){
    
        $s = "";
        
        if ($valeur == $c){
            $s = "selected";
        }
    ?>
        <option value="<?php echo $c ?>" <?php echo $s ?>>
			<?php echo formater_texte($v) ?>
        </option>
        
    <?php
    }
	?>
	
    </select>
    
<?php
}


function getPrixTtc($prix,$taux){
	return $prix + ($prix * ($taux / 100 )); 
}


function getTableList($table,$nom,$valeur,$champ,$change,$where,$libelle,$update){
	//echo $table."<br>".$nom."<br>".$valeur."<br>".$champ."<br>".$change."<br>".$where."<br>".$libelle."<br>".$update."<br>";
	$sql = "select * from ". $table ." ". $where ." order by ". $champ;
	$res = doQuery($sql);
	?>
	
	<select class="form-control show-tick" data-live-search="true"  id ="<?php echo $update ?>" name="<?php echo $nom ?>" <?php echo $change ?> 
	id="<?php echo $libelle ?>_required">
		<option value="">____</option>
	<?php
	while($ligne = mysql_fetch_array($res)){	
		
		$s = "";
		
		if ($valeur == $ligne['id']){
			$s = "selected";
		}
	?>
		<option value="<?php echo $ligne['id'] ?>" <?php echo $s ?>>
			<?php echo $ligne[$champ] ?>
		</option>
	<?php
	}
	?>
	</select>
<?php
}

function getTableList3($table,$nom,$valeur,$champ,$champ2,$change,$where,$libelle){
	
	$sql = "select * from ". $table ." ". $where ." order by ". $champ;
	$res = doQuery($sql);
	?>
	
	<select class="form-control show-tick" data-live-search="true" name="<?php echo $nom ?>" <?php echo $change ?> 
	id="<?php echo $libelle ?>_required">
		
		<option value="">____</option>
		
	<?php
	while($ligne = mysql_fetch_array($res)){	
		
		$s = "";
		
		if ($valeur == $ligne['id']){
			$s = "selected";
		}
	?>
		<option value="<?php echo $ligne['id'] ?>" <?php echo $s ?>>
			<?php echo $ligne[$champ]." ".$ligne[$champ2] ?>
		</option>
	<?php
	}
	?>
	</select>

<?php
}

function getTableList2($table,$nom,$valeur,$champs,$value,$change,$where,$libelle){
	
	$sql = "select * from ". $table ." ". $where ." order by ". $champs;
	$res = doQuery($sql);
	?>
	
	<select name="<?php echo $nom ?>" <?php echo $change ?> 
	id="<?php echo $libelle ?>_required">
		
		<option value="">____</option>
		
	<?php
	while($ligne = mysql_fetch_array($res)){	
		
		$s = "";
		
		if ($valeur == $ligne[$value]){
			$s = "selected";
		}
	?>
		<option value="<?php echo $ligne[$value] ?>" <?php echo $s ?>>
			<?php 
			$tab_champs = explode(',',$champs);
			
			$chn = '';
			foreach($tab_champs as $v){
				$chn .= $ligne[$v] ." => ";
			}
			echo $chn = substr($chn,0,strlen($chn)-4);
			?>
		</option>
	<?php
	}
	?>
	</select>

<?php
}

function resize_picture($fichier,$maxWidth,$maxHeight,$extras){

	# Passage des parametres dans la table : imageinfo
	$imageinfo= getimagesize("$fichier");
	$iw=$imageinfo[0];
	$ih=$imageinfo[1];
	
	# Parametres : Largeur et Hauteur souhaiter $maxWidth, $maxHeight
	# Calcul des rapport de Largeur et de Hauteur
	$widthscale = $iw/$maxWidth;
	$heightscale = $ih/$maxHeight;
	$rapport = $ih/$widthscale;
	
	# Calul des rapports Largeur et Hauteur a afficher
	if($rapport < $maxHeight)
		{$nwidth = $maxWidth;}
	 else
		{$nwidth = $iw/$heightscale;}
	 if($rapport < $maxHeight)
		{$nheight = $rapport;}
	 else
		{$nheight = $maxHeight;}
	
	# Affichage
	echo " <img src=$fichier width=\"$nwidth\" height=\"$nheight\" $extras>";
}

//Les menus imbriqués
function afficher_menu($parent, $niveau, $array) {
				 
	$html = "";
	$niveau_precedent = 0;
	 
	if (!$niveau && !$niveau_precedent) $html .= "\n<ul id='style'>\n";
	 
	foreach ($array AS $noeud) {
	 	
		if ($parent == $noeud['parent_id']) {
	 
		if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";
	 		
			$etat = "<img src='images/".$noeud['etat_categorie'].".png' width='11'>";
			
			$lien = $noeud['nom_categorie'];
			
			$html .= "<li>". $lien;
		 
			$niveau_precedent = $niveau;
		 
			$html .= afficher_menu($noeud['categorie_id'], ($niveau + 1), $array);
	 
		}
	}
	 
	if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</ul>\n</li>\n";
	else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
	else $html .= "</li>\n";
	 
	return $html;
	 
}

//Les menus imbriqués
function afficher_menu2($parent, $niveau, $array) {
				 
	$html = "";
	$niveau_precedent = 0;
	 
	if (!$niveau && !$niveau_precedent) $html .= "\n<ul>\n";
	 
	foreach ($array AS $noeud) {
	 
		if ($parent == $noeud['parent_id']) {
	 
		if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";
	 		
			$etat = "<img src='images/".$noeud['etat_categorie'].".png' width='11'>";
			
			$lien = "";
			
			if (getNb('articles','id_categories',$noeud['categorie_id']) != 0){
				$nb = "<span class='small'>". getNb('articles','id_categories',$noeud['categorie_id']) ."</span>";
				
				$lien = "<a href='articles.php?id=". $noeud['categorie_id']."'>". $noeud['nom_categorie'] ." (". $nb .")</a>";
			}
			else
				$lien = $noeud['nom_categorie'];
			
			$html .= "<li class='espace'>". $lien;
		 
			$niveau_precedent = $niveau;
		 
			$html .= afficher_menu2($noeud['categorie_id'], ($niveau + 1), $array);
	 
		}
	}
	 
	if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</ul>\n</li>\n";
	else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
	else $html .= "</li>\n";
	 
	return $html;
	 
}

//Les menus imbriqués
function afficher_menu3($parent, $niveau, $array) {
				 
	$html = "";
	$niveau_precedent = 0;
	$classcss = "";
	
	if($niveau == 0)
		$idcss="smenu"; 
	else
		$idcss=""; 
	
	if (!$niveau && !$niveau_precedent){
		$html .= "\n<ul id='". $idcss ."' class='niveau1'>\n";
	}
	 
	foreach ($array AS $noeud) {
	 	
		if ($parent == $noeud['parent_id']) {
	 
		if ($niveau_precedent < $niveau) $html .= "\n<ul class='niveau". ($niveau+1) ."'>\n";
			
			$lien = $noeud['nom_categorie'];
			
			if (getNb('categories','parent',$noeud['categorie_id']) != 0){
					$lien = "<a href='categories.php?id=". $noeud['categorie_id']."'>". $noeud['nom_categorie'] ."</a>";
			}
			elseif (getNb('articles','id_categories',$noeud['categorie_id']) != 0){
					$lien = "<a href='categories.php?id=". $noeud['categorie_id']."'>". $noeud['nom_categorie'] ."</a>";
			}
			
			$html .= "<li>". $lien;
			
			$niveau_precedent = $niveau;
		 
			$html .= afficher_menu3($noeud['categorie_id'], ($niveau + 1), $array);
	 
		}
	}
	 
	if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</ul>\n</li>\n";
	else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
	else $html .= "</li>\n";
	 
	return $html;
	 
}

//Les menus imbriqués
function afficher_menu4($parent, $niveau, $array) {
				 
	$html = "";
	$niveau_precedent = 0;
	
	if (!$niveau && !$niveau_precedent){
		$html .= "\n<ul>\n";
	}
	 
	foreach ($array AS $noeud) {
	 	
		if ($parent == $noeud['parent_id']) {
	 
		if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";
			
			$lien = $noeud['nom_categorie'.$_SESSION['lang']];
						
			if (getNb('categories','parent',$noeud['categorie_id']) != 0){
					$lien = $noeud['nom_categorie'.$_SESSION['lang']];
			}
			elseif (getNb('articles','id_categories',$noeud['categorie_id']) != 0){
					
					$lien = $noeud['nom_categorie'.$_SESSION['lang']];
					$lien .= "<ul>";
					
					//Lister les articles
					$sql_artls2 = "SELECT * FROM articles where etat=1 and id_categories =".$noeud['categorie_id'];
					$res_artls2 = doQuery($sql_artls2);
					while($ligne_artls2 = mysql_fetch_array($res_artls2)){
						$lien .= "	<li>
										<a href='article.php?id=". $ligne_artls2['id']  ."'>"
											.$ligne_artls2['nom'.$_SESSION['lang']].
										"</a>
									</li>";
					}
					
					$lien .= "</ul>";
			}
			
			$html .= "<li>". $lien;
			
			$niveau_precedent = $niveau;
		 
			$html .= afficher_menu4($noeud['categorie_id'], ($niveau + 1), $array);
		}
	}
	 
	if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</ul>\n</li>\n";
	else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
	else $html .= "</li>\n";
	 
	return $html;
}

//Les menus imbriqués
function afficher_menu5($parent, $niveau, $array) {
				 
	$html = "";
	$niveau_precedent = 0;
	 
	if (!$niveau && !$niveau_precedent) $html .= "\n<ul>\n";
	 
	foreach ($array AS $noeud) {
	 
		if ($parent == $noeud['parent_id']) {
	 
		if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";
	 		
			$etat = "<img src='images/".$noeud['etat_categorie'].".png' width='11'>";
			
			$lien = "";
			$lien = $noeud['nom_categorie'];
			$lien = $lien . "&nbsp;<a href='modifier_appartenances.php?id=". $noeud['categorie_id'] ."' class='modifier'>&nbsp;</a>";
			
			$html .= "<li class='espace'>". $lien;
		 
			$niveau_precedent = $niveau;
		 
			$html .= afficher_menu5($noeud['categorie_id'], ($niveau + 1), $array);
	 
		}
	}
	 
	if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</ul>\n</li>\n";
	else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
	else $html .= "</li>\n";
	 
	return $html;
	 
}

//Les menus imbriqués page accueil site public
function afficher_menu6($parent, $niveau, $array) {
				 
	$html = "";
	$niveau_precedent = 0;
	
	if (!$niveau && !$niveau_precedent){
		$html .= "\n<ul>\n";
	}
	 
	foreach ($array AS $noeud) {
	 	
		if ($parent == $noeud['parent_id']) {
	 
		if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";
			
			$lien = "<a href='#'>". $noeud['nom_categorie'.$_SESSION['lang']] ."</a>";
			
			if (getNb('categories','parent',$noeud['categorie_id']) != 0){
					$lien = "<a href='#'>". $noeud['nom_categorie'.$_SESSION['lang']] ."</a>";
			}
			elseif (getNb('articles','id_categories',$noeud['categorie_id']) != 0){
					$lien = "<a href='#'>". $noeud['nom_categorie'.$_SESSION['lang']] ."</a>";
					
					$lien = "<a href='#'>". $noeud['nom_categorie'.$_SESSION['lang']] ."</a>";
					$lien .= "<ul>";
					
					//Lister les articles
					$sql_artls = "SELECT * FROM articles where etat=1 and id_categories =".$noeud['categorie_id'];
					$res_artls = doQuery($sql_artls);
					while($ligne_artls = mysql_fetch_array($res_artls)){
						$lien .= "	<li>
										<a href='article.php?id=". $ligne_artls['id']  ."'>"
											.$ligne_artls['nom'.$_SESSION['lang']].
										"</a>
									</li>";
					}
					
					$lien .= "</ul>";
			}
			
			$html .= "<li>". $lien;
			
			$niveau_precedent = $niveau;
		 
			$html .= afficher_menu6($noeud['categorie_id'], ($niveau + 1), $array);
	 
		}
	}
	 
	if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= " </ul>\n</li>\n";
	else if ($niveau_precedent == $niveau) $html .= " </ul>\n";
	else $html .= " </li>\n";
	 
	return $html;
	 
}

function afficher_menus($menus){
 
//Afficher les menus
$sql_menus = "select * from menus where libelle = '". $menus ."' order by id";		
$res_menus = doQuery($sql_menus);

$nb_menus = mysql_num_rows($res_menus);
if( $nb_menus == 0){
	
}
else
{
	while ($ligne_menus = mysql_fetch_array($res_menus)){
	
		//Afficher les elements de chaque menus
		$sql_elements_menus = "	select * from menus_elements 
								where id_menus = '". $ligne_menus['id'] ."' and etat=1 order by id";
		$res_elements_menus = doQuery($sql_elements_menus);
		
		$nb_elements_menus = mysql_num_rows($res_elements_menus);
		if( $nb_elements_menus == 0){
			
		}
		else
		{
		 
			while ($ligne_elements_menus = mysql_fetch_array($res_elements_menus)){
			?>

			<div id="menu_left">
				<h2><?php echo formater_constantes($ligne_elements_menus['libelle']); ?></h2>
				<ul>
			
				<?php
				//Afficher les liens de chaque elements menus
				$sql_liens_elements_menus = "select * from menus_elements_liens where id_menus_elements = '". $ligne_elements_menus['id'] ."' and etat=1 order by ordre";		
				$res_liens_elements_menus = doQuery($sql_liens_elements_menus);
				
				$nb_liens_elements_menus = mysql_num_rows($res_liens_elements_menus);
				if( $nb_liens_elements_menus == 0){
					
				}
				else
				{
				
					while ($ligne_liens_elements_menus = mysql_fetch_array($res_liens_elements_menus)){
						
						$liens = $ligne_liens_elements_menus['id'];
						$lien_menu = $ligne_liens_elements_menus['url'];
						$libelle_menu = formater_constantes($ligne_liens_elements_menus['libelle']);
					?>
						<li>
						
						<?php 
						//Afficher les liens selon les droits
						echo afficherLiensSelonDroits($lien_menu,'','','',$libelle_menu);
						?>
						
						</li>
					<?php
					}//Fin while liens
				}
				?>
				
				</ul>
			</div>
				
			<?php
			}//Fin While elments
		}
		
	}//Fin while menus
}

}

function formater_constantes($const){
	
	$tab = explode(" ",$const);
	
	$chaine = "";
	foreach($tab as $c){
		$chaine .= constant($c) . " ";
	}
	
	return trim($chaine);
}

function getDroitUtilisateur($utilisateurs,$lien){
	
	$user_profil = getValeurChamp('id_profils','utilisateurs_profils','id_utilisateurs',$utilisateurs);
	
	$sql = "select * from profils_droits 
			where id_profils = '". $user_profil ."' and id_menus_elements_liens = '". $lien ."'";
	$res = doQuery($sql);
	
	if (mysql_num_rows($res) == 0){
		return "";	
	}
	else
	{
		$ligne = mysql_fetch_array($res);
		$droit = $ligne['etat'];
		
		return $droit;
	}
}

function getDroitProfil($profil,$lien){
	
	$sql = "select * from profils_droits where id_profils = '". $profil ."' and id_menus_elements_liens = '". $lien ."'";		
	$res = doQuery($sql);
	
	if (mysql_num_rows($res) == 0){
		return "";	
	}
	else
	{
		$ligne = mysql_fetch_array($res);
		$droit = $ligne['etat'];
		
		return $droit;
	}
}

function afficherLiensSelonDroits($lien,$params,$class,$titre,$libelle){
	
	//Ajouter le lien si n'existe pas bd
	$nb_lien = getNb('menus_elements_liens','url',$lien);
	if($nb_lien == 0){

		$table = 'menus_elements_liens';
			$_REQUEST['id_menus_elements'] = '49';
			$_REQUEST['url'] = $lien;
			$_REQUEST['libelle'] = $lien;
			$_REQUEST['definitions'] = $lien;
		Ajout($table,getNomChamps($table),$_REQUEST);
		
	}
	//Ajouter le lien si n'existe pas bd
	
	if($_SESSION['type'] == 'user'){

		$id_page = getValeurChamp('id','menus_elements_liens','url',$lien);
		$droit = getDroitUtilisateur($_SESSION['utilisateurs'],$id_page);
		if($droit == "") $droit = 0;
		
		if ($droit == 1){
		?>
			<a href="<?php echo $lien ?>?<?php echo $params ?>#ancre" 
            class="<?php echo $class ?>" title="<?php echo $titre ?>">
				<?php echo $libelle ?>
			</a>
		<?php 
		}
		else
		{
		?>
			<a href="#ancre" class="<?php echo $class ?>gele" 
            title="<?php echo $titre ?>"><?php echo $libelle ?></a>
		<?php
		}
	
	}
	else
	{
	?>
		<a href="<?php echo $lien ?>?<?php echo $params ?>#ancre" 
        class="<?php echo $class ?>" title="<?php echo $titre ?>">
			<?php echo $libelle ?>
		</a>
	<?php 
	}

}

function afficherLiensSupprimerSelonDroits($lien,$table,$id,$page,$noms_retour,$valeurs_retour,$titre){
	
	//Ajouter le lien si n'existe pas bd
	$nb_lien = getNb('menus_elements_liens','url',$lien);
	if($nb_lien == 0){

		$table = 'menus_elements_liens';
			$_REQUEST['id_menus_elements'] = '49';
			$_REQUEST['url'] = $lien;
			$_REQUEST['libelle'] = $lien;
			$_REQUEST['definitions'] = $lien;
		Ajout($table,getNomChamps($table),$_REQUEST);
		
	}
	//Ajouter le lien si n'existe pas bd
	
	if($_SESSION['type'] == 'user'){

		$id_page = getValeurChamp('id','menus_elements_liens','url',$lien);
		$droit = getDroitUtilisateur($_SESSION['utilisateurs'],$id_page);
		if($droit == "") $droit = 0;
		
		if ($droit == 1){
		?>
            <a href="#ancre" class="supprimer2" onclick="javascript:supprimer('<?php echo $table ?>','<?php echo $id ?>','<?php echo $page ?>','<?php echo $noms_retour ?>','<?php echo $valeurs_retour ?>')" title="<?php echo _SUPPRIMER ?> <?php echo $titre ?>">&nbsp;</a>
		<?php 
		}
		else
		{
		?>
			<a href="#ancre" class="supprimer2" title="<?php echo $titre ?>">&nbsp;</a>
		<?php
		}
	
	}
	else
	{
	?>
		<a href="#ancre" class="supprimer2" onclick="javascript:supprimer('<?php echo $table ?>','<?php echo $id ?>','<?php echo $page ?>','<?php echo $noms_retour ?>','<?php echo $valeurs_retour ?>')" title="<?php echo _SUPPRIMER ?> <?php echo $titre ?>">&nbsp;</a>
	<?php 
	}
}

function verifierDroitPage($libelle_page){
	
	if($_SESSION['type'] == 'user'){
		
		$exceptions = array(1=>'index.php');
		$var = array_search('aa.php',$exceptions) ;
		
		$page = getValeurChamp('id','menus_elements_liens','url',$libelle_page);
		
		$droit = getDroitUtilisateur($_SESSION['utilisateurs'],$page);
		if ($droit == "") $droit = 0;
		
		if ($droit == 0) 
			//redirect('index.php?er='. _ERREUR_DROITS);
			echo _ERREUR_DROITS;
	}
}

function dateToTime($date,$sep){
	$tab_d = explode($sep,$date);
			
	$annee = $tab_d[2];
	$jour = $tab_d[1];
	$mois = $tab_d[0];
	
	
	return mktime(0,0,1,$mois,$jour,$annee);
}

function formater_date($date,$sep){
		
	$tab_d = explode($sep,$date);
	
	$annee = $tab_d[2];
	$mois = $tab_d[1];
	$jour = $tab_d[0];
	
	$hr = date("G");
	$mint = date("i");
	$sec = date("s");
	
	return mktime($hr,$mint,$sec,$mois,$jour,$annee);
}

function ajouter_trace($champ,$operation,$table,$type,$user,$date){
	
	//Trace
	$tb = $table;
	$_REQUEST['id_champs'] = $champ;
	$_REQUEST['operation'] = $operation;
	$_REQUEST['table_operation'] = $table;
	$_REQUEST['type_utilisateurs'] = $type;
	$_REQUEST['id_utilisateurs'] = $user;
	$_REQUEST['date'] = $date;
	
	Ajout($tb,getNomChamps($tb),$_REQUEST);
	//Fin Trace	
}

function formater_montant($montant){
	$chaine = '';
	
	$tab_mnt = explode('.',$montant);
	
	for($i=1;$i<=strlen($tab_mnt[0]);$i++){
		
		$car = substr($tab_mnt[0],-$i,1);
		
		if($i%3 == 0)
			$chaine .= $car .' ';
		else
			$chaine .= $car;
	}
	
	for($j=1;$j<=strlen($chaine);$j++){
		$c .= substr($chaine,-$j,1);
	}
	
	$dec = $tab_mnt[1];
	if($tab_mnt[1] == '') $dec = "00";
	
	return $c .'.'. $dec;
}

function stripAccents($string){
	return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function no_accent($str_accent) {
   $pattern = Array("/é/", "/è/", "/ê/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/");
   // notez bien les / avant et après les caractères
   $rep_pat = Array("e", "e", "e", "c", "a", "a", "i", "i", "u", "o");
   $str_noacc = preg_replace($pattern, $rep_pat, $str_accent);
   return $str_noacc;
}

function traiter_pj($subject) {
	$pattern     = '`[^[:alnum:]]`';
	$replacement = '_';
	
	echo preg_replace($pattern, $replacement, $subject);
}

function getLastInscription($idEleves) {
	$sql = "select max(id) as maxIds from inscriptions where id_eleves=".$idEleves;
	$res = doQuery($sql);
	$ligne = mysql_fetch_array($res);
	return  $ligne['maxIds'];		 
}


function getSumAbsenceEleveByMonth($idEleves,$mois,$anneScolaire){
	$m = $mois <=4 ? $mois + 8 : $mois - 4;
	$anneScolaire= getValeurChamp('libelle','annees_scolaires','id',$anneScolaire);	
	$year = split("-", $anneScolaire);
	$y = $mois <=4 ? $year[0] : $year[1];
	$startMonth = date("Y-m-d",strtotime($y."-".($m<10?"0".$m:$m)."-01"));
	$endMonth = date("Y-m-t",strtotime($y."-".($m<10?"0".$m:$m)."-01"));
	
	$sql = "select sum(nbr_heurs) as tot from absences_eleves where id_eleves=".$idEleves." and ((date_debut>'$startMonth' and date_debut<'$endMonth') or (date_debut<'$startMonth' and date_fin>'$startMonth'))";
	$res = doQuery($sql);
	 $nb = mysql_num_rows($res);

	$tot =0;
	if( $nb==0){
		return 0;
	}
	else
	{
		while ($ligne = mysql_fetch_array($res)){
			$tot = $ligne['tot'];
		}
	}
	return $tot>0?$tot:"0";
}

function getSumAbsenceEmployeByMonth($idEmploye,$mois,$anneScolaire){
	$m = $mois <=4 ? $mois + 8 : $mois - 4;
	$anneScolaire= getValeurChamp('libelle','annees_scolaires','id',$anneScolaire);	
	$year = split("-", $anneScolaire);
	$y = $mois <=4 ? $year[0] : $year[1];
	$startMonth = date("Y-m-d",strtotime($y."-".($m<10?"0".$m:$m)."-01"));
	$endMonth = date("Y-m-t",strtotime($y."-".($m<10?"0".$m:$m)."-01"));
	
	$sql = "select sum(nbr_heurs) as tot from absences_employes where id_employes=".$idEmploye." and ((date_debut>'$startMonth' and date_debut<'$endMonth') or (date_debut<'$startMonth' and date_fin>'$startMonth'))";
	$res = doQuery($sql);
	 $nb = mysql_num_rows($res);

	$tot =0;
	if( $nb==0){
		return 0;
	}
	else
	{
		while ($ligne = mysql_fetch_array($res)){
			$tot = $ligne['tot'];
		}
	}
	return $tot>0?$tot:"0";
}

function getSumRetardsEleveByMonth($idEleves,$mois,$anneScolaire){
	$m = $mois <=4 ? $mois + 8 : $mois - 4;
	$anneScolaire= getValeurChamp('libelle','annees_scolaires','id',$anneScolaire);	
	$year = split("-", $anneScolaire);
	$y = $mois <=4 ? $year[0] : $year[1];
	$startMonth = date("Y-m-d",strtotime($y."-".($m<10?"0".$m:$m)."-01"));
	$endMonth = date("Y-m-t",strtotime($y."-".($m<10?"0".$m:$m)."-01"));
	
    $sql = "select sum(nbr_heurs) as tot from retards_eleves where id_eleves=".$idEleves." and date_retards>='$startMonth' and date_retards<='$endMonth'";
	$res = doQuery($sql);
	$nb = mysql_num_rows($res);

	$tot =0;
		while ($ligne = mysql_fetch_array($res)){
			$tot = $ligne['tot'];
		}
	return $tot>0?$tot:"0";
}

function getCurrentClasses($idEleves){
    $sql = "select id_classes from inscriptions where id=(select max(id) from inscriptions where id_eleves=".$idEleves.")" ;
	$res = doQuery($sql);
	$nb = mysql_num_rows($res);

	$id =0;
	if( $nb==0){
		$id= 0;
	}
	else
	{
		while ($ligne = mysql_fetch_array($res)){
			$id = $ligne['id_classes'];
		}
	}
	return $id;
}

function getCurrentAnneesScolaires(){
	$currentYear = date('Y');
	$currentMonth = date('m');
	if($currentMonth>7){ 
		$libelle = $currentYear."-".($currentYear+1);
	} else {
		$libelle = ($currentYear-1)."-".($currentYear);
	}
	return getValeurChamp('id','annees_scolaires', 'libelle', $libelle);
}

function getIdInscription($idEleves,$idAnneScolaire){

	$sql = "select id from inscriptions where id_eleves=".$idEleves." and  id_annees_scolaire=".$idAnneScolaire ;
	$res = doQuery($sql);
	$nb = mysql_num_rows($res);

	$id =0;
	if( $nb==0){
		$id= 0;
	}
	else
	{
		while ($ligne = mysql_fetch_array($res)){
			$id = $ligne['id'];
		}
	}
	return $id;	
}

function getSumMontantEleveAnneScolaire($idEleves,$idAnneScolaire,$mois){
 
 $sql="select sum(montant) as tot,id_annees_scolaire from paiements_eleves where id_eleves=".$idEleves."  and mois=".$mois;
	$res = doQuery($sql);
	$nb = mysql_num_rows($res);

	$tot =0;
	while ($ligne = mysql_fetch_array($res)){
		if($ligne['id_annees_scolaire']==$idAnneScolaire){
			$tot=$tot+$ligne['tot'];
		}
	}
	$result = array();
	$result[0] = $tot<0?0:$tot;	
	$fraisMensuelle = getValeurChamp('frais_mensuelle','inscriptions','id',getIdInscription($idEleves,$idAnneScolaire));
	$result[1] = $tot == 0 ? 'red':($tot < $fraisMensuelle ? 'yellow':'green');
	$result[2] = $tot == 0 ? 'white':($tot < $fraisMensuelle ? 'black':'white');
	return $result;
}

function addPaiement($req,$mon,$frais){
	$sql = "INSERT INTO `paiements_eleves` ( `id_eleves`, `id_mode_paiements`, `id_annees_scolaire`, `date_paiements`, `mois`, `motif`, `montant`) VALUES ( '".$req['id_eleves']."','".$req['id_mode_paiements']."', '".$req['id_annees_scolaire']."', '".$req['date_paiements']."', '".$mon."', '".$req['motif']."', '".$frais."')";
    $res = doQuery($sql);
    writeInLogs($_SESSION['employeId'],"Ajouter paiements pour l eleve : ".getValeurChamp('nom','eleves','id',$req['id_eleves'])." ".getValeurChamp('prenom','eleves','id',$req['id_eleves']).",montant : ".$frais." du mois :".$mon);
}

function getMontantAPayer($id_eleves){
	$idInscription = getLastInscription($id_eleves);
	$idAnneScolaire = getValeurChamp('id_annees_scolaire','inscriptions','id',$idInscription);
	$fraisInscription = getValeurChamp('frais_inscription','inscriptions','id',$idInscription);
	$fraisMensuelle = getValeurChamp('frais_mensuelle','inscriptions','id',$idInscription);
	$nbrMonth = 1;
	$moisInscription = split("-",getValeurChamp('date_inscription','inscriptions','id',$idInscription))[1];
	$mm = intval($moisInscription);
	$mm  = $mm<9 ?9:$mm;
	
	while ($mm!=date("m")) {
		$nbrMonth = $nbrMonth + 1;
		$mm=$mm+1;
		$mm = $mm==13?1:$mm;
	}
	
	$fraisApayer = $nbrMonth*$fraisMensuelle + $fraisInscription;
	$sql = "select sum(montant) as sommeP,id_annees_scolaire from paiements_eleves where  id_eleves=".$id_eleves;
	$res = doQuery($sql);

	$montantPayer =0;
	while ($ligne = mysql_fetch_array($res)){
		if($ligne['id_annees_scolaire']==$idAnneScolaire){
			$montantPayer = $montantPayer+$ligne['sommeP'];
		}
	}
	return $fraisApayer - $montantPayer;
}

function paiementsNonPaye($id_annees_scolaire){

	$sql = "select * from eleves where id in (select id_eleves from inscriptions where id_annees_scolaire=".$id_annees_scolaire.")";
	$res = doQuery($sql);

	$tab =[];
	$i = 0;
	while ($ligne = mysql_fetch_array($res)){
		$montant = getMontantAPayer($ligne['id']);
		if($montant>0){
			$tab[$i][0]=$ligne['id'];
			$tab[$i][1]=$ligne['nom']." ".$ligne['prenom'];
			$tab[$i][2]=$montant;
			$i=$i+1;
		}
	}
	return $tab;
}

function getAllTasksNotComplete(){

	$sql = "select * from tasks where taux<100 order by taux desc";
	$res = doQuery($sql);

	$tab =[];
	$i = 0;
	while ($ligne = mysql_fetch_array($res)){
			$tab[$i][0]=$ligne['description'];
			$tab[$i][1]=$ligne['taux'];
			$tab[$i][2]=$ligne['id'];
			$i=$i+1;
	}
	return $tab;
}

function getmontantInscription($idEleves,$idAnneScolaire){
	$sql = "SELECT * FROM `paiements_eleves` WHERE `id_eleves`=".$idEleves." AND `mois`=0";
	$res = doQuery($sql);

	$tot =0;
	$i = 0;
	while ($ligne = mysql_fetch_array($res)){
		if($ligne['id_annees_scolaire']==$idAnneScolaire){
			$tot=$tot+$ligne['montant'];
		}
	}
	return $tot;
}
/**
* @param $idUser
* @param $description 
*/
function writeInLogs($idUser,$description){
	$dateOperation = date('Y-m-d H:i:s');
	$sql="INSERT INTO logs(id_users,date_operation,description) VALUES (".$idUser.",'".$dateOperation."','".$description."')";
	$res = doQuery($sql);
}

function getNombreJour($d1,$d2){
		$dureesejour = (strtotime($d2) - strtotime($d1));
		return $dureesejour/(60*60*24);
}

function getClass($idEleves,$idAnneScolaire){
	$sql = "SELECT * FROM `inscriptions` WHERE `id_eleves`=".$idEleves;
	$res = doQuery($sql);

	$idClasses =0;
	$i = 0;
	while ($ligne = mysql_fetch_array($res)){
		if($ligne['id_annees_scolaire']==$idAnneScolaire){
			$idClasses=$ligne['id_classes'];
		}
	}
	return $idClasses;
}
?>
