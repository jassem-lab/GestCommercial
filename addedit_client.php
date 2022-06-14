<?php include('menu_footer/menu.php') ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.nav-link.active {
    background: rgba(0, 0, 255, 0.6) !important;
    color: white !important;
    font-weight: 800;

}
</style>
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
    width: 100%;
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
if(isset($_GET['Succ'])){
    $Succ = $_GET['Succ'];
}



if(isset($_POST['enregistrer_mail'])){	
$raisonsocial                   = addslashes($_POST["raisonsocial"]) ; 
$mail                           = addslashes($_POST["mail"]) ; 
$tel                            = addslashes($_POST["tel"]) ; 
$gsm                            = addslashes($_POST["gsm"]) ; 
$pays                           = addslashes($_POST["pays"]) ; 
$adresse                        = addslashes($_POST["adresse"]) ; 
$region                         = addslashes($_POST["region"]) ; 
$matricule_fiscale               = addslashes($_POST["matriculeFiscale"]) ; 
$registre_commerce              = addslashes($_POST["registre_commerce"]) ; 
$mail2                          = addslashes($_POST["mail2"]) ; 
$gsm2                           = addslashes($_POST["gsm2"]) ; 
$RIB                            = addslashes($_POST["RIB"]) ; 
$banque                         = addslashes($_POST["banque"]) ; 
$nature                         = addslashes($_POST["nature"]) ; 
$activite                       = addslashes($_POST["activite"]) ; 
$SWIFT                          = addslashes($_POST["SWIFT"]) ; 
$IBAN                           = addslashes($_POST["IBAN"]) ; 

    
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
    echo $sql="INSERT INTO `delta_clients`(`id`,`raison_social`,`mail`,`tel`,`gsm2`,`pays`,`adresse`,`region`,`matricule_fiscale`,`registre_commerce`,`mail2`,`rib`,`banque`,`nature`,`activite`,`swift`,`iban`) VALUES
    ('".$id."','".$raisonsocial."','".$mail."','".$tel."','".$gsm2."','".$pays."','".$adresse."','".$region."','".$matricule_fiscale."','".$registre_commerce."','".$mail2."','".$RIB."','".$banque."','".$nature."','".$activite."','".$SWIFT."','".$IBAN."')";
        //Log

    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
   
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','19','1','".$id."')";
    $req=mysql_query($sql1);
    
    
    
}
else{
    $sql="UPDATE `delta_clients` SET `raison_social`='".$raisonsocial."' , `mail`='".$mail."' , `tel`='".$tel."' , `gsm2`='".$gsm2."' , `pays`='".$pays."' , `adresse`='".$adresse."' , `region`='".$region."' , `matricule_fiscale`='".$matricule_fiscale."' , `registre_commerce`='".$registre_commerce."', `mail2`='".$mail2."', `rib`='".$rib."', `banque`='".$banque."', `nature`='".$nature."', `activite`='".$activite."', `swift`='".$SWIFT."', `iban`='".$IBAN."' WHERE id=".$id;
    
      //Log

    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','19','2','".$id."')";
    $req=mysql_query($sql1);				
}
$req=mysql_query($sql);

echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';
}
$raisonsocial            = "" ; 
$mail                    = "" ; 
$tel                     = "" ; 
$matriculeFiscale        = "" ;
$adresse                 = "" ; 
$pays                    = "" ; 
$region                  = "" ; 
$gouvernorat             = "" ; 
$registre_commerce       = "" ; 
$mail2                   = "" ;
$gsm2                    = "" ;
$RIB                     = "" ;
$banque                  = "" ;
$nature                  = "" ;
$activite                = "" ;
$SWIFT                   = "" ; 
$IBAN                    = "" ; 


$req = "select * from delta_clients where id=".$id ;
$query = mysql_query($req) ; 
while($enreg = mysql_fetch_array($query)){
    $raisonsocial            = $enreg["raison_social"] ; 
    $mail                    = $enreg["mail"] ; 
    $tel                     = $enreg["tel"] ; 
    $matriculeFiscale        = $enreg["matricule_fiscale"] ;
    $adresse                 = $enreg["adresse"] ; 
    $pays                    = $enreg["pays"] ; 
    $region                  = $enreg["region"] ; 
    $gouvernorat             = $enreg["gouvernorat"] ; 
    $registre_commerce       = $enreg["registre_commerce"] ; 
    $mail2                   = $enreg["mail2"] ;
    $gsm2                    = $enreg["gsm2"] ;
    $RIB                     = $enreg["rib"] ;
    $banque                  = $enreg["banque"] ;
    $nature                  = $enreg["nature"] ;
    $SWIFT                   = $enreg["swift"] ;
    $IBAN                    = $enreg["iban"] ;
} 


?>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des Clients</h4>
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
                            <a href="clients.php" class="btn btn-primary waves-effect waves-light">Retour</a>
                            <form method="POST">

                                <div class="form-group row mt-4">
                                    <div class="col-sm-3 col-lg-2">
                                        <b>Raison sociale (*)</b>
                                        <input class="form-control" type="text" placeholder="Raison sociale"
                                            value="<?php echo $raisonsocial; ?>" id="example-text-input"
                                            name="raisonsocial" required>
                                    </div>
                                    <div class="col-sm-2 col-lg-2">
                                        <b>Matricule Fiscale (*)</b>
                                        <input class="form-control" data-parsley-type="number" type="number"
                                            placeholder="Matricule Fiscale" value="<?php echo $matriculeFiscale; ?>"
                                            id="example-text-input" name="matriculeFiscale" required>
                                    </div>
                                    <div class="col-sm-2 col-lg-2">
                                        <b>Registre de Commerce (*)</b>
                                        <input class="form-control" data-parsley-type="number" type="number"
                                            placeholder="Matricule Fiscale" value="<?php echo $registre_commerce; ?>"
                                            id="example-text-input" name="registre_commerce" required>
                                    </div>
                                    <div class="col-sm-2 col-lg-2">
                                        <b>Activité </b>

                                        <input class="form-control" type="text" placeholder="Activité"
                                            value="<?php echo $activite; ?>" id="example-text-input" name="activite"
                                            required>

                                    </div>
                                    <div class="col-sm-2 col-lg-2">
                                        <b>Nature </b>
                                        <select class="form-control select2" name="nature" id="nature">
                                            <option value=""> Sélectionner une Nature </option>
                                            <?php
                                                        $req="select * from delta_natures_client";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($nature==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['nature']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-lg-2">

                                        <b>Email (*)</b>
                                        <input class="form-control" type="email" parsley-type="email"
                                            placeholder="Email de client" value="<?php echo $mail; ?>"
                                            id="example-text-input" name="mail" required>
                                    </div>
                                    <div class="col-sm-2 col-lg-2 mt-2">
                                        <b>Téléphone (*)</b>
                                        <input class="form-control" data-parsley-type="number" type="number"
                                            placeholder="Téléphone de client" value="<?php echo $tel; ?>"
                                            id="example-text-input" name="tel">
                                    </div>


                                    <div class="col-sm-2 col-lg-2 mt-2">
                                        <b>Adresse</b>
                                        <input class="form-control" type="text" placeholder="Adresse"
                                            value="<?php echo $adresse; ?>" id="example-text-input" name="adresse">
                                    </div>
                                    <div class="col-sm-2 col-lg-2 mt-2">
                                        <b>Pays</b>
                                        <select class="form-control select2" name="pays" id="pays">
                                            <option value=""> Sélectionner un Pays </option>
                                            <option value="0"> Ajouter un Pays </option>
                                            <?php
                                                        $req="select * from delta_pays";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($pays==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 col-lg-2 mt-2">
                                        <b>Région </b>
                                        <select class="form-control select2" name="region" id="region">
                                            <option value=""> Sélectionner une Région </option>
                                            <option value="0"> Ajouter une Région </option>
                                            <?php
                                                        $req="select * from delta_regions";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($region==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-2 col-lg-2 mt-2">
                                        <b>Gouvernorat</b>
                                        <select class="form-control select2" name="gouvernorat" id="gouvernorat">
                                            <option value=""> Sélectionner une Gouvernorat </option>
                                            <option value="0"> Ajouter une Gouvernorat </option>
                                            <?php
                                                        $req="select * from delta_gouvernorats";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($gouvernorat==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <br>
                                <h5 style="color : red "><strong>Autres Contacts: </strong></h5>
                                <div class="form-group row">

                                    <div class="col-sm-3 col-xl-2">
                                        <b>Email </b>
                                        <input class="form-control" type="email" parsley-type="email"
                                            placeholder="Email de client" value="<?php echo $mail2; ?>"
                                            id="example-text-input" name="mail2">
                                    </div>

                                    <div class="col-xl-2">
                                        <b>Téléphone</b>
                                        <input class="form-control" type="number" parsley-type="tel" placeholder="GSM"
                                            value="<?php echo $gsm2; ?>" id="example-text-input" name="gsm2">
                                    </div>


                                    <div class="col-sm-3 col-xl-2">
                                        <b>Email 2</b>
                                        <input class="form-control" type="email" parsley-type="email"
                                            placeholder="Email de client" value="<?php echo $mail2; ?>"
                                            id="example-text-input" name="mail2">
                                    </div>
                                    <div class="col-xl-2">
                                        <b>Téléphone 2</b>
                                        <input class="form-control" type="number" parsley-type="tel" placeholder="GSM"
                                            value="<?php echo $gsm2; ?>" id="example-text-input" name="gsm2">
                                    </div>
                                </div>



                                <h5 style="color : red "><strong>Informations Bancaire : </strong></h5>
                                <div class="form-group row">

                                    <div class="col-sm-3 col-xl-2">
                                        <b>Banque</b>
                                        <select class="form-control select2" name="banque" id="banque">
                                            <option value=""> Sélectionner une banque </option>
                                            <?php
                                                        $req="select * from delta_banques";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($banque==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>RIB </b>
                                        <input class="form-control" type="text" parsley-type="RIB" placeholder="RIB"
                                            value="<?php echo $RIB; ?>" id="example-text-input" name="RIB">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>SWIFT </b>
                                        <input class="form-control" type="text" parsley-type="SWIFT" placeholder="SWIFT"
                                            value="<?php echo $SWIFT; ?>" id="example-text-input" name="SWIFT">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>IBAN </b>
                                        <input class="form-control" type="text" parsley-type="IBAN" placeholder="IBAN"
                                            value="<?php echo $IBAN; ?>" id="example-text-input" name="IBAN">
                                    </div>
                                </div>
                                <div class="form-group row" style="display:none">

                                    <div class="col-sm-3 col-xl-2" style="display:none">
                                        <b>Banque</b>
                                        <select class="form-control select2" name="banque" id="banque">
                                            <option value=""> Sélectionner une banque </option>
                                            <?php
                                                        $req="select * from delta_banques";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($banque==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>RIB </b>
                                        <input class="form-control" type="text" parsley-type="RIB" placeholder="RIB"
                                            value="<?php echo $RIB; ?>" id="example-text-input" name="RIB">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>SWIFT </b>
                                        <input class="form-control" type="text" parsley-type="SWIFT" placeholder="SWIFT"
                                            value="<?php echo $SWIFT; ?>" id="example-text-input" name="SWIFT">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>IBAN </b>
                                        <input class="form-control" type="text" parsley-type="IBAN" placeholder="IBAN"
                                            value="<?php echo $IBAN; ?>" id="example-text-input" name="IBAN">
                                    </div>
                                </div>
                                <div class="form-group row" style="display:none">

                                    <div class="col-sm-3 col-xl-2" style="display:none">
                                        <b>Banque</b>
                                        <select class="form-control select2" name="banque" id="banque">
                                            <option value=""> Sélectionner une banque </option>
                                            <?php
                                                        $req="select * from delta_banques";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($banque==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['designation']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-xl-2" style="display:none">
                                        <b>RIB </b>
                                        <input class="form-control" type="text" parsley-type="RIB" placeholder="RIB"
                                            value="<?php echo $RIB; ?>" id="example-text-input" name="RIB">
                                    </div>
                                    <div class="col-sm-3 col-xl-2" style="display:none">
                                        <b>SWIFT </b>
                                        <input class="form-control" type="text" parsley-type="SWIFT" placeholder="SWIFT"
                                            value="<?php echo $SWIFT; ?>" id="example-text-input" name="SWIFT">
                                    </div>
                                    <div class="col-sm-3 col-xl-2" style="display:none">
                                        <b>IBAN </b>
                                        <input class="form-control" type="text" parsley-type="IBAN" placeholder="IBAN"
                                            value="<?php echo $IBAN; ?>" id="example-text-input" name="IBAN">
                                    </div>
                                </div>
                                <br>


                                <div class="form-group row" style="display:none">


                                </div>
                                <div class="form-group row" style="display:none">

                                    <div class="col-sm-3 col-xl-2">
                                        <b>Email </b>
                                        <input class="form-control" type="email" parsley-type="email"
                                            placeholder="Email de client" value="<?php echo $mail2; ?>"
                                            id="example-text-input" name="mail2">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>Téléphone</b>
                                        <input class="form-control" type="number" parsley-type="tel" placeholder="GSM"
                                            value="<?php echo $gsm2; ?>" id="example-text-input" name="gsm2">
                                    </div>
                                </div>
                                <br>


                                <div class="form-group m-b-0">
                                    <div>
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
            <!-- end container-fluid -->
        </div>
        <!-- end page content-->
    </div>
</div>
</div>
<!-- page wrapper end -->




<?php include("menu_footer/footer.php") ?>