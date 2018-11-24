<?php $categorie=3;$page="conges"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h5>
                    <?php echo _AJOUTER ?> <?php echo _CONGE ?> 
                </h5>
            </div>
            <!-- Vertical Layout -->
            <form action="gestion.php" name="frm" method="post" 
        onsubmit="return checkForm(document.frm);" >
            <input type="hidden" name="act" value="a"/>
            <input type="hidden" name="table" value="conges"/>
            <input type="hidden" name="page" value="conges.php" />
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label for="email_address"><?php echo _EMPLOYES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
<?php  echo getTableList3('employes','id_employes','','nom','prenom','','','id_employes') ?>
                                        </div>
                                    </div>

                                    <label for="email_address"><?php echo _DATE." "._DEMANDE ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_demande" name="date_demande" class="datepicker form-control" >
                                        </div>
                                    </div>


                                    <label for="email_address"><?php echo _DATE." "._DEBUT ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_debut" name="date_debut" class="datepicker form-control" >
                                        </div>
                                    </div>
                                    
                                    <label for="nbr_place"><?php echo _DATE." "._FIN ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="date_fin" name="date_fin" class="datepicker form-control"  >
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-sm-6">
                                    <label for="nbr_place"><?php echo _ANNEES." "._SCOLAIRES ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php  echo getTableList('annees_scolaires','id_annees_scolaire','','libelle','','','id_annees_scolaire') ?>
                                        </div>
                                    </div>

                                    <label for="email_address"><?php echo _SANS." "._SOLDE ?> : </label>
                                    <div class="demo-radio-button">
                                            <input type="radio" name="sans_solde" id="oui"  value="1"/>
                                            <label for="oui">Oui</label>
                                            <input type="radio" name="sans_solde" id="non" value="0" />
                                            <label for="non">Non</label>
                                    </div>
                                    <label for="email_address"><?php echo _VALIDER ?> : </label>
                                    <div class="demo-radio-button">
                                            <input type="radio" name="valider" id="oui1"  value="1"/>
                                            <label for="oui1">Oui</label>
                                            <input type="radio" name="valider" id="non1" value="0" />
                                            <label for="non1">Non</label>
                                    </div>
                                    <label for="nbr_place"><?php echo _MOTIFS ?> : </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="motif"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
       		<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _AJOUTER ?>" />
        </form>
                       
            

<?php require_once('footer.php'); ?>