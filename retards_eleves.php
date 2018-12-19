<?php $categorie=1;$page="retards_eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _RETARDS ?>
                </h2>
 
            </div>
            <form action="" name="f1" method="get"  >
                <?php 
	                $id_classes=0;
                    $id_niveaux=0;    
                    $id_annees_scolaire=0;
                    $whereClass ="";
                    if(isset($_REQUEST['id_annees_scolaire'])){
                        $id_classes=isset($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'';
                        $id_niveaux=isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'';    
                        $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'';
                    }else if(isset($_REQUEST['id_niveaux'])){
                        $id_classes=isset($_REQUEST['id_classes'])?$_REQUEST['id_classes']:'';
                        $id_niveaux=isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'';    
                        $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'';
                    }
                    if(isset($_REQUEST['id_niveaux']) && !empty($_REQUEST['id_niveaux'])){
                    	$whereClass = ' where id_niveaux='.$_REQUEST['id_niveaux'];
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
                                                    <?php  echo getTableList('niveaux','id_niveaux',$id_niveaux,'libelle',"onchange='document.f1.submit()'",'','id_niveaux') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="email_address"><?php echo _CLASSES ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?php echo getTableList('classes','id_classes', $id_classes,'libelle','',$whereClass,'id_classes') ?>
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
<!-- Exportable Table -->
		<?php if(isset($_REQUEST['id_classes']) && !empty($_REQUEST['id_classes'])){?>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                            	<?php 
									$sql = "select * from eleves where id in(select id_eleves from inscriptions where id_classes=".$_REQUEST['id_classes'].") order by id";		
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
											while ($ligne = mysqli_fetch_array($res)){
												
												if($i%2==0)
													$c = "c";
												else
													$c = "";
													
											?>
                                        <tr>
                                            <td><a href="details_retards_eleves.php?eleves=<?php echo $ligne['id'] ?>&classes=<?php echo $_REQUEST['id_classes'] ?>"><?php echo $ligne['prenom']." ".$ligne['nom'] ?></a></td>
											<?php for($i=1;$i<=count($tab_mois);$i++){
												echo "<td>".getSumRetardsEleveByMonth($ligne['id'], $i,$_REQUEST['id_annees_scolaire'])."</td>";
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
        	<?php } ?>
<?php require_once('footer.php'); ?>