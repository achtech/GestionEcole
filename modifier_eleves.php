<?php $categorie=1;$page="eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _MODIFIER ?> une <?php echo _INSCRIPTION ?> 
                </h2>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
            onsubmit="return checkForm(document.frm);" >
                <input type="hidden" name="act" value="m"/>
                <input type="hidden" name="table" value="eleves"/>
                <input type="hidden" name="page" value="eleves.php"/>


                <input type="hidden" name="id_nom" value="id"/>
                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['eleves'] ?>"/>  
                
                <input type="hidden" name="id_noms_retour" value="eleves"/>
                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['eleves'] ?>"/>  
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h5 class="card-inside-title">Inscription</h5>
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _NUMERO." d' "._ORDRE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="num_ordre" name="num_ordre" class="form-control" 
                                            value="<?php echo  getValeurChamp('num_ordre','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                </div>
                                
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5 class="card-inside-title">El&eacute;ve</h5>
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _NOM ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo  getValeurChamp('nom','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                    
                                    <label for="nbr_place"><?php echo _PRENOM ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo  getValeurChamp('prenom','eleves','id',$_REQUEST['eleves']) ?>" >
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _TEL." "._DOMICILES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="tel_domicile" name="tel_domicile" class="form-control" value="<?php echo  getValeurChamp('tel_domicile','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _DATE." de "._NAISSANCES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" name="date_naissance"  value="<?php echo  getValeurChamp('date_naissance','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _LIEUX." de "._NAISSANCES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="lieu_naissance" value="<?php echo  getValeurChamp('lieu_naissance','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>

                                    <label for="nbr_place"><?php echo _ECOLE." "._PRECEDENTE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="ecole_precedente" name="ecole_precedente" class="form-control" value="<?php echo  getValeurChamp('ecole_precedente','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h5 class="card-inside-title">Parents : </h5>
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _PRENOM." du "._PERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nom_pere" name="nom_pere" class="form-control" value="<?php echo  getValeurChamp('nom_pere','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _PROFESSION." du "._PERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="profession_pere" name="profession_pere" class="form-control" value="<?php echo  getValeurChamp('profession_pere','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>

                                    <label for="nbr_place"><?php echo _CIN." du "._PERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="cin_pere" name="cin_pere" class="form-control" value="<?php echo  getValeurChamp('cin_pere','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _TEL." "._GSM." des ".PARENTS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="tel_parents" name="tel_parents" class="form-control" value="<?php echo  getValeurChamp('tel_parents','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="form-label"><?php echo _ADRESSE." des "._PARENTS ?></label>
                                        <div class="form-line">
                                            <textarea name="adresse_parents" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true"><?php echo  getValeurChamp('adresse_parents','eleves','id',$_REQUEST['eleves']) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _PRENOM." et "._NOM." de la "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nom_mere" name="nom_mere" class="form-control" value="<?php echo  getValeurChamp('nom_mere','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>

                                     <label for="nbr_place"><?php echo _PROFESSION." du "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="profession_mere" name="profession_mere" class="form-control" value="<?php echo  getValeurChamp('profession_mere','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>

                                    <label for="nbr_place"><?php echo _CIN." de la "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="cin_mere" name="cin_mere" class="form-control" value="<?php echo  getValeurChamp('cin_mere','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>


                                    <label class="form-label"><?php echo _TEL." de la "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="tel_mere" name="tel_mere" class="form-control" value="<?php echo  getValeurChamp('tel_mere','eleves','id',$_REQUEST['eleves']) ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label ><?php echo _ADRESSE." "._PERSONNELS ?></label>
                                        <div class="form-line">
                                            <textarea name="adresse_personnels" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true"><?php echo  getValeurChamp('adresse_personnels','eleves','id',$_REQUEST['eleves']) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />            <input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />
        </form>
<?php require_once('footer.php'); ?>