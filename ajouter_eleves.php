<?php require_once('header.php'); ?>  
<?php require_once('menu.php'); ?>
            <div class="block-header">
                <h2>
                    <?php echo _NOUVELLE ?> <?php echo _INSCRIPTION ?> 
                </h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
							<form action="gestion.php" name="frm" method="post" 
							onsubmit="return checkForm(document.frm);" >
								<input type="hidden" name="act" value="ajouter_eleves"/>
							    <input type="hidden" name="table" value="eleves"/>
								<input type="hidden" name="page" value="eleves.php"/>

                                <label for="nbr_place"><?php echo _NUMERO." d' "._ORDRE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="num_ordre" name="num_ordre" class="form-control" 
                                        value="5">
                                    </div>
                                </div>


                                <label for="email_address"><?php echo _NUMERO." "._INSCRIPTION ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="num_inscription" name="num_inscription" class="form-control date" value="123">
                                    </div>
                                </div>

                                <label for="email_address"><?php echo _NUMERO." "._ORDRE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="numero_ordre" name="numero_ordre" class="form-control date" value="456">
                                    </div>
                                </div>


                                <label for="email_address"><?php echo _NOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nom" name="nom" class="form-control" value="test">
                                    </div>
                                </div>
                                
                                <label for="nbr_place"><?php echo _PRENOM ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="prenom" name="prenom" class="form-control" value="test" >
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _DATE." de "._NAISSANCES ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control date" name="date_naissance" value="2016-02-05">
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _LIEUX." de "._NAISSANCES ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="lieu_naissance" value="test">
                                    </div>
                                </div>

                                <label for="email_address"><?php echo _PRENOM." du "._PERE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nom_pere" name="nom_pere" class="form-control" value="test">
                                    </div>
                                </div>
                                <label for="nbr_place"><?php echo _PROFESSION." du "._PERE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="profession_pere" name="profession_pere" class="form-control" value="test">
                                    </div>
                                </div>

                                <label for="nbr_place"><?php echo _CIN." du "._PERE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="cin_pere" name="cin_pere" class="form-control" value="test">
                                    </div>
                                </div>

                                <label for="nbr_place"><?php echo _PRENOM." et "._NOM." de la "._MERE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nom_mere" name="nom_mere" class="form-control" value="test">
                                    </div>
                                </div>


                                <label for="nbr_place"><?php echo _CIN." de la "._MERE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="cin_mere" name="cin_mere" class="form-control" value="test">
                                    </div>
                                </div>


                                <label for="nbr_place"><?php echo _TEL." de la "._MERE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="tel_mere" name="tel_mere" class="form-control" value="test">
                                    </div>
                                </div>

                                <label for="nbr_place"><?php echo _PROFESSION." du "._MERE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="profession_mere" name="profession_mere" class="form-control" value="test">
                                    </div>
                                </div>

                                <label for="nbr_place"><?php echo _ADRESSE." des "._PARENTS ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="adresse_parents" name="adresse_parents" class="form-control" value="test">
                                    </div>
                                </div>

                                <label for="nbr_place"><?php echo _ADRESSE." "._PERSONNELS ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="adresse_personnels" name="adresse_personnels" class="form-control" value="test">
                                    </div>
                                </div>

                                <label for="nbr_place"><?php echo _TEL." "._DOMICILES ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="tel_domicile" name="tel_domicile" class="form-control" value="test">
                                    </div>
                                </div>


                                <label for="nbr_place"><?php echo _TEL." "._GSM." des ".PARENTS ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="tel_parents" name="tel_parents" class="form-control" value="test">
                                    </div>
                                </div>

                                <label for="nbr_place"><?php echo _ECOLE." "._PRECEDENTE ?> : </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="ecole_precedente" name="ecole_precedente" class="form-control" value="test">
                                    </div>
                                </div>
                                <br>
                           		<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="<?php echo _AJOUTER ?>" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            

<?php require_once('footer.php'); ?>