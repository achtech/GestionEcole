<?php $categorie=3;$page="absences_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _ABSENCES ?>
                </h2>
 
            </div>
            <form action="" name="f1" method="get"  >
                <?php 
	                $id_classes=isset($_REQUEST['id_classes']) && !empty(isset($_REQUEST['id_classes']))?$_REQUEST['id_classes']:'';
                    $id_niveaux=isset($_REQUEST['id_niveaux']) && !empty(isset($_REQUEST['id_niveaux']))?$_REQUEST['id_niveaux']:'';    
                    $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:getCurrentAnneesScolaires();
                    $where = "";    
                    if(!empty($id_classes)) $where = " where id in (select id_employes from employes_classes where id_classes=".$id_classes.")";
                    elseif(!empty($id_niveaux)) $where = " where id in (select emp.id_employes from employes_classes emp ,classes c where c.id=emp.id_classes and c.id_niveaux=".$id_niveaux.")";
                    elseif(!empty($id_annees_scolaire)) $where = " where id in (select emp.id_employes from employes_classes emp ,classes c where c.id=emp.id_classes and c.id_annees_scolaire=".$id_annees_scolaire.")";
                ?>
                 <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h5 class="card-inside-title">Inscription</h5 >
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
                                                <div class="form-line">
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

									$sql = "select * from employes ".$where." order by id";		
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
                                            <th><?php echo _NOM ?></th>
											<?php for($i=1;$i<=count($tab_mois);$i++){
												echo "<th>".$tab_mois[$i]."</th>";
											} ?>
                                            <th><?php echo _TOTAL ?></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM ?></th>
											<?php for($i=1;$i<=count($tab_mois);$i++){
												echo "<th>".$tab_mois[$i]."</th>";
											} ?>
											
                                            <th><?php echo _TOTAL ?></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
											$i = 0;
											while ($ligne = mysqli_fetch_array($res)){
												$total = 0;
												if($i%2==0)
													$c = "c";
												else
												    	$c = "";
													
											?>
                                        <tr>
                                            <td><a href="details_absences_employes.php?employes=<?php echo $ligne['id'] ?>"><?php echo $ligne['prenom']." ".$ligne['nom'] ?></a></td>
											<?php for($i=1;$i<=count($tab_mois);$i++){
												$sum =getSumAbsenceEmployeByMonth($ligne['id'], $i,$id_annees_scolaire);
                                                $total=!empty($sum)?$sum+$total:$total;
                                                echo "<td>".$sum."</td>";
											} ?>
                                            <td><?php echo $total ?></td>
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