<?php

if(isset($_GET['IDR'])){
    $id = $_GET['IDR'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail11'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;

if($id=="0")
    {
        $req="select max(id) as maxID from delta_regions";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_regions`(`id`,`codsoc`,`code`,`designation`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','3','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_regions` SET `code`='".$code."' , `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','3','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=11" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;

$req="select * from delta_regions where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
}
?>
<form action="" method="POST">
    <div class="form-group row">
        <h3 class="col-lg-12 m-5">Région (*)</h3>

        <div class="col-sm-4">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Famille de produit" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required>
        </div>
        <div class="col-sm-4">
            <b>Désignation (*)</b>
            <input class="form-control" type="text" placeholder="designations" value="<?php echo $designation; ?>"
                id="example-text-input" name="designation" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail11">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <h3 class="col-lg-12 " style="color : red">Liste des Régions (*)</h3>
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
            $reqFP ="select * from delta_regions"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["designation"]?></td>
                <td><a type="button" href="tabs.php?IDR=<?php echo $enreg["id"] ?>&suc=11"
                        class="btn btn-warning waves-effect waves-light">Modifier</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>