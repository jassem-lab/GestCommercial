<?php include('menu_footer/menu.php') ?>


<script>
function SupprimerFournisseur(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerFournisseur.php?ID=" + id;
    }
}

function Archiver(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/archiverFournisseur.php?ID=" + id;
    }
}

function Unarchiver(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/unarchiverFournisseur.php?ID=" + id;
    }
}

function Imprimer(id) {
    if (confirm('Confirmez-vous cette action?')) {
        var myMODELE_A4 = window.open("print/imprimerFournisseur.php?ID=" + id, "_blank",
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
                    <h4 class="page-title">Gestion des Fournisseurs</h4>
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
                            <a href="addedit_fournisseur.php" class="btn btn-primary waves-effect waves-light">Ajouter
                                un
                                Fournisseur</a>
                            <h3>Liste des Fournisseurs</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <b>Client (*)</b>
                                            <select class="form-control select2" name="fournisseur">
                                                <option value=""> Sélectionner un Fournisseur </option>
                                                <?php
												echo $reqc="select * from delta_fournisseurs";
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
									<th><b>Code</b></th>
                                    <th><b>Raison sociale</b></th>
                                    <th><b style="color:blue">MF</b></th>
									<th><b style="color:green">RC</b></th>
                                    <th><b>Email</b></th>
									<th><b>Téléphone</b></th>
                                    <th><b>Adresse</b></th>
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
                                        $req = "select * from delta_fournisseurs where 1=1 ".$reqClient ; 
                                        $query =mysql_query($req); 
                                        while($enreg = mysql_fetch_array($query)){
                                            $id = $enreg["id"] ; 
                                            $reqR="select * from delta_regions where id=".$enreg["region"] ; 
                                            $queryR = mysql_query($reqR); 
                                            while($enregR = mysql_fetch_array($queryR)){
                                                $Region =  $enregR["code"] ; 
                                            }
                                    ?>
                                <tr>
									<td style="padding: 2px 2px;"><?php echo $enreg["code"]  ; ?></td>
                                    <td style="padding: 2px 2px;"><?php echo $enreg["raison_social"]  ; ?></td>
                                    <td style="padding: 2px 2px;"><b style="color:blue"><?php echo $enreg["matricule_fiscale"]  ; ?></b></td>
									<td style="padding: 2px 2px;"><b style="color:green"><?php echo $enreg["registre_commerce"]  ; ?></b></td>
                                    <td style="padding: 2px 2px;"><?php echo $enreg["mail"]  ; ?></td>
									<td style="padding: 2px 2px;"><?php echo $enreg["tel"]  ; ?></td>
									<td style="padding: 2px 2px;">
									<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" 
										data-target=".bs-example-modal-lg<?php echo $enreg['id']; ?>" id="<?php echo $enreg['id']; ?>">
										Adresse
									</button>								
									<!--  Modal content for the above example -->
									<div class="modal fade bs-example-modal-lg<?php echo $enreg['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title mt-0" id="myLargeModalLabel" style="color:blue"><?php echo $enreg["code"]; ?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
												</div>
												<div class="modal-body">
												   <div class="col-md-12 row">
														<?php
															$pays = "";
															$reqp="select * from delta_pays where id=".$enreg['pays'];
															$queryp=mysql_query($reqp);
															while($enregp=mysql_fetch_array($queryp)){
																$pays = $enregp['code'];
															}
															$region = "";
															$reqp="select * from delta_regions where id=".$enreg['region'];
															$queryp=mysql_query($reqp);
															while($enregp=mysql_fetch_array($queryp)){
																$region = $enregp['code'];
															}
															$gouvernorat = "";
															$reqp="select * from delta_gouvernorats where id=".$enreg['gouvernorat'];
															$queryp=mysql_query($reqp);
															while($enregp=mysql_fetch_array($queryp)){
																$gouvernorat = $enregp['code'];
															}															
														?>
														<div class="col-md-12">
															<b style="color: blue">Pays : </b> <?php echo $pays; ?>
														</div>
														<div class="col-md-12">
															<b style="color: blue">Région : </b> <?php echo $region; ?>
														</div>
														<div class="col-md-12">
															<b style="color: blue">Gouvernorat : </b> <?php echo $gouvernorat; ?>
														</div>
														<div class="col-md-12">
															<b style="color: blue">Adresse : </b> <?php echo $enreg['adresse']; ?>
														</div>														
												   </div>
												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->									
									</td>
                                    <td style="padding: 2px 2px;">
										<button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal"  data-target=".bs-example-modal-lg1-<?php echo $enreg['id']; ?>" id="<?php echo $enreg['id']; ?>">
											<i class="mdi mdi-contacts">Contact</i>
										</button>	
										 <!--  Modal content for the above example -->
										<div class="modal fade bs-example-modal-lg1-<?php echo $enreg['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title mt-0" id="myLargeModalLabel" style="color:blue">Autres contacts - Client : <?php echo $enreg["code"]; ?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
													</div>
													<div class="modal-body">
													   
													   <div class="col-md-12 row">
															<div class="col-md-5">
																<b>Email</b>	
																<input type="text" class="form-control" name="email" id="email<?php echo $enreg['id']; ?>">
															</div>
															<div class="col-md-5">
																<b>Téléphone (GSM) :</b>
																<input class="form-control" type="number"  id="tel<?php echo $enreg['id']; ?>" name="tel<?php echo $enreg['id']; ?>" class="form-control" >
															</div>
															<div class="col-md-5">
																<br>
																<input type="button" id="<?php echo $enreg['id']; ?>" value="Enregistrer" class="btn btn-primary btn-sm btnmp" >
															</div>															
													   </div>
													   
													   <div class="col-md-12 row" style="margin-top:20px" id="listeCONTACT<?php echo $enreg['id']; ?>" >

													   </div>
													   
													   
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->			                                      
									   
									   
									   	<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"  data-target=".bs-example-modal-lg1-<?php echo $enreg['id']; ?>" id="<?php echo $enreg['id']; ?>">
											<i class="mdi mdi-bank">Banques</i>
										</button>	
                                        
                                    </td>
                                    <td  style="padding: 2px 2px;">
                                        <a href="javascript:Imprimer('<?php echo $id; ?>')"class="btn btn-warning waves-effect waves-light"style="background-color: blue;color: white;">
											<i class="ion-printer"></i>
                                        </a>
                                        <a href="addedit_fournisseur.php?ID=<?php echo $id; ?>" class="btn btn-warning waves-effect waves-light">
											<span class="glyphicon glyphicon-pencil"></span>
										</a>
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

<?php include("menu_footer/footer.php") ?>
<script>

	$(".btn").on("click", function(){
		var id		= $(this).attr('id');	
		if (window.XMLHttpRequest)
		{
		  xmlhttp_liste_contact=new XMLHttpRequest();
		}else{
		  xmlhttp_liste_contact=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp_liste_contact.onreadystatechange=function(){
			
			if(xmlhttp_liste_contact.status==200 && xmlhttp_liste_contact.readyState==4){
				
				$('#listeCONTACT'+id).html(xmlhttp_liste_contact.responseText);
				$('#email'+id).val('');
				$('#tel'+id).val('');					
			}	
		}
		xmlhttp_liste_contact.open("POST","page_json/json_listecontacts_frn.php",true);
		xmlhttp_liste_contact.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp_liste_contact.send("client="+id);
		
	});
	$(".btnmp").on("click", function(){
		var id			= $(this).attr('id');
		var email		= $("#email"+id).val();
		var tel			= $("#tel"+id).val();
				
		var variable="client="+id+"&email="+email+"&tel="+tel;
		$.post("page_ajax/ajax_contact_frn.php", variable, function (data, status) {
			if (status == "success") {	
					if (window.XMLHttpRequest)
					{
					  xmlhttp_liste_contact=new XMLHttpRequest();
					}else{
					  xmlhttp_liste_contact=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp_liste_contact.onreadystatechange=function(){
						
						if(xmlhttp_liste_contact.status==200 && xmlhttp_liste_contact.readyState==4){
							
							$('#listeCONTACT'+id).html(xmlhttp_liste_contact.responseText);
						}	
					}
					xmlhttp_liste_contact.open("POST","page_json/json_listecontacts_frn.php",true);
					xmlhttp_liste_contact.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp_liste_contact.send("client="+id);				

					$('#email'+id).val('');
					$('#tel'+id).val('');
			}
		}, 'json');
		$('.page-loader-wrapper').removeClass("show");
		
	});	

</script>