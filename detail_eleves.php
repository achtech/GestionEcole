<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _DOSSIER ?> de l'<?php echo _ELEVES ?> 
                    <?php 
                        $idInscription = getLastInscription($_REQUEST['eleves']);
                        $id_classes=getValeurChamp('id_classes','inscriptions','id',$idInscription);
                        $id_niveaux=getValeurChamp('id_niveaux','classes','id',$id_classes);
                        $id_annees_scolaire=getValeurChamp('id_annees_scolaire','classes','id',$idInscription);
                     ?>
                </h2>
            </div>
            <!-- Vertical Layout -->
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
        <?php  echo getTableList('annees_scolaires','id_annees_scolaire',$id_classes,'libelle','','','id_annees_scolaire') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="email_address"><?php echo _NIVEAUX ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
        <?php  echo getTableList('niveaux','id_niveaux',$id_niveaux,'libelle','onchange="document.f1.submit()"','','id_niveaux') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="email_address"><?php echo _CLASSES ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
<?php  echo getTableList('classes','id_classes', $id_classes,'libelle','onchange="document.f1.submit()"',isset($_REQUEST['id_niveaux']) && isset($_REQUEST['id_annees_scolaire'])?' where id_niveaux='.$_REQUEST['id_niveaux'].' and id_annees_scolaire='.$_REQUEST['id_annees_scolaire']:'','id_classes') ?>
                                                </div>
                                            </div>
                                        </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _NUMERO." d' "._ORDRE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('num_ordre','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _NUMERO." d' "._ORDRE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('num_ordre','eleves','id',$_REQUEST['eleves']) ?>
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
                                            <?php echo  getValeurChamp('nom','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                    
                                    <label for="nbr_place"><?php echo _PRENOM ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('prenom','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _TEL." "._DOMICILES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('tel_domicile','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _DATE." de "._NAISSANCES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('date_naissance','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _LIEUX." de "._NAISSANCES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('lieu_naissance','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>

                                    <label for="nbr_place"><?php echo _ECOLE." "._PRECEDENTE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('ecole_precedente','eleves','id',$_REQUEST['eleves']) ?>
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
                                            <?php echo  getValeurChamp('nom_pere','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _PROFESSION." du "._PERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('profession_pere','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>

                                    <label for="nbr_place"><?php echo _CIN." du "._PERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('cin_pere','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                    <label for="nbr_place"><?php echo _TEL." "._GSM." des ".PARENTS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('tel_parents','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="form-label"><?php echo _ADRESSE." des "._PARENTS ?></label>
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('adresse_parents','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _PRENOM." et "._NOM." de la "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('nom_mere','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>

                                     <label for="nbr_place"><?php echo _PROFESSION." du "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('profession_mere','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>

                                    <label for="nbr_place"><?php echo _CIN." de la "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('cin_mere','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>


                                    <label class="form-label"><?php echo _TEL." de la "._MERE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('tel_mere','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label ><?php echo _ADRESSE." "._PERSONNELS ?></label>
                                        <div class="form-line">
                                            <?php echo  getValeurChamp('adresse_personnels','eleves','id',$_REQUEST['eleves']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>