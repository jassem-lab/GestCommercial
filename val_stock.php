<?php include('menu_footer/menu.php') ?>

<script>
function Imprimer() {
    if (confirm('Confirmez-vous cette action?')) {
        var myMODELE_A4 = window.open("print/imprimer_stock_F.php",
            "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");
    }
}
</script>

<div class="wrapper">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Valorisation de Stock</h4>
                </div>
            </div>
        </div>
    </div>
    <?php

$reference = "" ;     
$reqCode="";
$code="";

if(isset($_POST['code'])){
	if(($_POST['code'])<>""){
		$code			=	$_POST['code'];
		$reqCode		=	" and  id=".$code;
	}
}

?> <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h3>Valorisation de Stock des Produit Finis </h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <b>Liste des References</b>
                                            <select class="form-control select2" name="code">
                                                <option value=""> Sélectionner un produit </option>
                                                <?php
												$req="select * from delta_produits order by reference";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($code==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-3">
                                            <b></b><br>
                                            <input name="SubmitContact" type="submit" id="submit"
                                                class="btn btn-primary btn-sm " value="Filtrer">
                                            <a href="javascript:Imprimer()"
                                                class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="ion-printer"></i></span>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                            </form>
                            <?php
                            $reqPx = "SELECT SUM( `stock` ) AS stk, SUM( `prix_achat_ttc` ) AS px FROM `delta_produits`";
                            $query=mysql_query($reqPx);
                            while($enreg=mysql_fetch_array($query))
                            {
                            $stk = ($enreg['stk']) ;
                            $px = ($enreg['px']) ;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('menu_footer/footer.php') ?>