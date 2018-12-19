<?php $categorie=2;$page="employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>

            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> des <?php echo _EMPLOYES ?> : Les classes du <?php echo $tab_politesse[getValeurChamp('politesse','employes','id',$_REQUEST['employes'])]." ".getValeurChamp('prenom','employes','id',$_REQUEST['employes'])." ".getValeurChamp('nom','employes','id',$_REQUEST['employes']) ?>
                </h2>
 
            </div>
<!-- Exportable Table -->
            <!-- Vertical Layout -->
            <form action="" name="f1" method="get"  >
                <input type="hidden" name="employes" value="<?php echo $_REQUEST['employes'] ?>">
                <?php 
//                    $employes=isset($_REQUEST['employes'])?$_REQUEST['employes']:'';    
                    $id_niveaux=isset($_REQUEST['id_niveaux'])?$_REQUEST['id_niveaux']:'';    
                    $id_annees_scolaire=isset($_REQUEST['id_annees_scolaire'])?$_REQUEST['id_annees_scolaire']:'';
                    $whereClass = !empty($id_niveaux) ? ' where id_niveaux='.$_REQUEST['id_niveaux'] : "";
                ?>
                 <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
                            <div class="card">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <label for="nbr_place"><?php echo _ANNEES ?> <?php echo _SCOLAIRES ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
        											<?php  echo getTableList('annees_scolaires','id_annees_scolaire',$id_annees_scolaire,'libelle','onchange="document.f1.submit()"','','id_annees_scolaire','choose') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="email_address"><?php echo _NIVEAUX ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
        											<?php  echo getTableList('niveaux','id_niveaux',$id_niveaux,'libelle','onchange="document.f1.submit()"','','id_niveaux') ?>
                                                </div>
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
                                <div id="update">
                            	<?php 
									 $sql = "select * from classes ".$whereClass." order by id";		
		
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
                                            <th><?php echo _LIBELLE ?></th>
											<th class="op"> <?php echo _OP ?> </th>                                      
									  </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _LIBELLE ?></th>
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
												<?php echo $ligne['libelle'] ?>
										</td>
											<td class="op">
    <?php $exist = getValeurChamp('id','employes_classes','id_employes,id_annees_scolaire,id_classes',$_REQUEST['employes'].",".$_REQUEST['id_annees_scolaire'].",".$ligne['id']); 
if($exist>0){
    ?>

	<a href="gestion.php?id_classes=<?php echo $ligne['id'] ?>&id_employes=<?php echo $_REQUEST['employes'] ?>&id_annees_scolaire=<?php echo $_REQUEST['id_annees_scolaire'] ?>&page=class_formateur.php&act=a&id_valeurs_retour=<?php echo $_REQUEST['employes'] ?>,<?php echo $_REQUEST['id_niveaux'] ?>,<?php echo $_REQUEST['id_annees_scolaire'] ?>&id_noms_retour=employes,id_niveaux,id_annees_scolaire&table=employes_classes" class="invalid" title="Cliquez ici pour que <?php echo $tab_politesse[getValeurChamp('politesse','employes','id',$_REQUEST['employes'])]." ".getValeurChamp('prenom','employes','id',$_REQUEST['employes'])." ".getValeurChamp('nom','employes','id',$_REQUEST['employes']) ?> né plus dans cette classe">
													&nbsp;
								                </a>
<?php }else{ ?>
<a href="gestion.php?id_classes=<?php echo $ligne['id'] ?>&id_employes=<?php echo $_REQUEST['employes'] ?>&id_annees_scolaire=<?php echo $_REQUEST['id_annees_scolaire'] ?>&page=class_formateur.php&act=a&id_valeurs_retour=<?php echo $_REQUEST['employes'] ?>,<?php echo $_REQUEST['id_niveaux'] ?>,<?php echo $_REQUEST['id_annees_scolaire'] ?>&id_noms_retour=employes,id_niveaux,id_annees_scolaire&table=employes_classes" class="valid" title="Cliquez ici pour que <?php echo $tab_politesse[getValeurChamp('politesse','employes','id',$_REQUEST['employes'])]." ".getValeurChamp('prenom','employes','id',$_REQUEST['employes'])." ".getValeurChamp('nom','employes','id',$_REQUEST['employes']) ?> soit dans cette classe">
                                                    &nbsp;
                                                </a>                                                
			<?php } ?>
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
            </div>

<?php require_once('footer.php'); ?>