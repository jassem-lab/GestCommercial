<?php include('menu_footer/menu.php') ?>
<?php
$devis    = "" ;

$reqDevis="";
$devis="";
if(isset($_POST['Client'])){
	if(is_numeric($_POST['devis'])){
		$devis	       	=	$_POST['devis'];
		$reqDevis		=	" and  id=".$devis;
	}
}
?>
<script>
function SupprimerDevis(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerDev.php?ID=" + id;
    }
}
// function Unarchiver(id) {
//     if (confirm('Confirmez-vous cette action?')) {
//         document.location.href = "page_js/unarchiverDevis.php?ID=" + id;
//     }
// }

// function Archiver(id) {
//     if (confirm('Confirmez-vous cette action?')) {
//         document.location.href = "page_js/archiverDevis.php?ID=" + id;
//     }
// }

function Imprimer(id) {
    if (confirm('Confirmez-vous cette action?')) {
        var myMODELE_A4 = window.open("print/imprimerDevis.php?ID=" + id, "_blank",
            "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");
    }
}
</script>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des Devis</h4>
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
                            <a href="gest_det_devis.php" class="btn btn-primary waves-effect waves-light">Ajouter un
                                Devis</a>
                            <h3>Liste des Devis</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <b>Devis (*)</b>
                                            <select class="form-control select2" name="devis">
                                                <option value=""> Sélectionner un Devis </option>
                                                <?php
												echo $reqc="select * from delta_devis";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($devis==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['numero']; ?></option>
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
                                    <th><b>Numéro</b></th>
                                    <th><b>Client</b></th>
                                    <th><b>Date</b></th>
                                    <th><b>Validité</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $reqDevis ="select * from delta_devis where 1=1 ".$reqDevis ; 
                                $queryDevis = mysql_query($reqDevis) ; 
                                while($enregDevis = mysql_fetch_array($queryDevis)){
                                    $id     = $enregDevis["id"]; 
                                    $numero = $enregDevis["numero"] ; 
                                    $client = $enregDevis["client"] ; 
                                    $date = $enregDevis["date"] ; 
                                    $validite = $enregDevis["validite"] ; 
                                    $reqC = "select * from delta_clients where id=".$client ; 
                                    $queryC = mysql_query($reqC) ; 
                                     while($enregC = mysql_fetch_array($queryC)){
                                        $client = $enregC["raison_social"] ; 
                                        $archive = $enregC["archive"] ; 
                                    }
                                ?>
                                <tr>


                                    <td> <?php echo $numero ?> </td>
                                    <td> <?php echo $client ?> </td>
                                    <td> <?php echo $date ?> </td>
                                    <td> <?php echo $validite ?> </td>

                                    <td>
                                        <a href="javascript:Imprimer('<?php echo $id ?>')"
                                            class="btn btn-sm btn-warning waves-effect waves-light"
                                            style="background-color: blue;color: white;">
                                            Imprimer
                                        </a>
                                        <a href="gest_det_devis.php?ID=<?php echo $id ; ?>"
                                            class="btn btn-sm btn-warning waves-effect waves-light">Modifier</a>
                                        <a href="Javascript:SupprimerDevis('<?php echo $id ; ?>')"
                                            class="btn btn-sm btn-danger waves-effect waves-light"
                                            style="background-color:brown">Supprimer</a>
                                            <!-- <?php if ($enregC["archive"]=="0"){ ?>
                                        <a href="Javascript:Archiver('<?php echo $id; ?>')"
                                            class="btn btn-sm btn-danger waves-effect waves-light">Archiver</a>
                                        <?php } else {?>
                                        <a href="Javascript:Unarchiver('<?php echo $id; ?>')"
                                            class="btn btn-sm btn-warning waves-effect waves-light"
                                            class="btn  btn-dark waves-effect waves-light">Unarchiver</a>
                                        <?php }?> -->
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

<?php include('menu_footer/footer.php') ?>