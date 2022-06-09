<?php include('menu_footer/menu.php') ?>
<?php
$famille             = "" ; 
$unite               = "" ; 
$emplacement         = "" ;
$magasin             = "" ;
$marque              = "" ;
$fournisseur         = "" ;
$lot                 = "" ; 
$tva                 = "" ;
$date_achat          = "" ;
$date_expiration     = "" ;
$date_fabrication    = "" ;
?>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des produits</h4>
                    <br> Utilisateur : <?php echo $_SESSION['delta_USER']; ?>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->

    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <?php if(isset($_GET['suc'])){ ?>
                            <?php if($_GET['suc']=='1'){ ?>
                            <font color="green" style="background-color:#FFFFFF;">
                                <center>Enregistrement effectué avec succès</center>
                            </font><br /><br />
                            <?php } }?>
                            <?php if(isset($_GET['err'])){ ?>
                            <?php if($_GET['err']=='1'){ ?>
                            <font color="red" style="background-color:#FFFFFF;">
                                <center>Enregistrement n'est pas effectué car le Code a barre existe déja dans la
                                    matiere premiere : <?php echo $_GET["Emp"] ; ?></center>
                            </font><br /><br />
                            <?php } }?>
                            <form method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <b>Référence (*)</b>
                                        <input class="form-control" type="text" placeholder="Référence" value=""
                                            name="reference" id="code" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <b>Désignation (*)</b>
                                        <input class="form-control" type="text" placeholder="Désignation" value=""
                                            name="designation" id="designation" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Fournisseur par défault (*)</b>
                                        <select class="form-control select2" name="fournisseur">
                                            <option value=""> Sélectionner un Fournisseur </option>
                                            <?php
												$req="select * from delta_fournisseurs order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($fournisseur==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-1">
                                        <b>TVA (*)</b>
                                        <select class="form-control select2" name="fournisseur">
                                            <option value="">TVA </option>
                                            <?php
												$req="select * from delta_TVAs order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($tva==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <b>Stock (*)</b>
                                        <input class="form-control" type="text" placeholder="Stock" value=""
                                            name="stock" id="stock" required>
                                    </div>
                                    <div class="col-sm-1">
                                        <b>Seuil (*)</b>
                                        <input class="form-control" type="text" placeholder="Seuil" value=""
                                            name="seuil" id="seuil" required>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-xl-2">
                                        <b>Famille de produit (*)</b>
                                        <select class="form-control select2" name="famille">
                                            <option value=""> Sélectionner une famille </option>
                                            <?php
												$req="select * from delta_famille_produit order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($famille==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Unité de produit (*)</b>
                                        <select class="form-control select2" name="unite">
                                            <option value=""> Sélectionner une Unité </option>
                                            <?php
												$req="select * from delta_unite_produit order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($unite==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Marque (*)</b>
                                        <select class="form-control select2" name="marque">
                                            <option value=""> Sélectionner une Marque </option>
                                            <?php
												$req="select * from delta_marques order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($marque==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-xl-2">
                                        <b>Magasin (*)</b>
                                        <select class="form-control select2" name="magasin">
                                            <option value=""> Sélectionner une Magasin </option>
                                            <?php
												$req="select * from delta_magasins order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($magasin==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Emplacement (*)</b>
                                        <select class="form-control select2" name="emplacement">
                                            <option value=""> Sélectionner un Emplacement </option>
                                            <?php
												$req="select * from delta_emplacements order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($emplacement==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-xl-2">
                                        <b>Lot (*)</b>
                                        <select class="form-control select2" name="lot">
                                            <option value=""> Sélectionner un Lot </option>
                                            <?php
												$req="select * from delta_lots order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($lot==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-2">
                                        <b>Date d'achat (*)</b>
                                        <input type="date" class="form-control" id="date_achat" name="date_achat"
                                            value="<?php echo $date_achat; ?>">
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Date de fabrication (*)</b>
                                        <input type="date" class="form-control" id="date_fabrication"
                                            name="date_fabrication" value="<?php echo $date_fabrication; ?>">
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Date d'expiration (*)</b>
                                        <input type="date" class="form-control" id="date_expiration"
                                            name="date_expiration" value="<?php echo $date_expiration; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-2">
                                        <b>Code NGP (*)</b>
                                        <input class="form-control" type="text" placeholder="Code NGP" value=""
                                            name="code_ngp" id="code_ngp" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Numéro Série (*)</b>
                                        <input class="form-control" type="text" placeholder="Numéro Série" value=""
                                            name="numero_serie" id="numero_serie" required>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-2">
                                            <div class="form-check">
                                                <label class="form-check-label" for="produit_compose">
                                                    Produit Composé
                                                </label>
                                                <input style="width : 70px" name="produit_compose"
                                                    class="form-check-input" type="checkbox" value=""
                                                    id="produit_compose">
                                            </div>
                                        </div>
                                        <div class="col-xl-2">
                                            <div class="form-check">
                                                <label class="form-check-label" for="fodec">
                                                    FODEC
                                                </label>
                                                <input style="width : 70px" name="fodec" class="form-check-input"
                                                    type="checkbox" value="" id="fodec">
                                            </div>
                                        </div>
                                        <div class="col-xl-2">
                                            <div class="form-check">
                                                <label class="form-check-label" for="type">
                                                    Produit / Service
                                                </label>
                                                <input style="width : 70px" name="type" class="form-check-input"
                                                    type="checkbox" value="" id="type">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page content-->
</div>
<!-- page wrapper end -->


<?php include("menu_footer/footer.php") ?>