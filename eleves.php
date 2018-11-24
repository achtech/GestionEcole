<?php $categorie=1;$page="eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#choose').change(function(event) {    
          $.post(
           'eleves.php',
            $(this).serialize(),
            function(data){
              $("#update").html(data)
            }
          );
          return false;   
        });   
    });
</script>
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
            <!-- Vertical Layout -->
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
                        $whereClass = ' where id_niveaux='.$_REQUEST['id_niveaux'];
                    }
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
                                        <div class="col-sm-4">
                                            <label for="email_address"><?php echo _CLASSES ?> : </label>
                                            <div class="form-group">
                                                <div class="form-line">
													<?php   echo getTableList('classes','id_classes', $id_classes,'libelle','onchange="document.f1.submit()"',$whereClass,'id_classes') ?>
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
                            	$whereEleves ="where 1=1";
                            	if(isset($_REQUEST['id_classes']) && !empty($_REQUEST['id_classes'])){
                            		$whereEleves = $whereEleves." and id in(select id_eleves from inscriptions where id_classes=".$_REQUEST['id_classes'].")";
                            	} 
                                if (isset($_REQUEST['id_niveaux']) && !empty($_REQUEST['id_niveaux'])) {
                            		$whereEleves = $whereEleves." and id in(select id_eleves from inscriptions where id_classes in(select id from classes where id_niveaux=".$_REQUEST['id_niveaux']."))";
                            	} if (isset($_REQUEST['id_annees_scolaire']) && !empty($_REQUEST['id_annees_scolaire'])) {
                            		$whereEleves = $whereEleves." and  id in(select id_eleves from inscriptions where id_annees_scolaire=".$_REQUEST['id_annees_scolaire'].")";
                            	} 
                                if($whereEleves == "where 1=1") {
                            		$id_annees_scolaire = getCurrentAnneesScolaires();
                            		$whereEleves = "where id in(select id_eleves from inscriptions where id_annees_scolaire=".$id_annees_scolaire.")";
                            	}
									 $sql = "select * from eleves ".$whereEleves." order by id";		
		
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
            </div>

<?php require_once('footer.php'); ?>