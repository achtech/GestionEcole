<?php $categorie=1;$page="retards_eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _GESTION ?> des  <?php echo _RETARDS ?>
                </h2>
                <div> 
                        <a href="ajouter_retards_eleves.php?classes=<?php echo $_REQUEST['classes'] ?>&eleves=<?php echo $_REQUEST['eleves'] ?>" class="ajouter">
                            <?php echo _NOUVELLE ?>  <?php echo _RETARDS ?> 
                         </a>       
                </div>
 
            </div>
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5>Les retards de l'eleve : <?php echo getValeurChamp('nom','eleves','id',$_REQUEST['eleves'])." ".getValeurChamp('prenom','eleves','id',$_REQUEST['eleves']); ?></h5>
                    <div class="card">
                          <div class="body">
                            <div class="table-responsive">
                                <?php 
                                    $sql = "select * from retards_eleves where id_eleves=".$_REQUEST['eleves']." order by id";      
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
                                            <th><?php echo _DATE." "._RETARDS ?></th>
                                            <th><?php echo _NOMBRE." "._HEURE ?></th>
                                            <th><?php echo _JUSTIFIER ?></th>
                                            <th><?php echo _MOTIFS ?></th>
                                            <th class="op"> <?php echo _OP ?> </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo _DATE." "._RETARDS ?></th>                                            <th><?php echo _NOMBRE." "._HEURE ?></th>
                                            <th><?php echo _JUSTIFIER ?></th>
                                            <th><?php echo _MOTIFS ?></th>
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
                                        <tr><td>
                                                <?php echo $ligne['date_retards'] ?>
                                        </td><td>
                                                <?php echo $ligne['nbr_heurs'] ?>
                                            </td>
                                            <td>       
                                                                                                <?php $ch = $ligne['justifier']==1?"checked='true'":""; ?>
                                                <input type="checkbox" disabled="disabled" style="opacity:unset;position:unset" id="remember_me" class="filled-in" <?php echo $ch ?>/>

                                            </td>
                                            <td>       
                                                <?php echo $ligne['motif'] ?>
                                            </td>
                                            <td class="op">
                                                <a href="modifier_retards_eleves.php?eleves=<?php echo $_REQUEST['eleves'] ?>&classes=<?php echo $_REQUEST['classes'] ?>&retards=<?php echo $ligne['id'] ?>" class="modifier2" title="modifier retards">
                                                    &nbsp;
                                                </a>
                                                
                                                &nbsp;
                                                <a href="#ancre" 
                                                class="supprimer2" 
                                                onclick="javascript:supprimer(
                                                                            'retards_eleves',
                                                                            '<?php echo $ligne['id'] ?>',
                                                                            'details_retards_eleves.php',
                                                                            'eleves,classes',
                                                                            '<?php echo $_REQUEST['eleves'] ?>,<?php echo $_REQUEST['classes'] ?>')
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