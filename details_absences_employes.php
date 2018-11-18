<?php $categorie=3;$page="absences_employes"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
<div class="block-header">
    <h2>
        <?php echo _GESTION ?> des  <?php echo _ABSENCES ?>
    </h2>
    <div> 
            <a href="ajouter_absences_employes.php?employes=<?php echo $_REQUEST['employes'] ?>" class="ajouter">
                <?php echo _NOUVELLE ?>  <?php echo _ABSENCES ?> 
             </a>       
    </div>

</div>
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5>Les absences de l'employe : <?php echo getValeurChamp('nom','employes','id',$_REQUEST['employes'])." ".getValeurChamp('prenom','employes','id',$_REQUEST['employes']); ?></h5>
        <div class="card">
              <div class="body">
                <div class="table-responsive">
                    <?php 
                        $sql = "select * from absences_employes where id_employes=".$_REQUEST['employes']." order by id";      
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
                                    <a href="modifier_absences_employes.php?employes=<?php echo $_REQUEST['employes'] ?>&absences=<?php echo $ligne['id'] ?>" class="modifier2" title="modifier absences">
                                        &nbsp;
                                    </a>
                                    
                                    &nbsp;
                                    <a href="#ancre" 
                                    class="supprimer2" 
                                    onclick="javascript:supprimer(
                                                                'absences_employes',
                                                                '<?php echo $ligne['id'] ?>',
                                                                'details_absences_employes.php',
                                                                'employes',
                                                                '<?php echo $_REQUEST['employes'] ?>')
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