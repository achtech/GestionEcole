<?php $categorie=1;$page="absence_eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _AJOUTER ?> <?php echo _ABSENCE ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="a"/>
            <input type="hidden" name="table" value="absences_eleves"/>
            <input type="hidden" name="page" value="details_absences_eleves.php" />
            <input type="hidden" name="id_eleves" value="<?php echo isset($_REQUEST['eleves'])?$_REQUEST['eleves']:'' ?>"/>
            <input type="hidden" name="id_classes" value="<?php echo isset($_REQUEST['classes'])?$_REQUEST['classes']:'' ?>"/>
            
            <input type="hidden" name="id_noms_retour" value="eleves,classes"/>
            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['eleves'] ?>,<?php echo $_REQUEST['classes'] ?>"/>  

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">

                                    <label for="email_address"><?php echo _DATE." "._DEBUT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_debut" name="date_debut" class="form-control date" >
                                        </div>
                                    </div>
                                    
                                    <label for="nbr_place"><?php echo _DATE." "._FIN ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_fin" name="date_fin" class="form-control date"  >
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
                                    <div class="form-group">
                                            Oui<input type="radio" name="justifier" style="position:unset;opacity:unset;height:20px" value="1" class="form-control " />
                                            NOn<input type="radio" name="justifier" style="position:unset;opacity:unset;height:20px" value="0" class="form-control " />
                                        
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