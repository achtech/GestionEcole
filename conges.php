<?php $categorie=3;$page="conges"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _CONGES ?>
                </h2>
                <div> 
	                <a href="ajouter_classes.php" class="ajouter">
			        	<?php echo _AJOUTER ?> <?php echo _CLASSES ?> 
	   	    		</a>		
				</div>
            </div>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                            	<?php 

									$sql = "select * from conges  order by id";		
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
                                            <th><?php echo _NOM?></th>
                                            <th><?php echo _DATE." "._DEMANDE ?></th>
                                            <th><?php echo _DATE." "._DEBUT ?></th>
                                            <th><?php echo _DATE." "._FIN ?></th>
                                            <th><?php echo _SANS." "._SOLDE ?></th>
                                            <th><?php echo _VALIDER ?></th>
                                            <th><?php echo _MOTIF ?></th>
                                            <th><?php echo _ANNEES." "._SCOLAIRE ?></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM?></th>
                                            <th><?php echo _DATE." "._DEMANDE ?></th>
                                            <th><?php echo _DATE." "._DEBUT ?></th>
                                            <th><?php echo _DATE." "._FIN ?></th>
                                            <th><?php echo _SANS." "._SOLDE ?></th>
                                            <th><?php echo _VALIDER ?></th>
                                            <th><?php echo _MOTIF ?></th>
                                            <th><?php echo _ANNEES." "._SCOLAIRE ?></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
											$i = 0;
											while ($ligne = mysql_fetch_array($res)){
												$total = 0;
												if($i%2==0)
													$c = "c";
												else
												    	$c = "";
													
											?>
                                        <tr>
<td><?php echo getValeurChamp('prenom','employes','id',$ligne['id_employes'])." ".getValeurChamp('nom','employes','id',$ligne['id_employes']) ?></td>
<td><?php echo $ligne['date_demande'] ?></td>
<td><?php echo $ligne['date_debut'] ?></td>
<td><?php echo $ligne['date_fin'] ?></td>
<td><?php echo $ligne['sans_solde'] ?></td>
<td><?php echo $ligne['valider'] ?></td>
<td><?php echo $ligne['motif'] ?></td>
<td><?php echo getValeurChamp('libelle','annees_scolaire','id',$ligne['id_annees_scolaire']) ?></td>
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