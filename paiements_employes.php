<?php $categorie=2;$page="paiements_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> des <?php _PAIEMENTS ?> des <?php echo _EMPLOYES ?>
                </h2>
            </div>
<!-- Exportable Table -->
            <!-- Vertical Layout -->
            <form action="" name="f1" method="get"  >
                <?php 
                    $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:getCurrentAnneesScolaires();
                    $where = "where 1=1 ";    
                if(!empty($id_annees_scolaire)) $where =$where." and id in (select id_eleves from inscriptions where id_annees_scolaire=".$id_annees_scolaire.")";
                ?>
                 <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <label for="nbr_place"><?php echo _ANNEES ?> <?php echo _SCOLAIRES ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?php  echo getTableList('annees_scolaires','id_annees_scolaire',$id_annees_scolaire,'libelle','','','id_annees_scolaire') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">

                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _RECHERCHER ?>" />
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
                            <div class="table-responsive">
                                <?php 
                                
                                $sql = "select * from employes order by id";       
    
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
                                            <th><?php echo _NOM ?></th>
                                            <?php for($i=1;$i<=count($tab_mois);$i++){
                                                echo "<th>".$tab_mois[$i]."</th>";
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM ?></th>
                                            <?php for($i=1;$i<=count($tab_mois);$i++){
                                                echo "<th>".$tab_mois[$i]."</th>";
                                            } ?>
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
                                        <tr>
                                            <td>
                                                <a href="details_paiement_employes.php?employes=<?php echo  $ligne['id']?>"><?php echo $ligne['prenom']." ".$ligne['nom'] ?></a>
                                            </td>
                                            <?php for($i=1;$i<=count($tab_mois);$i++){
                                            $tab = getSumPaiedEmployeAnneScolaire($ligne['id'],$id_annees_scolaire,$i>4?$i-4:$i+8);
                                                 echo "<td style='background:$tab[1];color:$tab[2];text-align:center'>".$tab[0]."</td>";
                                            } ?>
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