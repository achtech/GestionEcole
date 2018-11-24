<?php $categorie=4;$page="conges"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _AJOUTER ?> <?php echo _CONGE ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="m"/>
            <input type="hidden" name="table" value="conges"/>
            <input type="hidden" name="page" value="conges.php" />
            
             <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['conges'] ?>"/>  
                                
                                <input type="hidden" name="id_noms_retour" value="conges"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['conges'] ?>"/>  


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _EMPLOYES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
<?php  echo getTableList3('employes','id_employes',getValeurChamp('id_employes','conges','id',$_REQUEST['conge']),'nom','prenom','','','id_employes') ?>
                                        </div>
                                    </div>

                                    <label for="email_address"><?php echo _DATE." "._DEMANDE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_demande" name="date_demande" class="datepicker form-control" value="<?php echo getValeurChamp('date_demande','conges','id',$_REQUEST['conge']) ?>">
                                        </div>
                                    </div>


                                    <label for="email_address"><?php echo _DATE." "._DEBUT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_debut" name="date_debut" class="datepicker form-control" value="<?php echo getValeurChamp('date_debut','conges','id',$_REQUEST['conge']) ?>">
                                        </div>
                                    </div>
                                    
                                    <label for="nbr_place"><?php echo _DATE." "._FIN ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_fin" name="date_fin" class="datepicker form-control"   value="<?php echo getValeurChamp('date_fin','conges','id',$_REQUEST['conge']) ?>">
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _ANNEES." "._SCOLAIRES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php  echo getTableList('annees_scolaires','id_annees_scolaire',getValeurChamp('id_annees_scolaire','conges','id',$_REQUEST['conge']),'libelle','','','id_annees_scolaire') ?>
                                        </div>
                                    </div>
<?php 
    $ss=getValeurChamp('sans_solde','conges','id',$_REQUEST['conges']);
    $ch1=$ss==1?"checked='checked'":"";
    $ch2=$ss==0?"checked='checked'":""; 
    $v=getValeurChamp('valider','conges','id',$_REQUEST['conges']);
    $ch3=$v==1?"checked='checked'":"";
    $ch4=$v==0?"checked='checked'":""; 
?>
                                    <label for="email_address"><?php echo _SANS." "._SOLDE ?> : </label>
                                    <div class="demo-radio-button">
                                            <input type="radio" name="sans_solde" id="oui"  value="1" <?php echo $ch1 ?>/>
                                            <label for="oui">Oui</label>
                                            <input type="radio" name="sans_solde" id="non" value="0" <?php echo $ch2 ?>/>
                                            <label for="non">Non</label>
                                    </div>
                                    <label for="email_address"><?php echo _VALIDER ?> : </label>
                                    <div class="demo-radio-button">
                                            <input type="radio" name="valider" id="oui1"  value="1" <?php echo $ch3 ?>/>
                                            <label for="oui1">Oui</label>
                                            <input type="radio" name="valider" id="non1" value="0" <?php echo $ch4 ?>/>
                                            <label for="non1">Non</label>
                                    </div>
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif"><?php echo getValeurChamp('motif','conges','id',$_REQUEST['conges']) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
       		<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />
        </form>
                       
            

<?php require_once('footer.php'); ?>