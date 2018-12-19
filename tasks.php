<?php $categorie=4;$page='tasks'; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _TASKS ?>
                </h2>
                <div> 
                    	<a href="details_tasks.php" class="detail">
			        		<?php echo _ALL ?> <?php echo _TASKS ?> 
			    		 </a>
			    		</div>
			    		 <div><a href="ajouter_task.php" class="ajouter">
			        		<?php echo _AJOUTER ?> <?php echo _TASKS ?> 
			    		 </a>		
				</div>
 
            </div>
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <button class="btn btn-success btn-lg btn-block waves-effect"  onclick="document.location.href='details_tasks.php?status=3'" type="button">DONE <span class="badge"><?php echo getNb('detail_tasks','status','3') ?></span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <button class="btn btn-primary btn-lg btn-block waves-effect" type="button"  onclick="document.location.href='details_tasks.php?status=2'">IN PROGRESS <span class="badge"><?php echo getNb('detail_tasks','status','2') ?></span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <button class="btn btn-danger btn-lg btn-block waves-effect" type="button"  onclick="document.location.href='details_tasks.php?status=1'">TODO <span class="badge"><?php echo getNb('detail_tasks','status','1') ?></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <button class="btn btn-success btn-lg btn-block waves-effect" type="button" onclick="document.location.href='details_tasks.php?priorite=3'">High <span class="badge"><?php echo getNb('detail_tasks','priorite','3') ?></span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <button class="btn btn-primary btn-lg btn-block waves-effect" type="button"  onclick="document.location.href='details_tasks.php?priorite=2'">Medium  <span class="badge"><?php echo getNb('detail_tasks','priorite','2') ?></span></button>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <button class="btn btn-danger btn-lg btn-block waves-effect"  onclick="document.location.href='details_tasks.php?priorite=1'" type="button">Low <span class="badge"><?php echo getNb('detail_tasks','priorite','1') ?></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                            	<?php 
									$sql = "select * from tasks order by id";		
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
                                            <th><?php echo _DESCRIPTION ?></th>
                                            <th><?php echo _NB." des TODO" ?></th>
                                            <th><?php echo _NB." des INPROGRESS" ?></th>
                                            <th><?php echo _NB." des DONE" ?></th>
                                            <th><?php echo _NB." des "._TASKS ?></th>
                                            <th><?php echo _TAUX ?></th>
											<th class="op"> <?php echo _OP ?> </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _DESCRIPTION ?></th>
                                            <th><?php echo _NB." des TODO" ?></th>
                                            <th><?php echo _NB." des INPROGRESS" ?></th>
                                            <th><?php echo _NB." des DONE" ?></th>
                                            <th><?php echo _NB." des "._TASKS ?></th>
                                            <th><?php echo _TAUX ?></th>
											<th class="op"> <?php echo _OP ?> </th>
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
                                            <td>
													<a href="details_tasks.php?tasks=<?php echo $ligne['id'] ?>"><?php echo $ligne['description'] ?></a>
								            </td>
                                            <td>
                                                    <?php echo getNb('detail_tasks','id_tasks,status',$ligne['id'].",1") ?>
                                            </td>
                                            <td>
                                                    <?php echo getNb('detail_tasks','id_tasks,status',$ligne['id'].",2") ?>
                                            </td>
                                            <td>
                                                    <?php echo getNb('detail_tasks','id_tasks,status',$ligne['id'].",3") ?>
                                            </td>
                                            <td>
                                                    <?php echo getNb('detail_tasks','id_tasks',$ligne['id']) ?>
                                            </td>

								            <td>
													<?php echo $ligne['taux'] ?>
								            </td>
											
											<td class="op">
												<a href="modifier_tasks.php?tasks=<?php echo $ligne['id'] ?>" class="modifier2">
													&nbsp;
								                </a>
												
												&nbsp;
												
								                <a href="#ancre" 
								                class="supprimer2" 
								                onclick="javascript:supprimer(
								                							'tasks',
								                                            '<?php echo $ligne['id'] ?>',
								                                            'tasks.php',
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