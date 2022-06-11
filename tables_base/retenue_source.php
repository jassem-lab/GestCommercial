<?php

if(isset($_GET['IDB'])){
    $id = $_GET['IDB'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail21'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$label	        	=	addslashes($_POST["label"]) ;
$taux		=	addslashes($_POST["taux"]) ;

if($id=="0")
    {
        $req="select max(id) as maxID from delta_retenues";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_retenues`(`id`,`codsoc`,`label`,`taux`) VALUES
        ('".$id."','".$codsoc."','".$label."' , '".$taux."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','18','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_retenues` SET `code`='".$code."' , `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','18','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=17" </SCRIPT>';
}

$label		=	"" ;
$taux		=	"" ;

$req="select * from delta_retenues where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $label	        =	$enreg["label"] ;
    $taux       	=	$enreg["taux"] ;
}
?>
<script>
function SupprimerRetenue(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerRetenue.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row">
        <h3 class="col-lg-12 mt-5 mb-5" style="color: red  !important;">Retenue à la source (*)</h3>

        <div class="col-sm-4">
            <b>Label (*)</b>
            <input class="form-control" type="text" placeholder="Label" value="<?php echo $label; ?>"
                id="example-text-input" name="label" required>
        </div>
        <div class="col-sm-4">
            <b>Taux (*)</b>
            <input class="form-control" type="text" placeholder="Taux" value="<?php echo $taux; ?>"
                id="example-text-input" name="taux" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail21">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <h3 class="col-lg-12 " style="color : red">Liste des Retenues à la source (*)</h3>
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th>Label</th>
                <th>Taux</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_retenues"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["label"] ?></td>
                <td><?php echo $enreg["taux"]?></td>
                <td><a type="button" href="tabs.php?IDB=<?php echo $enreg["id"] ?>&suc=17"
                        class="btn btn-warning waves-effect waves-light">Modifier</a>
                    <a href="Javascript:SupprimerBanque('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>