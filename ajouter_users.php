<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _AJOUTER ?> <?php echo _UTILISATEURS ?>
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
							    <input type="hidden" name="table" value="users"/>
								<input type="hidden" name="page" value="users.php"/>

                                <label for="email_address"><?php echo _NOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php  echo getTableList3('employes','id_employes','','nom','prenom','','','id_employes') ?>
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _LOGIN ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="login" name="login" class="form-control" >
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _PASSWORD ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" name="password" class="form-control" >
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _TYPE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php
                                        getTabList($tab_roles,"role",$valeur,$change,_ETAT);
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