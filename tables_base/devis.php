<?php

if(isset($_GET['IDD'])){
    $id = $_GET['IDD'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail5'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;
$nombre_chiffre		=	addslashes($_POST["nombre_chiffre"]) ;
$symbole		=	addslashes($_POST["symbole"]) ;

if($id=="0")
    {
        $req="select max(id) as maxID from delta_devise";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_devise`(`id`,`codsoc`,`code`,`designation`,`symbole`,`nombre_chiffre`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."', '".$symbole."' , '".$nombre_chiffre."'  )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','8','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_devise` SET `code`='".$code."' , `designation`='".$designation."', `symbole`='".$symbole."', `nombre_chiffre`='".$nombre_chiffre."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','8','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=5" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;
$nombre_chiffre		=	"" ;
$symbole    		=	"" ;

$req="select * from delta_devise where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
    $nombre_chiffre	=	$enreg["nombre_chiffre"] ;
    $symbole       	=	$enreg["symbole"] ;
}
?>
<script>
function SupprimerDevis(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerDevis.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row">
        <h3 class="col-lg-12 mt-5 mb-5" style="color: red  !important;">Devise (*)</h3>

        <div class="col-sm-2">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Famille de produit" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required>
        </div>
        <div class="col-sm-2">
            <b>Désignation (*)</b>
            <input class="form-control" type="text" placeholder="designations" value="<?php echo $designation; ?>"
                id="example-text-input" name="designation" required>
        </div>
        <div class="col-sm-2">
            <b>Nombre de chiffre .0 (*)</b>
            <input class="form-control" type="text" placeholder="nombre de chhiffre après la virgule"
                value="<?php echo $nombre_chiffre; ?>" id="example-text-input" name="nombre_chiffre" required>
        </div>
        <div class="col-sm-2">
            <b>Symbole (*)</b>
            <input class="form-control" type="text" placeholder="symbole" value="<?php echo $symbole; ?>"
                id="example-text-input" name="symbole" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail5">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <h3 class="col-lg-12 " style="color : red">Liste des Devise (*)</h3>
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th>Code</th>
                <th>Designation</th>
                <th>Nombre de chiffre après la virgule</th>
                <th>Symbole</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_devise"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["designation"]?></td>
                <td><?php echo $enreg["nombre_chiffre"]?></td>
                <td><?php echo $enreg["symbole"]?></td>
                <td><a type="button" href="tabs.php?IDD=<?php echo $enreg["id"] ?>&suc=5"
                        class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                        href="Javascript:SupprimerDevis('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>