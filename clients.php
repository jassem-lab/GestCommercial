<?php include('menu_footer/menu.php') ?>
<script>
function SupprimerProduit(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerClient.php?ID=" + id;
    }
}
</script>
<?php
$reqClient="";
$Client="";
if(isset($_POST['Client'])){
	if(is_numeric($_POST['Client'])){
		$Client		=	$_POST['Client'];
		$reqClient		=	" and  id=".$Client;
	}
}
?>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Produits</h4>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->
    <?php
$reqfamille="";
$famille="";
if(isset($_POST['mp'])){
	if(is_numeric($_POST['mp'])){
		$famille				=	$_POST['famille'];
		$reqfamille			=	" and  id=".$famille;
	}
}


    ?>
    <?php
$reqMarque="";
$marque="";
if(isset($_POST['marque'])){
	if(is_numeric($_POST['marque'])){
		$marque				=	$_POST['marque'];
		$reqMarque			=	" and  id=".$marque;
	}
}
    ?>
    <?php
$reqfamille="";
$famille="";
if(isset($_POST['mp'])){
	if(is_numeric($_POST['mp'])){
		$famille				=	$_POST['famille'];
		$reqfamille			=	" and  id=".$famille;
	}
}
    ?>
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <a href="addedit_client.php" class="btn btn-primary waves-effect waves-light">Ajouter un
                                Client</a>
                            <h3>Liste des Clients</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <b>Client (*)</b>
                                            <select class="form-control select2" name="client">
                                                <option value=""> Sélectionner un client </option>
                                                <?php
												$req="select * from delta_client";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($famille==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['raison_social']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-3">
                                            <b></b><br>
                                            <input name="SubmitContact" type="submit" id="submit"
                                                class="btn btn-primary btn-sm " value="Filtrer">
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <br>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th><b>R.Social</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Téléphone</b></th>
                                        <th><b>Adresse</b></th>
                                        <th><b>M.Fiscale</b></th>
                                        <th><b>R. de commerce</b></th>
                                        <th><b>Région</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $reference			=	"";
                                        $famille			=	"";
                                        $unite			    =	"";
                                        $emplacement		=	"";
                                        $req = "select * from delta_clients where 1=1 ".$reqClient ; 
                                        $query =mysql_query($req); 
                                        while($enreg = mysql_fetch_array($query)){
                                            $id = $enreg["id"] ; 
                                    ?>
                                    <tr>
                                        <td><?php echo $enreg["reference"]; ?></td>

                                        <td><?php 
                                             $reqF ="select * from delta_famille_produit where id=".$enreg["famille"] ;
                                             $queryF = mysql_query($reqF); 
                                             while($enregF = mysql_fetch_array($queryF)){
                                             echo $enregF["code"] ; 
                                           }
                                        ?></td>
                                        <td><?php 
                                             $reqU ="select * from delta_unite_produit where id=".$enreg["unite"] ;
                                             $queryU = mysql_query($reqU); 
                                             while($enregF = mysql_fetch_array($queryU)){
                                             echo $enregF["code"] ; 
                                           }
                                        ?></td>
                                        <td><?php if($enreg["fodec"]==1){
                                            echo 'Soumis au notion Fodec' ; 
                                        }else{
                                            echo "N'est pas soumis au notion Fodec " ; 
                                            };
                                            ?>
                                        </td>
                                        <td><?php 
                                        $reqE = "select * from delta_emplacements where id".$emplacement ; 
                                        $queryE = mysql_query($reqE) ; 
                                        while($enregE = mysql_fetch_array($queryE)){
                                            echo $enregE["code"] ; 
                                        }
                                        ?></td>
                                        <td><?php 
                                        echo $enreg["prix_achat_ttc"] ; 
                                        ?></td>
                                        <td><?php 
                                       echo $enreg["prix_vente_ttc"] ; 
                                        ?></td>
                                        <td>


                                            <a href="addedit_produit.php?ID=<?php echo $id; ?>"
                                                class="btn btn-warning waves-effect waves-light">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="javascript:Imprimer('<?php echo $id; ?>')"
                                                class="btn btn-warning waves-effect waves-light"
                                                style="background-color: blue;color: white;">
                                                <span class="glyphicon glyphicon-print"></span>
                                            </a>
                                            <a href="Javascript:SupprimerProduit('<?php echo $id; ?>')"
                                                class="btn btn-danger waves-effect waves-light"
                                                style="background-color:brown">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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