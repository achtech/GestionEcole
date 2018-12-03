<?php $categorie=2;$page="paiements_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _AJOUTER ?> <?php echo _PAIEMENTS ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="m"/>
            <input type="hidden" name="table" value="paiements_employes"/>
            <input type="hidden" name="page" value="details_paiement_employes.php" />
            <input type="hidden" name="id_employes" value="<?php echo isset($_REQUEST['employes'])?$_REQUEST['employes']:'' ?>"/>
            <input type="hidden" name="id_annees_scolaire" value="<?php echo isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'' ?>"/>
            
            <input type="hidden" name="id_noms_retour" value="employes,id_annees_scolaire"/>
            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['employes'] ?>,<?php echo $_REQUEST['id_annees_scolaire'] ?>"/>  

            <input type="hidden" name="id_nom" value="id"/>
            <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['paiements_employes'] ?>"/>  


            <input type="hidden" name="date_paiements" value="<?php echo date('Y-m-d') ?>" />
            <input type="hidden" name="mois" value="<?php echo date('m') ?>" />

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="email_address"><?php echo _MONTANT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="montant" name="montant" class="form-control" value="<?php echo getValeurChamp('montant','paiements_employes','id',$_REQUEST['paiements_employes']); ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="email_address"><?php echo _MODE." de "._PAIEMENTS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                        <?php  echo getTableList('mode_paiements','id_mode_paiements',getValeurChamp('id_mode_paiements','paiements_employes','id',$_REQUEST['paiements_employes']),'libelle','','','id_mode_paiements') ?>

                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif"><?php echo getValeurChamp('motif','paiements_employes','id',$_REQUEST['paiements_employes']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />            
<input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<?php require_once('footer.php'); ?>