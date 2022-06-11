<?php include('menu_footer/menu.php') ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.accordion {

  
    cursor: pointer;

    border: none;
    text-align: left;
    outline: none;
    font-weight: bold;
    font-size: 15px;
    transition: 0.4s;
}

.active,
.accordion:hover {}

.panel {
    width : 100% ; 
    padding: 40px 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>
<?php

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}else{
    $id = "0";
}


if(isset($_POST['enregistrer_mail'])){	

$codsoc	                  	=	$_SESSION['delta_SOC'] ;
$reference	            	=	addslashes($_POST["reference"]) ;
$designation	        	=	addslashes($_POST["designation"]) ;
$tva      	            	=	addslashes($_POST["tva"]) ;
$stock           	    	=	addslashes($_POST["stock"]) ;
$seuil      		        =	addslashes($_POST["seuil"]) ;
$famille            	    =	addslashes($_POST["famille"]) ;
$unite      	        	=	addslashes($_POST["unite"]) ;
$marque      	        	=	addslashes($_POST["marque"]) ;
$magasin      	        	=	addslashes($_POST["magasin"]) ;
$emplacement      	      	=	addslashes($_POST["emplacement"]) ;
$lot      		            =	addslashes($_POST["lot"]) ;
$date_achat      	        =	addslashes($_POST["date_achat"]) ;
$date_fabrication      	    =	addslashes($_POST["date_fabrication"]) ;
$date_expiration      	    =	addslashes($_POST["date_expiration"]) ;
$code_ngp      	            =	addslashes($_POST["code_ngp"]) ;
$numero_serie      	        =	addslashes($_POST["numero_serie"]) ;
$prix_achat_ht              =   addslashes($_POST["prix_achat_ht"]);
$prix_achat_ttc             =   addslashes($_POST["prix_achat_ttc"]);
$prix_vente_ttc             =   addslashes($_POST["prix_vente_ttc"]);
$prix_vente_ht              =   addslashes($_POST["prix_vente_ht"]);

    
if($id=="0")
{
    $req="select max(id) as maxID from delta_produits";
    $query=mysql_query($req);
    if(mysql_num_rows($query)>0){
        while($enreg=mysql_fetch_array($query)){
            $id = $enreg['maxID'] + 1;
        }
    } else{
        $id = 1;
    }
    
    $sql="INSERT INTO `delta_produits`(`id`,`codsoc`,`reference`,`designation`,`tva`,`stock`,`seuil`,`famille`,`unite`,`marque`,`magasin`,`emplacement`,`date_achat`,`date_fabrication`,`date_expiration`,`code_ngp`,`numero_serie`) VALUES
    ('".$id."','".$codsoc."','".$reference."' , '".$designation."', '".$tva."', '".$stock."', '".$seuil."', '".$famille."', '".$unite."', '".$marque."', '".$magasin."', '".$emplacement."', '".$s."', '".$date_fabrication."', '".$date_expiration."', '".$code_ngp."', '".$numero_serie."' )";
    
                  //Log
    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
   
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','5','1','".$id."')";
    $req=mysql_query($sql1);			
}
else{
    $sql="UPDATE `delta_produits` SET `reference`='".$reference."' , `designation`='".$designation."', `tva`='".$tva."', `stock`='".$stock."', `seuil`='".$seuil."', `famille`='".$famille."', `unite`='".$unite."', `marque`='".$marque."', `magasin`='".$magasin."', `emplacement`='".$emplacement."', `date_achat`='".$date_achat."', `date_fabrication`='".$date_fabrication."', `date_expiration`='".$date_expiration."', `numero_serie`='".$numero_serie."', `code_ngp`='".$code_ngp."' WHERE id=".$id;
    
      //Log

    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','5','2','".$id."')";
    $req=mysql_query($sql1);				
}
$req=mysql_query($sql);

// echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';
}

$reference                   = "" ; 
$designation                 = "" ; 
$tva                         = "" ; 
$stock                       = 0 ; 
$seuil                       = 0 ; 
$famille                     = "" ; 
$unite                       = "" ; 
$marque                      = "" ; 
$magasin                     = "" ; 
$emplacement                 = "" ; 
$date_achat                  = "" ; 
$fournisseur                 = "" ; 
$date_fabrication            = "" ; 
$date_expiration             = "" ; 
$lot                         = "" ; 
$numero_serie                = "" ; 
$code_ngp                    = "" ; 
$prix_achat_ht               = 0 ; 
$prix_achat_ttc              = 0 ;
$prix_vente_ttc              = 0 ;
$prix_vente_ht               = 0 ;
$type                        = "" ; 
$nature                        = "" ; 
?>

<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des produits</h4>

                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->

    <div class="page-content-wrapper">
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
                                        <b style="color : red ; ">Référence (*)</b>
                                        <input class="form-control" type="text" placeholder="Référence" value=""
                                            name="reference" id="code" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <b style="color : red ; ">Désignation (*)</b>
                                        <input class="form-control" type="text" placeholder="Désignation" value=""
                                            name="designation" id="designation" required>
                                    </div>
                                    <div class="col-xl-2">
                                        <b style="color : red ; ">Famille de produit (*)</b>
                                        <select class="form-control select2" name="famille" id="famille">
                                            <option value=""> Sélectionner une famille </option>
                                            <option value="0"> Ajouter une famille </option>
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

                                    <div class="col-sm-1">
                                        <b style="color : red ; ">Stock </b>
                                        <input class="form-control" type="text" placeholder="Stock"
                                            value="<?php echo $stock ?>" name="stock" id="stock" required>
                                    </div>
                                    <div class="col-xl-4">
                                        <br>
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light accordion">Détail
                                            Stock</button>

                                        <div class="panel">
                                            <div class="row">

                                                <div class="table-responsive">
                                                    <table class="table table-responsive-md">
                                                        <thead>
                                                            <tr>
                                                                

                                                                <th>Produit</th>
                                                                <th>Stock</th>
                                                                <th>Date d'achat</th>
                                                                <th>Date d'expiration</th>
                                                                <th>Date de fabrication</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-5 pt-5 row"
                                    style="box-shadow: 0px -3px 0px rgba(50, 50, 50, 0.05); ">

                                    <div class="col-xl-3">
                                        <h4 style=" font-weight : bold ; color : green ">Produit :</h4>
                                        <b>Fournisseur par défault </b>
                                        <select class="form-control select2" name="fournisseur" id="fournisseur">
                                            <option value=""> Sélectionner un Fournisseur
                                            </option>
                                            <option value="0">Ajouter un fournisseur</option>
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
                                        <br>
                                        <b>Unité de produit </b>
                                        <select class="form-control select2" name="unite" id="unite">
                                            <option value=""> Sélectionner une Unité </option>
                                            <option value="0"> Ajouter une Unité </option>
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
                                        <br>
                                        <b>Marque </b>
                                        <select class="form-control select2" name="marque" id="marque">
                                            <option value=""> Sélectionner une Marque </option>
                                            <option value="0"> Ajouter une Marque </option>
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
                                    <div class="col-xl-3">
                                        <br>
                                        <!-- <b style="color : red ; ">Magasin </b>
                                        <select class="form-control select2" name="magasin" id="magasin">
                                            <option value=""> Sélectionner une Magasin </option>
                                            <option value="°0"> Ajouter une Magasin </option>
                                            <?php
												$req="select * from delta_magasins order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($magasin==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select> -->
                                        <BR>
                                        <b>Emplacement (*)</b>
                                        <select class="form-control select2" name="emplacement" id="emplacement">
                                            <option value=""> Sélectionner un Emplacement </option>
                                            <option value="0"> Ajouter un Emplacement </option>
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
                                        <b style="color : red ; ">TVA (*)</b>
                                                <select class="form-control select2" name="tva" id="tva">
                                                    <option value="">TVA</option>
                                                    <option value="0">Ajouter un tva</option>
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
                                        <BR>
                                        <!-- <b>Lot </b>
                                        <select class="form-control select2" name="lot" id="lot">
                                            <option value=""> Sélectionner un Lot </option>
                                            <option value=""> Ajouter un Lot </option>
                                            <?php
												$req="select * from delta_lots order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                            <option value="<?php echo $enreg['code']; ?>"
                                                <?php if($lot==$enreg['code']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select> -->
                                    </div>
                                    <div class="col-xl-2">
                                        <br><br>

                                    </div>
                                    <div class="col-xl-2">
                                        <br><br>
                                      
                                    </div>
                                    <div class="col-xl-2">
                                        <br><br>
                                       
                                    </div>
                                </div>
                                <div class="form-group mt-5 pt-5 row"
                                    style="box-shadow: 0px -3px 0px rgba(50, 50, 50, 0.05); ">
                                    <h4 style="color:green;margin-left:15px ;font-weight : bold">Prix Produit</h4><br>
                                    <div class="col-xl-12 row">
                                        <div class="col-xl-6 row">
                                            
                                            <div class="col-xl-3">
                                                <b>Prix d'achat HT</b>
                                                <input class="form-control" type="number" placeholder="Prix d'achat HT"
                                                    value="<?php echo $prix_achat_ht ?>" name="prix_achat_ht"
                                                    id="prix_achat_ht">
                                                <br>
                                                <b>Prix d'achat TTC </b>
                                                <input class="form-control" type="number" placeholder="Prix d'achat TTC"
                                                    value="<?php echo $prix_achat_ttc ?>" name="prix_achat_ttc"
                                                    id="prix_achat_ttc">
                                            </div>
                                            <div class="col-xl-3">
                                                <b>Prix de vente HT </b>
                                                <input class="form-control" type="number" placeholder="Prix de vente HT"
                                                    value="<?php echo $prix_vente_ht ?>" name="prix_vente_ht"
                                                    id="prix_vente_ht">
                                                <br>
                                                <b>Prix de vente TTC </b>
                                                <input class="form-control" type="number"
                                                    placeholder="Prix de vente TTC" value="<?php echo $prix_vente_ht ?>"
                                                    name="prix_vente_ttc" id="prix_vente_ttc">
                                            </div>
                                            <div class="col-xl-3">
                                                
                                                <b>Seuil </b>
                                                <input class="form-control" type="text" placeholder="Seuil"
                                                    value="<?php echo $seuil ?>" name="seuil" id="seuil" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-2">

                                            <b>Code NGP </b>
                                            <input class="form-control" type="text" placeholder="Code NGP" value=""
                                                name="code_ngp" id="code_ngp">
                                            <br>
                                            <b>Numéro Série </b>
                                            <input class="form-control" type="text" placeholder="Numéro Série" value=""
                                                name="numero_serie" id="numero_serie">
                                        </div>
                                        <div class="col-xl-2">

                                            <b>Type </b>
                                            <select class="form-control select2" name="type" id="type">
                                                <option value=""> Sélectionner un type </option>
                                                <?php
												$req="select * from delta_types";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($type==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['type']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br> <br>
                                            <b>Nature </b>
                                            <select class="form-control select2" name="nature" id="nature">
                                                <option value=""> Sélectionner une Nature </option>
                                                <?php
												$req="select * from delta_natures";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($nature==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['nature']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-2">

                                            <br><br>
                                            <label class="form-check-label" for="produit_compose">
                                                Produit Composé
                                            </label>
                                            <input style="width : 70px" name="produit_compose" class="form-check-input"
                                                type="checkbox" value="" id="produit_compose">
                                            <br> <br>
                                            <label class="form-check-label" for="fodec">
                                                FODEC
                                            </label>
                                            <input style="width : 70px" name="fodec" class="form-check-input"
                                                type="checkbox" value="" id="fodec">
                                            <br> <br>
                                        </div>
                                    </div>


                                </div>


                                <div class="col-sm-3"><br>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Enregistrer
                                    </button>
                                    <input class="form-control" type="hidden" name="enregistrer_mail">
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

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>

<script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
<?php include("menu_footer/footer.php") ?>