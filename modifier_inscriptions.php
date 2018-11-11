<?php $categorie=1;$page="eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _MODIFIER ?> une <?php echo _INSCRIPTION ?> 
                </h2>
            </div>
            <!-- Vertical Layout -->
            <form action="" name="f1" method="post"  >
                <?php 
                    $idInscription = getLastInscription($_REQUEST['eleves']);
                ?>

                <input type="hidden" name="eleves" value="<?php echo $_REQUEST['eleves'] ?>"/>
                
                <input type="hidden" name="id_noms_retour" value="eleves"/>
                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['eleves'] ?>"/>  
                <?php 
                    if(isset($_REQUEST['id_annees_scolaire'])){
                        $id_classes=isset($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'';
                        $id_niveaux=isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'';    
                        $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'';
                    }else if(isset($_REQUEST['id_niveaux'])){
                        $id_classes=isset($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'';
                        $id_niveaux=isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'';    
                        $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'';
                    }else{
                        $id_classes=isset($_REQUEST['id_classes'])?$_REQUEST['id_classes']:getValeurChamp('id_classes','inscriptions','id',$idInscription);
                        $id_niveaux=isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:!empty($id_classes)?getValeurChamp('id_niveaux','classes','id',$id_classes):'';
                        $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:!empty($id_classes)?getValeurChamp('id_annees_scolaire','classes','id',$id_classes):'';                        
                    }
                ?>
                 <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h5 class="card-inside-title">Inscription</h5 >
                            <div class="card">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <label for="nbr_place"><?php echo _ANNEES ?> <?php echo _SCOLAIRES ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
        <?php  echo getTableList('annees_scolaires','id_annees_scolaire',$id_annees_scolaire,'libelle','onchange="document.f1.submit()"','','id_annees_scolaire') ?>
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
                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
           <!-- Vertical Layout -->
                <?php 
                
                     $id_classes = (isset($_REQUEST['id_classes']) && !empty($_REQUEST['id_classes']))?$_REQUEST['id_classes']:getValeurChamp('id_classes','inscriptions','id',$idInscription);
                     $id_niveaux = (isset($_REQUEST['id_niveaux']) && !empty($_REQUEST['id_niveaux']))?$_REQUEST['id_niveaux']:getValeurChamp('id_niveaux','classes','id',$id_classes);
                     $id_annees_scolaire = (isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire']))?$_REQUEST['id_classes']:getValeurChamp('id_annees_scolaire','classes','id',$id_classes);

                ?>

            <form action="gestion.php" name="frm" method="post" 
            onsubmit="return checkForm(document.frm);" >
                <input type="hidden" name="act" value="m"/>
                <input type="hidden" name="table" value="inscriptions"/>
                <input type="hidden" name="page" value="eleves.php"/>
                <input type="hidden" name="id_classes" value="<?php echo $id_classes; ?>"/>
                <input type="hidden" name="id_niveaux" value="<?php echo $id_niveaux; ?>"/>
                <input type="hidden" name="id_annees_scolaire" value="<?php echo $id_annees_scolaire; ?>"/>


                <input type="hidden" name="id_nom" value="id"/>
                <input type="hidden" name="id_valeur" value="<?php echo $idInscription ?>"/>  
                
                <input type="hidden" name="id_noms_retour" value="eleves"/>
                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['eleves'] ?>"/>  
 
 <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h5 class="card-inside-title">Paiements</h5>
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="nbr_place"><?php echo _FRAIS." d'"._INSCRIPTION ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="frais_inscription" name="frais_inscription" class="form-control" value="<?php echo getValeurChamp('frais_inscription','inscriptions','id',$idInscription) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <label for="nbr_place"><?php echo _FRAIS." "._MENSUELLE ?> : </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="frais_mensuelle" name="frais_mensuelle" class="form-control"  value="<?php echo getValeurChamp('frais_mensuelle','inscriptions','id',$idInscription) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />
            </form>
<?php require_once('footer.php'); ?>