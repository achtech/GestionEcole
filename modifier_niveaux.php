<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _MODIFIER ?> <?php echo _NIVEAUX ?>
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
							    <input type="hidden" name="table" value="niveaux"/>
								<input type="hidden" name="page" value="niveaux.php"/>

                                <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['niveaux'] ?>"/>  
                                
                                <input type="hidden" name="id_noms_retour" value="niveaux"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['niveaux'] ?>"/>  

                                <label for="email_address"><?php echo _NOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="libelle" name="libelle" class="form-control" value="<?php echo getValeurChamp('libelle','niveaux','id',$_REQUEST['niveaux']) ?>">
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