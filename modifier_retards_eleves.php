<?php $categorie=1;$page="retards_eleves"; ?>
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
            <input type="hidden" name="table" value="retards_eleves"/>
            <input type="hidden" name="page" value="details_retards_eleves.php" />
            <input type="hidden" name="id_eleves" value="<?php echo isset($_REQUEST['eleves'])?$_REQUEST['eleves']:'' ?>"/>
            <input type="hidden" name="id_classes" value="<?php echo isset($_REQUEST['classes'])?$_REQUEST['classes']:'' ?>"/>
            
            <input type="hidden" name="id_noms_retour" value="eleves,classes,retards"/>
            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['eleves'] ?>,<?php echo $_REQUEST['classes'] ?>,<?php echo $_REQUEST['retards'] ?>"/>  

            <input type="hidden" name="id_nom" value="id"/>
            <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['retards'] ?>"/>  

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">

                                    <label for="email_address"><?php echo _DATE." "._DEBUT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_retards" name="date_retards" class="datepicker form-control" value="<?php echo getValeurChamp('date_retards','retards_eleves','id',$_REQUEST['retards']); ?>">
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _NOMBRE." d'"._HEURE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nbr_heur" name="nbr_heurs" class="datepicker form-control" value="<?php echo getValeurChamp('nbr_heurs','retards_eleves','id',$_REQUEST['retards']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _JUSTIFIER ?> : </label>
                                    <div class="form-group">
                                            <?php $checkedYes = getValeurChamp('justifier','retards_eleves','id',$_REQUEST['retards'])==1?"checked='checked'":"" ?> 
                                            <?php $checkedNo = getValeurChamp('justifier','retards_eleves','id',$_REQUEST['retards'])==0?"checked='checked'":"" ?> 
                                            Oui<input type="radio" name="justifier" style="position:unset;opacity:unset;height:20px" value="1" class="form-control " <?php echo  $checkedYes ?>/>
                                            NOn<input type="radio" name="justifier" style="position:unset;opacity:unset;height:20px" value="0" class="form-control " <?php echo  $checkedNo ?>/>
                                        
                                    </div>
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif"><?php echo getValeurChamp('motif','retards_eleves','id',$_REQUEST['retards']); ?></textarea>
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