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
$emplacement      	      	=	addslashes($_POST["emplacement"]) ;
$colisage      	        	=	addslashes($_POST["colisage"]) ;
$code_ngp      	            =	addslashes($_POST["code_ngp"]) ;
$numero_serie      	        =	addslashes($_POST["numero_serie"]) ;
$prix_achat_ht              =   addslashes($_POST["prix_achat_ht"]);
$prix_achat_ttc             =   addslashes($_POST["prix_achat_ttc"]);
$prix_vente_ttc             =   addslashes($_POST["prix_vente_ttc"]);
$prix_vente_ht              =   addslashes($_POST["prix_vente_ht"]);
$fodec                      =   addslashes($_POST["fodec"]);
$produit_compose            =   addslashes($POST["produit_compose"]); 
    
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
    
    echo $sql="INSERT INTO `delta_produits`(`id`,`codsoc`,`reference`,`designation`,`tva`,`stock`,`seuil`,`famille`,`unite`,`marque`,`emplacement`,`code_ngp`,`numero_serie`,`colisage`,`fodec`, `produit_compose`) VALUES
    ('".$id."','".$codsoc."','".$reference."' , '".$designation."', '".$tva."', '".$stock."', '".$seuil."', '".$famille."', '".$unite."', '".$marque."', '".$emplacement."', '".$code_ngp."', '".$numero_serie."','".$colisage."','".$fodec."', '".$produit_compose."' )";
        //Log

    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
   
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','5','1','".$id."')";
    $req=mysql_query($sql1);
    
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?Succ=2" </SCRIPT>';
    
}
else{
    $sql="UPDATE `delta_produits` SET `reference`='".$reference."' , `designation`='".$designation."', `tva`='".$tva."', `stock`='".$stock."', `seuil`='".$seuil."', `famille`='".$famille."', `unite`='".$unite."', `marque`='".$marque."', `magasin`='".$magasin."', `emplacement`='".$emplacement."',  `numero_serie`='".$numero_serie."', `code_ngp`='".$code_ngp."',`produit_compose`='".$produit_compose."' , `fodec`='".$fodec."',`type`='".$type."',`nature`='".$nature."',`colisage`='".$colisage."' WHERE id=".$id;
    
      //Log

    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','5','2','".$id."')";
    $req=mysql_query($sql1);				
}
$req=mysql_query($sql);

echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';
}


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