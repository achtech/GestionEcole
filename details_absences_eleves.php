<?php $categorie=1;$page="absence_eleves"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
<div class="block-header">
    <h2>
        <?php echo _GESTION ?> des  <?php echo _ABSENCES ?>
    </h2>
    <div> 
            <a href="ajouter_absences_eleves.php?classes=<?php echo $_REQUEST['classes'] ?>&eleves=<?php echo $_REQUEST['eleves'] ?>" class="ajouter">
                <?php echo _NOUVELLE ?>  <?php echo _ABSENCES ?> 
             </a>       
    </div>

</div>
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5>Les absences de l'eleve : <?php echo getValeurChamp('nom','eleves','id',$_REQUEST['eleves'])." ".getValeurChamp('prenom','eleves','id',$_REQUEST['eleves']); ?></h5>
        <div class="card">
              <div class="body">
                <div class="table-responsive">
                    <?php 
                        $sql = "select * from absences_eleves where id_eleves=".$_REQUEST['eleves']." order by id";      
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
                                <th><?php echo _DATE." "._DEBUT ?></th>
                                <th><?php echo _DATE." "._FIN ?></th>
                                <th><?php echo _NOMBRE." "._HEURE ?></th>
                                <th><?php echo _JUSTIFIER ?></th>
                                <th><?php echo _MOTIFS ?></th>
                                <th class="op"> <?php echo _OP ?> </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php echo _DATE." "._DEBUT ?></th>
                                <th><?php echo _DATE." "._FIN ?></th>
                                <th><?php echo _NOMBRE." "._HEURE ?></th>
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
                                    <?php echo $ligne['date_debut'] ?>
                            </td><td>
                                    <?php echo $ligne['date_fin'] ?>
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
                                    <a href="modifier_absences_eleves.php?eleves=<?php echo $_REQUEST['eleves'] ?>&classes=<?php echo $_REQUEST['classes'] ?>&absences=<?php echo $ligne['id'] ?>" class="modifier2" title="modifier absences">
                                        &nbsp;
                                    </a>
                                    
                                    &nbsp;
                                    <a href="#ancre" 
                                    class="supprimer2" 
                                    onclick="javascript:supprimer(
                                                                'absences_eleves',
                                                                '<?php echo $ligne['id'] ?>',
                                                                'details_absences_eleves.php',
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