<?php

if(isset($_GET['IDC'])){
    $id = $_GET['IDC'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail16'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;
$nbr_pieces		    =	addslashes($_POST["nbr_pieces"]) ;
$poids_vide	    	=	addslashes($_POST["poids_vide"]) ;

if($id=="0")
    {
        $req="select max(id) as maxID from delta_colisage";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_colisage`(`id`,`codsoc`,`code`,`designation`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','15','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_colisage` SET `code`='".$code."' , `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','15','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=16" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;
$nbr_pieces         =   0 ;
$poids_vide         =   0 ;
$req="select * from delta_colisage where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
    $nbr_pieces 	=	$enreg["nbr_pieces"] ;
    $poids_vide	    =	$enreg["poids_vide"] ;
}
?>
<script>
function SupprimerColisage(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerColisage.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row">
        <h3 class="col-lg-12 mt-5 mb-5" style="color: red  !important;">Colisage (*)</h3>

        <div class="col-sm-4">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Code" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required>
        </div>
        <div class="col-sm-4">
            <b>Désignation (*)</b>
            <input class="form-control" type="text" placeholder="Désignation" value="<?php echo $designation; ?>"
                id="example-text-input" name="designation" required>
        </div>
        <div class="col-sm-4">
            <b>Nombre de pièce (*)</b>
            <input class="form-control" type="number" placeholder="Nombre de pièce" value="<?php echo $nbr_pieces; ?>"
                id="example-text-input" name="nbr_pieces" required>
        </div>
        <div class="col-sm-4">
            <b>Poids Vide (*)</b>
            <input class="form-control" type="number" placeholder="Poids Vide" value="<?php echo $poids_vide; ?>"
                id="example-text-input" name="poids_vide" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail16">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <h3 class="col-lg-12 " style="color : red">Liste des Colisages (*)</h3>
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th>Code</th>
                <th>Designation</th>
                <th>Nombre de piece</th>
                <th>Poids Vide</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_colisage"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["designation"]?></td>
                <td><?php echo $enreg["nbr_pieces"]?></td>
                <td><?php echo $enreg["poids_vide"]?></td>
                <td><a type="button" href="tabs.php?IDC=<?php echo $enreg["id"] ?>&suc=16"
                        class="btn btn-warning waves-effect waves-light">Modifier</a>
                    <a href="Javascript:SupprimerColisage('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>