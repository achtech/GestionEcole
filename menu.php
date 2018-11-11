     <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Achraf Saloumi</div>
                    <div class="email">a.mareshal@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if($page=='home') echo 'active'; ?>">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php if($categorie==1) echo 'active'; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span><?php echo _GESTION ?> <?php echo _SCOLAIRES ?></span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($page=='eleves') echo 'active'; ?>"> <a href="eleves.php"> <?php echo _ELEVES ?> 75 % </a> </li>
                            <li class="<?php if($page=='retards_eleves') echo 'active'; ?>"> <a href="retards_eleves.php"> <?php echo _RETARDS ?> </a> </li>
                            <li class="<?php if($page=='absence_eleves') echo 'active'; ?>"> <a href="absence_eleves.php"> <?php echo _ABSENCES ?> </a> </li>
                            <li class="<?php if($page=='paiements_eleves') echo 'active'; ?>"> <a href="paiements_eleves.php"> <?php echo _PAIEMENTS ?> </a> </li>
                        </ul>
                    </li>
                    <li class="<?php if($categorie==2) echo 'active'; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span><?php echo _TRESORIE ?></span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($page=='caisse_mensuelles') echo 'active'; ?>"> <a href="caisse_mensuelles.php"> <?php echo _CAISSE ?> <?php echo _MENSUELLES ?> </a> </li>
                            <li class="<?php if($page=='charges_depenses') echo 'active'; ?>"> <a href="charges_depenses.php"> <?php echo _CHARGES ?> <?php echo _ET ?> <?php echo _DEPENSES ?> </a> </li>
                        </ul>
                    </li>
                    <li class="<?php if($categorie==3) echo 'active'; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span><?php echo _RESOURCES ?> <?php echo _HUMAINES ?></span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($page=='employes') echo 'active'; ?>"> <a href="employes.php"> <?php echo _EMPLOYES ?> </a> </li>
                            <li class="<?php if($page=='paiements_employes') echo 'active'; ?>"> <a href="paiements_employes.php"> <?php echo _PAIEMENTS ?> </a> </li>
                            <li class="<?php if($page=='avances_employes') echo 'active'; ?>"> <a href="avances_employes.php"> <?php echo _AVANCES ?> </a> </li>
                            <li class="<?php if($page=='absences_employes') echo 'active'; ?>"> <a href="absences_employes.php"> <?php echo _ABSENCES ?> </a> </li>
                            <li class="<?php if($page=='conges') echo 'active'; ?>"> <a href="conges.php"> <?php echo _CONGES ?> </a> </li>
                        </ul>
                    </li>
                    <li class="<?php if($categorie==4) echo 'active'; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span><?php echo _PARAM ?></span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($page=='annes_scolaire') echo 'active'; ?>"> <a href="annes_scolaire.php"> <?php echo _ANNEES ?> <?php echo _SCOLAIRES ?>100% </a> </li>
                            <li class="<?php if($page=='niveaux') echo 'active'; ?>"> <a href="niveaux.php"> <?php echo _NIVEAUX ?>100%</a></li>
                            <li class="<?php if($page=='salles') echo 'active'; ?>"> <a href="salles.php"> <?php echo _SALLES ?>100%</a> </li>
                            <li class="<?php if($page=='mode_paiements') echo 'active'; ?>"> <a href="mode_paiements.php"> <?php echo _MODE ?> <?php echo _DE ?> <?php echo _PAIEMENTS ?> 100%</a> </li>
                            <li class="<?php if($page=='etablissements') echo 'active'; ?>"> <a href="etablissements.php"> <?php echo _ETABLISSEMENTS ?>80% </a> </li>
                            <li class="<?php if($page=='users') echo 'active'; ?>"> <a href="users.php"> <?php echo _UTILISATEURS ?>100% </a> </li>
                            <li class="<?php if($page=='classes') echo 'active'; ?>"> <a href="classes.php"> <?php echo _CLASSES ?>100% </a> </li>
                            <li class="<?php if($page=='logs') echo 'active'; ?>"> <a href="logs.php"> <?php echo _JOURNAL ?> </a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);">Achraf Saloumi</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">