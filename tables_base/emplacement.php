<?php

if(isset($_GET['IDE'])){
    $id = $_GET['IDE'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail4'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;

if($id=="0")
    {
		//Vérfication d'existance de code
		$req="select * from delta_emplacements where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=4&err=1" </SCRIPT>';
			 exit;
		}		
        $req="select max(id) as maxID from delta_emplacements";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_emplacements`(`id`,`codsoc`,`code`,`designation`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','6','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_emplacements` SET `code`='".$code."' , `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','6','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=4" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;

$reqEmplacement="";
$emplacment="";
if(isset($_POST['emplacment'])){
	if(is_numeric($_POST['emplacment'])){
		$emplacment		    =	$_POST['emplacment'];
		$reqEmplacement		=	" and  id=".$emplacment;
	}
} 

$req="select * from delta_emplacements where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
}
?>
<script>
function SupprimerEmplacement(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerEmplacement.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row" id="DivEMP" <?php if(!isset($_GET['add4']) and !isset($_GET['IDE']) ){?>
        style="display:none" <?php }?>>
        <div class="col-sm-4">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="" value="<?php echo $code; ?>" id="example-text-input"
                name="code" required>
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
            <input class="form-control" type="hidden" name="enregistrer_mail4">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <div class="col-xl-12 row">
        <div class="col-xl-6">
            <b class="col-lg-12" style="color : red">Liste des emplacements</b>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-3">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutEMP"
                <?php if(isset($_GET['add4']) and (isset($_GET['IDE'])) ){?> style="display:none" <?php }?>>+
                Ajouter</button>
            <button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerEMP"
                <?php if(!isset($_GET['add4']) and !isset($_GET['IDE'])){?> style="display:none" <?php }?>>-
                Annuler</button>
        </div>
    </div>
    <?php if(isset($_GET['err'])){ ?>
    <?php if($_GET['err']=='1'){ ?>
    <font color="red" style="background-color:#FFFFFF;">
        <center>Attention ! Ce code est déjà existant</center>
    </font><br /><br />
    <?php } }?>
    <form name="SubmitContact" class="row mb-3" method="post" action="" onSubmit="" style='margin-top : 50px ; '>
        <div class="col-xl-3">
            <b>Emplacement</b>
            <select class="form-control select2" name="emplacement" id="emplacement">
                <option value=""> Sélectionner un emplacement </option>
                <?php
                      echo  $reqc="select * from delta_emplacements" ;
                        $queryc=mysql_query($reqc);
                        while($enregc=mysql_fetch_array($queryc)){
                        ?>
                <option value="<?php echo $enregc['id']; ?>" <?php if($emplacement==$enregc['id']) {?> selected
                    <?php } ?>>
                    <?php echo $enregc['code']; ?></option>
                <?php } ?>
            </select>
            <input name="SubmitContact" type="submit" id="submit" class="btn btn-primary btn-sm mt-2" value="Filtrer">
        </div>
    </form>
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
            $reqFP ="select * from delta_emplacements where 1=1".$reqEmplacement; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["designation"]?></td>
                <td><a type="button" href="tabs.php?IDE=<?php echo $enreg["id"] ?>&suc=4"
                        class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                        href="Javascript:SupprimerEmplacement('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>