<?php $categorie=4;$page="etablissements"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
                                <?php 
                                    $sql = "SELECT * FROM `etablissements`  order by id";       
                                    $res = doQuery($sql);
                                    $nb = mysql_num_rows($res);
                                    $ligne = "";
                                    while ($ligne = mysql_fetch_array($res)){
                                        $etablissements =$ligne;
                                    } 

                                ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _ETABLISSEMENT ?>
                </h2>
                <div> 
                    	<a href="modifier_etablissements.php?etablissements=<?php echo $etablissements['id']; ?>" class="ajouter">
			        		<?php echo _MODIFIER ?> <?php echo _ETABLISSEMENT ?> 
			    		 </a>		
				</div>
 
            </div>
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <form id="wizard_with_validation" method="POST">
                            <div class="table-responsive">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">                                      
                                        <img src="images/<?php echo $etablissements['image']; ?>" style="width:90%;height:100%" >
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <fieldset>
                                            <div class="form-group form-float">
                                                <div class="form-line focused warning">                                                 
                                                        <label class="form-control" name="warning" value="Warning" ><i class="material-icons">home</i> : <?php echo $etablissements['nom']; ?></label> 
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused error">
                                                    <label class="form-control" name="error" value="Error" ><i class="material-icons">phone</i> : <?php echo $etablissements['tel']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <label class="form-control" name="success" value="Success"><i class="material-icons">phone_android</i> : <?php echo $etablissements['mobile']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused warning">
                                                    <label class="form-control" name="warning" value="Warning" ><i class="material-icons">picture_in_picture</i> : <?php echo $etablissements['fax']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused error">
                                                    <label class="form-control" name="error" value="Error"><i class="material-icons">email</i> : <?php echo $etablissements['email']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <label class="form-control design-label" name="success" value="Success"><i class="material-icons">account_balance</i> : <?php echo $etablissements['adresse']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused warning">
                                                        <label class="form-control" name="warning" value="Warning"><img src="images/facebook.jpg"> <?php echo $etablissements['page_facebook']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused error">
                                                    <label class="form-control" name="error" value="Error"><img src="images/twitter.png"> <?php echo $etablissements['page_twitter']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <label class="form-control" name="success" value="Success"><img src="images/googlePlus.png"> <?php echo $etablissements['google_plus']; ?></label>
                                                </div>
                                            </div>
                                    </fieldset> 
                                </div>                            
                            </div>

                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

<?php require_once('footer.php'); ?>