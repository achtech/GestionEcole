<?php $categorie=3;$page="avances_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _AVANCES ?>
                </h2>
                <div> 
                    	<a href="ajouter_avances.php" class="ajouter">
			        		<?php echo _AJOUTER ?> <?php echo _AVANCES ?> 
			    		 </a>		
				</div>
 
            </div>
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                            	<?php 
									$sql = "select * from avances order by id";		
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
                                            <th><?php echo _EMPLOYES ?></th>
                                            <th><?php echo _MODE  ?><?php echo _PAIEMENTS ?></th>
                                            <th><?php echo _DATE ?></th>
                                            <th><?php echo _MONTANT ?></th>
                                            <th><?php echo _MOTIFS ?></th>
                                            <th><?php echo _ANNEES ?> <?php echo _SCOLAIRES ?></th>
											<th class="op"> <?php echo _OP ?> </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _EMPLOYES ?></th>
                                            <th><?php echo _MODE  ?><?php echo _PAIEMENTS ?></th>
                                            <th><?php echo _DATE ?></th>
                                            <th><?php echo _MONTANT ?></th>
                                            <th><?php echo _MOTIFS ?></th>
                                            <th><?php echo _ANNEES ?> <?php echo _SCOLAIRES ?></th>
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
                                        <tr>
                                            <td>
												<?php echo getValeurChamp('nom','employes','id',$ligne['id_mode_paiements']) ?> <?php echo getValeurChamp('prenom','employes','id',$ligne['id_mode_paiements']) ?>
								               
								            </td>
											<td>
												<?php echo getValeurChamp('libelle','mode_paiements','id',$ligne['id_mode_paiements']) ?>
								               
								            </td>
								            <td>
												<?php echo $ligne['date_avance'] ?>
								               
								            </td>
								            <td>
												<?php echo $ligne['motif'] ?>
								               
								            </td>
								            <td>
												<?php echo $ligne['montant'] ?>
								               
								            </td>
								            <td>
												<?php echo getValeurChamp('libelle','annees_scolaires','id',$ligne['id_annees_scolaire']) ?>
								               
								            </td>
											<td class="op">
												<a href="modifier_avances.php?avances=<?php echo $ligne['id'] ?>" class="modifier2">
													&nbsp;
								                </a>
												
												&nbsp;
												
								                <a href="#ancre" 
								                class="supprimer2" 
								                onclick="javascript:supprimer(
								                							'avances',
								                                            '<?php echo $ligne['id'] ?>',
								                                            'avances_employes.php',
								                                            '1',
								                                            '1')
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
            <!-- #END# Exportable Table -->

<?php require_once('footer.php'); ?>