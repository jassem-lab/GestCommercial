<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
	
    $code = "";
    $req="select * from delta_fournisseurs  WHERE id=".$id;
    $query=mysql_query($req);
    while($enreg=mysql_fetch_array($query)){
        $code = $enreg['code'];
    }


	$sql = "delete from `delta_fournisseurs` WHERE id=".$id;
	$requete = mysql_query($sql) ;

    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`, `code`) VALUES ('".$dateheure."','".$iduser."','20','3','".$id."','".$code."')";
    $req=mysql_query($sql1);	
	
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../clients.php" </SCRIPT>';
	
?>