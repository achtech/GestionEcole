<?php $categorie=4;$page='tasks'; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _DETAILS." des "._TASKS ?>
                </h2>
                <div> 
                    	<a href="ajouter_detail_task.php?tasks=<?php echo $_REQUEST['tasks'] ?>" class="ajouter">
			        		<?php echo _AJOUTER ?> <?php echo _DETAILS." des "._TASKS ?> 
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
									$sql = "select * from detail_tasks where id_tasks=".$_REQUEST['tasks']." order by id";		
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
                                            <th><?php echo _DESCRIPTION ?></th>
                                            <th><?php echo _STATUS ?></th>
											<th class="op"> <?php echo _OP ?> </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _DESCRIPTION ?></th>
                                            <th><?php echo _STATUS ?></th>
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
													<?php echo $ligne['description'] ?>
								            </td>
								            <td>
													<img src="images/_<?php echo $ligne['status'] ?>.png">
								            </td>
											
											<td class="op">
												<a href="modifier_detail_tasks.php?tasks=<?php echo $_REQUEST['tasks'] ?>&detail_tasks=<?php echo $ligne['id'] ?>" class="modifier2">
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