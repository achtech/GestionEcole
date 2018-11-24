<?php $categorie=1;$page="paiements_eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> des <?php _PAIEMENTS ?> des <?php echo _ELEVES ?>
                </h2>
            </div>
<!-- Exportable Table -->
            <!-- Vertical Layout -->
            <form action="" name="f1" method="get"  >
                <?php 
	                $id_classes=0;
                    $id_niveaux=0;    
                    $id_annees_scolaire=0;
                    $whereClass ="";
                    if(isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire'])){
                        $id_classes=isset($_REQUEST['id_classes']) && !empty($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'';
                        $id_niveaux=isset($_REQUEST['id_niveaux']) && !empty($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'';    
                        $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'';
                    }else if(isset($_REQUEST['id_niveaux']) && !empty($_REQUEST['id_niveaux'])){
                        $id_classes=isset($_REQUEST['id_classes']) && !empty($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'';
                        $id_niveaux=isset($_REQUEST['id_niveaux']) && !empty($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'';    
                        $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'';
                    }

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
                                            <label for="email_address"><?php echo _NIVEAUX ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
        											<?php  echo getTableList('niveaux','id_niveaux',$id_niveaux,'libelle','','','id_niveaux') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="email_address"><?php echo _CLASSES ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
													<?php   echo getTableList('classes','id_classes', $id_classes,'libelle','','','id_classes') ?>
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
                                $whereEleves ="";
                                if(isset($_REQUEST['id_classes']) && !empty($_REQUEST['id_classes'])){
                                    $whereEleves = "where id in(select id_eleves from inscriptions where id_classes=".$_REQUEST['id_classes'].")";
                                } elseif (isset($_REQUEST['id_niveaux']) && !empty($_REQUEST['id_niveaux'])) {
                                    $whereEleves = "where id in(select id_eleves from inscriptions where id_classes in(select id from classes where id_niveaux=".$_REQUEST['id_niveaux']."))";
                                } elseif (isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire'])) {
                                    $whereEleves = "where id in(select id_eleves from inscriptions where id_classes in(select id from classes where id_annees_scolaire=".$_REQUEST['id_annees_scolaire']."))";
                                } else {
                                    $id_annees_scolaire = getCurrentAnneesScolaires();
                                    $whereEleves = "where id in(select id_eleves from inscriptions where id_classes in(select id from classes where id_annees_scolaire=".$id_annees_scolaire."))";
                                }
                                $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire']) ? $_REQUEST['id_annees_scolaire']:getCurrentAnneesScolaires();
                                     $sql = "select * from eleves ".$whereEleves." order by id";        
        
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
                                            <th><?php echo _FRAIS ?> d' <?php echo _INSCRIPTION ?></th>
                                            <?php for($i=1;$i<=count($tab_mois);$i++){
                                                echo "<th>".$tab_mois[$i]."</th>";
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM ?></th>
                                            <th><?php echo _FRAIS ?> d'<?php echo  _INSCRIPTION ?></th> 
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
$montantInscription = getmontantInscription($ligne['id'],$id_annees_scolaire);
$fraisInscription = getValeurChamp('frais_inscription','inscriptions','id',getLastInscription($ligne['id']));
$back = $montantInscription == 0 ? 'red':($montantInscription < $fraisInscription ? 'yellow':'green');
$font = $montantInscription == 0 ? 'white':($montantInscription < $fraisInscription ? 'black':'white');
                                            ?>
                                        <tr>
                                            <td>
                                                <a href="details_paiement_eleves.php?eleves=<?php echo  $ligne['id']?>&annees_scolaire=<?php echo  $id_annees_scolaire ?>"><?php echo $ligne['prenom']." ".$ligne['nom'] ?></a>
                                            </td>
                                            <td style="background:<?php echo $back ?>;color:<?php echo $font ?>;text-align:center">
                                                <?php echo $montantInscription; ?>
                                            </td>
                                            <?php for($i=1;$i<=count($tab_mois);$i++){
                                                $tab = getSumMontantEleveAnneScolaire($ligne['id'],$id_annees_scolaire,$i>4?$i-4:$i+8);
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