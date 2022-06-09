<?php include('menu_footer/menu.php') ?>

<?php
$reqDate="";
$dat="";
if(isset($_POST['dat'])){
	if(($_POST['dat'])<>""){
		$dat				=	$_POST['dat'];
		$reqDate			=	" and  date<='".$dat."'";
	}
}
$reqDate1="";
$dat1="";
if(isset($_POST['dat1'])){
	if(($_POST['dat1'])<>""){
		$dat1				=	$_POST['dat1'];
		$reqDate1			=	" and  date1>='".$dat1."'";
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
                            <a href="addedit_produit.php" class="btn btn-primary waves-effect waves-light">Ajouter un
                                Produit</a>
                            <h3>Liste des Produits</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <b>Famille (*)</b>
                                            <select class="form-control select2" name="famille">
                                                <option value=""> Sélectionner une famille </option>
                                                <?php
												$req="select * from delta_famille_produit order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($famille==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <b>Marque (*)</b>
                                            <select class="form-control select2" name="marque">
                                                <option value=""> Sélectionner une marque </option>
                                                <?php
												$req="select * from delta_marques order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($marque==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <b>Magasin (*)</b>
                                            <select class="form-control select2" id="type" name="magasin" required>
                                                <option value=""> Sélectionner la magasin </option>

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
                                        <th><b>Référence</b></th>
                                        <th><b>Code à barre</b></th>
                                        <th><b>Famille</b></th>
                                        <th><b>Unité</b></th>
                                        <th><b>Marque</b></th>
                                        <th><b>Magasin</b></th>
                                        <th><b>Emplacement</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $reference			=	"";
                                        $code_barre			=	"";
                                        $id					=	0;
                                        $famille			=	"";
                                        $unite			    =	"";
                                        $marque			    =	"";
                                        $magasin			=	"";
                                        $emplacement		=	"";
                                        
                                        
                                            
                                    ?>
                                    <tr>
                                        <td><?php echo $reference; ?></td>
                                        <td><?php echo $code_barre; ?></td>
                                        <td><?php echo $famille ;?></td>
                                        <td><?php echo $unite ;?></td>
                                        <td><?php echo $marque ;?></td>
                                        <td><?php echo $magasin ;?></td>
                                        <td><?php echo $emplacement ;?></td>
                                        <td>


                                            <a href="addedit_bc.php?ID=<?php echo $id; ?>"
                                                class="btn btn-warning waves-effect waves-light">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="javascript:Imprimer('<?php echo $id; ?>')"
                                                class="btn btn-warning waves-effect waves-light"
                                                style="background-color: blue;color: white;">
                                                <span class="glyphicon glyphicon-print"></span>
                                            </a>
                                            <a href="Javascript:Supprimer('<?php echo $id; ?>')"
                                                class="btn btn-danger waves-effect waves-light"
                                                style="background-color:brown">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
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