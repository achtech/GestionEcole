
<?php $page='home' ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <?php 
                $tabNiveaux = getAllNiveaux();
                $tabColor =getColor();
                $tabIcon = getIcon();
            ?>
            <div class="row clearfix">
                <?php for ($i=0; $i <count($tabNiveaux) ; $i++) {?> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-<?php echo $tabColor[$i] ?> hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"><?php echo $tabIcon[$i] ?></i>
                        </div>
                        <div class="content">
                            <div class="text"><?php echo $tabNiveaux[$i][1]  ?></div>
                            <div class="number count-to" data-from="0" data-to="<?php echo getNombreEleve($tabNiveaux[$i][0])  ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>TASK INFOS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tache</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $tab = getAllTasks();
                                        for ($i=0; $i < count($tab) ; $i++) {?> 
                                        <tr>
                                            <td><?php echo $i+1 ?></td>
                                            <td><?php echo $tab[$i][0] ?></td>
                                            <td>
                                                <span class="label bg-green"><?php echo $tab[$i][3] ?></span>
                                                <span class="label bg-yellow"><?php echo $tab[$i][4] ?></span>
                                                <span class="label bg-red"><?php echo $tab[$i][5] ?></span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-<?php echo $tab[$i][6]  ?>" role="progressbar" aria-valuenow="<?php echo $tab[$i][1] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $tab[$i][1] ?>%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>Status des paiement<?php  $tabPaiement = getPaiementStatusByPercent();?></h2>
                        </div>
                        <div class="body">
                            
                            <div id="donut_chart" class="dashboard-donut-chart">
                <input type="hidden" name="oui" id="paiementEffectue" value="<?php echo round($tabPaiement[0]) ?>">
                <input type="hidden" name="non" id="paiementNonEffectue" value="<?php echo round($tabPaiement[1]) ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
 <?php require_once('footer.php'); ?>