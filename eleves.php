<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> des <?php echo _ELEVES ?>
                </h2>
                <div> 
                    	<a href="ajouter_eleves.php" class="ajouter">
			        		<?php echo _NOUVELLE ?> <?php echo _INSCRIPTION ?> 
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
									$sql = "select * from eleves order by id";		
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
                                            <th><?php echo _TEL ?></th>
                                            <th><?php echo _ADRESSE ?></th>
                                            <th><?php echo _DATE." de "._NAISSANCE ?></th>
											<th class="op"> <?php echo _OP ?> </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM ?></th>
                                            <th><?php echo _TEL ?></th>
                                            <th><?php echo _ADRESSE ?></th>
                                            <th><?php echo _DATE." de "._NAISSANCE ?></th>
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
												<?php echo $ligne['prenom']." ".$ligne['nom'] ?>
										</td><td>
												<?php echo $ligne['tel_domicile'] ?>
										</td><td>
												<?php echo $ligne['adresse_parents'] ?>
										</td><td>		
												<?php echo $ligne['date_naissance'] ?>
								            </td>
											
											<td class="op">
												<a href="modifier_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="modifier2" title="modifier fiche eleve">
													&nbsp;
								                </a>
												
												&nbsp;

												<a href="modifier_inscriptions.php?eleves=<?php echo $ligne['id'] ?>" class="inscription2" title="modifier inscription">
													&nbsp;
								                </a>
												
												&nbsp;
												
								            	<a href="detail_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="details2" title="Fiche technique">
													&nbsp;
								                </a>
												
												&nbsp;
								            	<a href="paiements_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="paiements2" title="Paiement">
													&nbsp;
								                </a>
												
												
												&nbsp;
								            	<a href="absences_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="absences2" title="Absences">
													&nbsp;
								                </a>

												&nbsp;
											    <a href="#ancre" 
								                class="supprimer2" 
								                onclick="javascript:supprimer(
								                							'eleves',
								                                            '<?php echo $ligne['id'] ?>',
								                                            'eleves.php',
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                            	<?php 
									$sql = "select * from eleves order by id";		
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
                                            <th><?php echo _TEL ?></th>
                                            <th><?php echo _ADRESSE ?></th>
                                            <th><?php echo _DATE." de "._NAISSANCE ?></th>
											<th class="op"> <?php echo _OP ?> </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM ?></th>
                                            <th><?php echo _TEL ?></th>
                                            <th><?php echo _ADRESSE ?></th>
                                            <th><?php echo _DATE." de "._NAISSANCE ?></th>
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
												<?php echo $ligne['prenom']." ".$ligne['nom'] ?>
										</td><td>
												<?php echo $ligne['tel_domicile'] ?>
										</td><td>
												<?php echo $ligne['adresse_parents'] ?>
										</td><td>		
												<?php echo $ligne['date_naissance'] ?>
								            </td>
											
											<td class="op">
												<a href="modifier_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="modifier2" title="modifier fiche eleve">
													&nbsp;
								                </a>
												
												&nbsp;

												<a href="modifier_inscriptions.php?eleves=<?php echo $ligne['id'] ?>" class="inscription2" title="modifier inscription">
													&nbsp;
								                </a>
												
												&nbsp;
												
								            	<a href="detail_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="details2" title="Fiche technique">
													&nbsp;
								                </a>
												
												&nbsp;
								            	<a href="paiements_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="paiements2" title="Paiement">
													&nbsp;
								                </a>
												
												
												&nbsp;
								            	<a href="absences_eleves.php?eleves=<?php echo $ligne['id'] ?>" class="absences2" title="Absences">
													&nbsp;
								                </a>

												&nbsp;
											    <a href="#ancre" 
								                class="supprimer2" 
								                onclick="javascript:supprimer(
								                							'eleves',
								                                            '<?php echo $ligne['id'] ?>',
								                                            'eleves.php',
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

<?php require_once('footer.php'); ?>