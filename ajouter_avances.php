<?php $categorie=3;$page="avances_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _AJOUTER ?> <?php echo _AVANCES ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="a"/>
            <input type="hidden" name="table" value="avances"/>
            <input type="hidden" name="page" value="avances_employes.php" />
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                   <label for="email_address"><?php echo _MONTANT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="montant" name="montant" class="form-control"  >
                                        </div>
<?php $salaire  = isset($_REQUEST['employes'])  ?getValeurChamp('salaire_mensuelle','employes','id',$_REQUEST['employes']) : 0; ?>
<?php $avance = isset($_REQUEST['employes'])  ?getSumAvance($_REQUEST['employes']) : 0; ?>
<?php $reste = $salaire - $avance; ?>
                                        <label>Salaire mensuelle  : <?php echo $salaire ?>Dh</label> | 
                                        <label>Somme des avances  : <?php echo $avance ?> Dh</label> | <label>Reste  : <?php echo $reste; ?> Dh</label>
                                    </div>
                                    <label for="nbr_place"><?php echo _REMARQUE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _AJOUTER ?>" />            
            <input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />

        </form>
                       
            

<?php require_once('footer.php'); ?>