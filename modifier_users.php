<?php $categorie=4;$page="users"; ?>
<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _MODIFIER ?> <?php echo _UTILISATEURS ?>
                </h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="gestion.php" name="frm" method="post"   id="sign_up"
                            onsubmit="return checkForm(document.frm);" >
                                <input type="hidden" name="act" value="m"/>
                                <input type="hidden" name="table" value="users"/>
                                <input type="hidden" name="page" value="users.php"/>

                                <input type="hidden" name="id_nom" value="id"/>
                                <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['users'] ?>"/>  
                                
                                <input type="hidden" name="id_noms_retour" value="users"/>
                                <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['users'] ?>"/>  

                                <label for="email_address"><?php echo _NOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php  echo getTableList3('employes','id_employes',getValeurChamp('id_employes','users','id',$_REQUEST['users']),'nom','prenom','','','id_employes') ?>
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _LOGIN ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="login" name="login" class="form-control" value="<?php echo getValeurChamp('login','users','id',$_REQUEST['users']) ?>" >
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _PASSWORD ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" name="password" class="form-control" value="<?php echo getValeurChamp('password','users','id',$_REQUEST['users']) ?>">
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _CONFIRMER." "._PASSWORD ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input  type="password" class="form-control" name="confirm" required>
                                    </div>
                                </div>
    
                                <label for="nbr_place"><?php echo _TYPE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php
                                        getTabList($tab_roles,"role",getValeurChamp('role','users','id',$_REQUEST['users']),$change,_ETAT);
                                        ?>
                                    </div>
                                </div>
                                <br>
<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _MODIFIER ?>" />            
<input action="action" onclick="window.history.go(-1); return false;" class="btn btn-primary m-t-15 waves-effect"  type="button" value="<?php echo _ANNULER ?>" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>