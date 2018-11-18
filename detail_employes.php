<?php $categorie=3;$page="employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _DETAIL ?> <?php echo _EMPLOYES ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
    <form action="gestion.php" name="frm" method="post" 
onsubmit="return checkForm(document.frm);" >
    <input type="hidden" name="page" value="employes.php"/>
    <fieldset>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="card-inside-title">Employe</h3>
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="email_address"><?php echo _NOM ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('nom','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                            
                            <label for="nbr_place"><?php echo _PRENOM ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('prenom','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _TEL ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('tel','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                            <label for="email_address"><?php echo _EMAIL ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('email','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _CIN ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('cin','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _SEXES ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                        <?php
                                        echo $tab_sexe[getValeurChamp('sexe','employes','id',$_REQUEST['employes'])];
                                        ?> 
                                </div>
                            </div>
                            </div>
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _POLITESSE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                        <?php
                                        echo $tab_politesse[getValeurChamp('politesse','employes','id',$_REQUEST['employes'])];
                                        ?> 
                                </div>
                            </div>
                            </div>

                            <label for="nbr_place"><?php echo _CNSS ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('cnss','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label ><?php echo _ADRESSE ?></label>
                                <div class="form-line">
                                    <?php echo getValeurChamp('adresse','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </fieldset>
    <fieldset>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="card-inside-title">Fonction</h3>
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <label for="email_address"><?php echo _FONCTION ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('fonction','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="nbr_place"><?php echo _FORMATEUR ?>? </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('isFormateur','employes','id',$_REQUEST['employes']) ?>Non
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="nbr_place"><?php echo _VACATAIRE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('isVacataire','employes','id',$_REQUEST['employes']) ?>Non
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _DATE." "._EMBAUCHE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('date_embauche','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <label for="nbr_place"><?php echo _DATE." d'"._ARRET ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('date_arret','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </fieldset>  
    <fieldset>   
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="card-inside-title">Paiements</h3>
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _BANQUE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('banques','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _RIB ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo getValeurChamp('rib','employes','id',$_REQUEST['employes']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </fieldset>                     
	<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _RETOURE ?>" />
</form>
                       
            

<?php require_once('footer.php'); ?>