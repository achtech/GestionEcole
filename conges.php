<?php $categorie=3;$page="conges"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> <?php echo _CONGES ?>
                </h2>
                <div> 
	                <a href="ajouter_conges.php" class="ajouter">
			        	<?php echo _AJOUTER ?> <?php echo _CONGES ?> 
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
                                            <th><?php echo _NB." "._JOUR ?></th>
                                            <th><?php echo _SANS." "._SOLDE ?></th>
                                            <th><?php echo _VALIDER ?></th>
                                            <th><?php echo _MOTIF ?></th>
                                            <th><?php echo _ANNEES." "._SCOLAIRES ?></th>
                                            <th><?php echo _OP ?></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _NOM?></th>
                                            <th><?php echo _DATE." "._DEMANDE ?></th>
                                            <th><?php echo _DATE." "._DEBUT ?></th>
                                            <th><?php echo _DATE." "._FIN ?></th>
                                            <th><?php echo _NB." "._JOUR ?></th>
                                            <th><?php echo _SANS." "._SOLDE ?></th>
                                            <th><?php echo _VALIDER ?></th>
                                            <th><?php echo _MOTIF ?></th>
                                            <th><?php echo _ANNEES." "._SCOLAIRES ?></th>
                                            <th><?php echo _OP ?></th>
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
<td><?php echo getNombreJour($ligne['date_debut'], $ligne['date_fin']) ?></td>
<?php $chV=$ligne['valider']==1?"checked":"";$chSS=$ligne['sans_solde']==1?"checked":""; ?>
<td><input type="checkbox" disabled="disabled" <?php echo $chSS ?> id="ch1" class="filled-in chk-col-red" /><label for="ch1"></label></td>
<td><input type="checkbox" disabled="disabled" <?php echo $chV ?>  id="ch2" class="filled-in chk-col-green"/><label for="ch2"></label></td>
<td><?php echo $ligne['motif'] ?></td>
<td><?php echo getValeurChamp('libelle','annees_scolaires','id',$ligne['id_annees_scolaire']) ?></td>
<td class="op">
	<a href="modifier_conges.php?conges=<?php echo $ligne['id'] ?>" class="modifier2" title="modifier fiche conges">
		&nbsp;
    </a>
	&nbsp;
	<a href="#ancre" 
    class="supprimer2" 
    onclick="javascript:supprimer(
    							'conges',
                                '<?php echo $ligne['id'] ?>',
                                'conges.php',
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