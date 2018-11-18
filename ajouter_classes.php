<?php $categorie=4;$page="classes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _AJOUTER ?> <?php echo _CLASSES ?>
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
							    <input type="hidden" name="table" value="classes"/>
								<input type="hidden" name="page" value="classes.php"/>

                                <label for="email_address"><?php echo _NOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="libelle" name="libelle" class="form-control" >
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _NIVEAUX ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php  echo getTableList('niveaux','id_niveaux','','libelle','','','id_niveaux') ?>

                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _ANNEES." "._SCOLAIRES ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php  echo getTableList('annees_scolaires','id_annees_scolaire','','libelle','','','id_annees_scolaire') ?>
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