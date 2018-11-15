<?php $categorie=1;$page="paiements_eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
<div class="block-header">
    <h2>
        <?php echo _GESTION ?> des  <?php echo _ABSENCES ?>
    </h2>
    <div> 
            <a href="ajouter_paiements_eleves.php?annees_scolaire=<?php echo $_REQUEST['annees_scolaire'] ?>&eleves=<?php echo $_REQUEST['eleves'] ?>" class="ajouter">
                <?php echo _NOUVELLE ?>  <?php echo _PAIEMENTS ?> 
             </a>       
    </div>

</div>
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5>Les paiements de l'eleve : <?php echo getValeurChamp('nom','eleves','id',$_REQUEST['eleves'])." ".getValeurChamp('prenom','eleves','id',$_REQUEST['eleves']); ?></h5>
        <div class="card">
              <div class="body">
                <div class="table-responsive">
                    <?php 
                        $sql = "select * from paiements_eleves where id_eleves=".$_REQUEST['eleves']." order by id";      
                        $res = doQuery($sql);

                        $nb = mysql_num_rows($res);
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
                                <th class="op"> <?php echo _OP ?> </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php echo _DATE." "._PAIEMENTS ?></th>
                                <th><?php echo _MOIS ?></th>
                                <th><?php echo _MOTIFS ?></th>
                                <th><?php echo _MONTANT ?></th>
                                <th><?php echo _MODE." de"._PAIEMENTS ?></th>
                                <th class="op"> <?php echo _OP ?> </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                $i = 0;
                                while ($ligne = mysql_fetch_array($res)){
                                    
                                    if($i%2==0)
                                        $c = "c";
                                    else
                                        $c = "";
                                        
                                ?>
                            <tr><td>
                                    <?php echo $ligne['date_paiements'] ?>
                            </td><td>
                                    <?php echo $ligne['mois'] ?>
                            </td><td>       
                                    <?php echo $ligne['motif'] ?>
                                </td>
                                <td>       
                                    <?php echo $ligne['montant'] ?>
                                </td>
                                <td>       
                                    <?php echo getValeurChamp('libelle','mode_paiements','id',$ligne['id_mode_paiements']); ?>
                                </td>
                                <td class="op">
                                    <a href="modifier_paiements_eleves.php?eleves=<?php echo $_REQUEST['eleves'] ?>&annees_scolaire=<?php echo $_REQUEST['annees_scolaire'] ?>&paiements=<?php echo $ligne['id'] ?>" class="modifier2" title="modifier paiements">
                                        &nbsp;
                                    </a>
                                    
                                    &nbsp;
                                    <a href="#ancre" 
                                    class="supprimer2" 
                                    onclick="javascript:supprimer(
                                                                'paiements_eleves',
                                                                '<?php echo $ligne['id'] ?>',
                                                                'details_paiement_eleves.php',
                                                                'eleves,annees_scolaire',
                                                                '<?php echo $_REQUEST['eleves'] ?>,<?php echo $_REQUEST['annees_scolaire'] ?>')
                                            " 
                                    title="<?php echo _SUPPRIMER ?>">
                                        
                                        &nbsp;
                                    </a>
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