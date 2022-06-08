<?php include('menu_footer/menu.php') ?>
<style>
.nav-link.active {
    background: rgba(0, 0, 255, 0.2) !important;
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
                                        data-toggle="tab" href="#famille" role="tab">Famille de produit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==2){ ?> active <?php } } ?>"
                                        data-toggle="tab" href="#unite" role="tab">Unité de
                                        produit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==3){ ?> active <?php } } ?>"
                                        data-toggle="tab" href="#messages" role="tab">Marque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==4){ ?> active <?php } } ?>"
                                        data-toggle="tab" href="#emplacement" role="tab">Emplacement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==5){ ?> active <?php } } ?>"
                                        data-toggle="tab" href="#devis" role="tab">Devis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==6){ ?> active <?php } } ?>"
                                        data-toggle="tab" href="#magasin" role="tab">Magasin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==6){ ?> active <?php } } ?>"
                                        data-toggle="tab" href="#mode_paiement" role="tab">Mode de
                                        paiement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#banque" role="tab">Banque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tva" role="tab">TVA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#gouvernorat" role="tab">Gouvernorat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#region" role="tab">Région</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#pays" role="tab">Pays</a>
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