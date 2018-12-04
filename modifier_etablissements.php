<?php $categorie=4;$page="etablissements"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _MODIFIER ?> <?php echo _ETABLISSEMENT ?>
                </h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
							<form action="gestion.php" name="frm" method="post" enctype="multipart/form-data"	onsubmit="return checkForm(document.frm);" >
								<input type="hidden" name="act" value="m"/>
							    <input type="hidden" name="table" value="etablissements"/>
								<input type="hidden" name="page" value="etablissements.php"/>

                                <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['etablissements'] ?>"/>  
                                
                                <input type="hidden" name="id_noms_retour" value="etablissements"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['etablissements'] ?>"/>  
                           
                            <div class="row clearfix">
                                <div class="col-md-6">
 
                                <label for="email_address"><?php echo _LOGO ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="photo" name="photo" class="form-control">
                                        <img src="images/<?php echo getValeurChamp('image','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>

                                <label for="email_address"><?php echo _NOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nom" name="nom" class="form-control" value="<?php echo getValeurChamp('nom','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>

                                <label for="email_address"><?php echo _TEL ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="tel" name="tel" class="form-control" value="<?php echo getValeurChamp('tel','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>
 

                                <label for="email_address"><?php echo _MOBILE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo getValeurChamp('mobile','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>
 

                                <label for="email_address"><?php echo _FAX ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="fax" name="fax" class="form-control" value="<?php echo getValeurChamp('fax','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                    
                                <label for="email_address"><?php echo _EMAIL ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email" name="email" class="form-control" value="<?php echo getValeurChamp('email','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>
 
                                <label for="email_address"><?php echo _ADRESSE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="adresse" name="adresse" class="form-control" row="5" ><?php echo getValeurChamp('adresse','etablissements','id',$_REQUEST['etablissements']) ?></textarea>
                                    </div>
                                </div>

                                <label for="email_address"><?php echo _PAGE_FACEBOOK ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="page_facebook" name="page_facebook" class="form-control" value="<?php echo getValeurChamp('page_facebook','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>


                                <label for="email_address"><?php echo _PAGE_TWITTER ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="page_twitter" name="page_twitter" class="form-control" value="<?php echo getValeurChamp('page_twitter','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>


                                <label for="email_address"><?php echo _GOOGLE_PLUS ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="google_plus" name="google_plus" class="form-control" value="<?php echo getValeurChamp('google_plus','etablissements','id',$_REQUEST['etablissements']) ?>">
                                    </div>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />            <input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />

                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            

<?php require_once('footer.php'); ?>