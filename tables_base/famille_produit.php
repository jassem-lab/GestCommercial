<?php

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;

if($id=="0")
    {
		
		//Vérfication d'existance de code
		$req="select * from delta_famille_produit where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1&err=1" </SCRIPT>';
			 exit;
		}
		
		
        $req="select max(id) as maxID from delta_famille_produit";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_famille_produit`(`id`,`codsoc`,`code`,`designation`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','3','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_famille_produit` SET  `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','3','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}

$code		        =	"" ;
$designation		=	"" ;

$req="select * from delta_famille_produit where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
}
?>
<script>
function SupprimerFP(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerFamilleProduit.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row" id="DivFamille" <?php if(!isset($_GET['add']) and !isset($_GET['ID']) ){?> style="display:none" <?php }?>  >
        <div class="col-sm-3">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Famille de produit" value="<?php echo $code; ?>"
                id="codeF" name="code" required>
        </div>
        <div class="col-sm-3">
            <b>Désignation (*)</b>
            <input class="form-control" type="text" placeholder="designations" value="<?php echo $designation; ?>"
                id="designationF" name="designation" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail">
        </div>
    </div>

</form>
<div class="col-xl-12">
	<div class="col-xl-12 row">
		<div class="col-xl-6">
			 <b class="col-lg-12" style="color : red">Liste des Familles de produit</b>
		</div>
		<div class="col-xl-3"></div>
		<div class="col-xl-3">
			<button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutFAM"  <?php if(isset($_GET['add']) and (isset($_GET['ID'])) ){?> style="display:none" <?php }?>>+ Ajouter</button>
			<button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerFAM"  <?php if(!isset($_GET['add']) and !isset($_GET['ID'])){?> style="display:none" <?php }?>>- Annuler</button>
		</div>			
	</div>
	<?php if(isset($_GET['err'])){ ?>
		<?php if($_GET['err']=='1'){ ?>
		<font color="red" style="background-color:#FFFFFF;"><center>Attention ! Ce code est déjà existant</center></font><br /><br />
	<?php } }?>	  
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th>Code</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_famille_produit"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["designation"]?></td>
                <td><a type="button" href="tabs.php?ID=<?php echo $enreg["id"] ?>"
                        class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                        href="Javascript:SupprimerFP('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
