<?php $categorie=3;$page="absences_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _AJOUTER ?> <?php echo _ABSENCES ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="a"/>
            <input type="hidden" name="table" value="absences_employes"/>
            <input type="hidden" name="page" value="details_absences_employes.php" />
            <input type="hidden" name="id_employes" value="<?php echo isset($_REQUEST['employes'])?$_REQUEST['employes']:'' ?>"/>
            <input type="hidden" name="id_annees_scolaire" value="<?php echo getCurrentAnneesScolaires() ?>"/>
            
            <input type="hidden" name="id_noms_retour" value="employes"/>
            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['employes'] ?>"/>  

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">

                                    <label for="email_address"><?php echo _DATE." "._DEBUT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_debut" name="date_debut" class="datepicker form-control" >
                                        </div>
                                    </div>
                                    
                                    <label for="nbr_place"><?php echo _DATE." "._FIN ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_fin" name="date_fin" class="datepicker form-control"  >
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _NOMBRE." d'"._HEURE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nbr_heur" name="nbr_heurs" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _JUSTIFIER ?> : </label>
                                    <div class="demo-radio-button">
                                            <input type="radio" name="justifier" id="oui"  value="1"/>
                                            <label for="oui">Oui</label>
                                            <input type="radio" name="justifier" id="non" value="0" />
                                            <label for="non">Non</label>
                                    </div>
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
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
                            </form>
                       
            

<?php require_once('footer.php'); ?>