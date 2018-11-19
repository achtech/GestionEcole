<?php $categorie=1;$page="eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _NOUVELLE ?> <?php echo _INSCRIPTION ?> 
                </h2>
            </div>
            <!-- Vertical Layout -->
<form action="" name="f1" method="post" >
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h5 class="card-inside-title">Inscription</h5>
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <label for="nbr_place"><?php echo _ANNEES ?> <?php echo _SCOLAIRES ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php  echo getTableList('annees_scolaires','id_annees_scolaire',isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'','libelle','','','id_annees_scolaire') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="email_address"><?php echo _NIVEAUX ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php  echo getTableList('niveaux','id_niveaux',isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'','libelle','onchange="document.f1.submit()"','','id_niveaux') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="email_address"><?php echo _CLASSES ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php  echo getTableList('classes','id_classes',isset($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'','libelle','onchange="document.f1.submit()"',isset($_REQUEST['id_niveaux']) && isset($_REQUEST['id_annees_scolaire'])?' where id_niveaux='.$_REQUEST['id_niveaux'].' and id_annees_scolaire='.$_REQUEST['id_annees_scolaire']:'','id_classes') ?>
                                </div>
                            </div>
                        </div>
       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form id="wizard_with_validation" method="POST">
                                <input type="hidden" name="act" value="ajouter_eleves"/>
    <input type="hidden" name="table" value="eleves"/>
    <input type="hidden" name="page" value="eleves.php"/>
    <input type="hidden" name="id_annees_scolaire" value="<?php echo isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'' ?>"/>
    <input type="hidden" name="id_niveaux" value="<?php echo isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'' ?>"/>
    <input type="hidden" name="id_classes" value="<?php echo isset($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'' ?>"/>
    <input type="hidden" name="num_ordre" value="<?php echo isset($_REQUEST['num_ordre'])?$_REQUEST['num_ordre']:'' ?>"/>
    <input type="hidden" name="num_inscription" value="<?php echo isset($_REQUEST['num_inscription'])?$_REQUEST['num_inscription']:'' ?>"/>
                                <h3>El&eacute;ve</h3>
                                <fieldset>
                                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _NUMERO." d' "._ORDRE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="num_ordre" name="num_ordre" class="form-control" required="true">
                                </div>
                            </div>

                            <label for="email_address"><?php echo _NOM ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nom" name="nom" class="form-control" required="true">
                                </div>
                            </div>
                            
                            <label for="nbr_place"><?php echo _PRENOM ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="prenom" name="prenom" class="form-control"  required="true" >
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _TEL." "._DOMICILES ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tel_domicile" name="tel_domicile" class="form-control" value="test">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email_address"><?php echo _NUMERO." "._INSCRIPTION ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="num_inscription" name="num_inscription" class="form-control" value="<?php echo isset($_REQUEST['num_inscription'])?$_REQUEST['num_inscription']:'' ?>">
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _DATE." de "._NAISSANCES ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                 <!--   <input type="text" class="datepicker form-control" name="date_naissance" placeholder="Please choose a date..."> -->
                                    <input type="text" class="datepicker form-control" name="date_naissance" placeholder="Please choose a date..."> 
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _LIEUX." de "._NAISSANCES ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lieu_naissance" value="test">
                                </div>
                            </div>

                            <label for="nbr_place"><?php echo _ECOLE." "._PRECEDENTE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ecole_precedente" name="ecole_precedente" class="form-control" value="test">
                                </div>
                            </div>
                        </div>
                    </div>
                    </fieldset>

                    <h3>Parents</h3>
                    <fieldset>
                        <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="email_address"><?php echo _PRENOM." du "._PERE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nom_pere" name="nom_pere" class="form-control" value="test">
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _PROFESSION." du "._PERE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="profession_pere" name="profession_pere" class="form-control" value="test">
                                </div>
                            </div>

                            <label for="nbr_place"><?php echo _CIN." du "._PERE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="cin_pere" name="cin_pere" class="form-control" value="test">
                                </div>
                            </div>
                            <label for="nbr_place"><?php echo _TEL." "._GSM." des ".PARENTS ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tel_parents" name="tel_parents" class="form-control" value="test">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="form-label"><?php echo _ADRESSE." des "._PARENTS ?></label>
                                <div class="form-line">
                                    <textarea name="adresse_parents" cols="30" rows="5" class="form-control no-resize"  aria-required="true"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _PRENOM." et "._NOM." de la "._MERE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nom_mere" name="nom_mere" class="form-control" value="test">
                                </div>
                            </div>

                             <label for="nbr_place"><?php echo _PROFESSION." du "._MERE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="profession_mere" name="profession_mere" class="form-control" value="test">
                                </div>
                            </div>

                            <label for="nbr_place"><?php echo _CIN." de la "._MERE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="cin_mere" name="cin_mere" class="form-control" value="test">
                                </div>
                            </div>


                            <label class="form-label"><?php echo _TEL." de la "._MERE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tel_mere" name="tel_mere" class="form-control" value="test">
                                </div>
                            </div>

                            <div class="form-group">
                                <label ><?php echo _ADRESSE." "._PERSONNELS ?></label>
                                <div class="form-line">
                                    <textarea name="adresse_personnels" cols="30" rows="5" class="form-control no-resize"  aria-required="true"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                  </fieldset>
                   <h3>Paiements</h3>
                    <fieldset>
                       <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _FRAIS." d'"._INSCRIPTION ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="frais_inscription" name="frais_inscription" required="true" class="form-control" value="2500">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <label for="nbr_place"><?php echo _FRAIS." "._MENSUELLE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="frais_mensuelle" name="frais_mensuelle" required="true" class="form-control" value="1100">
                                </div>
                            </div>
                        </div>
                    </div>
                  </fieldset>
                  <div style="padding:10px;">
                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _AJOUTER ?>" />
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>