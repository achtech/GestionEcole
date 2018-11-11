<?php $categorie=4;$page="salles"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _SALLES ?>
                </h2>
                <div> 
                    	<a href="ajouter_salles.php" class="ajouter">
			        		<?php echo _AJOUTER ?> <?php echo _SALLES ?> 
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
									$sql = "select * from salles order by id";		
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
                                            <th><?php echo _TYPE ?></th>
                                            <th><?php echo _NOMBRE_PLACES ?></th>
											<th class="op"> <?php echo _OP ?> </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM ?></th>
                                            <th><?php echo _TYPE ?></th>
                                            <th><?php echo _NOMBRE_PLACES ?></th>
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
													<?php echo $ligne['libelle'] ?>
								            </td>
								            <td>	<?php echo $tab_salles[$ligne['type']] ?></td>
								            <td>	<?php echo $ligne['nbr_place'] ?></td>
											<td class="op">
												<a href="modifier_salles.php?salles=<?php echo $ligne['id'] ?>" class="modifier2">
													&nbsp;
								                </a>
												
												&nbsp;
												
								                <a href="#ancre" 
								                class="supprimer2" 
								                onclick="javascript:supprimer(
								                							'salles',
								                                            '<?php echo $ligne['id'] ?>',
								                                            'salles.php',
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