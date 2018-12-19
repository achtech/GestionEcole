<?php $categorie=4;$page='database'; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _CLASSES ?>
                </h2>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body" style="height:60px">
                       	<form action="gestion.php" name="frm" method="post" 
                              onsubmit="return checkForm(document.frm);" >
                            <input type="hidden" name="act" value="exporter_database"/>
                            <input type="hidden" name="page" value="database.php"/>
                            <div class="col-lg-3">	
                              <div class="form-group">
                                      <label class="control-label">Exporter la version actuelle de la base de donneé</label>						
                                </div>
                            </div>
                            <div class="col-lg-6">	
                                <div class="form-group">
                                        <input type="submit" name="v" class="btn btn-primary" value="<?php echo "Exporter" ?>" />								
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> 
            </div>
        </div> 
    </div>
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                            	<?php 
									$files = scandir("backup");
                        		?>								
                       
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th><?php echo _ARCHIVER ?></th>
                                            <th><?php echo _VALIDER ?></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _ARCHIVER ?></th>
                                            <th><?php echo _VALIDER ?></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
											$i = 0;
     										for ($i = 2; $i < count($files); $i++) {
                       												
												if($i%2==0)
													$c = "c";
												else
													$c = "";
													
											?>
                                        <tr>
                                            <td><?php echo $files[$i]; ?></td>
		                                    <td><a href="gestion.php?act=importer_database&page=database.php&files=backup/<?php echo $files[$i] ?>">Importer</a></td>
                                        </tr>
                                        <?php
											
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

<?php require_once('footer.php'); ?>