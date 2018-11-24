<?php $categorie=4;$page="tasks"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _AJOUTER ?> <?php echo _TASKS ?>
                </h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
							<form action="gestion.php" name="frm" method="post" 
							onsubmit="return checkForm(document.frm);" >
								<input type="hidden" name="act" value="m"/>
							    <input type="hidden" name="table" value="tasks"/>
								<input type="hidden" name="page" value="tasks.php"/>

                                <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['tasks'] ?>"/>  
                                
                                <input type="hidden" name="id_noms_retour" value="tasks"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['tasks'] ?>"/>  

                                <label for="email_address"><?php echo _DESCRIPTION ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="description" name="description" class="form-control" value="<?php echo getValeurChamp('description','tasks','id',$_REQUEST['tasks']) ?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="taux" name="taux" class="form-control" value="<?php echo getValeurChamp('taux','tasks','id',$_REQUEST['tasks']) ?>">
                                    </div>
                                </div>
                                <br>
                                		<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            

<?php require_once('footer.php'); ?>