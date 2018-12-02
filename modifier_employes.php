<?php $categorie=3;$page="employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _NOUVELLE ?> <?php echo _EMPLOYES ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
    <form action="gestion.php" name="frm" method="post" 
onsubmit="return checkForm(document.frm);" >
    <input type="hidden" name="act" value="m"/>
    <input type="hidden" name="table" value="employes"/>
    <input type="hidden" name="page" value="employes.php"/>

    <input type="hidden" name="id_nom" value="id"/>
    <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['employes'] ?>"/>  
                            
    <input type="hidden" name="id_noms_retour" value="employes"/>
    <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['employes'] ?>"/>  

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
                                    <input type="text" value="<?php echo getValeurChamp('nom','employes','id',$_REQUEST['employes']) ?>"  id="nom" name="nom" class="form-control" required="true">
                                </div>
                            </div>
                            
                            <label for="nbr_place"><?php echo _PRENOM ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('prenom','employes','id',$_REQUEST['employes']) ?>" id="prenom" name="prenom" class="form-control"  required="true" >
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _TEL ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('tel','employes','id',$_REQUEST['employes']) ?>" id="tel" name="tel" class="form-control" >
                                </div>
                            </div>
                            <label for="email_address"><?php echo _EMAIL ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('email','employes','id',$_REQUEST['employes']) ?>"  id="email" name="email" class="form-control" >
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _CIN ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('cin','employes','id',$_REQUEST['employes']) ?>"  id="cin" name="cin" class="form-control" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _SEXES ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                        <?php
                                        getTabList($tab_sexe,"sexe",getValeurChamp('sexe','employes','id',$_REQUEST['employes']),'',_SEXE);
                                        ?> 
                                </div>
                            </div>
                            </div>
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _POLITESSE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                        <?php
                                        getTabList($tab_politesse,"politesse",getValeurChamp('politesse','employes','id',$_REQUEST['employes']),'',_POLITESSE);
                                        ?> 
                                </div>
                            </div>
                            </div>

                            <label for="nbr_place"><?php echo _CNSS ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('cnss','employes','id',$_REQUEST['employes']) ?>"  id="cnss" name="cnss" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label ><?php echo _ADRESSE ?></label>
                                <div class="form-line">
                                    <textarea name="adresse" cols="30" rows="9" class="form-control no-resize" required="" aria-required="true"><?php echo getValeurChamp('adresse','employes','id',$_REQUEST['employes']) ?></textarea>
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
                                    <input type="text" value="<?php echo getValeurChamp('fonction','employes','id',$_REQUEST['employes']) ?>"  id="fonction" name="fonction" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="nbr_place"><?php echo _DATE." "._EMBAUCHE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('date_embauche','employes','id',$_REQUEST['employes']) ?>"  id="date_embauche" name="date_embauche" class="datepicker form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">

                            <label for="nbr_place"><?php echo _DATE." d'"._ARRET ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('date_arret','employes','id',$_REQUEST['employes']) ?>"  id="date_arret" name="date_arret" class="datepicker form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="email_address"><?php echo _FORMATEUR ?> : </label>
                            <div class="demo-radio-button">
                        <?php $checkedYes = getValeurChamp('isFormateur','employes','id',$_REQUEST['employes'])==1?"checked='checked'":"" ?> 
                        <?php $checkedNo = getValeurChamp('isFormateur','employes','id',$_REQUEST['employes'])==0?"checked='checked'":"" ?> 
                            <input type="radio" name="isFormateur" id="oui"  value="1" <?php echo $checkedYes ?>/>
                            <label for="oui">Oui</label>
                            <input type="radio" name="isFormateur" id="non" value="0"  <?php echo $checkedNo ?>/>
                            <label for="non">Non</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="nbr_place"><?php echo _VACATAIRE ?> : </label>
                            <div class="demo-radio-button">
                        <?php $checkedYes = getValeurChamp('isVacataire','employes','id',$_REQUEST['employes'])==1?"checked='checked'":"" ?> 
                        <?php $checkedNo = getValeurChamp('isVacataire','employes','id',$_REQUEST['employes'])==0?"checked='checked'":"" ?> 
                                    <input type="radio" name="isVacataire" id="oui"  value="1" <?php echo $checkedYes ?>/>
                                    <label for="oui">Oui</label>
                                    <input type="radio" name="isVacataire" id="non" value="0" <?php echo $checkedNo ?>/>
                                    <label for="non">Non</label>
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
                        <div class="col-sm-5">
                            <label for="nbr_place"><?php echo _BANQUE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('banques','employes','id',$_REQUEST['employes']) ?>"  id="banques" name="banques" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                             <label for="nbr_place"><?php echo _RIB ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo getValeurChamp('rib','employes','id',$_REQUEST['employes']) ?>"  id="rib" name="rib" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="nbr_place"><?php echo _SALAIRE." "._MENSUELLE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="salaire_mensuelle" name="salaire_mensuelle" class="form-control" value="<?php echo getValeurChamp('salaire_mensuelle','employes','id',$_REQUEST['employes']) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </fieldset>                     
	<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />            <input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />
</form>
                       
            

<?php require_once('footer.php'); ?>