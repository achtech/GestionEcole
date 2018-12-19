<?php $categorie=1;$page="eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
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
                        <label for="nbr_place"><?php echo _TEL." "._GSM." des "._PARENTS ?> : </label>
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

<!-- #END# Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5>Etape des études dans l'etablissement</h5>
        <div class="card">
              <div class="body">
                <div class="table-responsive">
                    <?php 
                        $sql = "select * from inscriptions where id_eleves=".$_REQUEST['eleves']." order by id";    
                        $res = doQuery($sql);

                        $nb = mysqli_num_rows($res);
                        if( $nb==0){
                            echo _VIDE;
                        }
                        else
                        {
                        ?>

                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th><?php echo _ANNEES." "._SCOLAIRES ?></th>
                                <th><?php echo _NIVEAUX ?></th>
                                <th><?php echo _ABSENCES ?></th>
                                <th><?php echo _RETARDS ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 0;
                                while ($ligne = mysqli_fetch_array($res)){
                                    
                                    if($i%2==0)
                                        $c = "c";
                                    else
                                        $c = "";
                                        
                                ?>
                            <tr>
                                <td>
                                    <?php echo getValeurChamp('libelle','annees_scolaires','id',$ligne['id_annees_scolaire']) ?>
                            </td><td>
                                    <?php echo getValeurChamp('libelle','niveaux','id',getValeurChamp('id_niveaux','classes','id',$ligne['id_classes'])) ?>
                            </td><td>       
                                    <?php 
                            $idClasses = getValeurChamp("id_classes",'inscriptions','id_eleves,id_annees_scolaire',$_REQUEST['eleves'].",".$ligne['id_annees_scolaire']);
                                    echo getSum('absences_eleves','nbr_heurs','id_eleves,id_classes',$ligne['id_eleves'].",".$idClasses)." Heurs" ?>
                            </td><td>
                                    <?php  echo getSum('retards_eleves','nbr_heurs','id_eleves,id_classes',$ligne['id_eleves'].",".$idClasses)." Heurs" ?>
                                </td>
                                
                            </tr>
                            <?php
                                $i++; 
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php 
                    } //Fin If
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5>Les paiements : </h5>
        <div class="card">
              <div class="body">
                <div class="table-responsive">
                    <?php 
                        $sql = "select * from paiements_eleves where id_eleves=".$_REQUEST['eleves']." order by id";      
                        $res = doQuery($sql);

                        $nb = mysqli_num_rows($res);
                        if( $nb==0){
                            echo _VIDE;
                        }
                        else
                        {
                        ?>

                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th><?php echo _DATE." "._PAIEMENTS ?></th>
                                <th><?php echo _MOIS ?></th>
                                <th><?php echo _MOTIFS ?></th>
                                <th><?php echo _MONTANT ?></th>
                                <th><?php echo _MODE." de"._PAIEMENTS ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php echo _DATE." "._PAIEMENTS ?></th>
                                <th><?php echo _MOIS ?></th>
                                <th><?php echo _MOTIFS ?></th>
                                <th><?php echo _MONTANT ?></th>
                                <th><?php echo _MODE." de"._PAIEMENTS ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                $i = 0;
                                while ($ligne = mysqli_fetch_array($res)){
                                    
                                    if($i%2==0)
                                        $c = "c";
                                    else
                                        $c = "";
                                        
                                ?>
                            <tr><td>
                                    <?php echo $ligne['date_paiements'] ?>
                            </td><td>
                                    <?php echo $ligne['mois']==0?"Frais d'inscription":$ligne['mois'] ?>
                            </td><td>       
                                    <?php echo $ligne['motif'] ?>
                                </td>
                                <td>       
                                    <?php echo $ligne['montant'] ?>
                                </td>
                                <td>       
                                    <?php echo getValeurChamp('libelle','mode_paiements','id',$ligne['id_mode_paiements']); ?>
                                </td>
                            </tr>
                            <?php
                                $i++; 
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php 
                    } //Fin If
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>