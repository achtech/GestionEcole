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
								<input type="hidden" name="act" value="a"/>
							    <input type="hidden" name="table" value="tasks"/>
								<input type="hidden" name="page" value="tasks.php"/>

                                <label for="email_address"><?php echo _DESCRIPTION ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="description" name="description" class="form-control" >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="taux" name="taux" class="form-control" >
                                    </div>
                                </div>
                                <br>
                                		<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _AJOUTER ?>" />

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            

<?php require_once('footer.php'); ?>