<?php include('menu_footer/menu.php') ?>


<script>
function SupprimerClient(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerClient.php?ID=" + id;
    }
}

function Archiver(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/archiverClient.php?ID=" + id;
    }
}

function Unarchiver(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/unarchiverClient.php?ID=" + id;
    }
}

function Imprimer(id) {
    if (confirm('Confirmez-vous cette action?')) {
        var myMODELE_A4 = window.open("print/imprimerClient.php?ID=" + id, "_blank",
            "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

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
                    <h4 class="page-title">Gestion des Clients</h4>
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
												echo $reqc="select * from delta_clients";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($Client==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['raison_social']; ?></option>
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
                            <!--  Modal content for the above example -->
                        </div>
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th><b>R.Social</b></th>
                                    <th><b>M.Fiscale</b></th>
                                    <th><br><b>R. de commerce</b></th>
                                    <th><b>Email</b></th>
                                    <th><b>Nature</b></th>
                                    <th><b>Téléphone</b></th>
                                    <th><b>Adresse</b></th>
                                    <th><b>Région</b></th>
                                    <th><b>Détails</b></th>
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
                                    <td><?php echo $enreg["raison_social"]  ; ?></td>
                                    <td><?php echo $enreg["matricule_fiscale"]  ; ?></td>
                                    <td><?php echo $enreg["registre_commerce"]  ; ?></td>
                                    <td><?php echo $enreg["mail"]  ; ?></td>
                                    <td><?php 
                                    $reqN = "select * from delta_natures_client where id=".$enreg["nature"] ; 
                                    $queryN = mysql_query($reqN) ; 
                                    while ($enregN = mysql_fetch_array($queryN)){
                                        echo $enregN["nature"] ; 
                                    }
                                    ?></td>
                                    <td><?php echo $enreg["tel"]  ; ?></td>
                                    <td><?php echo $enreg["adresse"]  ; ?></td>

                                    <td><?php 
                                        $reqR="select * from delta_regions where id=".$enreg["region"] ; 
                                        $queryR = mysql_query($reqR); 
                                        while($enregR = mysql_fetch_array($queryR)){
                                            echo $enregR["code"] ; 
                                        }
                                        ; ?></td>
                                    <td>

                                        <a href="clients.php?ID=<?php echo $id; ?>"
                                            class="btn btn-success waves-effect waves-light">
                                            Autres Contacts
                                        </a>
                                        <a href="clients.php?ID=<?php echo $id; ?>"
                                            class="btn btn-success waves-effect waves-light">
                                            Information Bancaire
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:Imprimer('<?php echo $id; ?>')"
                                            class="btn btn-warning waves-effect waves-light"
                                            style="background-color: blue;color: white;">
                                            <span class="glyphicon glyphicon-print"></span>
                                        </a>
                                        <a href="addedit_client.php?ID=<?php echo $id; ?>"
                                            class="btn btn-warning waves-effect waves-light">Modifier</a>
                                        <?php if ($enreg["archive"]=="0"){ ?>
                                        <a href="Javascript:Archiver('<?php echo $id; ?>')"
                                            class="btn btn-danger waves-effect waves-light">Archiver</a>
                                        <?php } else {?>
                                        <a href="Javascript:Unarchiver('<?php echo $id; ?>')"
                                            class="btn btn-dark waves-effect waves-light">Unarchiver</a>
                                        <?php }?>

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


<!-- page wrapper end -->

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>

<script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>


<?php include("menu_footer/footer.php") ?>