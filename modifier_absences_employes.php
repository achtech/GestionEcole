<?php $categorie=3;$page="absences_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _MODIFIER ?> <?php echo _ABSENCES ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="m"/>
            <input type="hidden" name="table" value="absences_employes"/>
            <input type="hidden" name="page" value="details_absences_employes.php" />
            <input type="hidden" name="id_employes" value="<?php echo isset($_REQUEST['employes'])?$_REQUEST['employes']:'' ?>"/>
            
            <input type="hidden" name="id_noms_retour" value="employes,absences"/>
            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['employes'] ?>,<?php echo $_REQUEST['absences'] ?>"/>  

            <input type="hidden" name="id_nom" value="id"/>
            <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['absences'] ?>"/>  

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">

                                    <label for="email_address"><?php echo _DATE." "._DEBUT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_debut" name="date_debut" class="datepicker form-control" value="<?php echo getValeurChamp('date_debut','absences_employes','id',$_REQUEST['absences']); ?>">
                                        </div>
                                    </div>
                                    
                                    <label for="nbr_place"><?php echo _DATE." "._FIN ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_fin" name="date_fin" class="datepicker form-control" value="<?php echo getValeurChamp('date_fin','absences_employes','id',$_REQUEST['absences']); ?>" >
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _NOMBRE." d'"._HEURE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nbr_heur" name="nbr_heurs" class="form-control" value="<?php echo getValeurChamp('nbr_heurs','absences_employes','id',$_REQUEST['absences']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _JUSTIFIER ?> : </label>
                                    <div class="form-group">
                                            <?php $checkedYes = getValeurChamp('justifier','absences_employes','id',$_REQUEST['absences'])==1?"checked='checked'":"" ?> 
                                            <?php $checkedNo = getValeurChamp('justifier','absences_employes','id',$_REQUEST['absences'])==0?"checked='checked'":"" ?> 
                                            Oui<input type="radio" name="justifier" style="position:unset;opacity:unset;height:20px" value="1" class="form-control " <?php echo  $checkedYes ?>/>
                                            NOn<input type="radio" name="justifier" style="position:unset;opacity:unset;height:20px" value="0" class="form-control " <?php echo  $checkedNo ?>/>
                                        
                                    </div>
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif"><?php echo getValeurChamp('motif','absences_employes','id',$_REQUEST['absences']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                
                           		<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />            <input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />
                            </form>
                       
            

<?php require_once('footer.php'); ?>