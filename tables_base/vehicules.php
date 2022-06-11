<?php

if(isset($_GET['IDV'])){
    $id = $_GET['IDV'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail14'])){	

$codsoc	            	=	$_SESSION['delta_SOC'] ;
$matricule	        	=	addslashes($_POST["matricule"]) ;
$model		            =	addslashes($_POST["model"]) ;

if($id=="0")
    {
        $req="select max(id) as maxID from delta_vehicules";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_vehicules`(`id`,`codsoc`,`matricule`,`model`) VALUES
        ('".$id."','".$codsoc."','".$matricule."' , '".$model."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','17','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_vehicules` SET `matricule`='".$matricule."' , `model`='".$model."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','17','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=14" </SCRIPT>';
}

$matricule		        =	"" ;
$model	            	=	"" ;

$req="select * from delta_vehicules where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $matricule	        =	$enreg["matricule"] ;
    $model	            =	$enreg["model"] ;
}
?>
<script>
function SupprimerVehicule(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerVehicule.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row">
    <h3 class="col-lg-12 mt-5 mb-5" style="color: blue  !important;">Véhicule (*)</h3>

        <div class="col-sm-4">
            <b>Matricule (*)</b>
            <input class="form-control" type="text" placeholder="Matricule" value="<?php echo $matricule; ?>"
                id="example-text-input" name="matricule" required>
        </div>
        <div class="col-sm-4">
            <b>Model (*)</b>
            <input class="form-control" type="text" placeholder="Model" value="<?php echo $model; ?>"
                id="example-text-input" name="model" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail14">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <h3 class="col-lg-12 " style="color : red">Liste des Véhicules (*)</h3>
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th>Matricule</th>
                <th>Model</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_vehicules"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["matricule"] ?></td>
                <td><?php echo $enreg["model"]?></td>
                <td><a type="button" href="tabs.php?IDV=<?php echo $enreg["id"] ?>&suc=14"
                        class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                        href="Javascript:SupprimerVehicule('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>