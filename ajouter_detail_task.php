<?php $categorie=4;$page="tasks"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _AJOUTER ?> <?php echo _DETAILS." de la "._TASKS." ".getValeurChamp('description','tasks','id',$_REQUEST['tasks'])  ?>
                </h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
							<form action="gestion.php" name="frm" method="post" 
							onsubmit="return checkForm(document.frm);" >
								<input type="hidden" name="act" value="a"/>
							    <input type="hidden" name="table" value="detail_tasks"/>
								<input type="hidden" name="page" value="details_tasks.php"/>

                                <input type="hidden" name="id_tasks" value="<?php echo $_REQUEST['tasks'] ?>"/>

                                <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['tasks'] ?>"/>  
                                
                                <input type="hidden" name="id_noms_retour" value="tasks"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['tasks'] ?>"/>  
                                <label for="email_address"><?php echo _DESCRIPTION ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="description" name="description" class="form-control" >
                                    </div>
                                </div>
                                <label for="email_address"><?php echo _STATUS ?> : </label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <?php getTabList($tab_status,"status","","",_STATUS); ?>
                                    </div>
                                </div>
                                <label for="email_address"><?php echo _PRIORITE ?> : </label>
                                 <div class="form-group">
                                    <div class="form-line">
                                         <?php getTabList($tab_priorite,"priorite","","",_PRIORITE); ?>
                                    </div>
                                </div>
                                <label for="email_address"><?php echo _MANAGER ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="manager" name="manager" class="form-control" >
                                    </div>
                                </div>
                                <br>
                          		    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _AJOUTER ?>" />            <input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            

<?php require_once('footer.php'); ?>