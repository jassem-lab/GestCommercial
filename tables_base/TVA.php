<?php

if(isset($_GET['IDT'])){
    $id = $_GET['IDT'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail9'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;

if($id=="0")
    {
        $req="select max(id) as maxID from delta_TVAs";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

       echo $sql="INSERT INTO `delta_TVAs`(`id`,`codsoc`,`code`,`designation`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','3','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_TVAs` SET `code`='".$code."' , `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','3','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=9" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;

$req="select * from delta_TVAs where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
}
?>
<form action="" method="POST">
    <div class="form-group row">
        <h3 class="col-lg-12 m-5">TVA (*)</h3>

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
            <input class="form-control" type="hidden" name="enregistrer_mail9">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <h3 class="col-lg-12 " style="color : red">Liste des TVAs (*)</h3>
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
            $reqFP ="select * from delta_TVAs"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["designation"]?></td>
                <td><a type="button" href="tabs.php?IDT=<?php echo $enreg["id"] ?>&suc=9"
                        class="btn btn-warning waves-effect waves-light">Modifier</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>