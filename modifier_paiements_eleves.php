<?php $categorie=1;$page="paiements_eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _MODIFIER ?> <?php echo _RETARDS ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="m"/>
            <input type="hidden" name="table" value="paiements_eleves"/>
            <input type="hidden" name="page" value="details_paiement_eleves.php" />
            <input type="hidden" name="id_eleves" value="<?php echo isset($_REQUEST['eleves'])?$_REQUEST['eleves']:'' ?>"/>
            <input type="hidden" name="id_annees_scolaire" value="<?php echo isset($_REQUEST['annees_scolaire'])?$_REQUEST['annees_scolaire']:'' ?>"/>
            
            <input type="hidden" name="id_noms_retour" value="eleves,annees_scolaire,paiements"/>
            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['eleves'] ?>,<?php echo $_REQUEST['annees_scolaire'] ?>,<?php echo $_REQUEST['paiements'] ?>"/>  

            <input type="hidden" name="id_nom" value="id"/>
            <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['paiements'] ?>"/>  

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">

                                    <label for="nbr_place"><?php echo _DATE." "._PAIEMENTS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_paiements" name="date_paiements" class="datepicker form-control date" value="<?php echo getValeurChamp('date_paiements','paiements_eleves','id',$_REQUEST['paiements']); ?>" >
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _MOIS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php getTabList($tab_mois,"mois",getValeurChamp('mois','paiements_eleves','id',$_REQUEST['paiements']),$change,_ETAT); ?>
                                        </div>
                                    </div>
                                    <label for="email_address"><?php echo _MODE." de "._PAIEMENTS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <?php  echo getTableList('mode_paiements','id_mode_paiements',getValeurChamp('id_mode_paiements','paiements_eleves','id',$_REQUEST['paiements']),'libelle','','','id_mode_paiements') ?>

                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _MONTANT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="montant" name="montant" class="form-control" value="<?php echo getValeurChamp('montant','paiements_eleves','id',$_REQUEST['paiements']); ?>">
                                        </div>
                                        
                                    </div>
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif"><?php echo getValeurChamp('motif','paiements_eleves','id',$_REQUEST['paiements']); ?></textarea>
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