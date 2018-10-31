<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _AJOUTER ?> <?php echo _SALLES ?>
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
							    <input type="hidden" name="table" value="salles"/>
								<input type="hidden" name="page" value="salles.php"/>

                                <label for="email_address"><?php echo _NOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="libelle" name="libelle" class="form-control" >
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _NOMBRE_PLACES ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nbr_place" name="nbr_place" class="form-control" >
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _TYPE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php
                                        getTabList($tab_salles,"type",$valeur,$change,_ETAT);
                                        ?>
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