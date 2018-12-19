<?php $categorie=4;$page="logs"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _JOURNAL ?>
                </h2> 
            </div>
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                            	<?php 
									$sql = "select * from logs order by id";		
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
                                            <th><?php echo _DATE ?></th>
                                            <th><?php echo _NOM ?></th>
                                            <th><?php echo _DESCRIPTION ?></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <th><?php echo _DATE ?></th>
                                            <th><?php echo _NOM ?></th>
                                            <th><?php echo _DESCRIPTION ?></th>                                        </tr>
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
                                            <td>
													<?php echo $ligne['date_operation'] ?>
								            </td>
                                            <td>
													<?php echo getValeurChamp('nom','employes','id',getValeurChamp('id_employes','users','id',$ligne['id_users']))." ".getValeurChamp('prenom','employes','id',getValeurChamp('id_employes','users','id',$ligne['id_users'])) ?>
								            </td>
                                            <td>
													<?php echo $ligne['description'] ?>
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