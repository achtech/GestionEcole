<?php $categorie=3;$page="avances_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _MODIFIER ?> <?php echo _AVANCES ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="m"/>
            <input type="hidden" name="table" value="avances"/>
            <input type="hidden" name="page" value="avances_employes.php" />
            
             <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['avances'] ?>"/>  
                                
                                <input type="hidden" name="id_noms_retour" value="avances"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['avances'] ?>"/>  

            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _EMPLOYES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
<?php  echo getTableList3('employes','id_employes',getValeurChamp('id_employes','conges','id',$_REQUEST['avances']),'nom','prenom','','','id_employes') ?>                                        </div>
                                    </div>

                                    <label for="email_address"><?php echo _DATE." "._AVANCES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_avance" name="date_avance" class="datepicker form-control" value="<?php echo getValeurChamp('date_avance','avances','id',$_REQUEST['avances']) ?>">
                                        </div>
                                    </div>

                                   <label for="email_address"><?php echo _MONTANT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="montant" name="montant" class="form-control"  value="<?php echo getValeurChamp('montant','avances','id',$_REQUEST['avances']) ?>">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _ANNEES." "._SCOLAIRES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php  echo getTableList('annees_scolaires','id_annees_scolaire',getValeurChamp('id_annees_scolaire','avances','id',$_REQUEST['avances']),'libelle','','','id_annees_scolaire') ?>
                                        </div>
                                    </div>
                                    <label for="email_address"><?php echo _MODE." de "._PAIEMENTS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php  echo getTableList3('mode_paiements','id_mode_paiements',getValeurChamp('id_mode_paiements','avances','id',$_REQUEST['avances']),'libelle','','','id_mode_paiements') ?>


                                        </div>                                        
                                    </div>
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif" ><?php echo getValeurChamp('motif','avances','id',$_REQUEST['avances']) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />            
            <input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />

        </form>
                       
            

<?php require_once('footer.php'); ?>