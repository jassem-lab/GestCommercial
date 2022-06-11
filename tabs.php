<?php include('menu_footer/menu.php') ?>
<style>
.nav-link.active {
    background: rgba(0, 0, 255, 0.6) !important;
    color: white !important;
    font-weight: 800;

}
</style>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Autre Table de Base</h4>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->

    <div class="page-content-wrapper m-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==1){ ?> active show <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#famille"
                                        role="tab">Famille</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==2){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#unite" role="tab">Unité
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==3){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#messages"
                                        role="tab">Marque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==6){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#magasin"
                                        role="tab">Magasin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==4){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#emplacement"
                                        role="tab">Emplacement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==16){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#colisage"
                                        role="tab">Colisage</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==5){ ?> active <?php } } ?>"
                                        style="background: pink  " data-toggle="tab" href="#devis" role="tab">Devise</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==7){ ?> active <?php } } ?>"
                                        style="background: pink " data-toggle="tab" href="#mode_paiement"
                                        role="tab">Mode de
                                        paiement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==8){ ?> active <?php } } ?>"
                                        style="background: pink " data-toggle="tab" href="#banque" role="tab">Banque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==9){ ?> active <?php } } ?>"
                                        style="background: pink " data-toggle="tab" href="#tva" role="tab">TVA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==17){ ?> active <?php } } ?>"
                                        style="background: pink " data-toggle="tab" href="#retenue_source" role="tab">Retenue à la
                                        source</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==10){ ?> active <?php } } ?>"
                                        style="background: #89c4a9 " data-toggle="tab" href="#gouvernorat"
                                        role="tab">Gouvernorat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==11){ ?> active <?php } } ?>"
                                        style="background: #89c4a9 " data-toggle="tab" href="#region"
                                        role="tab">Région</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==12){ ?> active <?php } } ?>"
                                        style="background: #89c4a9 " data-toggle="tab" href="#pays" role="tab">Pays</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==14){ ?> active <?php } } ?>"
                                        style="background: #cd5dfc  " data-toggle="tab" href="#vehicules"
                                        role="tab">Véhicule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==15){ ?> active <?php } } ?>"
                                        style="background: #cd5dfc " data-toggle="tab" href="#commerciaux"
                                        role="tab">Commerciaux</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==13){ ?> active <?php } } ?>"
                                        style="background: #eddff2 " data-toggle="tab" href="#parametres"
                                        role="tab">Paramètres</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane <?php if(isset($_GET['suc'])){ if($_GET['suc']==1){ ?> active <?php } } ?>  <?php if (!(isset($_GET['suc']))){  ?> active <?php } ?> p-3"
                                    id="famille" role="tabpanel">
                                    <?php include ("tables_base/famille_produit.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==2){ ?> active <?php } } ?>"
                                    id="unite" role="tabpanel">
                                    <?php include("tables_base/unite_produit.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==3){ ?> active <?php } } ?>"
                                    id="messages" role="tabpanel">
                                    <?php include("tables_base/marque.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==4){ ?> active <?php } } ?>"
                                    id="emplacement" role="tabpanel">
                                    <?php include("tables_base/emplacement.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==5){ ?> active <?php } } ?>"
                                    id="devis" role="tabpanel">
                                    <?php include("tables_base/devis.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==6){ ?> active <?php } } ?>"
                                    id="magasin" role="tabpanel">
                                    <?php include("tables_base/magasin.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==7){ ?> active <?php } } ?>"
                                    id="mode_paiement" role="tabpanel">
                                    <?php include("tables_base/mode_paiement.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==8){ ?> active <?php } } ?>"
                                    id="banque" role="tabpanel">
                                    <?php include("tables_base/banque.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==16){ ?> active <?php } } ?>"
                                    id="colisage" role="tabpanel">
                                    <?php include("tables_base/colisage.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==17){ ?> active <?php } } ?>"
                                    id="retenue_source" role="tabpanel">
                                    <?php include("tables_base/retenue_source.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==9){ ?> active <?php } } ?>"
                                    id="tva" role="tabpanel">
                                    <?php include("tables_base/TVA.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==10){ ?> active <?php } } ?>"
                                    id="gouvernorat" role="tabpanel">
                                    <?php include("tables_base/gouvernorat.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==11){ ?> active <?php } } ?>"
                                    id="region" role="tabpanel">
                                    <?php include("tables_base/region.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==12){ ?> active <?php } } ?>"
                                    id="pays" role="tabpanel">
                                    <?php include("tables_base/pays.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==14){ ?> active <?php } } ?>"
                                    id="vehicules" role="tabpanel">
                                    <?php include("tables_base/vehicules.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==15){ ?> active <?php } } ?>"
                                    id="commerciaux" role="tabpanel">
                                    <?php include("tables_base/commerciaux.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if(isset($_GET['suc'])){ if($_GET['suc']==13){ ?> active <?php } } ?>"
                                    id="parametres" role="tabpanel">
                                    <?php include("tables_base/parametres.php"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end page content-->
</div>
<!-- page wrapper end -->


<?php include("menu_footer/footer.php") ?>